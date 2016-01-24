<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProduct;
use App\Http\Requests\AddReview;
use App\Models\Review;
use App\User;
use Input;
use File;
use Redirect;
use \Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( AddProduct $request)
    {

        $file = $request->file('image');
        $file->move('uploads/images', $file->getClientOriginalName());

        $productArr = $request->all();
        $productArr['image'] = $file->getClientOriginalName();
        
        Product::create( $productArr );
        return Redirect::route('productList');    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
       return view('products.add');
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
        $product = Product::find($id); 

        return view('products.edit', ['product' => $product ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(AddProduct $request, $id)
    {
        
        $product = Product::find($id); 
        $product->update($request->all() ); 
        return redirect('product/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $product = product::find($id);
        $product->delete();
        

        //Session::flash('flash_message', 'product successfully deleted!');
        return redirect('product/list');
    }
     public function lists ( )
    {
        $products = product::all();
       return view('products.list', ['products'=> $products ]); 
    }
    public function detail($id)
    {
        $product = Product::find($id);
        $reviews = $product->review()->with('user')->get();
         $user = Auth::user();
        return view('products.detail')
                ->with('product', $product)
                ->with('user', $user)
                ->with('reviews', $reviews);
    }
    public function store(AddReview $request){
       
        $review = Review::create([
            $user_id = Input::get('user_id'),
            $product_id = Input::get('product_id'),
            $review = Input::get('review'),
            $rating = Input::get('rating')
        ]);
        return view('products.detail')->with('review', $review);
    }

}
