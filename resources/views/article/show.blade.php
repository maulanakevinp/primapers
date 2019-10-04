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
                <li><a href="{{ route('kategori',['id' => $article->subcategory->category->id, 'category' => strtolower(str_replace(' ','-',$article->subcategory->category->category))]) }}">{{$article->subcategory->category->category}}</a></li>
                <li><a href="{{ route('sub-kategori', ['id' => $article->subcategory->id,'subcategory' => strtolower(str_replace(' ','-',$article->subcategory->sub_category))])}}">{{$article->subcategory->sub_category}}</a></li>
                <li class="active"><a href="#">{{$article->title}}</a></li>
            </ol>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            {{$article->title}}
                        </div>
                        <div class="card-body">
                            <div class="text-muted">
                                <p class="d-inline-block"><small>{{ __('By ') }} {{ $profile->title }}</small></p>
                                <p class="float-right"><small>{{ $article->created_at->format('d M Y - H:i:s') }}</small></p>
                            </div>
                            <div class="img-fluid text-center">
                                <img class="mw-100" src="{{asset('img/article/'.$article->photo)}}" alt="{{$article->photo}}">
                            </div>
                            <div class="text-muted">
                                <small>{{$article->caption}}</small>
                            </div>
                            <p class="text-justify mt-3">{{$article->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            {{_('Artikel Lainnya')}}
                        </div>
                        <div class="card-body overflow-hidden" style="height:500px">
                            @foreach ($articles as $articl)
                                @if ($articl->id != $article->id)
                                <div class="clean-blog-post p-0">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <img class="rounded img-fluid" src="{{asset('img/article/'.$articl->photo)}}" alt="{{$articl->photo}}">
                                            <p class="text-muted "><small>{{ $article->created_at->format('d M Y') }}</small></p>

                                        </div>
                                        <div class="col-lg-7">
                                            <p class="font-weight-bold">{{$articl->title}}</p>
                                            <p class="description-article block-with-text text-justify">
                                                {{$articl->description}}
                                            </p>
                                            <form action="{{route('show',['id' => $article->id , 'title' => strtolower(str_replace(' ','-',$article->title))])}}" method="get">
                                                <button class="btn btn-outline-primary btn-sm" type="submit">{{__('Read More')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection