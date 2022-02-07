@extends('admin.layouts.app')
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Product</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Product</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product List</h3>
        <div class="card-tools">
            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button> --}}
            <a href="{{ url('admin/products/create')}}" class="btn btn-success"> Add New Product</a>
        </div>
    </div>
    <div class="card-body">
        <!-- <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Under_Main_Category</th>
                <th>Action</th>
            </tr>
            {{-- @foreach ($db_category_table as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $main_category_details[$item->main_category_id] }}</td>
                    <td>
                        <a href="{{ route("categories.edit",$item->id) }}" class="btn btn-info">Edit</a>
                        {{-- Here, route name [categories.edit] indicates to the url [/categories/{category}/edit] so the argument of {category} is passing --}}
                        {{-- <form action="{{ url("/admin/categories/$item->id") }}" method="POST" style="display: inline" --}}
                            onsubmit="return confirm('Are you sure to delete?')">
                            {{-- @csrf
                            @method("delete") --}}
                            <input type="submit" class="btn btn-info" value="Delete">
                        </form>
                    </td>
                </tr>
            {{-- @endforeach --}} --}}
        </table> -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection
