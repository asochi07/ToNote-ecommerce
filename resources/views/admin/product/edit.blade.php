@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
@endsection


@section('content-body')
    <div class="container">
        <div class="row">
            <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Add Product</h2>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{ url('update-product/'.$product->id) }}" class="appointment bg-white" enctype="multipart/form-data">
                            @method('PUT')
                            <div id="feedback"></div>
                            <div class="row">
                                <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">

                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label>Product Category</label>
                                        <select  id="cate_id" name="cate_id" class="form-control">
                                            <option value="{{ $product->category->id}}">{{ $product->category->name}}</option>
                                            {{-- @foreach ($category as $value)
                                            <option value="{{ $value->id}}">
                                                {{$value->name}}
                                            </option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}"  required/>
                                        @if ($errors->has('name'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value=" {{$product->slug}}"  required/>
                                        @if ($errors->has('slug'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('slug') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="2" id="small_description" name="small_description" required> {{$product->small_description}} </textarea>
                                        @if ($errors->has('small_description'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('small_description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="5"  id="description" name="description" required>{{$product->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-row mb-3">
                                        <div class="col-sm-6">
                                            <label>Original Price</label>
                                            <input type="number" class="form-control"id="original_price" name="original_price" value="{{ $product->original_price }}"  required/>
                                            @if ($errors->has('original_price'))
                                                <div class="error" style="color:red;">
                                                    {{ $errors->first('original_price') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Selling Price</label>
                                            <input type="number" class="form-control"id="selling_price" name="selling_price" value="{{ $product->selling_price}}"  required/>
                                            @if ($errors->has('selling_price'))
                                                <div class="error" style="color:red;">
                                                    {{ $errors->first('selling_price') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-row mb-3">
                                        <div class="col-sm-6">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control"id="qty" name="qty" value="{{ $product->qty}}"  required/>
                                            @if ($errors->has('qty'))
                                                <div class="error" style="color:red;">
                                                    {{ $errors->first('qty') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Tax</label>
                                            <input type="number" class="form-control"id="tax" name="tax" value="{{ $product->tax }}"  required/>
                                            @if ($errors->has('tax'))
                                                <div class="error" style="color:red;">
                                                    {{ $errors->first('tax') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-row mb-3">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="status" name="status" {{ $product->status == 1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="status">Status</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="popular" name="trending" {{ $product->trending == 1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="trending">Trending</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" name="meta_title" value="{{ $product->meta_title}}"  required/>
                                        @if ($errors->has('meta_title'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('meta_title') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea rows="3" class="form-control" id="meta_description" name="meta_description"  required>{{ $product->meta_description}}</textarea>
                                        @if ($errors->has('meta_description'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('meta_description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Search Keywords</label>
                                        <textarea rows="3" class="form-control" id="meta_keywords" name="meta_keywords" required>{{ $product->meta_keywords}}</textarea>
                                        @if ($errors->has('meta_keywords'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('meta_keywords') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if ($product->image)
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <img class="w-100 mb-3" src="{{ asset('assets/uploads/product/'.$product->image)}}" alt="{{$product->name }}">
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6 my-3">
                                    <label class="form-check-label mb-2" for="image">Add Photo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-primary" type="button">Button</button>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary py-2 px-2" name="submit" id="submit">Submit</button>
                                        @if ($errors->has('submit'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('submit') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection



