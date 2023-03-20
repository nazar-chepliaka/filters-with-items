<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Админ</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Theme style -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <link rel="icon" type="image/png" href="/frontend/images/icons/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/node_modules/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin/css/builded/styles.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('/assets/common/js/manifest.js') }}"></script>
    <script src="{{ asset('admin/js/builded/app.js') }}"></script>

  @yield('head')

</head>
<body class="hold-transition sidebar-mini">

@yield('modals')

<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" style="padding: 15px 25px 0px 25px;align-items: center;display: flex;justify-content: center;">
        <x-application-logo class="block w-auto" height="100" />
    </a>

    @include('admin-theme.templates.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <header class="bg-white shadow" style="z-index: 999;position: relative;">
        <div class="mx-auto px-4 sm:px-6 lg:px-8" >
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <form method="POST" action="{{ route('logout') }}" id="logout" class="text-right">
                                        @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    Вийти <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

        </div>
    </header>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content" style="margin-top: 40px;">
      {{-- {{ Breadcrumbs::render() }} --}}
      @include('admin-theme.templates.includes.alerts')
      @yield('content')

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<!-- AdminLTE App -->


<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
        $('.basic-select').select2();
        $('.multiple-select').select2();
    });
</script>


@yield('scripts')

@stack('footer-scripts')

</body>
</html>
