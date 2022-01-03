@extends('layouts.admin')

@section('title', 'Edit ' . $product->name)

@section('styles')
    @parent

    <script type="text/javascript" src="https://chir.ag/projects/ntc/ntc.js"></script>
@endsection

@section('content')
    <h1 class="page-title text-center gap">Edit {{ $product->name }}</h1>

    <div class="wrapper">
        <form class="form file-limit" method="POST" action="{{ route('admin.products.update', [$categoryId, $product->id])}}" enctype="multipart/form-data">
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

            <div id="error-display" class="alert alert-danger d-none" role="alert">
                <h4 class="alert-heading">Whoops!</h4>
                <p>There were some problems with your input.</p>
                <hr>
                <p id="error" class="mb-0"></p> 
            </div>
        
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $product->name }}" required>
                <label for="name">Name</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 10rem;" required>{{ $product->description }}</textarea>
                <label for="description">Description</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" min="0" id="price" name="price" placeholder="Price" value="{{ $product->price }}" required>
                <label for="price">Price (PKR)</label>
            </div>

            <div class="form-floating mb-5">
                <input type="number" class="form-control" min="0" id="stock_quantity" name="stock_quantity" placeholder="Stock Quantity" value="{{ $product->stock_quantity }}" required>
                <label for="stock_quantity">Stock Quantity</label>
            </div>

            <div class="mb-5">
                <div class="mb-4">
                    <label for="pic_path" class="me-3">Pictures</label>
                    @foreach ($product->images as $image)
                        <img class="img-sm me-2" src="{{ asset('storage/' . $image->pic_path) }}">
                    @endforeach
                </div>
                <input type="file" class="mt-3" accept="image/*" id="pic_path" name="pic_path[]" multiple>
            </div>

            <div class="d-flex mb-4">
                <label class="d-block mt-1 me-3">Specs</label>
                <div>
                    @foreach ($product->specs as $specification)
                        <div id="inputFormRow">
                            <div class="input-group mb-2">
                                <input type="text" name="spec[]" class="form-control m-input" placeholder="Spec" value="{{ $specification->spec }}" required>
                                <div class="input-group-append">                
                                    <button id="removeRow" type="button" class="btn btn-danger"><img src="/img/dash-lg.svg"></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div id="newRow"></div>
                </div>
                <button id="addRow" type="button" class="btn btn-dark d-block ms-3 align-self-start">Add Spec</button>
            </div>
            
            <div class="mb-5 m-top d-flex">
                <label for="color" class="mb-2 me-3">Color</label>
                <input type="color" id="color" value="{{ $product->color->hex }}" name="color[hex]" required>
                <input type="text" id="color-name" value="{{ $product->color->name }}"  name="color[name]" hidden>
            </div>

            <button type="submit" class="btn btn-dark px-3 submit">Update</button>
        </form>
    </div>
   
@endsection

@section('scripts')
    @parent

    
@endsection