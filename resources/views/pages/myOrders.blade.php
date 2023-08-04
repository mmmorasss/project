@extends('template')
@section('title', 'My Ordersㅤ|ㅤFURN')
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
                                <th scope="col">Status</th>
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
                                        <span class="h4 mx-3">{{$cart->quantity}}</span>
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
                                        <h5>{{$cart->cost * $cart->quantity + $cart->ship}} ₽</h5>
                                    @else
                                        <h5>{{$cart->cost * $cart->quantity}} ₽</h5>
                                    @endif
                                </td>
                                <td>
                                    <h5>{{$cart->status}}</h5>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
