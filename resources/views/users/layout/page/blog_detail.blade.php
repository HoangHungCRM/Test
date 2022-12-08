@extends('users.layout.master2')
@section('content')
    <section class="blog-details-hero set-bg" data-setbg="img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($blog_detail as $detail)
                    <div class="blog__details__hero__text">
                        <h2 style="color:red">{{ $detail->title }}</h2>
                        <ul>

                            <li  style="color:black">Ngày Xuất Bản: {{ $detail->date }}</li>

                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                @foreach($blog_detail as $detail)
                <div class="col-lg-12 col-md-12 order-md-1 order-1">
                   {!! $detail->content !!}
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
