@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
@endsection


@section('content-body')
    <div class="container">
        <div class="row">
            <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Add Category</h2>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{ url('update-category/'.$category->id) }}" class="appointment bg-white" enctype="multipart/form-data">
                            @method('PUT')
                            <div id="feedback"></div>
                            <div class="row">
                                <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="category name" id="name" name="name" value="{{ $category->name }}"  required/>
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
                                        <input type="text" class="form-control" placeholder="Re-enter your title..." id="slug" name="slug" value="{{ $category->slug }}"  required/>
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
                                        <textarea class="form-control" rows="5" placeholder="description here..." id="description" id="description" name="description" > {{ $category->description }}</textarea>
                                        @if ($errors->has('description'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="status" {{ $category->status == 1 ? 'checked' : ''}} name="status">
                                            <label class="form-check-label" for="status">Status</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="popular" name="popular" {{ $category->popular == 1 ? 'checked' : ''}}>
                                            <label class="form-check-label" for="popular">Popular</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" name="meta_title" value="{{ $category->meta_title }}"  required/>
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
                                        <textarea type="checkbox" class="form-control" placeholder="" id="meta_descrip" name="meta_descrip" value="{{old('meta_descrip')}}"  required>{{ $category->meta_descrip }}</textarea>
                                        @if ($errors->has('meta_descrip'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('meta_descrip') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Search Keywords</label>
                                        <textarea type="text" class="form-control" placeholder="" id="meta_keywords" name="meta_keywords" value="{{old('meta_keywords')}}"  required>{{ $category->meta_keywords }}</textarea>
                                        @if ($errors->has('meta_keywords'))
                                            <div class="error" style="color:red;">
                                                {{ $errors->first('meta_keywords') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if ($category->image)
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <img class="w-100 mb-3" src="{{ asset('assets/uploads/category/'.$category->image)}}" alt="{{$category->name }}">
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
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

