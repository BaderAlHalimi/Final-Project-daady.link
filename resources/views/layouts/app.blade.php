<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('logo.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
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

        #editLinkPreview1 {
            position: fixed;
            z-index: 10;
            /* top: 25%; */
            /* left: 15%; */
        }

        #editLinkPreview {
            position: fixed;
            display: none;
            background-color: rgba(128, 128, 128, 0.6);
            width: 100%;
            z-index: 10;
            height: 100vh;
        }

        .drop-container {
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 150px;
            padding: 20px;
            border-radius: 10px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            /* border: 1px solid #bfbebe; */
            color: #444;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
            background: #eee;
            border-color: #111;
        }

        .drop-container:hover .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            transition: color .2s ease-in-out;
        }

        .scroll {
            overflow: scroll;
            max-height: 97vh;
        }

        @media screen and (min-width: 1000px) {
            #editLinkPreview1 {
                top: 10%;
            }

            .scroll {
                overflow: hidden;
                max-height: 100vh;
            }
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="height: 100vh;" class="font-sans antialiased">
    {{-- {{ $errors }} --}}
    <div style="background-color: rgba(128, 128, 128, 0.6);" id="editLinkPreview">
        <div id="editLinkPreview1" class="container-fluid ms-auto me-auto mt-2">
            <div class="scroll row justify-content-center align-items-center g-2">
                <div class="col-md-12 col-lg-6 col-sm-10">
                    <div class="card">
                        <div class="card-header" style="position: relative;">
                            <h3 class="lead">Edit link preview </h3>
                            <button style="background: none;border: none;position: absolute; top:25%; right: 2.5%;"
                                onclick="closeLinkPreview()"><span style=" padding: 4px 8px; border-radius: 20px;"
                                    class="bg-dark text-light"><i class="fa-solid fa-xmark"></i></span></button>
                        </div>
                        <form id="editLPForm" action="{{ route('card.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="method"></div>
                            <div class="card-body pt-0 px-0">
                                <div class="mb-3 mt-0 mx-0">
                                    <input style="border: none;" type="text" class="form-control" name="redirect_url"
                                        id="redirect_url" aria-describedby="helpId" disabled placeholder="">
                                    <input style="border: none;" type="text" class="form-control" name="redirect_url"
                                        id="redirect_url1" aria-describedby="helpId" hidden placeholder="">
                                    <input style="border: none;" type="text" class="form-control" name="id"
                                        id="id" aria-describedby="id" hidden placeholder="" value="">
                                </div>
                                <div id="scroll" class="container">
                                    <div class="row justify-content-center align-items-center g-2">
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Link title</label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                    aria-describedby="title" placeholder="Your link title..." required>
                                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Link description </label>
                                                <textarea class="form-control" name="description" required id="description" aria-describedby="description"
                                                    placeholder="Your link description..."></textarea>
                                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Select domain</label>
                                                <Select class="form-control" name="domain" id="domain" required>
                                                    <option value="daady.link">daady.link</option>
                                                    <option value="twittr.link">twittr.link</option>
                                                    <option value="videoo.link">videoo.link</option>
                                                </Select>
                                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Select your image</label>
                                                <div class="card">
                                                    <div class="card-header p-0">
                                                        <label for="images" style="min-height: 30vh;"
                                                            class="drop-container" id="dropcontainer">
                                                            <span id="textToFile" class="text-center"><span
                                                                    class="fs-5">
                                                                    <span class="btn btn-secondary"><i
                                                                            class="fa-solid fa-upload"></i> Choose a
                                                                        png or jpeg image...</span><br>
                                                                    <p class="mt-2">Or <span
                                                                            class="text-warning">Drop files here</span>
                                                                    </p>
                                                                </span></span>

                                                            <input type="file" hidden class="form-control"
                                                                id="images" name="image" accept="image/*">
                                                        </label>

                                                    </div>
                                                    <div class="card-body">
                                                        <label for="" class="">
                                                            <div class="row">
                                                                <p class="fw-bold p-0">Title</p>

                                                                <p class="fs-4 p-0">Description</p>

                                                                <span style="padding: 0;margin:0;"
                                                                    class="p-0 m-0 text-muted">daady.link/RandomStr</span>
                                                            </div>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button onclick="closeLinkPreview()" class="btn">cancel</button>
                                <button class="btn btn-outline-danger" type="submit">Create link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {!! $slot !!}
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
    </div>



    <input type="hidden" id="updateRoute" value="{{ route('card.update', ['card' => '-1']) }}">
    <input type="hidden" id="storeRoute" value="{{ route('card.store') }}">
    <div id="put">
        @method('put')
    </div>
    <script>
        function sohwLinkPreview() {
            const url = document.getElementById("urlInput").value;

            // تحديد التعبير المنتظم لفحص الرابط
            const urlRegex = /^(https?:\/\/)?([\w-]+\.)+[\w]+(\/[\w-./?%#&=]*)?$/;

            // تحقق من مطابقة الرابط للتعبير المنتظم
            if (urlRegex.test(url)) {
                document.getElementById('editLinkPreview').style.display = 'block';
                editLPForm.action = document.getElementById("storeRoute").value;
                document.getElementById("method").innerHTML = "";
                document.getElementById("redirect_url").value = url;
                document.getElementById("redirect_url1").value = url;
                document.getElementById("urlInput").classList.remove('is-invalid');
                document.getElementById("urlInput").classList.add('is-valid');
                document.getElementById("editButton").classList.remove('mb-4');
                document.getElementById("id").value = "";
                document.getElementById("title").value = "";
                document.getElementById("description").value = "";
                document.getElementById("domain").value = "daady.link";
            } else {
                document.getElementById("urlInput").classList.add('is-invalid');
                document.getElementById("editButton").classList.add('mb-4');
            }
        }

        function closeLinkPreview() {
            document.getElementById('editLinkPreview').style.display = 'none';
        }


        const dropContainer = document.getElementById("dropcontainer")
        const fileInput = document.getElementById("images")

        dropContainer.addEventListener("dragover", (e) => {
            // prevent default to allow drop
            e.preventDefault()
        }, false)

        dropContainer.addEventListener("dragenter", () => {
            dropContainer.classList.add("drag-active");
            changeBG();
        })

        fileInput.addEventListener("change", () => {
            changeBG();
        });

        function changeBG() {
            const imageUrl = URL.createObjectURL(fileInput.files[0]);
            dropContainer.style.backgroundImage = `url(${imageUrl})`;
            dropContainer.style.backgroundSize = `cover`;
            fileInput.setAttribute("hidden", true);
            document.getElementById("textToFile").style.display = "none";
        }

        dropContainer.addEventListener("dragleave", () => {
            dropContainer.classList.remove("drag-active")
            changeBG();
        })

        dropContainer.addEventListener("drop", (e) => {
            e.preventDefault()
            dropContainer.classList.remove("drag-active")
            fileInput.files = e.dataTransfer.files
            changeBG();
        })


        function sohwLink(card , redirect_url, title, description, domain) {
            document.getElementById('editLinkPreview').style.display = 'block';
            // document.getElementById("id").value = id;
            document.getElementById("redirect_url").value = redirect_url;
            document.getElementById("redirect_url1").value = redirect_url;
            document.getElementById("title").value = title;
            document.getElementById("description").value = description;
            document.getElementById("domain").value = domain;
            document.getElementById("images").removeAttribute("required");
            document.getElementById("editLPForm").action = "/" + card + "/duplicate";
        }

        function closeLink() {
            document.getElementById('editLinkPreview').style.display = 'none';
        }
    </script>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
