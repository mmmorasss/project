@extends('template')
@section('title', "{$company->company}'s productsㅤ|ㅤFURN")
@section('content')

        <section class="properties new-arrival fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-60 text-center">
                            <h2>{{$company->company}}'s Products</h2>
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
                <div class="row mb-60">
                    <div class="tab-content" id="nav-tabContent">
                        <? for($i = 1; $i<6; $i++){ ?>
                        <div class="tab-pane fade" id="nav<?=$i;?>" role="tabpanel" aria-labelledby="nav<?=$i;?>-tab" >
                            <div class="row">
                                <?foreach($items as $item){ ?>
                                <? if ($item->type == $i){ ?>
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
                                <? } ?>
                                <? } ?>
                            </div>
                        </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </section>
        <script>
            let naV = document.getElementById('nav1');
            naV.classList.add("show");
            naV.classList.add("active");
        </script>
@endsection
