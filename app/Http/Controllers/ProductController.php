<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () {
        $products = Product::latest()->get();
        return view('admin.product.allproduct', compact('products'));
    }

    public function addProduct () {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.product.addproduct', compact('categories', 'subcategories'));
    }

    public function storeProduct (Request $request) {
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product_short_des = $request->input('product_short_des');
        $product_long_des = $request->input('product_long_des');

        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/' . $img_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'product_short_des' => $product_short_des,
            'product_long_des' => $product_long_des,
            'price' => $request->price,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_img' => $img_url,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
        ]);

        Category::where('id', $category_id)->increment('product_count',1);
        SubCategory::where('id', $subcategory_id)->increment('product_count',1);

        return redirect()->route('allproducts')->with('message', 'Product Added Successfully!');
    }

    public function editProductImg($id) {
        $productinfo = Product::findOrFail($id);
        return view('admin.product.editproductimg', compact('productinfo'));
    }

    public function updateProductImg(Request $request) {
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = $request->id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/' . $img_name;

        Product::findOrFail($id)->update([
            'product_img' => $img_url,
        ]);

        return redirect()->route('allproducts')->with('message', 'Product Image Updated Successfully!');
    }

    public function editProduct($id) {
        $productinfo = Product::findOrFail($id);

        return view('admin.product.editproduct', compact('productinfo'));
    }

    public function updateProduct(Request $request) {
        $productid = $request->id;

        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
        ]);

        Product::findOrFail($productid)->update([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
        ]);

        return redirect()->route('allproducts')->with('message', 'Product Information Updated Successfully!');
    }

    public function deleteProduct($id) {
        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        Product::findOrFail($id)->delete();
        Category::where('id', $cat_id)->decrement('product_count', 1);
        SubCategory::where('id', $subcat_id)->decrement('product_count', 1);

        return redirect()->route('allproducts')->with('message', 'Product Deleted Successfully!');
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        
        $products = Product::where('product_name', 'like', '%' . $keyword . '%')->orWhere('product_category_name', 'like', '%' . $keyword . '%')
        ->orWhere('product_subcategory_name', 'like', '%' . $keyword . '%')
        ->orderByRaw("CASE
            WHEN product_name LIKE '%$keyword%' THEN 1
            WHEN product_category_name LIKE '%$keyword%' THEN 2
            WHEN product_subcategory_name LIKE '%$keyword%' THEN 3
            ELSE 4
            END")->get();
        
        return view('admin.product.search', [
        'title' => 'Search Product',
        'products' => $products, 
        'keyword' => $keyword], compact('products', 'keyword'));
    }
}

