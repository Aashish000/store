@extends('layouts.master')

@section('content')
<h1> Register User </h1>
<hr/>
{!! Form::open(['url'=> route('userRegister')])!!}

	<div class="form-group">
		<label>Name</label>
			<input type="text" class="form-control" name="name">
			<span>{{$errors->first('name')}}</span>
	</div>
	<div class="form-group">
		<label>Email</label>
			<input type="text" class="form-control" name="email">
			<span>{{$errors->first('email')}}</span>
	</div>
	<div class="form-group">
		<label>Password</label>
			<input type="password" class="form-control" name="password">
			<span>{{$errors->first('password')}}</span>
	</div>
	<div class="form-group">
		<label>Confirm Password</label>
			<input type="text" class="form-control" name="password_confirmation">
			
	</div>	

	<button type="submit" class="btn btn-info"> Submit </button>
{!! Form::close()!!}


@stop