@extends('layouts.admin')

@section('title', 'Add Product')

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">Add Product</h1>

    <form class="form file-limit" method="POST" action="{{ route('admin.products.store', $categoryId)}}" enctype="multipart/form-data">
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

        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="Stock Quantity" required>
            <label for="name">Stock Quantity</label>
        </div>

        <div class="mb-3">
            <label for="pic_path" class="d-block mb-2">Pictures</label>
            <input type="file" id="pic_path" name="pic_path[]" multiple required>
        </div>

        <div class="d-flex">
            <label class="d-block mt-1 me-2">Specs</label>
            <div>
                <div id="inputFormRow">
                    <div class="input-group mb-3">
                        <input type="text" name="spec[]" class="form-control m-input" placeholder="Spec" required>
                        <div class="input-group-append">                
                            <button id="removeRow" type="button" class="btn btn-danger"><img src="/img/dash-lg.svg"></button>
                        </div>
                    </div>
                </div>
                <div id="newRow"></div>
                <button id="addRow" type="button" class="btn btn-info d-block mb-4"><img src="/img/plus-lg.svg"></button>
            </div>
        </div>
        

        <div class="mb-3 d-flex">
            <label for="color" class="mb-2 me-2">Color</label>
            <input type="color" id="color" value="#000000" name="color[hex]" required>
        </div>

        <!-- <div class="form-floating mb-3">
            <input type="text" class="form-control" id="spec" name="spec[]" placeholder="Spec" required>
            <label for="spec">Spec</label>
        </div> -->
        

        <button type="submit" class="btn btn-dark mt-2 px-3 submit">Create</button>
    </form>

   
@endsection

@section('scripts')
    @parent

    
@endsection