@extends('layouts.layout')
@section('title')
    {{$title}} | {{config('app.name')}}
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Slide Show</h1>
    </div>

    <!-- Notification -->
    <div class="row">
        <div class="col-lg">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <img class="mb-1" src="{{ asset('img/carousel/'. $utilities->photo1) }}" alt="{{ $utilities->photo1 }}" width="100%" height="250px">
                    <form action=" {{ route('update-home-picture' ,['id' => $utilities->photo1 , 'photo' => 'photo1']) }} " method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo1" name="photo1" aria-describedby="photo1" required>
                                <label class="custom-file-label" for="photo1">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        @for ($i = 2; $i <= 6; $i++)
        @php
            $p = 'photo'.$i;
        @endphp
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        @if (!empty($photo['photo' . $i]))
                            <img class="mb-1" src="{{ asset('img/carousel/'. $photo['photo' . $i]) }}" alt="{{ $photo['photo' . $i] }}" width="100%" height="250px">
                            <form action="{{ route('destroy-home-picture' , ['id' => $utilities->photo1, 'photo' => $p]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block mb-1" onclick="return confirm('Are you sure want to DELETE this picture ?');">Delete Photo</button>
                            </form>
                        @else
                            <img class="mb-1" src="{{ asset('img/noimage.jpg') }}" width="100%" height="250px">
                        @endif
                        <form action=" {{ route('update-home-picture', ['id' => $utilities->photo1 , 'photo' => $p]) }} " method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input " id="{{ $p }}" name="{{ $p }}" aria-describedby="{{ $p }}" required>
                                    <label class="custom-file-label" for="{{ $p }}">Choose photo</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
