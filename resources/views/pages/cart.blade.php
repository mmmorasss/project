@extends('template')
@section('title', 'Cartㅤ|ㅤFURN')
@section('content')

    <section class="cart_area section-padding40">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Shipping</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{$cart->img}}" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>{{$cart->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{$cart->cost}} ₽</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <div class="row align-items-center" style="height: 60px; width: 100px;">
                                            <div class="col" data-item-id="{{$cart->id}}" data-ship="{{$cart->ship}}" data-cost="{{$cart->cost}}">{{$cart->quantity}}</div>
                                            <button class="b_product_top" onclick="changeQuantity('plus', this)">▲</button>
                                            <button class="b_product_bottom" onclick="changeQuantity('minus', this)">▼</button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($cart->ship)
                                        <h5>{{$cart->ship}} ₽</h5>
                                    @else
                                        <h5>Free shipping</h5>
                                    @endif
                                </td>
                                <td>
                                    @if($cart->ship)
                                        <h4 id="total_{{$cart->id}}">{{$cart->cost * $cart->quantity + $cart->ship}} ₽</h4>
                                        <h6>*including delivery</h6>
                                    @else
                                        <h5 id="total_{{$cart->id}}">{{$cart->cost * $cart->quantity}} ₽</h5>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tr>
                            <td></td><td></td><td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5 id="subtotal">0₽</h5>
                            </td>
                        </tr>
                    </table>
                    <div class="checkout_btn_inner float-right mb-50">
                        <div class="room-btn d-flex justify-content-end">
                            <a class="border-btn mx-3" href="/myOrders">My Orders</a>
                            <a class="border-btn" href="/continueShopping">Buy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @csrf
        <script src="/assets/js/cart.js"></script>
    </section>

@endsection
