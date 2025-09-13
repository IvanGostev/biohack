<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ADMIN PANEL</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
    <meta name="color-scheme" content="light dark"/>
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)"/>
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)"/>
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="Admin Panel"/>

    <meta name="supported-color-schemes" content="light dark"/>
    <link rel="preload" href="{{ asset('admin/dist/css/adminlte.css')}}" as="style"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"
        media="print"
        onload="this.media='all'"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.css')}}"/>
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
        crossorigin="anonymous"
    />
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
<!--begin::App Wrapper-->
<div class="app-wrapper">
    <!--begin::Header-->
{{--    <nav class="app-header navbar navbar-expand bg-body">--}}
{{--        <!--begin::Container-->--}}
{{--        <div class="container-fluid">--}}
{{--            <!--begin::Start Navbar Links-->--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item menu-open">--}}
{{--                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">--}}
{{--                        <i class="bi bi-list"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                --}}{{--                <li class="nav-item menu-open d-none d-md-block"><a href="#" class="nav-link">Home</a></li>--}}
{{--                --}}{{--                <li class="nav-item menu-open d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>--}}
{{--            </ul>--}}
{{--            <!--end::Start Navbar Links-->--}}
{{--            <!--begin::End Navbar Links-->--}}
{{--            <ul class="navbar-nav ms-auto">--}}

{{--                <li class="nav-item menu-open">--}}
{{--                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">--}}
{{--                        <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>--}}
{{--                        <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <!--end::End Navbar Links-->--}}
{{--        </div>--}}
{{--        <!--end::Container-->--}}
{{--    </nav>--}}
    <!--end::Header-->
    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
            <!--begin::Brand Link-->
            <a href="/admin/products" class="brand-link">

                <span class="brand-text fw-light">ADMIN PANEL</span>

            </a>
            <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <!--begin::Sidebar Menu-->
                <ul
                    class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="navigation"
                    aria-label="Main navigation"
                    data-accordion="false"
                    id="navigation"
                >
                    <li class="nav-header">MENU</li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; background-color: white"></div>
{{--                            <i class="nav-icon bi bi-circle-fill"></i>--}}
                            <p>
                                Countries
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.country.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.country.create')}}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; background-color: white"></div>
{{--                            <i class="nav-icon bi bi-circle-fill"></i>--}}
                            <p>
                                Deliveries
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.delivery.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.delivery.create')}}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; background-color: white"></div>
{{--                            <i class="nav-icon bi bi-circle-fill"></i>--}}
                            <p>
                                Products
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.product.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.product.create')}}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; {{checkOrder() ? 'background-color: blue;' : 'background-color: white'}} "></div>
{{--                            <i class="nav-icon bi bi-circle-fill" style="{{}}"></i>--}}
                            <p>
                                Orders
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.order.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; {{checkMessage() ? 'background-color: blue;' : 'background-color: white'}}"></div>
{{--                            <i class="nav-icon bi bi-circle-fill" style="{{() ? 'color:blue;' : ''}}"></i>--}}
                            <p>
                                Users (Chats)
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.user.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; {{checkBalance() ? 'background-color: blue;' : 'background-color: white'}}"></div>
{{--                            <i class="nav-icon bi bi-circle-fill" style="{{checkBalance() ? 'color:blue;' : ''}}" ></i>--}}

                            <p>
                                Balance
{{--                                <i   class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.balance.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; {{checkReview() ? 'background-color: blue;' : 'background-color: white'}}"></div>
{{--                            <i class="nav-icon bi bi-circle-fill" style="{{checkReview() ? 'color:blue;' : ''}}"></i>--}}
                            <p>
                                Reviews (moderation)
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.review.moderation')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; background-color: white"></div>
{{--                            <i class="nav-icon bi bi-circle-fill"></i>--}}
                            <p>
                                FAQ
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.faq.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.faq.create')}}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; background-color: white"></div>
{{--                            <i class="nav-icon bi bi-circle-fill"></i>--}}
                            <p>
                                Social network
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.social.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.social.create')}}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; background-color: white"></div>
{{--                            <i class="nav-icon bi bi-circle-fill"></i>--}}
                            <p>
                                Info (About us)
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.info.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.info.create')}}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; background-color: white"></div>
{{--                            <i class="nav-icon bi bi-circle-fill"></i>--}}
                            <p>
                                Triggers
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.trigger.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.trigger.create')}}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <div style="width: 1rem; height: 1rem; border-radius: 100px; background-color: white"></div>
{{--                            <i class="nav-icon bi bi-circle-fill"></i>--}}
                            <p>
                                Banners
{{--                                <i class="nav-arrow bi bi-chevron-right"></i>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.banner.index')}}" class="nav-link">
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item menu-open">
                                <a href="{{route('admin.banner.create')}}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--end::Sidebar Menu-->
            </nav>
        </div>
        <!--end::Sidebar Wrapper-->
    </aside>
    <!--end::Sidebar-->
    <!--begin::App Main-->
    <main class="app-main">


        <div class="app-content-header">
            <div class="container-fluid">
            </div>
        </div>
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    <footer class="app-footer">
        <!--begin::To the end-->

        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
            Copyright &copy; 2025&nbsp;

        </strong>
        All rights reserved.
        <!--end::Copyright-->
    </footer>
    <!--end::Footer-->
</div>
<style>
    .sidebar-wrapper .sidebar-menu > .nav-item.menu-open > .nav-link, .sidebar-wrapper .sidebar-menu > .nav-item:hover > .nav-link, .sidebar-wrapper .sidebar-menu > .nav-item > .nav-link:focus {
        align-items: center;
    }
</style>
<!--end::App Wrapper-->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
    crossorigin="anonymous"
></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    crossorigin="anonymous"
></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
    crossorigin="anonymous"
></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="{{ asset('admin/dist/js/adminlte.js')}}"></script>
<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>
<!--end::OverlayScrollbars Configure-->
<!-- OPTIONAL SCRIPTS -->
<!-- apexcharts -->
<script
    src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
    crossorigin="anonymous"
></script>
<script>
    // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
    // IT'S ALL JUST JUNK FOR DEMO
    // ++++++++++++++++++++++++++++++++++++++++++

    /* apexcharts
     * -------
     * Here we will create a few charts using apexcharts
     */

    //-----------------------
    // - MONTHLY SALES CHART -
    //-----------------------

    const sales_chart_options = {
        series: [
            {
                name: 'Digital Goods',
                data: [28, 48, 40, 19, 86, 27, 90],
            },
            {
                name: 'Electronics',
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
        chart: {
            height: 180,
            type: 'area',
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'smooth',
        },
        xaxis: {
            type: 'datetime',
            categories: [
                '2023-01-01',
                '2023-02-01',
                '2023-03-01',
                '2023-04-01',
                '2023-05-01',
                '2023-06-01',
                '2023-07-01',
            ],
        },
        tooltip: {
            x: {
                format: 'MMMM yyyy',
            },
        },
    };

    const sales_chart = new ApexCharts(
        document.querySelector('#sales-chart'),
        sales_chart_options,
    );
    sales_chart.render();

    //---------------------------
    // - END MONTHLY SALES CHART -
    //---------------------------

    function createSparklineChart(selector, data) {
        const options = {
            series: [{data}],
            chart: {
                type: 'line',
                width: 150,
                height: 30,
                sparkline: {
                    enabled: true,
                },
            },
            colors: ['var(--bs-primary)'],
            stroke: {
                width: 2,
            },
            tooltip: {
                fixed: {
                    enabled: false,
                },
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter() {
                            return '';
                        },
                    },
                },
                marker: {
                    show: false,
                },
            },
        };

        const chart = new ApexCharts(document.querySelector(selector), options);
        chart.render();
    }

    const table_sparkline_1_data = [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54];
    const table_sparkline_2_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 44];
    const table_sparkline_3_data = [15, 46, 21, 59, 33, 15, 34, 42, 56, 19, 64];
    const table_sparkline_4_data = [30, 56, 31, 69, 43, 35, 24, 32, 46, 29, 64];
    const table_sparkline_5_data = [20, 76, 51, 79, 53, 35, 54, 22, 36, 49, 64];
    const table_sparkline_6_data = [5, 36, 11, 69, 23, 15, 14, 42, 26, 19, 44];
    const table_sparkline_7_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 74];

    createSparklineChart('#table-sparkline-1', table_sparkline_1_data);
    createSparklineChart('#table-sparkline-2', table_sparkline_2_data);
    createSparklineChart('#table-sparkline-3', table_sparkline_3_data);
    createSparklineChart('#table-sparkline-4', table_sparkline_4_data);
    createSparklineChart('#table-sparkline-5', table_sparkline_5_data);
    createSparklineChart('#table-sparkline-6', table_sparkline_6_data);
    createSparklineChart('#table-sparkline-7', table_sparkline_7_data);

    //-------------
    // - PIE CHART -
    //-------------

    const pie_chart_options = {
        series: [700, 500, 400, 600, 300, 100],
        chart: {
            type: 'donut',
        },
        labels: ['Chrome', 'Edge', 'FireFox', 'Safari', 'Opera', 'IE'],
        dataLabels: {
            enabled: false,
        },
        colors: ['#0d6efd', '#20c997', '#ffc107', '#d63384', '#6f42c1', '#adb5bd'],
    };

    const pie_chart = new ApexCharts(document.querySelector('#pie-chart'), pie_chart_options);
    pie_chart.render();

    //-----------------
    // - END PIE CHART -
    //-----------------
</script>
<!--end::Script-->
</body>
<!--end::Body-->
</html>
