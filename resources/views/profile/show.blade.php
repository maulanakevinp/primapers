@extends('layouts.layout')
@section('title')
    {{ $title }} | {{config('app.name')}}
@endsection
@section('content')
<main class="page service-page mb-5 mt-3">
    <section class="clean-block clean-services">
        <div class="container">
            <ol class="breadcrumb">
                <li class="home"><a href="{{route('home')}}"><i class="fas fa-home"></i><span>{{__('Home')}}</span></a></li>
                <li class="active"><a href="#">{{__('Tentang Kami')}}</a></li>
            </ol>
            <div class="block-content">
                <div class="post-image text-center">
                    <h3 class="font-weight-bold">{{$profile->title}}</h3>
                    <img class="img-fluid" src="{{asset('img/profile/'.$profile->photo)}} " alt="">
                </div>
                <div class="post-body">
                    <h5 class="font-weight-bold">{{__('Visi')}}</h5>
                    <p class="text-justify" style="white-space: pre-line">{{$profile->vision}}</p>
                    <hr>
                    <h5 class="font-weight-bold">{{__('Misi')}}</h5>
                    <p class="text-justify" style="white-space: pre-line">{{$profile->mision}}</p>
                    <hr>
                    <h5 class="font-weight-bold">{{__('Tentang Kami')}}</h5>
                    <p class="text-justify" style="white-space: pre-line">{{$profile->about}}</p>
                    <hr>
                    <h5 class="font-weight-bold">{{__('Sejarah')}}</h5>
                    <p class="text-justify" style="white-space: pre-line">{{$profile->history}}</p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
