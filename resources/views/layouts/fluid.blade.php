<!DOCTYPE html>
<html>
<head>
	@include('includes/head')
</head>
<body class="layout-container ls-top-navbar layout-sidebar-l3-md-up">

	<!-- Navbar -->
	<nav class="navbar navbar-light bg-white navbar-full navbar-fixed-top ls-left-sidebar">
		<!-- Collapse -->
		<div class="collapse navbar-toggleable-xs" id="navbar">
			<ul class="nav navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="{{ url('/') }}">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/sidebar') }}">Link</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- // END Navbar -->

	<!-- Sidebar -->
	<div class="sidebar sidebar-left sidebar-visible-md-up sidebar-size-3 sidebar-dark bg-primary" id="sidebar" data-scrollable>

		<!-- Brand -->
		<a href="{{ url('/') }}" class="sidebar-brand sidebar-brand-bg sidebar-brand-border m-b-0">HR</a>

		<!-- Menu -->
		<ul class="sidebar-menu sm-active-button-bg">
			<li class="sidebar-menu-item">
				<a class="sidebar-menu-button" href="{{ url('/') }}">
                    <i class="sidebar-menu-icon material-icons">home</i> Sidebar link
                </a>
			</li>
			<li class="sidebar-menu-item active">
				<a class="sidebar-menu-button" href="{{ url('/') }}">
                    <i class="sidebar-menu-icon material-icons">menu</i>
                    Sidebar link
                </a>
			</li>
		</ul>
		<!-- // END Menu -->

	</div>
	<!-- // END Sidebar -->

	<!-- Content -->
	<div class="layout-content" data-scrollable>
		<div class="container-fluid">

			@yield('breadcrumb')

			@yield('content')

		</div>
	</div>
	<!-- // END Content -->

	<!-- App JS (includes vendor assets) -->
	<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>