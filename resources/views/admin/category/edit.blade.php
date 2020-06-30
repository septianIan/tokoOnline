@extends('admin.templates.default')
@section('title', 'Edit a category')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
         <li class="breadcrumb-item"><a href="{{ route('default') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Data Caregory</a></li>
        <li class="breadcrumb-item active">Edit category</li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <div class="h3 card-title">Edit a Category</div>
                    </div>

                    <form action="{{ route('admin.categories.update', $category) }}" method="post">
                    @csrf
                    @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Category name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Categori name..." id="" autocomplete="off" value="{{ $category->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection