@extends('layouts.master')
@section('title')
{{ __('VISI & MISI') }} | {{ config('app.name') }}
@endsection
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid mb-3">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('failed'))
    <div class="alert alert-danger">
        {{ session('failed') }}
    </div>
    @endif
    <form action=" {{ route('profile.update',$profile->id) }} " method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card shadow h-100">
                    <div class="card-header">
                        <h5 class="m-0 pt-1 font-weight-bold text-primary">{{ __('Struktur Organisasi') }}</h5>
                    </div>
                    <div class="card-body">
                        <img id="photo" src="{{ asset('img/profile/'.$profile->photo) }}" class="mw-100">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">{{__('Choose file')}}</label>
                        </div>
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card shadow h-100">
                    <div class="card-header">
                        <h5 class="m-0 pt-1 font-weight-bold text-primary">{{ __('Visi & Misi') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">{{__('Organisasi')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $profile->title }}" autocomplete="off">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vision" class="col-sm-3 col-form-label">{{__('Visi')}}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('vision') is-invalid @enderror" name="vision" id="vision" rows="5" >{{ $profile->vision }}</textarea>
                                @error('vision')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mision" class="col-sm-3 col-form-label">{{__('Misi')}}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('mision') is-invalid @enderror" name="mision" id="mision" rows="5" >{{ $profile->mision }}</textarea>
                                @error('mision')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card shadow h-100">
                    <div class="card-header">
                        <h5 class="m-0 pt-1 font-weight-bold text-primary">{{ __('Sejarah & Tentang Kami') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="history">{{__('Sejarah')}}</label>
                                <textarea class="form-control @error('history') is-invalid @enderror" name="history" id="history"s="5" >{{ $profile->history }}</textarea>
                                @error('history')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="about">{{__('Tentang Kami')}}</label>
                                <textarea class="form-control @error('about') is-invalid @enderror" name="about" id="about" rows="5" >{{ $profile->about }}</textarea>
                                @error('about')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            {{__('Simpan')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->


@endsection
