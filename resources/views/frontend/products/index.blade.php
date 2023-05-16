@extends('layouts.frontend')
@section('title')
{{ $category->name}}
@endsection
@push('style')
<link href="{{ asset('frontend/css/bootstrap5.css')}}" rel="stylesheet">
<style>
    .img-fluid{
        width: 200px;
        height: 270px;
    }
    .card-body{
        width: 260px;
    }
    .cat-img{
        margin: auto;
    }
    .cat-item a{
        position: relative;
        overflow: hidden;
    }
    a{
        text-decoration: none;
    }
</style>
@endpush
@section('content')
<div class="py-3 mb-4 shadow-sm bg-primary border-top">
    <div class="container">
        <h6 class="mb-0"> Collection / {{$category->name }}</h6>
    </div>
</div>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="text-center mb-3">
                <h2 class="section-title px-5"><span class="px-2">{{ $category->name}}</span></h2>
            </div>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="owl-carousel featured-carousel owl-theme card-deck">
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card ">
                            <a class="m-auto" href="{{ url('category/'.strtolower( $category->slug).'/'.strtolower($prod->slug))}}">
                                <img class="cat-img" src="{{ asset('assets/uploads/product/'.$prod->image)}}" alt="{{ $prod->slug}}">
                                <div class="card-body w-100">
                                    <h5 class="font-weight-semi-bold">{{ $prod->name }}</h5>
                                    <span class="float-start">{{ '₦ ' . number_format($prod->selling_price)}}</span>
                                    <span class="float-end"><s>{{ '₦ ' . number_format($prod->original_price)}}</s></span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection