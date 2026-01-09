<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create()
    {
    return view('products.create');
    }
    
    
    public function index()
    {
    $products = Product::all();

    return view('products.index', compact('products'));
    }


   public function store(Request $request)
    {
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:100',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')
            ->store('products', 'public');
    }

    $product = Product::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'price' => $request->price,
        'stock' => $request->stock,
        'image' => $imagePath
    ]);

    return response()->json([
        'message' => 'Product berhasil ditambahkan',
        'data' => $product
    ], 201);
}

    public function show($slug)
    {
        return response()->json(
            Product::with('category')
                ->where('slug', $slug)
                ->firstOrFail()
        );
    }

    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return response()->json($product);
    }

    public function destroy($slug)
    {
        Product::where('slug', $slug)->delete();

        return response()->json([
            'message' => 'Product berhasil dihapus'
        ]);
    }

public function storeWeb(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:100',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    Product::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'slug' => \Illuminate\Support\Str::slug($request->name) . '-' . time(),
        'price' => $request->price,
        'stock' => $request->stock,
        'image' => $imagePath
    ]);

    return redirect('/products/create')->with('success', 'Produk berhasil ditambahkan');
}

public function indexWeb()
{
    $products = Product::with('category')->get();
    return view('products.index', compact('products'));
}

}
