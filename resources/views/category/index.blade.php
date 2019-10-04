@extends('layouts.master')
@section('title')
{{ $title }} | {{ config('app.name') }}
@endsection
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

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

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow h-100">
                    <div class="card-header">
                        <h5 class="m-0 pt-1 font-weight-bold text-primary">{{ $title }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="mb-5" action=" {{ route('category.store') }} " method="post" enctype="multipart/form-data">
                            @csrf       
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 col-form-label">{{__('Kategori')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}" autocomplete="off">
                                    @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="float-right mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{__('Simpan')}}
                                </button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <hr>
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('#') }}</th>
                                        <th scope="col">{{ __('Kategori') }}</th>
                                        <th scope="col">{{ __('Aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $category->category }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.index', $category->id)  }}"><span class="badge badge-success">{{ __('sub category') }}</span></a>
                                                <a class="editCategory" href="" data-toggle="modal" data-target="#newCategoryModal" data-id="{{ $category->id }}" data-category="{{ $category->category }}"><span class="badge badge-warning">{{ __('ubah') }}</span></a>
                                                <form class="d-inline-block" action="{{ route('category.destroy',$category->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger " onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini ?');">
                                                        {{ __('hapus') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCategoryModalLabel">{{ __('Ubah Kategori') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="patchCategory" action="category" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputCategory" name="category" placeholder="Kategori" autocomplete="off" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="Submit" class="btn btn-primary">{{ __('Ubah') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
