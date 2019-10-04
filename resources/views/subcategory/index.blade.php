@extends('layouts.master')
@section('title')
{{ $subtitle }} | {{ config('app.name') }}
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
                    <div class="card-header ">
                        <h5 class="m-0 pt-1 font-weight-bold text-primary d-inline-block">{{ $title.' : '.$category->category }}</h5>
                        <a href="{{route('category.index')}}" class="btn btn-outline-secondary btn-sm float-right">{{__('kembali')}} </a>
                    </div>
                    <div class="card-body">
                        <form class="mb-5" action="{{ route('subcategory.store',$category->id) }}" method="post">
                            @csrf       
                            <div class="form-group row">
                                <label for="sub_category" class="col-sm-3 col-form-label">{{__('Sub Kategori')}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('sub_category') is-invalid @enderror" id="sub_category" name="sub_category" value="{{ old('sub_category') }}" autocomplete="off">
                                    @error('sub_category')
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
                                        <th scope="col">{{ __('Sub Kategori') }}</th>
                                        <th scope="col">{{ __('Aksi') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $subcategory)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $subcategory->sub_category }}</td>
                                            <td>
                                                <a class="editSubcategory" href="" data-toggle="modal" data-target="#newSubcategoryModal" data-id="{{ $subcategory->id }}" data-subcategory="{{ $subcategory->sub_category }}" data-category="{{ $category->id }}"><span class="badge badge-warning">{{ __('ubah') }}</span></a>
                                                <form class="d-inline-block" action="{{ route('subcategory.destroy',['id' => $subcategory->id, 'category' => $category->id]) }}" method="POST">
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
<div class="modal fade" id="newSubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="newSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubcategoryModalLabel">{{ __('Ubah Kategori') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="patchSubcategory" action="subcategory" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputSubcategory" name="sub_category" placeholder="Kategori" autocomplete="off" >
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
