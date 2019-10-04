@extends('layouts.layout')
@section('title')
    {{$article->title}} | {{config('app.name')}}
@endsection
@section('content')
@php
    $profile = \App\Profile::find(1);
@endphp
    <main class="page blog-post mb-5 ">
        <div class="container">
            <ol class="breadcrumb">
                <li class="home"><a href="{{route('home')}}"><i class="fas fa-home"></i><span>{{__('Home')}}</span></a></li>
                <li><a href="#">{{$article->subcategories->category->category}}</a></li>
                <li><a href="#">{{$article->subcategories->sub_category}}</a></li>
                <li class="active"><a href="#">{{$article->title}}</a></li>
            </ol>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            {{$article->title}}
                        </div>
                        <div class="card-body">
                            <p class="text-muted d-inline-block"><small>{{ __('By ') }} {{ $profile->title }}</small></p>
                            <p class="text-muted float-right"><small>{{ $article->created_at->format('d M Y - H:i:s') }}</small></p>
                            <img class="mw-100" src="{{asset('img/article/'.$article->photo)}}" alt="{{$article->photo}}">
                            <p class="text-muted"><small>{{$article->caption}}</small></p>
                            <p class="text-justify mt-3">{{$article->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    
                </div>
            </div>
        </div>
    </main>
@endsection