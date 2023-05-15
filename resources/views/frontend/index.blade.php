@extends('layouts.frontend')
@section('title')
    Welcome to 3C Shopper
@endsection
@push('style')
<link href="{{ asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet">
<style>
    .feat-img{
        width: 200px;
        height: 250px;
    }
    .cat-img{
        margin: auto;
    }
    .cat-item a{
        position: relative;
        overflow: hidden;
    }
    .card{
        flex: 1;
    }
</style>
@endpush
@section('content')
    <!-- Featured Products Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col">
                <h2>Featured Products</h2>
            </div>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($featured_product as $prod)
                    <div class="item flex">
                        <div class="card">
                            {{-- <a href="" class="cat-img"> --}}
                                <img class="feat-img" src="{{ asset('assets/uploads/product/'.$prod->image)}}" alt="">
                            {{-- </a> --}}
                            <div class="card-body align-content-lg-end">
                                <h5 class="font-weight-semi-bold m-0">{{ $prod->name }}</h5>
                                <small>{{ $prod->selling_price}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Categories End -->
@endsection

@push('script')
    
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        })
    </script>
@endpush