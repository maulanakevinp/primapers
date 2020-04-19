@extends('layouts.layout')
@section('title')
    {{$subcategory->sub_category}} | {{config('app.name')}}
@endsection
@section('content')
    <main class="page service-page mb-5 mt-3">
    <section class="clean-block clean-services">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="card-link" href="{{route('home')}}"><i class="fas fa-home"></i><span>{{__('Home')}}</span></a></li>
                <li class="breadcrumb-item"><a class="card-link" href="{{ route('kategori',['id' => $subcategory->category->id, 'category' => strtolower(str_replace(' ','-',$subcategory->category->category))]) }}">{{$subcategory->category->category}}</a></li>
                <li class="breadcrumb-item active">{{$subcategory->sub_category}}</li>
            </ol>
            @if ($articles->count() == 0)
                <h4 class="text-center">{{__('Belum Ada Artikel')}} </h4>
            @endif
            <div class="card-columns">
                @foreach ($articles as $article)
                    <div class="card shadow mt-3">
                        <a class="card-link" href="{{route('show',['id' => $article->id , 'title' => strtolower(str_replace(' ','-',$article->title))])}}">
                            <img class="card-img-top w-100 d-block" src="{{asset('img/article/'.$article->photo)}}">
                            <div class="card-body">
                                <h4 class="card-title title-article block-with-text text-dark" style="height: 40px">
                                    {{$article->title}}
                                </h4>
                                <div class="card-text description-article block-with-text text-dark" style="height: 60px">{!! $article->description !!}
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

@push('scripts')
    <script>
        $(document).ready(function(){
            $(".pagination").addClass('justify-content-center');
        });
    </script>
@endpush

