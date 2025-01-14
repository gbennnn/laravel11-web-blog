{{-- @props([
    'showHeader' => true, // Default nilai showHeader adalah true
]) --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        {{ $data->title }}
    </title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet" /> --}}
</head>


<body>
    <!-- Navigation bar -->
    {{-- @include('components.front.navigation') --}}

    <!-- Page Header -->
    {{-- @if ($showHeader)
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @endif --}}

    <header class="" style="height: 100px;">
        <div class="header-background" style="height: 80px"></div>
        <style>
            @media (min-width: 768px) {
                .header-background {
                    background-color: rgb(107, 112, 118);
                }
            }
        </style>
    </header>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ url('/') }}">{{ getenv('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/') }}">Home</a>
                    </li>

                    @if (isset(Auth::user()->id))
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item">
                            <form method="post" action="{{ route('logout') }}" id="form-logout">
                                @csrf

                            </form>
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="#"
                                onclick="event.preventDefault();document.getElementById('form-logout').submit()">Logout</a>

                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    {{-- <x-slot name="pageTitle">{{ $data->title }}</x-slot> --}}

    <!-- Main Content-->


    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                {{-- validasi gambar --}}
                @if ($data)
                    <img src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . $data->thumbnail) }}"
                        alt="{{ $data->title }}" class="img-fluid">
                @else
                    <p>Data tidak ditemukan atau belum di publish.</p>
                @endif

                {{-- validasi judul --}}
                @if ($data)
                    <h1 class="mt-4 mb-4">{{ $data->title }}</h1>
                    <p>
                        <span><i>Created By</i> <b>{{ $data->user->name }}</b> </span> <i>On</i>
                        {{ $data->created_at->isoFormat('dddd, D MMMM Y') }}
                    </p>
                @else
                    {{-- <p>Data tidak ditemukan.</p> --}}
                @endif

                <div class="mb-5">
                    {{-- validasi konten --}}
                    @if ($data)
                        {!! $data->content !!}
                    @else
                        {{-- <p>Data tidak ditemukan.</p> --}}
                    @endif
                </div>
            </div>
        </div>

        {{-- Paggination --}}
        <div class="d-flex justify-content-between mb-4 mt-4">
            <div>
                @if ($pagination['next'])
                    <a href="{{ route('blog-detail', ['slug' => $pagination['next']->slug]) }}">&larr;{{ $pagination['next']->title }}
                    </a>
                @else
                    <span></span>
                @endif
            </div>
            <div>
                @if ($pagination['prev'])
                    <a href="{{ route('blog-detail', ['slug' => $pagination['prev']->slug]) }}">{{ $pagination['prev']->title }}
                        &rarr;</a>
                @else
                    <span></span>
                @endif
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/gbennnn/laravel11-web-blog.com">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Go Blog 2024</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script>
        /*!
         * Start Bootstrap - Clean Blog v6.0.9 (https://startbootstrap.com/theme/clean-blog)
         * Copyright 2013-2023 Start Bootstrap
         * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-clean-blog/blob/master/LICENSE)
         */
        window.addEventListener('DOMContentLoaded', () => {
            let scrollPos = 0;
            const mainNav = document.getElementById('mainNav');
            const headerHeight = mainNav.clientHeight;
            window.addEventListener('scroll', function() {
                const currentTop = document.body.getBoundingClientRect().top * -1;
                if (currentTop < scrollPos) {
                    // Scrolling Up
                    if (currentTop > 0 && mainNav.classList.contains('is-fixed')) {
                        mainNav.classList.add('is-visible');
                    } else {
                        console.log(123);
                        mainNav.classList.remove('is-visible', 'is-fixed');
                    }
                } else {
                    // Scrolling Down
                    mainNav.classList.remove(['is-visible']);
                    if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                        mainNav.classList.add('is-fixed');
                    }
                }
                scrollPos = currentTop;
            });
        })
    </script>
</body>

</html>
