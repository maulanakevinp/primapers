<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="{{asset('fonts/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="{{asset('css/smoothproducts.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('img/logo/bner.png') }}">
    
    <style>
        .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
        }
    </style>

</head>

<body>
    @php
        $categories = \App\Category::all();
        $profile = \App\Profile::find(1);
        $utility = \App\Utility::find(1);
    @endphp
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" @if($utility->header != null) style="background-image: url(&quot;{{ asset('img/navbar/gambar-background-kayu-hd.jpg') }}&quot;);" @endif>
        <div class="container">
            <div><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active text-uppercase" style="font-family:'Source Sans Pro', sans-serif; color: {{ $utility->color }};" href="{{route('home')}}">{{$profile->title}}</a>
                    </li>
                    @foreach ($categories as $category)
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link text-uppercase" data-toggle="dropdown" aria-expanded="false" style="font-family:'Source Sans Pro', sans-serif; color: {{ $utility->color }};" href="#">{{$category->category}}</a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item text-uppercase" role="presentation" style="font-family:'Source Sans Pro', sans-serif;" href="{{ route('kategori',['id' => $category->id, 'category' => strtolower(str_replace(' ','-',$category->category))]) }} ">{{$category->category}}</a>
                            <hr>
                            @foreach ($category->subcategories as $subcategory)
                                <a class="dropdown-item text-uppercase" role="presentation" style="font-family:'Source Sans Pro', sans-serif;" href="{{ route('sub-kategori', ['id' => $subcategory->id,'subcategory' => strtolower(str_replace(' ','-',$subcategory->sub_category))])}}">{{$subcategory->sub_category}}</a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                </ul>
                <form class="form-inline ml-auto" action="{{route('search')}}" method="GET">
                    <input class="form-control " type="search" name="search" placeholder="Cari..."/>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <img class="mw-100 pt-3" src="{{asset('img/logo/logo.png')}}" alt="logo.png">
                </div>
                <div class="col-sm-5">
                    <h5>{{__('Tentang Kami')}}</h5>
                    <p class="text-justify text-white description-article block-with-text">
                        <small>
                            {{$profile->about}}
                        </small>
                        <div>
                            <a href="{{route('about')}}" class="badge badge-outline-secondary badge-sm">{{__('Baca Lebih Lanjut')}}</a>
                        </div>
                    </p>
                </div>
                <div class="col-sm-4">
                    <h5>{{__('Jejak Sejarah')}}</h5>
                    <p class="text-justify text-white description-article block-with-text">
                        <small>
                            {{$profile->history}}
                        </small>
                        <div>
                            <a href="{{route('about')}}" class="badge badge-outline-secondary badge-sm">{{__('Baca Lebih Lanjut')}}</a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© {{now()->year}} Copyright {{$profile->title}}</p>
            <p><small>Powered by <a target="_blank" href="http://lavinza.me">Lavinza</a></small></p>

        </div>
    </footer>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="{{asset('js/smoothproducts.min.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>
</body>

</html>