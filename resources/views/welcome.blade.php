<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('logo.png') }}">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fuggles&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <style>
        .navitemborder {
            border-bottom: 1px solid gray;
        }

        .navitemborder:hover {
            /* border-bottom: 1px solid white; */
            background-color: rgb(230, 230, 230);
            transition: 0.5s;
            border-radius: 6px;
        }

        #about1 {
            position: fixed;
            z-index: 10;
            top: 25%;
            left: 15%;
        }

        #about {
            position: fixed;
            display: none;
            background-color: rgba(128, 128, 128, 0.6);
            width: 100%;
            z-index: 10;
            height: 100vh;
        }
    </style>
</head>

<body class="antialiased">
    <div id="about">
        <div id="about1" class="container">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-danger" style="position: relative;">
                            <h3>About</h3>
                            <button style="background: none;border: none;position: absolute; top:25%; right: 2.5%;"
                                onclick="about()"><span style=" padding: 4px 8px; border-radius: 20px;"
                                    class="bg-dark text-light"><i class="fa-solid fa-xmark"></i></span></button>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">DaadyLink was created by me, Graham Easton . I'm a software developer
                                based out of
                                Texas.</h4>
                            <p class="card-text">DaadyLink has been under development since early 2015, when I built it
                                on a
                                whim as a
                                more fun way to share links on social media. It took off a bit from there, getting a
                                good
                                soon seeing
                                widespread use. People from over 170 countries have used DaadyLink to create hundrends
                                of
                                thousands of
                                links and serve over 200 million clicks.
                                <br>
                                I'm always interested in hearing about your experience with DaadyLink. If something's
                                not
                                working right,
                                or you have ideas for how it could be improved, please reach out.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav id="nav" class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand fw-bold fs-1 ms-3" href="{{ route('home') }}"
                style="font-family: 'Fuggles', cursive; scale:1.5;">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 me-4 mt-lg-0">
                    <li class="nav-item navitemborder">
                        <button onclick="about()" class="nav-link active">About</button>
                    </li>
                </ul>
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="btn btn-outline-dark text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-outline-dark  text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 btn btn-danger text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>
    <main id="main">
        <div class="container mb-5">
            <div class="pb-4 row justify-content-center align-items-center g-2">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <h1 class="display-1">Improve CTR with editable link previews.</h1>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <img style="width: 100%;" src="{{ asset('assets/imgs/ctr.png') }}" alt="">
                </div>
            </div>
            <span class="fs-4" style="font-style: italic; color:gray; margin-bottom: 20px;">Get started today</span>
            <div class="row justify-content-center align-items-center g-2">
                <div id="formInput" class="col-md-10 col-lg-10 col-sm-8 mb-4">
                    <form action="{{ route('dashboard') }}">
                        <input type="text" class="form-control fs-4" placeholder="Paste your link" name="url"
                            id="urlInput">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            Enter Valid Url
                        </div>
                        <button id="sendUrl" hidden type="submit"></button>
                    </form>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-4 text-center mb-4">
                    <button onclick="validate()" class="btn btn-danger text-light fs-4">Edit Preview</button>
                </div>
            </div>
            <br>
        </div>
        <div class="bg-danger mt-3 mp-0">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2 py-5 text-light">
                    <div class="row justify-content-center align-items-center g-2">
                        <h2>The most advanced link preview tool.</h4>
                    </div>
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-md-4 p-4 col-lg-4 col-sm-1"><label for=""><span class="fs-4">OPTIMIZE
                                </span>images for specific platforms (Facebook, Twitter, etc).</label></div>
                        <div class="col-md-4 p-4 col-lg-4 col-sm-1"><label for=""><span
                                    class="fs-4">CUSTOMIZE
                                </span>your link image with stylized text, a screenshot, an image from your site, or any
                                other image.</label></div>
                        <div class="col-md-4 p-4 col-lg-4 col-sm-1"><label for=""><span
                                    class="fs-4">ANALYZE
                                </span>results with GPDR compliant, ad-blocker immune click counts.</label></div>
                        <div class="col-md-4 p-4 col-lg-4 col-sm-1"><label for=""><span
                                    class="fs-4">EXPERIMENT </span>by creating multiple link previews for the same
                                content for A/B testing.</label></div>
                        <div class="col-md-4 p-4 col-lg-4 col-sm-1"><label for=""><span class="fs-4">TAILOR
                                </span>your message to different audiences by editing link title and
                                description.</label></div>
                        <div class="col-md-4 p-4 col-lg-4 col-sm-1"><label for=""><span class="fs-4">BRAND
                                </span>your links with unlimited custom domains.</label></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark mt-0">
            <div class="container">
                <center>
                    <div class="row justify-content-center align-items-center g-2 py-5 text-light">
                        <div class="row justify-content-center align-items-center g-2">
                            <h2>The most trusted link preview platform. </h4>
                        </div>
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col-12">
                                <table class="text-light ps-0 fs-3"
                                    style="border-radius: 25px; background-color: rgb(77, 77, 77); display: inline-block;">
                                    <tbody>
                                        <tr>
                                            <td style="border-top-left-radius: 25px; background-color: rgb(43, 43, 43);"
                                                class="ms-0 p-3"><i class="fa-solid fa-link"></i></td>
                                            <td class="ps-3 pe-3">Hundreds of thousands of links created. </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: rgb(43, 43, 43);" class="ms-0 p-3"><i
                                                    class="fa-solid fa-hand-pointer"></i></td>
                                            <td class="ps-3 pe-3">Hundreds of millions of clicks served. </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom-left-radius: 25px; background-color: rgb(43, 43, 43);"
                                                class="ms-0 p-3"><i class="fa-solid fa-certificate"></i></td>
                                            <td class="ps-3 pe-3">Satisfaction gauranteed. </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
        <div style="background-color: #eeeeee;">
            <div class="container">
                <div class="row py-4 justify-content-center align-items-center text-center g-2">
                    <div class="col-12"><a class="text-primary text-center me-4" href="{{ route('Privacy_Policy') }}">Privacy
                            Policy</a> | <a class="text-primary ms-4" href="{{ route('term_of_use') }}">Term Of
                            Use</a></div>
                </div>
            </div>
        </div>
        <div class="bg-white py-3">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2 text-center">
                    <div class="col-md-2 col-lg-2 col-sm-12">Copyright © <a href="{{ route('home') }}">daady.link</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        i = 0;

        function about() {
            if (i == 0) {
                document.getElementById('about').style.display = 'block';
                i = 1;
            } else {
                document.getElementById('about').style.display = 'none';
                i = 0;
            }
        }

        function validate() {
            // debugger;
            const input = document.getElementById("urlInput");
            const url = input.value;

            // تحديد التعبير المنتظم لفحص الرابط
            const urlRegex = /^(https?:\/\/)?([\w-]+\.)+[\w]+(\/[\w-./?%#&=]*)?$/;

            // تحقق من مطابقة الرابط للتعبير المنتظم
            if (urlRegex.test(url)) {
                // debugger;
                input.classList.add("is-valid");
                document.getElementById("formInput").classList.add('mb-4');
                input.classList.remove("is-invalid");
                setTimeout(function() {
                    var sendUrlButton = document.getElementById("sendUrl");
                    sendUrlButton.click();
                }, 500);
            } else {
                input.classList.add("is-invalid");
                input.classList.add("is-valid");
                document.getElementById("formInput").classList.remove('mb-4');
            }
        }
    </script>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
