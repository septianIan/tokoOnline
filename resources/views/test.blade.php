@extends('admin.templates.default')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('default') }}">Home</a></li>
        <li class="breadcrumb-item active">Test</li>
    </ol>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                Test content
            </div>
        </div>
    </section>
@endsection
