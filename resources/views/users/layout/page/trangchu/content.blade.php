 <!-- Featured Section Begin -->
 <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tất cả</li>
                            <li data-filter=".motchammuoitam">Tỉ lệ 1:18</li>
                            <li data-filter=".motchamhaibon">Tỉ lệ 1:24</li>
                            <li data-filter=".motchambahai">Tỉ lệ 1:32</li>


                            <li data-filter=".motchambasau">Tỉ lệ 1:36</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row featured__filter">



                @isset($tilebahai)
                @foreach($tilebahai as $xe)
                <div class="col-lg-3 col-md-4 col-sm-6 mix motchambahai">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/front_end/img/products/{{ $xe->image }}">
                            <ul class="featured__item__pic__hover">
                                <li><a   href="{{ route('add-productlike', $xe->id) }}"><i style="margin-top:10px" class="fa fa-heart"></i></a></li>
                                <li><a  href="#"><i style="margin-top:10px" class="fa fa-retweet"></i></a></li>
                                <li><a  href="{{ route('add-cart', $xe->id) }}"><i style="margin-top:10px" class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href ="{{ route('chi_tiet', $xe->id) }}" >{{ $xe->name }}</a></h6>
                            @if($xe->promotion_price > 0)
                            <h5><a style='text-decoration: line-through; color:black'>{{ number_format($xe->unit_price) }}</a>   <a style="color:black">{{ number_format($xe->promotion_price) }}</a></h5>
                            @else
                            <a style="color:black; font-weight:bold">{{ number_format($xe->unit_price) }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset

                @isset($haibon)
                @foreach($haibon as $xe)
                <div class="col-lg-3 col-md-4 col-sm-6 mix motchamhaibon">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/front_end/img/products/{{ $xe->image }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ route('add-productlike', $xe->id) }}"><i style="margin-top:10px" class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i style="margin-top:10px" class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ route('add-cart', $xe->id) }}"><i style="margin-top:10px" class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href ="{{ route('chi_tiet', $xe->id) }}">{{ $xe->name }}</a></h6>
                            @if($xe->promotion_price > 0)
                            <h5><a style='text-decoration: line-through; color:black'>{{ number_format($xe->unit_price) }}</a>   <a style="color:black">{{ number_format($xe->promotion_price) }}</a></h5>
                            @else
                            <a style="color:black; font-weight:bold">{{ number_format($xe->unit_price) }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset

                @isset($muoitam)
                @foreach($muoitam as $xe)
                <div class="col-lg-3 col-md-4 col-sm-6 mix motchammuoitam">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/front_end/img/products/{{ $xe->image }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ route('add-productlike', $xe->id) }}"><i style="margin-top:10px" class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i style="margin-top:10px" class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ route('add-cart', $xe->id) }}"><i style="margin-top:10px" class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href ="{{ route('chi_tiet', $xe->id) }}">{{ $xe->name }}</a></h6>
                            @if($xe->promotion_price > 0)
                            <h5><a style='text-decoration: line-through; color:black'>{{ number_format($xe->unit_price) }}</a>   <a style="color:black">{{ number_format($xe->promotion_price) }}</a></h5>
                            @else
                            <a style="color:black; font-weight:bold">{{ number_format($xe->unit_price) }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset

                @isset($basau )
                @foreach($basau  as $xe)
                <div class="col-lg-3 col-md-4 col-sm-6 mix motchambasau">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/front_end/img/products/{{ $xe->image }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ route('add-productlike', $xe->id) }}"><i style="margin-top:10px" class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i style="margin-top:10px" class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ route('add-cart', $xe->id) }}"><i style="margin-top:10px" class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href ="{{ route('chi_tiet', $xe->id) }}">{{ $xe->name }}</a></h6>
                            @if($xe->promotion_price > 0)
                            <h5><a style='text-decoration: line-through; color:black'>{{ number_format($xe->unit_price) }}</a>   <a style="color:black">{{ number_format($xe->promotion_price) }}</a></h5>
                            @else
                            <a style="color:black; font-weight:bold">{{ number_format($xe->unit_price) }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset



            </div>

        </div>
    </section>
    <!-- Featured Section End -->
