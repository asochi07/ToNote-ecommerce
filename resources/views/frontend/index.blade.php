@extends('layouts.frontend')
@section('title')
    Welcome to 3C Shopper
@endsection
@push('style')
<link href="{{ asset('frontend/css/bootstrap5.css')}}" rel="stylesheet">
<style>
    .feat-img, .cat-img{
        width: 260px;
        height: 270px;
    }
    .cat-img{
        margin: auto;
    }
    .cat-item a{
        position: relative;
        overflow: hidden;
    }
</style>
@endpush
@section('content')
    <!-- Featured Products Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="text-center mb-3">
                <h2 class="section-title px-5"><span class="px-2">Feactured Products</span></h2>
            </div>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="owl-carousel product-carousel card-deck">
                @foreach ($featured_product as $prod)
                    <div class="item">
                        <div class="card flex">
                            <img class="cat-img" src="{{ asset('assets/uploads/product/'.$prod->image)}}" alt="{{ $prod->slug}}">
                            <div class="card-body align-content-end">
                                <h5 class="font-weight-semi-bold">{{ $prod->name }}</h5>
                                <span class="float-start">{{ $prod->selling_price}}</span>
                                <span class="float-end"><s>{{ $prod->original_price}}</s></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured Products End -->

    <!-- Trending Products Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="text-center mb-3">
                <h2 class="section-title px-5"><span class="px-2">Trending Category</span></h2>
            </div>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="owl-carousel featured-carousel owl-theme card-deck">
                @foreach ($trending_category as $tcategory)
                    <div class="item">
                        <a href="{{ url('view-category/'.$tcategory->slug)}}">
                            <div class="card flex">
                                <img class="cat-img" src="{{ asset('assets/uploads/category/'.$tcategory->image)}}" alt="{{ $tcategory->slug}}">
                                <div class="card-body align-content-end">
                                    <h5 class="font-weight-semi-bold">{{ $tcategory->name }}</h5>
                                    <p>{{ $tcategory->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Trending Products End -->
@endsection

@push('script')
    
    <script>
        $('.featured-carousel').owlCarousel({
            loop:false,
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
                    items:5
                }
            }
        })
    </script>
@endpush