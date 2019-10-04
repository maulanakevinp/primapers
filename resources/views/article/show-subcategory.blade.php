@extends('layouts.layout')
@section('title')
    {{$subcategory->sub_category}} - {{config('app.name')}}
@endsection
@section('content')
<main class="page service-page">
    <section class="clean-block clean-services pt-4">
        <div class="container">
            <ol class="breadcrumb">
                <li class="home"><a href="{{route('home')}}"><i class="fas fa-home"></i><span>{{__('Home')}}</span></a></li>
                <li><a href="{{ route('kategori',['id' => $subcategory->category->id, 'category' => strtolower(str_replace(' ','-',$subcategory->category->category))]) }}">{{$subcategory->category->category}}</a></li>
                <li class="active"><a href="#">{{$subcategory->sub_category}}</a></li>
            </ol>
            <div class="row ">
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
    