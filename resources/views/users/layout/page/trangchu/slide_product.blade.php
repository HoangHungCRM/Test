 <!-- Latest Product Section Begin -->
 <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @isset($product_new)
                                @foreach($product_new as $new)
                                <a href="{{ route('chi_tiet', $new->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/front_end/img/products/{{ $new->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$new->name}}</h6>
                                        <span>{{ $new->promotion_price > 0?number_format($new->promotion_price):number_format($new->unit_price) }}</span>
                                    </div>
                                </a>
                                @endforeach
                                @endisset
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @isset($san_pham_moi_nhat)
                                @foreach($san_pham_moi_nhat as $new)
                                <a href="{{ route('chi_tiet', $new->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/front_end/img/products/{{ $new->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$new->name}}</h6>
                                        <span>{{ $new->promotion_price > 0?number_format($new->promotion_price):number_format($new->unit_price) }}</span>
                                    </div>
                                </a>
                                @endforeach
                                @endisset

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm Sale</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">

                                @isset($sale)
                                @foreach($sale as $new)
                                <a href="{{ route('chi_tiet', $new->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/front_end/img/products/{{ $new->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$new->name}}</h6>
                                        <span>{{ $new->promotion_price > 0?number_format($new->promotion_price):number_format($new->unit_price) }}</span>
                                    </div>
                                </a>
                                @endforeach
                                @endisset



                            </div>
                            <div class="latest-prdouct__slider__item">
                                @isset($sale_moi_nhat)
                                @foreach($sale_moi_nhat as $new)
                                <a href="{{ route('chi_tiet', $new->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/front_end/img/products/{{ $new->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$new->name}}</h6>
                                        <span>{{ $new->promotion_price > 0?number_format($new->promotion_price):number_format($new->unit_price) }}</span>
                                    </div>
                                </a>
                                @endforeach
                                @endisset

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm bán chạy</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @isset($bugati)
                                @foreach($bugati as $new)
                                <a href="{{ route('chi_tiet', $new->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/front_end/img/products/{{ $new->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$new->name}}</h6>
                                        <span>{{ $new->promotion_price > 0?number_format($new->promotion_price):number_format($new->unit_price) }}</span>
                                    </div>
                                </a>
                                @endforeach
                                @endisset
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @isset($porchers)
                                @foreach($porchers as $new)
                                <a href="{{ route('chi_tiet', $new->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/front_end/img/products/{{ $new->image }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$new->name}}</h6>
                                        <span>{{ $new->promotion_price > 0?number_format($new->promotion_price):number_format($new->unit_price) }}</span>
                                    </div>
                                </a>
                                @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
