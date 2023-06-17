<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    public function categoryPage($id) {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('category' , compact('category', 'products'), [
            "title" => 'Category Page'
        ]);
    }

    public function singleProduct($id) {
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id', $subcat_id)->where('quantity', '>', 0)->latest()->get();

        $product = Product::find($id);
        $product->refresh();

        return view('product', compact('product', 'related_products'), [
            "title" => 'Product Page'
        ]);
    }

    public function addToCart() {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->latest()->get();
        return view('addtocart',compact('cart_items'), [
            "title" => 'Cart Page'
        ]);
    }

    public function addProductToCart(Request $request) {
        $product_price = $request->price;
        $product = Product::find($request->product_id);
        $quantity = $request->quantity;
        $stock = $request->input('quantity');
        if ($stock > $product->quantity) {
            return back()->with('stock', '');
        }

        $stock = $request->quantity;
        $product->quantity -= $stock;
        $product->save();
       
        $price = $product_price * $quantity;

        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $quantity,
            'price' =>  $price,
        ]);
          
        return redirect()->route('addtocart')->with('message', 'Berhasil menambahkan produk ke keranjang!!');
    }

    public function removeCartItem($id) {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Berhasil menghapus produk dari keranjang!!');
    }

    public function getShippingAddress() {
        return view('shippingaddress', [
            "title" => 'Add Shipping Address Page'
        ]);
    }
    
    public function addShippingAddress(Request $request) {
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'city_name' => $request->city_name,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('checkout');
    }

    public function checkOut() {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->latest()->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        return view('checkout', compact('cart_items', 'shipping_address') ,[
            "title" => 'Checkout Page'
        ]);
    }

    public function placeOrder() {
        $userid = Auth::id();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        $cart_items = Cart::where('user_id', $userid)->latest()->get();

        foreach($cart_items as $item) {
            Order::insert([
                'userid' => $userid,
                'shipping_phoneNumber' => $shipping_address->phone_number,
                'shipping_city' => $shipping_address->city_name,
                'shipping_postalcode' => $shipping_address->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        ShippingInfo::where('user_id', $userid)->first()->delete();

        return redirect()->route('pendingorders')->with('message', 'Orderan kamu berhasil diproses!!');

    }

    public function userProfile() {
        return view('userprofile', [
            "title" => 'User Profile Page'
        ]);
    }

    public function pendingOrders() {
        $pending_orders = Order::where('status','pending')->latest()->get();
        return view('pendingorders',compact('pending_orders') ,[
            "title" => 'Pending Orders Page'
        ]);
    }
    
    public function history() {
        return view('history', [
            "title" => 'History Page'
        ]);
    }
}
