@extends('admin.layouts.app')
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Category</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Category Edit</h3>
        <div class="card-tools">
            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button> --}}

        </div>
    </div>
    <div class="card-body">
        <div class="card-header">
            <form method="POST" action="{{ route('categories.update',$db_category_table->id) }}">
                {{-- Here, route name [categories.update] indicates to the url [/categories/{category}] so the argument of {category} is passing --}}
                @csrf
                @method("put")
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Main Category</label>
                        <select name="main_category_id" class="form-control">
                            @foreach ($main_category as $value => $key)
                                <option value="{{ $value }}" {{ $db_category_table->main_category_id == strval($value) ? "selected" : ""}}>{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $db_category_table->name }}" placeholder="Enter Category Name">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection
