{{-- @extends('includes.header') --}}
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Invoice System</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	  <div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
		  <div class="card border-0 shadow rounded-3 my-5">
			<div class="card-body p-4 p-sm-5">
			  <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In (Operator)</h5>
			  <form action="{{ route('operators.handLogin') }}" method="post">
				@csrf
				<div class="form-floating mb-3">
				  <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Enter Username">
				  <label for="floatingInput">Username</label>
				</div>

				<div class="form-floating mb-3">
				  <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Enter Password">
				  <label for="floatingPassword">Password</label>
				</div>
  
				<div class="d-grid">
				  <button class="btn btn-primary btn-login123 text-uppercase fw-bold" type="submit">Sign
					in</button>
				</div>

				<br>

				<div>
					<p class="mb-0">Or login as <a href="{{ url('customers/login') }}" class="text-blue-50 fw-bold" style="text-decoration: none;">Customer</a>
					</p>
				  </div>

				<br>
				@if (session('error'))
					<p class="alert alert-danger">{{ session('error') }}</p>
				@endif
				<hr class="my-4">

			  </form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </body>
</html>