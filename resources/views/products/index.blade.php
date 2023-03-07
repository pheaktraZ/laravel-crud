@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="float-start">
            <h2>Product List Show</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-success" href="{{ route('products.create') }}">Add More</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p> {{ $message }} </p>
    </div>
@endif

<table class="table table-bordered align-middle">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Detail</th>
        <th>Action</th>
    </tr>

    @foreach ($products as $product)
        <tr>
            <td> {{ $product->id }} </td>
            <td> {{ $product->name }} </td>
            <td> {{ $product->detail }} </td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="post">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-warning" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach

</table>

<div class="d-flex justify-content-between">
    {!! $products->links() !!}
    <form action="{{ route('products.index') }}" method="post">
        @csrf
        <select name="table_size" id="page" onchange="getTableSize(e)" class="form-select float-end">
            <option value="10">10</option>
            <option value="20">20</option>
        </select>
        <button type="submit" id="getTable" class="d-none"></button>
    </form>
</div>
@endsection


