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

    <div class="wrapper">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Update</th>
                    <th>Products</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($categories as $category)

                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><img class="img-x-sm" src="{{ asset('storage/' . $category->pic_path) }}"></td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="green">Edit</a> | 
                            <form class="d-inline" method="POST" action="{{ route('admin.categories.destroy', $category->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link red" onClick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                        <td><a href="{{route('admin.categories.show', $category->id)}}">View Products</a></td>
                    </tr>  

                @empty
                    <div class="alert alert-primary" role="alert">
                        <p class="mb-0">No categories have been added yet.</p> 
                    </div>
                @endforelse
                    
            </tbody>
        </table>
    </div>
   
@endsection

@section('scripts')
    @parent
@endsection