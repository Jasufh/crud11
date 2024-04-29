<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'color' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'img' => 'required|image|max:2048'
        ]);

        $imagenes = $request->file('img')->store('public/imagenes');

        $url = Storage::url($imagenes);

        Product::create([
            'product_name' => $request->product_name,
            'color' => $request->color,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'img' => $url
        ]);


        toast('Producto Agregado!!', 'success');

        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = Product::findOrFail($id);

        $request->validate([
            'product_name' => 'required',
            'color' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'img' => 'image|max:2048'
        ]);

        if ($request->hasFile('img')) {
            //Eliminar imagen anterior almacenada
            $url_old = str_replace("storage/", "public/", $product->img);
            Storage::delete($url_old);

            $imagenes = $request->file('img')->store('public/imagenes');

            $url = Storage::url($imagenes);

            $product->img = $url;
        }

        $product->product_name = $request->product_name;
        $product->color = $request->color;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->save();


        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        //Eliminar imagen de producto almacenada
        $url = str_replace("storage/", "public/", $product->img);
        Storage::delete($url);

        $product->delete();

        return redirect()->route('product.index');
    }


    public function show(string $id)
    {

        $product = Product::with('category')->findOrFail($id);
        return view('product.show', compact('product'));
    }
}
