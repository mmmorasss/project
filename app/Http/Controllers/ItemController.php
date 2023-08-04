<?php

namespace App\Http\Controllers;

use App\Models\BindRole;
use App\Models\Cart;
use App\Models\Company;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function mainPage(){
        $items = Item::all();
        return view('pages.mainPage', ['items'=>$items]);
    }
    public function addItem(Request $request){
        $name = $request->name;
        $cost = $request->cost;
        $path = $request->file('img')->store('public/items');
        $path = str_replace('public', 'storage', $path);
        $discount = $request->discount;
        $type = $request->type;
        $ship = $request->ship;
        $description = $request->description;
        if ($request->top == 1){
            $top = $request->top;
        }else{
            $top = null;
        }
        $sellerId =  auth()->user()->getAuthIdentifier();
        $item = new Item();
        $item->name = $name;
        $item->cost = $cost;
        $item->img = $path;
        $item->description = $description;
        $item->type = $type;
        $item->top = $top;
        $item->ship = $ship;
        $item->discount = $discount;
        $item->seller_id = $sellerId;
        $item->save();
        return redirect()->intended('/profile');
    }

    public function deleteItem(Request $request){
        $userId = auth()->user()->getAuthIdentifier();
        $itemId = $request->item_id;
        if (Item::where('seller_id', $userId)->exists() and Item::where('seller_id', $userId)->first()->id == $itemId){
            Item::where('id', $itemId)->delete();
            if (Cart::where('item_id', $itemId)->exists()){
                Cart::where('item_id', $itemId)->delete();
            }
        }
        return redirect()->intended('/products');
    }
    public function productDetails (Request $request){
        $itemId = $request->id;
        $item = Item::where('id', $itemId)->first();
        $userId = auth()->user()->getAuthIdentifier();
        $type = \App\Models\ItemType::where('id', $item->type)->first();
        $company = \App\Models\Company::where('seller_id', $item->seller_id)->first();
        if( BindRole::where('user_id', $userId)->exists()){
            $bindRole = BindRole::where('user_id', $userId)->first();
            $isAdmin = $bindRole->role_id == 2;
            if ($item->seller_id == $userId){
                $isCreator = $item->seller_id;
            }else{
                $isCreator = '';
            }
            return view('pages.productDetails', ['item'=>$item, 'isAdmin'=>$isAdmin, 'isCreator'=>$isCreator, 'company'=>$company, 'type'=>$type]);
        }
        return view('pages.productDetails', ['item'=>$item, 'isAdmin'=>'', 'isCreator'=>'', 'company'=>$company, 'type'=>$type]);
    }
    public function products(){
        $items = Item::all();
        $types = \App\Models\ItemType::all();
        return view('pages.products', ['items'=>$items, 'types'=>$types]);
    }
    public function showSellerItems(Request $request){
        $sellerId = $request->seller_id;
        $items = Item::where('seller_id', $sellerId)->get();
        $company = Company::where('seller_id', $sellerId)->first();
        return view('pages.sellerProducts', ['items'=>$items, 'company'=>$company]);
    }
    public function giveProp(Request $request){
        $top = $request->top;
        $like = $request->like;
        $popular = $request->popular;
        $itemId = $request->productId;
        Item::where('id', $itemId)->update(['top'=>$top, 'mayLike'=>$like, 'popular'=>$popular]);
        return (['result'=>'success']);
    }
}
