<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Toko | @yield('title', 'Dashboard')</title>
  @include('admin.templates.components.style')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    @include('admin.templates.components.navbar')

    @include('admin.templates.components.sidebar')

    @include('admin.templates.components.contentWrapper')

    @include('admin.templates.components.footer')
  </div>
  @include('admin.templates.components.script')
</body>
</html>
