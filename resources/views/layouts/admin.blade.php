<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <base href="">
    <title>CITY EDUCATION</title>
    <meta charset="utf-8"/>
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="keywords"
          content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title"
          content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme"/>
    <meta property="og:url" content="https://keenthemes.com/metronic"/>
    <meta property="og:site_name" content="Keenthemes | Metronic"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
    <link rel="shortcut icon" href="{{ asset('demo/dist/assets/media/logos/favicon.ico')}}">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{ asset('demo/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset('demo/dist/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('demo/dist/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    {{--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    @yield('styles')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:10px;--kt-toolbar-height-tablet-and-mobile:10px">
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
             data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
             data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
             data-kt-drawer-toggle="#kt_aside_mobile_toggle">
            <!--begin::Brand-->
            <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                <!--begin::Logo-->
                <a href="">
                    <img alt="Logo" src="{{ asset('city.webp')}}" class="h-25px logo"/>
                </a>
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                     data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                     data-kt-toggle-name="aside-minimize">
                    <span class="svg-icon svg-icon-1 rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <path opacity="0.5"
                                          d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                          fill="currentColor"/>
                                    <path
                                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                        fill="currentColor"/>
                                </svg>
                            </span>
                </div>
            </div>
            @include('layouts.sidebar')
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" style="" class="header align-items-stretch">
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <div class="d-flex align-items-center ms-1 ms-lg-3">
                                <form action="{{ route('search') }}" method="get">
                                    <input type="text" name="phone" value="{{ request()->get('phone') }}" id="phone_search" class="form-control" placeholder="(XX)XXX-XX-XX">
                                </form>
                            </div>

                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--begin::Aside mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                             id="kt_aside_mobile_toggle">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"><path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="currentColor"/>
                                    <path opacity="0.3"
                                          d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                          fill="currentColor"/>
                                </svg>
							</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="" class="d-lg-none">
                            <img alt="Logo" src="{{ asset('noimg.webp') }}"
                                 class="h-30px"/>
                        </a>
                    </div>
                    <div class="d-flex align-items-stretch flex-shrink-0">
                        @if(auth()->user()->hourly and !session('start'))
                            <div class="d-flex align-items-center ms-1 ms-lg-3">
                                <a href="{{ route('startTime') }}">
                                    <div title="Start time"
                                         class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px position-relative"
                                         id="kt_drawer_chat_toggle">
                                        <i class="fa fa-play-circle"
                                           style="margin-right: 7px; color:darkgreen; font-size:18px"></i>
                                    </div>
                                </a>
                            </div>
                        @endif

                        @if(auth()->user()->hourly and session('start'))
                            <div class="d-flex align-items-center ms-5 ms-lg-5" style="margin-right: 23px">
                                <a href="{{ route('endTime') }}">
                                    <div title="Close time"
                                         class="btn btn-icon btn-icon-muted btn-active-light w-30px h-30px w-md-40px h-md-40px position-relative"
                                         id="kt_drawer_chat_toggle">
                                        <i class="fa fa-clock" style="margin-right: 7px; font-size:18px"></i>
                                        @php
                                            $secund = strtotime(date('Y-m-d H:i:s'))-strtotime(session('start_time'));
                                            $minut = ((int) ($secund/60)) < 10 ? '0'.((int) ($secund/60)) : ((int) ($secund/60));
                                            $hour = ((int) (($secund / 60) / 60)) < 10 ? '0'.(int) (($secund / 60) / 60) : (int) (($secund / 60) / 60) ;
                                            $sec = ($secund - $minut * 60 - $hour * 60 * 60) < 10 ? '0'.($secund - $minut * 60 - $hour * 60 * 60) : ($secund - $minut * 60 - $hour * 60 * 60);
                                        @endphp
                                        <label style="margin-right: 5px" tt="{{ $secund }}"
                                               id="time_track">{{$hour}}:{{$minut}}:{{$sec}}</label>
                                        <i class="fa fa-pause"
                                           style="margin-right: 7px; color:darkred; font-size:18px"></i>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <!--begin::User menu-->
                            <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                     data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                     data-kt-menu-placement="bottom-end">
                                    <img src="{{ asset('noimg.webp')}}" alt="user"/>
                                </div>
                                <!--begin::User account menu-->
                                <div
                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="{{ asset('noimg.webp')}}"/>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div
                                                    class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name ?? '' }} {{ auth()->user()->surname ?? '' }}</div>
                                                <a class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email ?? '' }}</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    @can('user-profile')
                                        <div class="menu-item px-5">
                                            @if(!empty(auth()->user()->id))
                                                <a href="{{ route('userchange') }}"
                                                   class="menu-link px-5">Profile</a>
                                            @endif
                                        </div>
                                    @endcan

                                    @can('user-test')
                                        <div class="menu-item px-5">
                                            <a href="{{ route('studentWork') }}" class="menu-link px-5">Test</a>
                                        </div>
                                    @endcan

                                    @can('user-task')
                                        <div class="menu-item px-5">
                                            <a href="{{ route("task_list") }}" class="menu-link px-5">Tasks</a>
                                        </div>
                                    @endcan

                                    @can('user-salary')
                                        <div class="menu-item px-5">
                                            <a href="{{ route('salaryList') }}" class="menu-link px-5">Salary</a>
                                        </div>
                                    @endcan

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{ route('logout') }}" class="menu-link px-5" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>

                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                            <!--begin::Header menu toggle-->
                            <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                                <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                     id="kt_header_menu_mobile_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                                    <span class="svg-icon svg-icon-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path
                                                        d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                                        fill="currentColor"/>
													<path opacity="0.3"
                                                          d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                                          fill="currentColor"/>
												</svg>
											</span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Header menu toggle-->
                        </div>

                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>

<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->

<script src="{{ asset('demo/dist/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('demo/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('demo/dist/assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{ asset('demo/dist/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{ asset('demo/dist/assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{ asset('demo/dist/assets/js/custom/utilities/modals/users-search.js')}}"></script>
<script src="{{ asset('jquery/jquery.min.js')}}"></script>
<script src="{{ asset('demo/dist/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('demo/dist/assets/js/widgets.bundle.js')}}"></script>
<script src="{{ asset('demo/dist/assets/js/custom/widgets.js')}}"></script>
{{--<script src="{{ asset('jquery/jquery.min.js') }}"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
    $('#phone_search').inputmask("(99)999-99-99");
</script>

@yield('scripts')
<script>
    setInterval(function () {
        var time_track = parseInt($("#time_track").attr('tt'));
        time_track++;
        var minut = parseInt(time_track / 60);
        var hour = parseInt((time_track / 60) / 60);
        var sec = time_track - minut * 60 - hour * 60 * 60;
        if (sec < 10) {
            sec = '0' + sec;
        }
        if (minut < 10) {
            minut = '0' + minut;
        }
        if (hour < 10) {
            hour = '0' + hour;
        }
        $("#time_track").text(hour + ':' + minut + ':' + sec);
        $("#time_track").attr('tt', time_track);
    }, 1000);
</script>

</body>
<!--end::Body-->
</html>
