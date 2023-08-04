<?php

namespace App\Http\Middleware;

use App\Models\BindRole;
use App\Models\Item;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerOrAdm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = auth()->user()->getAuthIdentifier();
        $bindRole = BindRole::where('user_id', $userId)->first();
        /*$sellerId = Item::where('seller_id', $userId)->first();*/
        if ($bindRole->role_id == 1 or $bindRole->role_id == 2)
            return $next($request);
        else{
            return redirect()->intended('/');
        }
    }
}
