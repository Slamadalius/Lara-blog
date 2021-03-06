@extends('layouts.master')

@section('content')
	<div class="col-sm-8">
		<h1>Sign In</h1>

		<form method="POST" action="/login">
			{{csrf_field()}}

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control" required>
			</div>

			@include('layouts.errors')

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Register</button>
			</div>
		</form>
	</div>
@endsection