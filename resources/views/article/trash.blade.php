@extends('layouts.master')
@section('title')
{{ $title }} | {{ config('app.name') }}
@endsection
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $subtitle }}</h1>
        <div class="btn-group float-right">
                <a href="{{route('article.index')}}" class="btn btn-sm btn-outline-secondary">{{ __('Kembali ke Artikel') }}</a>
                <a href="{{route('article.restoreAll')}}" class="btn btn-warning btn-sm">{{__('Kembalikan Semua Artikel')}}</a>
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
    <section class="clean-block clean-services pb-5">
        <div class="container">
            <div class="row">
                @foreach ($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <div class="card"><img class="card-img-top w-100 d-block" src="{{asset('img/article/'.$article->photo)}}">
                        <div class="card-body">
                            <h4 class="card-title title-article block-with-text white-space" style="height: 40px">{{$article->title}}</h4>
                            <p class="card-text description-article block-with-text" style="height: 60px">{{$article->description}}</p>
                        </div>
                        <div>
                            <div class="row">
                                <form class="col-md-6" action="{{route('article.restore',$article->id)}}" method="get">
                                    <button class="btn btn-outline-warning btn-sm" type="submit">{{__('kembalikan')}}</button>
                                </form>
                                <form class="col-md-6"  action="{{ route('article.destroy',$article->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Apakah anda yakin ingin menghapus artikel ini?');">
                                        {{ __('hapus') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

@endsection
