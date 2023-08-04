@extends('template')
@section('title', 'User Ordersㅤ|ㅤFURN')
@section('content')

    <section class="cart_area section-padding40">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr id="{{$cart->id}}">
                                <td>
                                    <a style="color: black" href="/user/{{$cart->user_id}}">{{$cart->user_id}}</a>
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{$cart->img}}" alt=""/>
                                        </div>
                                        <div class="media-body">
                                            <p>{{$cart->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <h5>$ @if($cart->ship){{$cart->cost + $cart->ship}}@else{{$cart->cost}}@endif</h5>

                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="h4 mx-3">{{$cart->quantity}}</span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$@if($cart->ship){{$cart->cost * $cart->quantity + $cart->ship}}@else{{$cart->cost * $cart->quantity}}@endif</h5>
                                </td>
                                <td>
                                    <select onchange="changeStatus(this)" data-cart-id="{{$cart->id}}">
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}"
                                                    @if($status->id == $cart->status)
                                                    selected
                                                @endif>{{$status->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <form onsubmit="del(this); return false;" data-cart-id="{{$cart->id}}">
                                        @csrf
                                        <button type="submit" class="btn-close" aria-label="Close">✖</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @csrf
    </section>
    <script src="/assets/js/dashboard.js"></script>
@endsection
