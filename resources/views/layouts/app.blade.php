{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')

<!-- Page Heading -->
<header class="bg-white shadow">
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
{{ $header }}
</div>
</header>

<!-- Page Content -->
<main>
{{ $slot }}
</main>
</div>
</body>
</html> --}}


<html lang="en">
  <head>
    <base href="">
  <meta charset="utf-8">
  <title>Admin Alcoholes | Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">        <!--end::Fonts-->

  <!--begin::Page Vendors Styles(used by this page)-->
  <link href="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6" rel="stylesheet" type="text/css">
  <!--end::Page Vendors Styles-->

  <!--begin::Global Theme Styles(used by all pages)-->
  <link href="/assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css">
  <link href="/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css">
  <link href="/assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css">
  <!--end::Global Theme Styles-->

  <!--begin::Layout Themes(used by all pages)-->
<!--   <link href="/assets/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css">
  <link href="/assets/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"> -->
  <link href="/assets/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css">
  <link href="/assets/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css">
  <!--end::Layout Themes-->
  <link rel="https://api.w.org/" href="https://www.tamaulipas.gob.mx/educacion/wp-json/" /><link rel="icon" href="https://www.tamaulipas.gob.mx/educacion/wp-content/uploads/sites/3/2016/10/cropped-cropped-logotam-1-32x32.png" sizes="32x32" />
<link rel="icon" href="https://www.tamaulipas.gob.mx/educacion/wp-content/uploads/sites/3/2016/10/cropped-cropped-logotam-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon" href="https://www.tamaulipas.gob.mx/educacion/wp-content/uploads/sites/3/2016/10/cropped-cropped-logotam-1-180x180.png" />
  @yield('estilos')

</head>
    <!--end::Head-->

    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable">

      <!--begin::Main-->
      <!--begin::Header Mobile-->
      <div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed ">
        <!--begin::Logo-->
        <a href="index.html">
          <img alt="Logo" src="/assets/media/logos/logo-light.png">
        </a>
        <!--end::Logo-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
          <!--begin::Aside Mobile Toggle-->
          <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
          </button>
          <!--end::Aside Mobile Toggle-->
          </div>
          <!--end::Toolbar-->
        </div>
        <!--end::Header Mobile-->
        <div class="d-flex flex-column flex-root">
          <!--begin::Page-->
          <div class="d-flex flex-row flex-column-fluid page">

            <!--begin::Aside-->
            <div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
              <!--begin::Brand-->
              <div class="brand flex-column-auto " id="kt_brand" kt-hidden-height="65" style="background:#1d1b1b;">
                <!--begin::Logo-->
                <a href="index.html" class="brand-logo">
                  <img alt="Logo" src="/assets/media/logos/logo-light.png">
                </a>
                <!--end::Logo-->

                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                  <span class="svg-icon svg-icon svg-icon-xl"><!--begin::Svg Icon | path:/assets/media/svg/icons/Navigation/Angle-double-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <polygon points="0 0 24 0 24 24 0 24"></polygon>
                      <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "></path>
                      <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "></path>
                    </g>
                  </svg><!--end::Svg Icon--></span>
                </button>
                  <!--end::Toolbar-->
                </div>
                <!--end::Brand-->

                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" style="background:#1d1b1b" id="kt_aside_menu_wrapper">

                  <!--begin::Menu Container-->
                  <div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500" style="height: 281px; overflow: hidden;">
                      @include('layouts.partes.main-menu')
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 281px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 142px;"></div></div></div>
                    <!--end::Menu Container-->
                  </div>
                  <!--end::Aside Menu-->
                </div>
                <!--end::Aside-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                  <!--begin::Header-->
                  <div id="kt_header" class="header  header-fixed " style="background:#1d1b1b;">
                    <!--begin::Container-->
                    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <div class="topbar">
                                          <div class="dropdown">
                  <div class="topbar-item" data-toggle="dropdown" data-offset="50px,0px" aria-expanded="false">
                      <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"  style="color: #fff;
                      background-color: #1d1b1b;
                      border-color: #1d1b1b;">
                         <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"><span style="color:white;">Hola,</span>  </span>
                          <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><span style="color:white;">{{ Auth::user()->name }}</span></span>
                          <!-- <span class="symbol symbol-lg-35 symbol-25 symbol-light-primary">
                              <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                          </span> -->
                      </div>
                  </div>
                  <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right" style="">
                      <!--begin::Nav-->
                      <ul class="navi navi-hover py-4">
                          <!--begin::Item-->
                          <li class="navi-item">

                              <a href="{{ route('logout') }}" class="navi-link" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5"><span class="navi-text"><i class="fas fa-power-off"></i> Cerrar Sesión</span></a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>


                              <!-- <a href="#" class="navi-link">
                                  <span class="symbol symbol-20 mr-3">
                                      <img src="/dist/assets/media/svg/flags/226-united-states.svg" alt="">
                                  </span>
                                  <span class="navi-text">English</span>
                              </a> -->
                          </li>
                          <!--end::Item-->

                      </ul>
                  <!--end::Nav-->
                  </div>
                </div>
                        <!--   <div class="topbar-item">
                            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                              <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hola,</span>
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->name }}</span>
                            </div>
                          </div> -->
                        </div>
                    </div>
                    <!--end::Container-->
                  </div>
                  <!--end::Header-->

                  <!--begin::Content-->
                  <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
                      <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center flex-wrap mr-2">
                            <!--begin::Page Title-->
                            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                @yield('title')
                            </h5>
                            <!--end::Page Title-->
                        </div>
                        <!--end::Info-->
                      </div>
                    </div>
                    <!--end::Subheader-->

                    <div class="container">
                      @yield('main')

                    </div>
                  </div>
                  <!--end::Content-->

                  <!--begin::Footer-->
                  <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
                    <!--begin::Container-->

                    <!--end::Container-->
                  </div>
                  <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
              </div>
              <!--end::Page-->
            </div>
            <!--end::Main-->




<!--begin::Global Theme Bundle(used by all pages)-->
<script>
  var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
};
</script>
<script src="/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
<script src="/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
<script src="/assets/js/scripts.bundle.js?v=7.0.6"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6"></script>
<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
<script src="/assets/js/pages/widgets.js?v=7.0.6"></script>
<!--end::Page Scripts-->
@yield('scripts')

<!--end::Body-->
</body>
</html>
