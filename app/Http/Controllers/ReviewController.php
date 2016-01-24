<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\AddReview;
use App\Models\Review;
use App\User;
use Input;
use \Auth;

class ReviewController extends Controller
{
	public function index($id){

		$product = Product::find($id);
		$reviews = $product->review()->with('user')->get();
		$user = User::find($id);
		$user = $user->review()->with('reviews')->get();
		return view('products.detail')->with('product', $product)
		->with('reviews', $reviews);
		


	}    

	public function store(AddReview $request){
		Review::create([
			$user_id = Input::get('user_id'),
			$product_id = Input::get('product_id'),
			$review = Input::get('review'),
			$rating = Input::get('rating')	

		]);

	}

}