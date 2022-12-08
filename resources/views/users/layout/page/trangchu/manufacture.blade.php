 <!-- Categories Section Begin -->
 <section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @isset($manufacture)
                @foreach($manufacture as $hang_xe)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="/front_end/img/hang_xe_remove/{{ $hang_xe->image }}">
                        <h5><a href="{{ route('loai-san-pham', $hang_xe->id) }}">{{ $hang_xe->name }}</a></h5>
                    </div>
                </div>
                @endforeach
                @endisset
            </div>
        </div>
    </div>
</section>
    <!-- Categories Section End -->
