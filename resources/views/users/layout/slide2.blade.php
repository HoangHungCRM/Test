 <!-- Hero Section Begin -->
 <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Hãng Xe</span>
                        </div>
                        <ul>
                            @isset($manufacture)
                            @foreach($manufacture as $hang_xe)
                            <li><a href="{{ route('loai-san-pham', $hang_xe->id) }}" style="text-transform: uppercase;"><img src="/front_end/img/hang_xe_remove/{{ $hang_xe->image }}" width="30px"> &nbsp &nbsp &nbsp {{ $hang_xe->name }}</a></li>
                            @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form role="search" action="{{ route('getsearch') }}" method="get">
                                @csrf

                                <input name="search" type="text" placeholder="Bạn muốn tìm gì?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i style="margin-top:15px" class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0388.549.606</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
