@extends('layouts.master')

@section('content')
<h1> Login </h1>
<hr/>

	{!! Form::open(['url'=>route('userLogin') ]  )!!}
		<div class="row">
			<div class="form-group col-sm-3 ">
				<label for="">Email</label>
				<input type="text" class="form-control" name="email">
				<span>{{$errors->first('email')}}</span>			
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm-3 ">
				<label for="">Password</label>
				<input type="password" class="form-control" name="password">
				<span>{{$errors->first('password')}} </span>
			</div>
		</div>
	
		
		<button type="submit" class="btn btn-sm btn-info ">
				Log In
		</button>
		<a href="{{route('userRegister')}}"> Not a member yet</a>

{!! Form::close()!!}

@stop