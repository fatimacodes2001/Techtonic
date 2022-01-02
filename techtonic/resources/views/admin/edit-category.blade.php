@extends('layouts.admin')

@section('title', 'Edit ' . $category->name)

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">Edit {{ $category->name }}</h1>

    <div class="wrapper">
        <form class="form" method="POST" action="{{ route('admin.categories.update', $category->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Whoops!</h4>
                    <p>There were some problems with your input.</p>
                    <hr>

                    @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p> 
                    @endforeach

                </div>
            @endif
        
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $category->name }}" required>
                <label for="name">Name</label>
            </div>

            <div class="form-floating mb-5">
                <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 10rem;" required>{{ $category->description }}</textarea>
                <label for="description">Description</label>
            </div>
            
            <div class="mb-5">
                <div class="mb-4">
                    <label for="pic_path" class="me-3">Picture</label>
                    <img class="img-sm" src="{{ asset('storage/' . $category->pic_path) }}">
                </div>
                <input type="file" accept="image/*" id="pic_path" name="pic_path">
            </div>

            <button type="submit" class="btn btn-dark mt-2 px-3">Update</button>
        </form>
    </div>
   
@endsection

@section('scripts')
    @parent
@endsection