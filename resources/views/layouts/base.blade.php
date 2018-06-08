<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
	<header>
		<div class="header_logo_title_wrapper">
			<a href="{{ route('main') }}">
				<div class="header_logo" id=>
					<img src="{{ asset('images/logo.png') }}" alt="">
				</div>
				<span id="header_title">Living library</span>
			</a>
		</div>
		<div id="login">
			@guest
				<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            	<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('profile', Auth::user()->id)}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    You're logged in as {{ Auth::user()->name }}</a><br>
                    @if(Auth::user()['role']=='admin')<a id="caret" href="{{route('admin')}}">You can turn to admin panel</a>@endif               

                <div class="logout">
                    <a id="logout" href="{{ route('logout') }}"
                       	onclick="event.preventDefault();
                       			document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <img src="{{ asset('images/logout.png') }}" alt="" id="logout_icon">
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @endguest
		</div>
	</header>
	<main class="py-4">
		@yield('content')
	</main>
	<footer>
		<p>2018</p>	
	</footer>
</body>
<script src="{{ asset('js/main.js') }}">
</script>
</html>