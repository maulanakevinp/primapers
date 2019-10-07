@extends('layouts.layout')
@section('title')
    {{$category->category}} | {{config('app.name')}}
@endsection
@section('content')
    <main class="page service-page mb-5 mt-3">
    <section class="clean-block clean-services">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="card-link" href="{{route('home')}}"><i class="fas fa-home"></i><span>{{__('Home')}}</span></a></li>
                <li class="breadcrumb-item active">{{$category->category}}</li>
            </ol>
            @if ($articles->count() == 0)
                <h4 class="text-center">{{__('Belum Ada Artikel')}} </h4>
            @endif
            <div class="row ">
                @foreach ($articles as $article)
                    <div class="col-md-6 col-lg-4">
                        <a class="card-link" href="{{route('show',['id' => $article->id , 'title' => strtolower(str_replace(' ','-',$article->title))])}}">
                            <div class="card">
                                <img class="card-img-top w-100 d-block" src="{{asset('img/article/'.$article->photo)}}">
                                <div class="card-body">
                                    <h4 class="card-title title-article block-with-text text-dark" style="height: 40px">
                                        {{$article->title}}
                                    </h4>
                                    <p class="card-text description-article block-with-text text-dark" style="height: 46px">{{$article->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $articles->links() }}
        </div>
    </section>
    </main>
@endsection
    