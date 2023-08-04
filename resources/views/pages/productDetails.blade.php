@extends('template')
@section('title', "Product {$item->id}ㅤ|ㅤFURN")
@section('content')

        <div class="product_image_area section-padding40">
            <div class="container">
                <div class="row s_product_inner">
                    <div class="col-lg-6">
                        @if($item->ship == null)
                            <img style="all: unset; position:absolute; width: 50px; padding: 10px 15px" src="https://static.tildacdn.com/tild6665-3536-4566-b363-343939323431/bb4a6b7b6e487bf8e63e.png" alt="">
                        @endif
                                    <img src="/{{$item->img}}" class="w-100" alt="product img">
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <div class="s_product_text">
                            <h3>{{$item->name}}</h3>
                            @if($item->discount)
                                <s style="color: gray">{{$item->cost}} ₽</s> <h2>{{round($item->cost - $item->cost/100 * $item->discount)}} ₽</h2>
                            @else
                                <h2>{{$item->cost}} ₽</h2>
                            @endif
                            <ul class="list">
                                <li>
                                    <span><a style="font-size: 20px" href="/sellerItems/{{$company->seller_id}}">Company : {{$company->company}}</a></span>
                                </li>
                                <li>
                                    <span>Type of product : {{$type->name}}</span>
                                </li>
                                @if($item->ship)
                                    <li>
                                        <span>Shipping : {{$item->ship}} ₽</span>
                                    </li>
                                @else
                                    <li>
                                        <span>Free shipping</span>
                                    </li>
                                @endif
                            </ul>
                            <p>
                                {{$item->description}}
                            </p>
                            @if($isAdmin)
                            <form>
                                @csrf
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onclick="giveProperties({{$item->id}})" type="checkbox" id="topProduct" @if($item->top) checked @endif>
                                    <label class="form-check-label" for="topProduct">Top Product</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onclick="giveProperties({{$item->id}})" type="checkbox" id="mayLike" @if($item->mayLike) checked @endif>
                                    <label class="form-check-label" for="mayLike">Product "May Like"</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onclick="giveProperties({{$item->id}})" type="checkbox" id="popular" @if($item->popular) checked @endif>
                                    <label class="form-check-label" for="popular">Popular Product</label>
                                </div>
                            </form>
                            @else
                                <ul class="list">
                                    @if($item->top)
                                    <li>
                                        <span>Top Product ✓</span>
                                    </li>
                                    @endif
                                    @if($item->mayLike)
                                    <li>
                                        <span>Product that you might like ✓</span>
                                    </li>
                                    @endif
                                    @if($item->popular)
                                    <li>
                                        <span>Popular Product ✓</span>
                                    </li>
                                    @endif
                                </ul>
                            @endif
                            <div class="btn-group my-4">
                                @if(!$isCreator)
                                <a href="/cart/addItem/{{$item->id}}" class="knopka mx-3">add to cart</a>
                                @endif
                                @if($isAdmin or $isCreator)
                                    <a class="knopka">
                                        <form action="/deleteItem/{{$item->id}}" method="post">
                                            @csrf
                                            <button type="submit" class="b_infBlock">Delete</button>
                                        </form>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/giveProp.js"></script>
@endsection
