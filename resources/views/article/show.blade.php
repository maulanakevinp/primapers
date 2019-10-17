@extends('layouts.layout')
@section('title')
    {{$article->title}} | {{config('app.name')}}
@endsection
@section('content')
@php
    $profile = \App\Profile::find(1);
@endphp
    <main class="page blog-post mb-5 mt-3">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="card-link" href="{{route('home')}}"><i class="fas fa-home"></i><span>{{__('Home')}}</span></a></li>
                    <li class="breadcrumb-item"><a class="card-link" href="{{ route('kategori',['id' => $article->subcategory->category->id, 'category' => strtolower(str_replace(' ','-',$article->subcategory->category->category))]) }}">{{$article->subcategory->category->category}}</a></li>
                    <li class="breadcrumb-item"><a class="card-link" href="{{ route('sub-kategori', ['id' => $article->subcategory->id,'subcategory' => strtolower(str_replace(' ','-',$article->subcategory->sub_category))])}}">{{$article->subcategory->sub_category}}</a></li>
                    <li class="breadcrumb-item active">{{$article->title}}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-8 mb-3">
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
                            <div class="mt-3 mb-3">{!! $article->description !!}</div>
                            @if ($article->video != null)
                                <iframe width="100%" height="350" src="{{'https://www.youtube.com/embed/'.$article->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            {{_('Artikel Lainnya')}}
                        </div>
                        <div class="card-body overflow-auto" style="height:500px">
                            @foreach ($articles as $articl)
                                @if ($articl->id != $article->id)
                                <div class="clean-blog-post p-0">
                                    <img class="rounded img-fluid" src="{{asset('img/article/'.$articl->photo)}}" alt="{{$articl->photo}}">
                                    <p class="text-muted "><small>{{ $articl->created_at->format('d M Y') }}</small></p>
                                    <p class="font-weight-bold title-article block-with-text">{{$articl->title}}</p>
                                    <p class="description-article block-with-text text-justify">
                                        {!! $articl->description !!}
                                    </p>
                                    <form action="{{route('show',['id' => $articl->id , 'title' => strtolower(str_replace(' ','-',$articl->title))])}}" method="get">
                                        <button class="btn btn-outline-primary btn-sm" type="submit">{{__('Read More')}}</button>
                                    </form>
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