<?php
	namespace App\Models;
	use App\User;
	use \Eloquent;


	class Product extends eloquent{

	 protected $fillable =[
 		'name',
	 	'description',
	 	'status',
	 	'price',
	 	'image'
	 ];

	 protected $appends = ['url', 'image_url'];
	 function getUrlAttribute( $url ){
	 	return route('productDetail', $this->id);
	 
	 }
	 function getImageUrlAttribute(){
	 	return url('uploads/images/'. $this->image);
	 }
	 function review(){
	 	return $this->hasMany(Review::class);
	 }
	 function user(){
	 	return $this->belongsTo(User::class);
	 }
	

}