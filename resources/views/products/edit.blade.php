@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 my">
        <div class="float-start">
            <h2>Edit Product</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problem with your input. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('products.update',$product->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <strong>Name: </strong>
                <input type="text" name="name" value="{{$product->name}}" class="form-control mt-2" placeholder="Product Name...">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <strong>Detail: </strong>
                <textarea name="detail" rows="4" class="form-control mt-2" placeholder="Product Detail...">{{ $product->detail }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <strong>Image: </strong>
                <input type="file" class="form-control mt-2">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>

@endsection
