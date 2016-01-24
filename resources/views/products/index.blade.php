@extends('layouts.master')
@section('content')

	<h1> Manage Products </h1>
		
	<a class="btn btn-success btn-sm" href="{{ route('postAddProduct') }}"> 
		<span class="glyphicon glyphicon-plus"> </span> Add Products
	</a>

			
	<a class="btn btn-success btn-sm" href="{{ route('productList') }}"> 
		<span class="glyphicon glyphicon-th"> </span> List Products
	</a>

@stop