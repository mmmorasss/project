@extends('template')
@section('title', 'FURN - 70% SALE OFFㅤ|ㅤOfficial Website')
@section('content')
        <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider hero-overly1 slider-height d-flex align-items-center slider-bg1">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-8 col-md-8">
                                <div class="hero__caption">
                                    <span>70% Sale off </span>
                                    <h1 data-animation="fadeInUp" data-delay=".4s">Furniture at Cost</h1>
                                    <p data-animation="fadeInUp" data-delay=".6s">FURN online store - sale of sofas, tables, chairs, beds, lighting, decorations.</p>
                                    <div class="hero__btn" data-animation="fadeInUp" data-delay=".7s">
                                        <a href="/products" class="btn hero-btn">Discover More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="properties new-arrival fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <h2>Popular products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="properties__button text-center">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav1-tab" data-toggle="tab" href="#nav1" role="tab" aria-controls="nav-Sofa" aria-selected="true">Sofa</a>
                                    <a class="nav-item nav-link" id="nav2-tab" data-toggle="tab" href="#nav2" role="tab" aria-controls="nav-Table" aria-selected="false">Table</a>
                                    <a class="nav-item nav-link" id="nav3-tab" data-toggle="tab" href="#nav3" role="tab" aria-controls="nav-Chair" aria-selected="false">Chair</a>
                                    <a class="nav-item nav-link" id="nav4-tab" data-toggle="tab" href="#nav4" role="tab" aria-controls="nav-Bed" aria-selected="false">Bed</a>
                                    <a class="nav-item nav-link" id="nav5-tab" data-toggle="tab" href="#nav5" role="tab" aria-controls="nav-Lightning" aria-selected="false">Lightning</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-content" id="nav-tabContent">
                        <?php
                        $a = 0;
                        for($i = 1; $i<6; $i++){ ?>
                        <div class="tab-pane fade" id="nav<?=$i;?>" role="tabpanel" aria-labelledby="nav<?=$i;?>-tab" >
                            <div class="row">
                                <?php foreach($items as $item){
                                if ($item->type == $i && $item->popular == 1){
                                    if($a >= 6) {break;}else{?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-new-arrival mb-50 text-center wow fadeInUp">
                                        <div class="popular-img">
                                            @if($item->ship == null)
                                                <img style="all: unset; position:absolute; width: 50px; padding: 10px 15px" src="https://static.tildacdn.com/tild6665-3536-4566-b363-343939323431/bb4a6b7b6e487bf8e63e.png" alt="">
                                            @endif
                                            <img width="100%" src="/{{$item->img}}" alt="MISSING JPG">
                                        </div>
                                        <div class="popular-caption">
                                            <a style="all: unset" href="/productDetails/{{$item->id}}"><span style="color: black; size: 30px; padding-bottom: 10px;">{{$item->name}}</span></a>
                                            @if($item->discount)
                                                <s style="color: gray">{{$item->cost}} ₽</s> <span>{{round($item->cost - $item->cost/100 * $item->discount)}} ₽</span>
                                            @else
                                                <span>{{$item->cost}} ₽</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <?php $a++; } } } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <div class="new-arrival new-arrival2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                            <h2>Products you may like</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-50">
                    <?php
                    $a = 0;
                    foreach($items as $item){
                    if ($item->mayLike == 1){
                    if($a >= 6) {break;}else{?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                <div class="popular-img">
                                    @if($item->ship == null)
                                        <img style="all: unset; position:absolute; width: 50px; padding: 10px 15px" src="https://static.tildacdn.com/tild6665-3536-4566-b363-343939323431/bb4a6b7b6e487bf8e63e.png" alt="">
                                    @endif
                                    <img width="100%" src="/{{$item->img}}" alt="MISSING JPG">
                                </div>
                                <div class="popular-caption">
                                    <a style="all: unset" href="/productDetails/{{$item->id}}"><span style="color: black; size: 30px; padding-bottom: 10px;">{{$item->name}}</span></a>
                                    @if($item->discount)
                                        <s style="color: gray">{{$item->cost}} ₽</s> <span>{{round($item->cost - $item->cost/100 * $item->discount)}} ₽</span>
                                    @else
                                        <span>{{$item->cost}} ₽</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    <?php $a++; } } } ?>
                </div>
            </div>
            <div class="row justify-content-center mt-50">
                <div class="room-btn d-flex justify-content-center">
                    <a href="/products" class="border-btn">Discover More</a>
                </div>
            </div>
        </div>

        <div class="new-arrival new-arrival2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                            <h2>Top Pick</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-50">
                    <?php
                    $i = 0;
                    foreach($items as $item):
                    if ($item->top == 1){
                    if($i >= 6) {break;}else{?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                <div class="popular-img">
                                    @if($item->ship == null)
                                        <img style="all: unset; position:absolute; width: 50px; padding: 10px 15px" src="https://static.tildacdn.com/tild6665-3536-4566-b363-343939323431/bb4a6b7b6e487bf8e63e.png" alt="">
                                    @endif
                                    <img width="100%" src="/{{$item->img}}" alt="MISSING JPG">
                                </div>
                                <div class="popular-caption">
                                    <a style="all: unset" href="/productDetails/{{$item->id}}"><span style="color: black; size: 30px; padding-bottom: 10px;">{{$item->name}}</span></a>
                                    @if($item->discount)
                                        <s style="color: gray">{{$item->cost}} ₽</s> <span>{{round($item->cost - $item->cost/100 * $item->discount)}} ₽</span>
                                    @else
                                        <span>{{$item->cost}} ₽</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    <?php $i++; }} endforeach; ?>
                </div>
                <div class="row">
                    <div class="room-btn d-flex justify-content-center">
                        <a href="/products" class="border-btn">Discover More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="categories-area section-padding40 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services1.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Fast & Free Delivery</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services2.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Secure Payment</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services3.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Money Back Guarantee</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="cat-icon">
                                <img src="assets/img/icon/services4.svg" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Online Support</h5>
                                <p>Free delivery on all orders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        let naV = document.getElementById('nav1');
        naV.classList.add("show");
        naV.classList.add("active");
    </script>
@endsection
