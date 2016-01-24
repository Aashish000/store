@extends('layouts.master')

@section('content')


<div class="row">
	<h1> Add Products </h1>
		<form action="{{ route('saveProduct', [$product->id])}}" role="form" method="post">
		<input type="hidden" value="{{ csrf_token() }}" name="_token"/>	
		<div class="form-group">
			<label> Name: </label>
				<input type="text"class="form-control" name="name" value="{{$product->name}}"></div>
			<span style="color:red">{{$errors->first('name')}} </span>

		<div class="form-group">
			<label>Description</label>
				<textarea class="form-control" name="description">{{$product->description}}  
			</textarea></div>
			<span style="color:red">{{$errors->first('description')}} </span>

		<div class="form-group">
			<label>Price</label>
				<input type="text" class="form-control" name="price" value="{{$product->price}}"></div>
			<span style="color:red">{{$errors->first('price')}} </span>

		<div class="form-group">
			<label>Status</label>
				<input type="text" class="form-control" name="status" value="{{$product->status}}"></div>
			<span style="color:red">{{$errors->first('status')}} </span>
		</br>
		<button class="btn btn-primary"> Save</button>
	</form>
</div>			

@stop 
