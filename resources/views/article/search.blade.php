@extends('layouts.master')
@section('title')
{{ $subtitle }} | {{ config('app.name') }}
@endsection
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800">{{ $subtitle }}</h1>
    </div>
    <div class="row mb-4">
        <div class="col-lg-3 mb-3">
            <div class="btn-group">
                <a href="{{route('article.trash')}}" class="btn  btn-warning">{{ __('Arsip') }}</a>
                <a href="{{route('article.create')}}" class="btn btn-primary ">{{__('Tambah Artikel Baru')}}</a>
            </div>
        </div>
        <div class="col-lg-3 mb-3">
            <select class="form-control" name="category" id="search-category">
                <option value="">{{__('Pilih Kategori')}}</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 mb-3">
            <select class="form-control" name="subcategory" id="search-subcategory">
                <option value="">{{__('Pilih Sub Kategori')}}</option>
            </select>
        </div>
        <div class="col-lg-3 mb-3">
            <form action="{{route('article.search')}}" method="get">
                <input class="form-control" type="search" name="search" id="search" placeholder="Cari....">
            </form>
        </div>
    </div>
    <h5>{{__('Cari : ').$search}} </h5>
    <p><small>{{__('Jumlah : ').$articles->count()}} </small></p>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('failed'))
    <div class="alert alert-danger">
        {{ session('failed') }}
    </div>
    @endif
        <section class="clean-block clean-services pb-5">
            <div class="container">
                @if ($articles->count() == 0)
                    <h5 class="text-center">{{__('Artikel Belum Tersedia')}} </h5>
                @endif
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{route('article.edit',$article->id)}}" class="card-link">
                                <div class="card"><img class="card-img-top w-100 d-block" src="{{asset('img/article/'.$article->photo)}}">
                                    <div class="card-body">
                                        <h4 class="card-title title-article block-with-text text-dark">{{$article->title}}</h4>
                                        <p class="card-text description-article block-with-text text-dark">{{$article->description}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{ $articles->links() }}
            </div>
        </section>
</div>
<!-- /.container-fluid -->

@endsection