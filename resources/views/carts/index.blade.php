<style>
#image{
  height:200px;
  width:300px;
}
</style>
@extends('layouts.master')

@section('content')
	
<h1> Products </h1>

@foreach($products as $product)

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
     <a href="{{route('detail', [$product->id])}}"> <img src="{{ $product->image_url }}" alt="{{ $product->name }}" id="image">
           </a> <div class="caption">
              <h3>{{ $product->name }}</h3>
              <h3>Price: {{$product->price}}</h3>
              <p>Description: {{$product->description}}</p>
            	
              <p><a href="#" class="btn btn-primary btn-sm" role="button"><span class="glyphicon glyphicon-thumbs-up"> Like</a> <a href="#" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-shopping-cart">Add to cart</a></p>
          </div>
    </div>
  </div>
  @endforeach
</div>	

@stop