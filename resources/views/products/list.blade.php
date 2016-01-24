@extends('layouts.master')
@section('content')

<h1> Products Lists </h1>
<div class="row">
	<table class="table table-bordered table-striped table-hover table-responsive">
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Status</th>
			<th>Images</th>
			<th> Action </th>
		</tr>
	@if(!$products->isEmpty())
	@foreach($products as $product)
		<tr>
			<td>{{ $product->name }}</td>
			<td>{{ $product->description }}</td>
			<td>{{ $product->price }}</td>
			<td>{{ $product->status }}</td>
			<td><img src="{{$product->image_url}}" alt="{{$product->name}}" height="40px" width="40px"></td>
			<td> 
				<button class="btn btn-success btn-sm"> 
					<a href="{{route('editProduct', [$product->id]) }}" style="color:white">Edit</a> |
					 <a href="{{route('productDelete', [$product->id]) }}" style="color:white"> </form>Delete</a>
					</td> 
				</button>
			
		</tr>
	@endforeach
	@else
		<tr>
			<td colspan="8">There are no Products</td>
			
		</tr>
	@endif
	
	</table>
</div>			

@stop 
