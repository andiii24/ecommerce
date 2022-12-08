<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }
    public function add(Request $request)
    {
        $product_id = $request->input('product_id');
        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Wishlist::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => "Product already added to Wishlist"]);
                } else {
                    $wish = new Wishlist();
                    $wish->prod_id = $product_id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json(['status' => 'Product added to wishlist']);
                }
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }
    public function destroy(Request $request)
    {
        // print_r($request);
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $WishlistItem = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $WishlistItem->delete();
                return response()->json(['status' => "Product Deleted from wishlist successfully"]);
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }

    }
    public function countWish()
    {
        $wishcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishcount]);
    }
}
