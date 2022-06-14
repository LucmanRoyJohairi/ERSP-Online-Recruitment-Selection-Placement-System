<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>eRSP</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/vendors/material-design-icons/iconfont/material-icons.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }} ">
  <!-- endinject -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/vendors/jvectormap/jquery-jvectormap.css') }} ">
  <!-- End plugin css for this page -->

  <!-- Layout styles -->
  
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }} ">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Favicons -->
  <link href="{{ asset('admin/images/favicon/android-chrome-192x192.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/android-chrome-512x512.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/apple-touch-icon.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/favicon-16x16.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/favicon-32x32.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/favicon.ico') }} " rel="icon">


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }} "></script>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  <!-- custom scripts -->
  <script src="{{ asset('admin/js/table.js') }}" defer></script>
  <script src="{{ asset('admin/js/sidebar-animation.js') }}" defer></script>

  <script src="{{ asset('admin/js/sidebar.js') }} " defer></script>
  <!-- <script src="{{ asset('admin/js/table.js') }} " defer></script> -->
  <script src="{{ asset('admin/vendors/chartjs/Chart.min.js') }} " defer></script>
  <script src="{{ asset('admin/vendors/jvectormap/jquery-jvectormap.min.js') }} " defer></script>
  <script src="{{ asset('admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }} " defer></script>
  <script src="{{ asset('admin/js/material.js') }} " defer></script>
  <script src="{{ asset('admin/js/misc.js') }} " defer></script>
  <script src="{{ asset('admin/js/dashboard.js') }} " defer></script>
 
</head>
<body>
  <div class="body-wrapper">

    <!-- Sidebar -->
    <!-- @yield('sidebar') -->
    @include('layouts.admin.sidebar')

    <div class="main-wrapper mdc-drawer-app-content">
    @include('layouts.admin.header')

        <div class="page-wrapper mdc-toolbar-fixed-adjust" id="content-space">

        <!-- Main Content -->
            @yield('content')

        <!-- partial -->
        </div>
    </div>
  </div>

  
</body>
</html> 