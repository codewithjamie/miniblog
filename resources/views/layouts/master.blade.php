<!doctype html>
<html lang="en">
   <!-- [Head] start -->
   <head>
      <title>@yield('title') | Blog Dashboard</title>
      <!-- [Meta] -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- [Favicon] icon -->
      <meta name="robots" content="noindex, follow" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">
      <!-- [Font] Family -->
      <link rel="stylesheet" href="/dash/fonts/inter/inter.css" id="main-font-link">
      <!-- [Tabler Icons] https://tablericons.com -->
      <link rel="stylesheet" href="/dash/fonts/tabler-icons.min.css">
      <!-- [Feather Icons] https://feathericons.com -->
      <link rel="stylesheet" href="/dash/fonts/feather.css">
      <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
      <link rel="stylesheet" href="/dash/fonts/fontawesome.css">
      <!-- [Material Icons] https://fonts.google.com/icons -->
      <link rel="stylesheet" href="/dash/fonts/material.css">
      <!-- [Template CSS Files] -->
      <link rel="stylesheet" href="/dash/css/style.css" id="main-style-link">
      <link rel="stylesheet" href="/dash/css/style-preset.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   </head>
   <!-- [Head] end --><!-- [Body] Start -->
   <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="false" data-pc-theme="light">

    @include('sweetalert::alert')

      <!-- [ Pre-loader ] start -->
      <div class="page-loader">
         <div class="bar"></div>
      </div>
      <!-- [ Pre-loader ] End --><!-- [ Sidebar Menu ] start -->
      @include('partials.sidebar')
      <!-- [ Sidebar Menu ] end --><!-- [ Header Topbar ] start -->
     @include('partials.dash-header')
      <!-- [ Main Content ] end -->

      @yield('content')


      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="/dash/js/plugins/apexcharts.min.js"></script>
      <script src="/dash/js/pages/dashboard-default.js"></script>
      <script src="/dash/js/plugins/popper.min.js"></script>
      <script src="/dash/js/plugins/simplebar.min.js"></script>
      <script src="/dash/js/plugins/bootstrap.min.js"></script>
      <script src="/dash/js/fonts/custom-font.js"></script>
      <script src="/dash/js/pcoded.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="/dash/js/plugins/feather.min.js"></script>
      <script>layout_change('false');</script>
      <script>layout_theme_contrast_change('false');</script>
      <script>change_box_container('false');</script>
      <script>layout_caption_change('true');</script>
      <script>layout_rtl_change('false');</script><script>preset_change('preset-1');</script><script>main_layout_change('vertical');</script>
      <script type="text/javascript">
        $('.dropify').dropify();
      </script>
   </body>
   <!-- [Body] end -->
</html>
