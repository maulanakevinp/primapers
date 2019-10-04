@extends('layouts.layout')
@section('title')
    {{$title}} - {{config('app.name')}}
@endsection
@section('content')
<main class="page service-page">
    <section class="clean-block clean-services pt-4">
        <div class="container">
            <h5>{{__('Cari : '). $search}} </h5>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-6 col-lg-4">
                        <a class="card-link" href="{{route('show',['id' => $article->id , 'title' => strtolower(str_replace(' ','-',$article->title))])}}">
                            <div class="card">
                                <img class="card-img-top w-100 d-block" src="{{asset('img/article/'.$article->photo)}}">
                                <div class="card-body">
                                    <h4 class="card-title title-article block-with-text text-dark">
                                        {{$article->title}}
                                    </h4>
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
</main>
@endsection
