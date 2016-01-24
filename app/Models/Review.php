<?php
	namespace App\Models;
	use App\User;
	use \Eloquent;

	class Review extends Eloquent{
		protected $fillable=[
			'user_id',
			'product_id',
			'review',
			'rating'				
		];

		function user(){
			return $this->belongsTo(User::class);
		}

		function product(){
			return $this->belongsTo(Product::class);
		}

}