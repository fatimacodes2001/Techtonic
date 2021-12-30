@extends('layouts.admin')

@section('title', 'Categories')

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center pb-3">Categories</h1>
    <div class="text-center gap">
        <a href="{{route('admin.categories.create')}}">Create New Category</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pic</th>
                <th>Name</th>
                <th>Update</th>
                <th>Products</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)

                <tr>
                    <td>{{ $category->id }}</td>
                    <td><img width='65px' height='70px' src="{{ $category->pic_path }}"></td>
                    <td>{{ $category->name }}</td>
                    <td><a href="">Edit</a> | <a href="">Delete</a</td>
                    <td><a href="{{route('admin.categories.show', $category->id)}}">View Products</a></td>
                </tr>  

            @endforeach
                
        </tbody>
    
    </table>
   
@endsection

@section('scripts')
    @parent
@endsection