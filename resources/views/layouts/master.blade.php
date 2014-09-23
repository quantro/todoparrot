<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to TODOParrot</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="/css/bootswatch.min.css">
  <link rel="stylesheet" href="/css/styles.css">
  @if(Route::currentRouteName() == 'home')
    <link rel="stylesheet" href="/css/home.css">
  @endif
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
	</style>
</head>
<body id="splash"> 

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">TODOParrot</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="/lists">Your Lists</a></li>
        <li><a href="/about">About</a></li>
          @if(!Auth::check()) 
            <li>{!! HTML::link('users/create', 'Create Account') !!}</li>
            <li>{!! HTML::link('/login', 'Sign In') !!}</li>
          @else
            <li>{!! HTML::link('/users', 'Hi, '. Auth::user()->first_name) !!}</li>
            <li>{!! HTML::link('/logout', 'Sign Out') !!}</li>
          @endif
        </li>
      </ul>
    </div>

  </div>
</nav>

  <div class="container" style="padding-left: 0px; padding-right: 0px;">
    <div class="row">
      <div class="col-md-12">
        @if(Session::has('message'))
            <div class="alert alert-info">
              {{Session::get('message')}}
            </div>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
          @yield('content')
      </div>
    </div>

  </div>

</body>
</html>
