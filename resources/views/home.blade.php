@extends('layouts.layout')
@section('title')
    {{$title}} | {{config('app.name')}}
@endsection
@section('content')
<main class="page service-page mb-5 mt-3">
    <section class="clean-block clean-services ">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-8 mb-3">
                    <section id="carousel">
                        <div class="carousel slide" data-ride="carousel" id="carousel-1">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active ">
                                    <img class="w-100" style="height:400px"  src="{{ asset('img/carousel/'.$utility['photo1']) }}" alt="{{ $utility['photo1'] }}">
                                </div>
                                @for ($i = 2; $i <= 6; $i++)
                                @if (!empty($utility['photo'.$i]))
                                <div class="carousel-item">
                                    <img class="w-100" style="height:350px" src="{{ asset('img/carousel/'.$utility['photo'.$i]) }}" alt="{{ $utility['photo'.$i] }}">
                                </div>
                                @endif
                                @endfor
                            </div>
                            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="font-weight-bold"><i class="fas fa-bullhorn"></i> Pengumuman</h6>
                        </div>
                        <div class="card-body text-left overflow-auto" style="height:350px">
                            @foreach ($announcements as $announcement)
                                {{ $announcement->description }}
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <hr>
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
                                    <div class="card-text description-article block-with-text text-dark" style="height: 60px">{!! $article->description !!}
                                        </div>
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
    