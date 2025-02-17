@extends('layouts.master')
@section('title')
{{ $subtitle }} | {{ config('app.name') }}
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

    <form action=" {{ route('article.store') }} " method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow h-100 mb-3">
            <div class="card-header">
                <h5 class="m-0 pt-1 font-weight-bold text-primary">{{ $subtitle }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div class="text-center mb-2">
                            <img id="photo" src="{{ asset('img/noimage.jpg') }}" class="mw-100">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo"
                                name="photo">
                            <label class="custom-file-label" for="photo">{{__('Choose file')}}</label>
                        </div>
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">{{__('Kategori')}}</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('category') is-invalid @enderror" name="category"
                                    id="category">
                                    <option value="">{{__('Pilih Kategori')}}</option>
                                    @foreach ($categories as $category)
                                    @if(old('category') == $category->id)
                                    <option selected="selected" value="{{$category->id}}">{{$category->category}}
                                    </option>
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
                                <select class="form-control @error('sub_category') is-invalid @enderror"
                                    name="sub_category" id="sub_category">
                                    <option value="">{{__('Pilih Sub Kategori')}}</option>
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
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" value="{{ old('title') }}" autocomplete="off">
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
                                <input type="text" class="form-control @error('caption') is-invalid @enderror"
                                    id="caption" name="caption" value="{{ old('caption') }}" autocomplete="off">
                                @error('caption')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="video" class="col-sm-3 col-form-label">{{__('Video youtube')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('video') is-invalid @enderror" id="video"
                                    name="video" value="{{ old('video') }}" autocomplete="off">
                                @error('video')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow h-100">
            <div class="card-header">
                <h5 class="m-0 pt-1 font-weight-bold text-primary">{{__('Deskripsi')}}</h5>
            </div>
            <div class="card-body">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    id="description" rows="10" cols="80">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="float-right mt-3">
                    <a href="{{route('article.index')}}" class="btn btn-outline-secondary">{{__('Batal')}}</a>
                    <button type="submit" class="btn btn-primary">
                        {{__('Simpan')}}
                    </button>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->


@endsection

@section('script')
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection