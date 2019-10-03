@extends('layouts.master')
@section('title')
{{ $title }} - {{ config('app.name') }}
@endsection
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <div class="btn-group float-right">
            <a href="{{route('article.trash')}}" class="btn btn-sm btn-warning">{{ __('Arsip') }}</a>
            <a href="{{route('article.create')}}" class="btn btn-primary btn-sm">{{__('Tambah Artikel Baru')}}</a>
        </div>
    </div>
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
        <section class="clean-block clean-services">
            <div class="container">
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-md-6 col-lg-4">
                            <div class="card"><img class="card-img-top w-100 d-block" src="{{asset('img/article/'.$article->photo)}}">
                                <div class="card-body">
                                    <h4 class="card-title block-with-text white-space">{{$article->title}}</h4>
                                    <p class="card-text block-with-text">{{$article->description}}</p>
                                </div>
                                <div>
                                    <form action="{{route('article.edit',$article->id)}}" method="get">
                                        <button class="btn btn-outline-primary btn-sm" type="submit">{{__('Ubah')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $articles->links() }}
            </div>
        </section>
</div>
<!-- /.container-fluid -->

@endsection
