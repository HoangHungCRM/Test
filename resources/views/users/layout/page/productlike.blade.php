@extends('users.layout.master2')
@section('title', 'Sản phẩm yêu thích')

@section('content')

<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm yêu thích</h2>
                    </div>

                </div>
            </div>
            <div class="row featured__filter">
                @isset($ListProductLike)
                @foreach($ListProductLike as $xe)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/front_end/img/products/{{ $xe->products->image }}">
                            <ul class="featured__item__pic__hover">

                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ route('add-cart', $xe->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('chi_tiet', $xe->id) }}">{{ $xe->products->name }}</a></h6>
                            @if($xe->products->promotion_price > 0)
                            <h5><a style='text-decoration: line-through; color:black'>{{ number_format($xe->products->unit_price) }}</a>   <a style="color:black">{{ number_format($xe->products->promotion_price) }}</a></h5>
                            @else
                            <a style="color:black; font-weight:bold">{{ number_format($xe->products->unit_price) }}</a>
                            @endif
                            <!-- <h5><a style='text-decoration: line-through; color:black'>500</a>
                            <h5><a style='text-decoration: line-through; color:black'>600</a> -->
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset

            </div>
        </div>
    </section>

@endsection
