@extends('users.layout.master2')
@section('title', 'Tỉ lệ')

@section('content')
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Mô hình xe tỉ lệ {{ $ratio }}</h2>
                    </div>
                    <div class="featured__controls">
                        <!-- <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul> -->
                    </div>
                </div>
            </div>
            @isset($products)
            @foreach($products as $xe)
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/front_end/img/products/{{ $xe->image }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ route('add-productlike', $xe->id) }}"><i style="margin-top:10px" class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i style="margin-top:10px" class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ route('add-cart', $xe->id) }}"><i style="margin-top:10px" class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('chi_tiet', $xe->id) }}">{{ $xe->name }}</a></h6>
                            @if($xe->promotion_price > 0)
                            <h5><a href="" style='text-decoration: line-through'>{{ number_format($xe->unit_price) }}</a>   <a href="">{{ number_format($xe->promotion_price) }}</a></h5>
                            @else
                            <a href="">{{ number_format($xe->unit_price) }}</a>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
            @endforeach
            @endisset
        </div>
    </section>

    <!-- Featured Section End -->

@endsection
<script>
  var msg = '{{Session::get('dangerous')}}';
  var exist = '{{Session::has('dangerous')}}';
  if(exist){
    alert(msg);
  }
</script>
<script>
  var msg = '{{Session::get('addcart')}}';
  var exist = '{{Session::has('addcart')}}';
  if(exist){
    alert(msg);
  }
</script>
