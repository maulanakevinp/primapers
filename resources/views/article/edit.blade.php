@extends('layouts.master')
@section('title')
{{ $subtitle }} - {{ config('app.name') }}
@endsection
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid mb-3">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action=" {{ route('article.update',$article->id) }} " method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card shadow h-100">
                    <div class="card-header">
                        <h5 class="m-0 pt-1 font-weight-bold text-primary">{{ __('Foto') }}</h5>
                    </div>
                    <div class="card-body text-center">
                        <img id="photo" src="{{ asset('img/article/'.$article->photo) }}" class="mw-100">
                        <div class="custom-file mt-2">
                            <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">{{__('Ganti Gambar')}}</label>
                        </div>
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card shadow h-100">
                    <div class="card-header">
                        <h5 class="m-0 pt-1 font-weight-bold text-primary">{{ $subtitle }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">{{__('Kategori')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                                    <option value="">{{__('Pilih Kategori')}}</option>
                                    @foreach ($categories as $category)
                                    @if($article->subcategory->category_id == $category->id)
                                    <option selected="selected" value="{{$category->id}}">{{$category->category}}</option>
                                    @else
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sub_category" class="col-sm-3 col-form-label">{{__('Sub Kategori')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('sub_category') is-invalid @enderror" name="sub_category" id="sub_category">
                                    <option value="">{{__('Pilih Sub Kategori')}}</option>
                                    @foreach ($sub_categories as $sub_category)
                                    @if ($article->subcategory_id == $sub_category->id)
                                    <option selected value="{{$sub_category->id}}">{{$sub_category->sub_category}}</option>
                                    @else
                                    <option value="{{$sub_category->id}}">{{$sub_category->sub_category}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('sub_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">{{__('Judul')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $article->title }}" autocomplete="off">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="caption" class="col-sm-3 col-form-label">{{__('Caption')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption" value="{{ $article->caption }}" autocomplete="off">
                                @error('caption')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">{{__('Deskripsi')}}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" >{{ $article->description }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="float-right">
                            <a href="{{route('article.index')}}" class="btn btn-outline-secondary">{{__('Batal')}}</a>
                            <a href="{{route('softdelete',$article->id)}}" class="btn btn-danger">{{__('Hapus')}}</a>
                            <button type="submit" class="btn btn-success">
                                {{__('Simpan')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->


@endsection
