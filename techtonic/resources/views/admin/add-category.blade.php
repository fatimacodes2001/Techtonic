@extends('layouts.admin')

@section('title', 'Create Category')

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">Create Category</h1>

    <form class="form" method="POST" action="{{ route('admin.categories.store')}}" enctype="multipart/form-data">
        @csrf

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
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            <label for="name">Name</label>
        </div>

        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 10rem;" required></textarea>
            <label for="description">Description</label>
        </div>
        
        <div class="mb-3">
            <label for="pic_path" class="d-block mb-2">Picture</label>
            <input type="file" accept="image/*" id="pic_path" name="pic_path" required>
        </div>

        <button type="submit" class="btn btn-dark mt-2 px-3">Create</button>
    </form>

   
@endsection

@section('scripts')
    @parent
@endsection