<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title', config('app.name'))</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="padding: 13px">
			<div class="container">
				<a class="navbar-brand" href="/">
					<!-- <img src="/images/logo.png" width="75" height="65" style=" top: 0px; left: 54px; position: absolute;"> -->
					BOOKSHARE
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<form class="form-inline my-2 my-lg-0" action="/timsach">
						<input class="form-control mr-sm-2" name="key" type="search" placeholder="Tên sách" value="{{ isset($key) ? $key : ''}}" aria-label="Tên sách">
					</form>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="/"><i class="fas fa-home"></i></a>
						</li>

						@guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a></li>
                        @else
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle active " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sách</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									@foreach(App\TheLoai::all() as $theloai)
										<a class="dropdown-item" href="#">{{$theloai->tenloai}}</a>
									@endforeach
								</div>
							</li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/user/{{Auth::id()}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="/user/{{Auth::user()->username}}">Tủ sách</a>
									<a class="dropdown-item" href="#">Thông báo</a>
									<a class="dropdown-item" href="#">Tin nhắn</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
					</ul>
					
				</div>
			</div>
		</nav>
		<!-- body -->