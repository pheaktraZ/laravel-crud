<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request['table_size'])){
            $table_size = 5;
        }
        else {
            $table_size = $request['table_size'];
        }
        $products = Product::latest()->paginate($table_size);

        return view('products.index', compact('products'))
        ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the input
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            // 'thumbnail' => 'required'
        ]);

        // move file upload
        if($request->hasFile('image')){
            $destination_path  = 'public/image';
            $file  = $request->file('image');
            $file_name = time() . '-' . $file->getClientOriginalName();
            $path = $request->file('image')
            ->storeAs($destination_path,$file_name);

            $request['thumbnail'] = $file_name;
        }

        // create a new product in the database
        Product::create($request->all());

        // redirect the user and send friendly message
        return redirect()->route('products.index')
        ->with('success','Product created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //validate the input
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'thumbnail' => 'required'
        ]);

        // move file upload
        if ($request->hasFile('image')) {
            $destination_path  = 'public/image';
            $file  = $request->file('image');
            $file_name = time() . '-' . $file->getClientOriginalName();
            $path = $request->file('image')
            ->storeAs($destination_path, $file_name);

            $request['thumbnail'] = $file_name;
        }

        // update new value
        $product->update($request->all());

        return redirect()->route('products.index')
        ->with('success','Product updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //delete the product
        $product->delete();

        //redirect the user and display message
        return redirect()->route('products.index')
        ->with('success', 'Product Deleted Successfully');

    }


}

?>
