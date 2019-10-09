@extends('layouts.master')
@section('title')
    {{'Header'}} | {{config('app.name')}}
@endsection
@section('container')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5>Header</h5>
                </div>
                <div class="card-body">
                    @if (!empty($utility->header))
                        <img class="mb-1" src="{{ asset('img/navbar/'. $utility->header) }}" alt="{{ $utility->header }}" width="100%" height="250px">
                        <form action="{{ route('destroy-header' ) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block mb-1" onclick="return confirm('Are you sure want to DELETE this picture ?');">Delete Photo</button>
                        </form>
                    @else
                        <img class="mb-1" src="{{ asset('img/noimage.jpg') }}" width="100%" height="250px">
                    @endif
                    <form action=" {{ route('update-header') }} " method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input " id="header" name="header" aria-describedby="header" required>
                                <label class="custom-file-label" for="header">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Font Color</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-color') }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="input-group">
                            <input type="color" name="color" id="color" class="form-control" value="{{ $utility->color }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
