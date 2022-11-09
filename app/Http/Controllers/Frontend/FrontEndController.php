<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::where('popular','1')->take(15)->get();
        $featured_product=Product::where('trending','1')->take(15)->get();
        return view('frontend.index',compact('featured_product','category'));
    }
    public function category()
    {
        $category=Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }
    public function view($slug)
    {
        if (Category::where('slug',$slug)->exists()) {

            $category=Category::where('slug',$slug)->first();
            $products=Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.product.index',compact('category','products'));
        }
        else
        {
            return redirect('/')->with('status','slug does\'t exist');
        }
    }
    public function prod_view($cat_slug,$pro_slug)
    {
        if (Category::where('slug',$cat_slug)->exists()) {
            if (Product::where('slug',$pro_slug)->exists()) {

            $product=Product::where('slug',$pro_slug,)->first();
            // $category=Category::where('slug',$slug)->first();
            // $products=Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.product.view',compact('product'));
            }
            else {
            return redirect('/')->with('status','product slug does\'t exist');
            }
        }
        else
        {
            return redirect('/')->with('status','category slug does\'t exist');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
