<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartStatus;
use App\Models\Item;
use Illuminate\Http\Request;
use function Spatie\Ignition\ErrorPage\jsonEncode;

class CartController extends Controller
{
    // Сделать более оптимальный запрос к БД
    public function showCart(){
        $userId = auth()->user()->getAuthIdentifier();
        $carts = Cart::where(['user_id'=>$userId, 'status'=>1])->get(); // Получили все товары пользователя из корзины
        foreach ($carts as $cart) { // Добавили к товарам название, цену и картинку
            $item = Item::where('id', $cart->item_id)->first();
            $cart->name = $item->name;
            if ($item->discount !=null){
                $cart->cost = round($item->cost - $item->cost/100 * $item->discount);
            }else{
                $cart->cost = $item->cost;
            }
            $cart->img = $item->img;
            $cart->ship = $item->ship;
        }
        // Рендерим результат
        return view('pages.cart', ['carts' => $carts]);
    }

    public function addItem(Request $request)
    {
        $itemId = $request->item_id;
        $userId = auth()->user()->getAuthIdentifier();
        $cart = new Cart();
        $cart->item_id = $itemId;
        $cart->user_id = $userId;
        $cart->quantity = 1;
        $cart->save();
        return redirect()->intended('/cart');
    }
    public function changeQuantity(Request $request){
        $cartId = $request->cartId;
        $quantity = $request->quantity;
        $cart = Cart::where('id', $cartId)->first();
        $cart->quantity = $quantity;
        $cart->save();
        return json_encode(['result'=>'success']);
    }
    public function continueShopping(){
        $userId = auth()->user()->getAuthIdentifier();
        $carts = Cart::where(['user_id'=>$userId, 'status'=>1])->update(['status'=>2]);

        return redirect()->intended('/myOrders');
    }
    public function showMyOrders(){
        $userId = auth()->user()->getAuthIdentifier();
        $carts = Cart::where('user_id', $userId)->get(); // Получили все товары пользователя из корзины
        foreach ($carts as $cart) { // Добавили к товарам название, цену и картинку
            $item = Item::where('id', $cart->item_id)->first();
            $status = CartStatus::where('id', $cart->status)->first();
            $cart->name = $item->name;
            if ($item->discount !=null){
                $cart->cost = round($item->cost - $item->cost/100 * $item->discount);
            }else{
                $cart->cost = $item->cost;
            }
            $cart->img = $item->img;
            $cart->ship = $item->ship;
            $cart->status = $status->name;
        }
        return view('pages.myOrders',['carts'=>$carts]);
    }
    public function showOrders(){
        $carts = Cart::all(); // всё о товарах
        $statuses = CartStatus::all(); // все статусы
        foreach ($carts as $cart){ // Добавили к товарам название, цену и картинку
            $item = Item::where('id', $cart->item_id)->first();
            $cart->name = $item->name;
            $cart->img = $item->img;
            if ($item->discount !=null){
                $cart->cost = round($item->cost - $item->cost/100 * $item->discount);
            }else{
                $cart->cost = $item->cost;
            }
            $cart->ship = $item->ship;
        }
        return view('dashboard', ['carts'=>$carts, 'statuses'=>$statuses]);
    }
    public function changeStatus(Request $request){
        $cartId = $request->cartId;
        $status = $request->status;
        Cart::where(['id'=>$cartId])->update(['status'=>$status]);
        return json_encode(['result'=>'success']);
    }
    public function deleteCartItem(Request $request){
        $cartId = $request->cartId;
        Cart::where(['id'=>$cartId])->delete();
        return json_encode(['result'=>'success']);
    }
}
