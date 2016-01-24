@extends('layouts.master')

@section('content')


	<div class="col-sm-12 col-md-12">
    <div class="thumbnail">
      <img src="{{ $product->image_url }}" alt="{{ $product->name }}" id="image">
            <div class="caption">
              <h3>{{ $product->name }}</h3>
              <h3>Price: {{$product->price}}</h3>
              <p>Description: {{$product->description}}</p>
            	
              <p><a href="#" class="btn btn-primary btn-sm" role="button"><span class="glyphicon glyphicon-thumbs-up"> Like</a> <a href="#" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-shopping-cart">Add to cart</a></p>
		</div>
    </div>
  </div>
  <div>
	<h2> Reviews</h2>
	<form method="post" action="{{ route('review') }}" role="form">
	<input type='hidden' value="{{ csrf_token() }}" name="_token">
	<input type='hidden' value="{{$product->id}}" name="product_id">
	<input type='hidden' value="{{$user->id}}" name="user_id">
		<div class="form-group">
			<label> Review </label>
			<textarea name="review" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label> Rating </label>
			<input type="text" class="form-control" name="rating">
		</div>
		<button type="submit" class="btn btn-success"> Submit </button>
	</form>	

	@foreach($reviews as $review)
		
		
		<ul class="list-group">
			<li class="list-group-item">
				Rating: {{$review->rating}} <br/>
				{{$review->review}}<br/>     
				- <b>{{$user->name}}</b>
			</li>
		</ul>
		
	@endforeach
  </div>
@stop