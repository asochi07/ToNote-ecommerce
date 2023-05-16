@extends('layouts.frontend')
@section('title')
    Category
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
    <!-- Featured Products Start -->
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col text-center mb-3">
                <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
            </div>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($category as $cate)
                <div class="col-lg-2 col-md-6 pb-1">
                    <a href="{{ url('view-category/'.$cate->slug)}}">
                        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                            {{-- <a href="" class="cat-img position-relative overflow-hidden mb-3"> --}}
                                <img class="img-fluid border mb-3" src="{{ asset('assets/uploads/category/'.$cate->image)}}" alt="{{ $cate->slug}}">
                            {{-- </a> --}}
                            <h5 class="font-weight-semi-bold">{{ $cate->name }}</h5>
                            <p>
                                {{ $cate->description}}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->
@endsection