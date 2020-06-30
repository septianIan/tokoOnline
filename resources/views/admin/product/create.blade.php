@extends('admin.templates.default')
@section('title', 'Create product')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('default') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Data products</a></li>
    <li class="breadcrumb-item active">Create product</li>
</ol>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">

                <div class="card-header">
                    <div class="h3 card-title">Create a product</div>
                </div>

               @if (session('error'))
                    @alert(['type' => 'danger'])
                        {!! session('error') !!}
                    @endalert
                @endif

                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Product name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Product name..." id="" autocomplete="off" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Category name</label>
                            <select name="categories[]" id="" class="form-control @error('categories') is-invalid @enderror multiSelect" multiple>
                                <option value="">Pilih</option>
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="0" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Description...">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Qty</label>
                            <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="Qty..." id="" autocomplete="off" value="{{ old('qty') }}">
                            @error('qty')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Buy price</label>
                            <input type="text" name="buyPrice" class="form-control @error('buyPrice') is-invalid @enderror" placeholder="Buy price..." id="" autocomplete="off" value="{{ old('buyPrice') }}">
                            @error('buyPrice')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Sell price name</label>
                            <input type="text" name="sellPrice" class="form-control @error('sellPrice') is-invalid @enderror" placeholder="Sell price..." id="" autocomplete="off" value="{{ old('sellPrice') }}">
                            @error('sellPrice')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="" autocomplete="off" value="{{ old('image') }}">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function(){
            $('.multiSelect').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
