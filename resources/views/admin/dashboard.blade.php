<x-app-layout>
    <x-slot name="header">
        <style>
            #editLink1 {
                position: fixed;
                z-index: 10;
                top: 25%;
                left: 15%;
            }

            #editLink {
                position: fixed;
                top: 0;
                left: 0;
                display: none;
                background-color: rgba(128, 128, 128, 0.6);
                width: 100%;
                z-index: 10;
                height: 100vh;
            }
        </style>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <hr>
                <nav class="navbar">
                    <div class="container-fluid justify-content-start">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-success me-2">users</a>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">cards</a>
                    </div>
                </nav>
            </div>
        </div>
    </x-slot>

    <div style="min-height: 30vh;" class="pb-12 mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-md-8 col-lg-8 col-sm-12 text-c ms-auto mb-3">
                            <form action="" method="get">
                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text"
                                          class="form-control" name="search" id="search" aria-describedby="search" placeholder="search...">
                                      </div>
                                      <div class="col-md-2 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-outline-danger">Search</button>
                                      </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 text-c ms-auto mb-3">
                            <a class="btn btn-outline-dark"
                                href="@if (!$is_archive) {{ route('admin.card.archive') }}@else {{ route('admin.dashboard') }} @endif">
                                @if (!$is_archive)
                                    View archived
                                @else
                                    View Actives
                                @endif
                            </a>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12">
                            <form action="" method="get">
                                <Select class="form-control mb-3" name="order" id="orderSelect1">
                                    <option value="">sorting methods</option>
                                    <option @if (request('order') == 'most-recent') selected @endif value="most-recent">Most
                                        recent</option>
                                    <option @if (request('order') == 'most-clicks') selected @endif value="most-clicks">Most
                                        clicks</option>
                                </Select>
                                <input id="submitOrder1" type="submit" class="hidden">
                            </form>
                        </div>
                    </div>

                    <style>
                        .custom-div {
                            width: 98%;
                            /* تحديد عرض الديف حسب الرغبة */
                            white-space: nowrap;
                            /* تمنع النص من الانقسام عند نهاية الديف */
                            overflow: hidden;
                            /* تخفي النص الزائد */
                            text-overflow: ellipsis;
                            /* تعرض النقاط كإشارة إلى وجود نص إضافي */
                        }

                        .custom-p {
                            margin: 0;
                            /* تزيل الهامش الافتراضي للنص داخل الباراغراف */
                        }

                        .col-sm-4 {
                            max-width: 40%;
                        }

                        .col-sm-8 {
                            max-width: 80%;
                        }
                    </style>
                    @foreach ($cards as $card)
                        <div style="background-color: #FBFAFF;" class="shadow p-4 mb-3">
                            <div class="text-center row justify-content-center align-items-center g-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-header p-0" style="overflow: hidden;">
                                            <img load="lazy" style="width: 100%"
                                                src="{{ Storage::disk('public')->url($card->image_path) }}"
                                                alt="">
                                        </div>
                                        <div class="card-body text-left">
                                            <p class="fw-bold">{{ $card->title }}</p>
                                            <div class="custom-div">
                                                <p class="custom-p fs-4 ">{{ $card->description }}</p>
                                            </div>
                                            <p class="text-secondary text-muted">{{ $card->domain . '/' . $card->url }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 fs-5">
                                    <div class="border-bottom row justify-content-center align-items-center g-2">
                                        <div class="col-md-3 col-sm-4 fw-bold px-2 text-left">Link</div>
                                        <div style="overflow: hidden;" class="col-md-9 col-sm-8">
                                            <a class="text-warning"
                                                href="https://{{ $card->domain . '/' . $card->url }}"
                                                target="_blank">{{ $card->domain . '/' . $card->url }}</a>
                                        </div>
                                    </div>
                                    <div class="border-bottom mt-2 row justify-content-center align-items-center g-2">
                                        <div class="col-md-3 col-sm-4 fw-bold px-2 text-left">Targit</div>
                                        <div style="overflow: hidden;" class="col-md-9 col-sm-8">
                                            <a class="text-warning"
                                                href="
                                                @php
$redirect_url = $card->redirect_url;
                                                
                                                if (strpos($redirect_url, 'http://') === 0 || strpos($redirect_url, 'https://') === 0) {
                                                    // الرابط يحتوي بالفعل على "http://" أو "https://"
                                                    echo $redirect_url;
                                                } else {
                                                    // الرابط لا يحتوي على "http://" أو "https://"
                                                    echo 'http://' . $redirect_url; // يمكنك تغيير البروتوكول حسب الحاجة.
                                                } @endphp"
                                                target="_blank">{{ $card->redirect_url }}</a>
                                        </div>
                                    </div>
                                    <div class="border-bottom row justify-content-center align-items-center g-2">
                                        <div class="col-3 fw-bold px-2 text-left">For</div>
                                        <div style="overflow: hidden;" class="col-9">
                                            <p class="text-muted">twitter</p>
                                        </div>
                                    </div>
                                    <div class="border-bottom row justify-content-center align-items-center g-2">
                                        <div class="col-3 fw-bold px-2 text-left fs-5">Created</div>
                                        <div style="overflow: hidden;" class="col-9">
                                            <p class="text-muted fs-6">{{ $card->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center align-items-center g-2">
                                        <div class="col-3 fw-bold px-2 text-left">Clicks</div>
                                        <div style="overflow: hidden;" class="col-9">
                                            <p class="text-muted">{{ $card->clicks }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center ">
                                            <button onclick='copy(`{{ $card->domain . '/' . $card->url }}`)'
                                                class="btn mt-3 px-4 m-0"
                                                style="margin: 0;background-color: white;border: 1px solid gray;">Copy
                                                Link</button>
                                            <button onclick='editLink(`{{ $card->id }}`)' class="btn mt-3 px-4 m-0"
                                                style="margin: 0;background-color: white;border: 1px solid gray;">Edit
                                                Link</button>
                                            <button class="btn mt-3 px-4 mx-0"
                                                onclick="sohwLink(`{{ $card->id }}`,`{{ $card->redirect_url }}`,`{{ $card->title }}`,`{!! $card->description !!}`,`{{ $card->domain }}`)"
                                                {{-- href="{{ route('card.duplicate', ['card' => $card->id]) }}" --}}
                                                style="margin: 0; background-color: white;border: 1px solid gray;">
                                                Duplicate</button>
                                            <form style="display: inline-block;"
                                                action="@if (!$is_archive) {{ route('card.destroy', ['card' => $card->id]) }}@else{{ route('card.restore', ['card' => $card->id]) }} @endif"
                                                @if (!$is_archive) method="post" @else method="get" @endif">
                                                @csrf
                                                @if (!$is_archive)
                                                    @method('delete')
                                                @endif
                                                <button type="submit" class="btn mt-3 px-4"
                                                    style="margin: 0; background-color: white;border: 1px solid gray;">
                                                    @if (!$is_archive)
                                                        Archive
                                                    @else
                                                        Activate
                                                    @endif
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div>
                        {{ $cards->appends(['search' => request('search')])->links() }}                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        const orderSelect1 = document.getElementById('orderSelect1');
        const submitOrder1 = document.getElementById('submitOrder1');

        // إضافة مستمع لحدث تغيير القيمة في العنصر select
        orderSelect1.addEventListener('change', function() {
            // قم بنقر زر الإرسال بشكل تلقائي عند تغيير القيمة
            submitOrder1.click();
        });

        function copy(text) {
            // إنشاء عنصر textarea لتخزين النص المراد نسخه
            var textarea = document.createElement("textarea");
            textarea.value = "https://"+text;

            // حدد النص داخل العنصر textarea
            document.body.appendChild(textarea);
            
            textarea.select();


            try {
                // نسخ النص إلى الحافظة
                document.execCommand("copy");
                push();
            } catch (err) {}

            // قم بإزالة العنصر textarea من DOM
            document.body.removeChild(textarea);
        }

        function push() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-start',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Copy text successfully'
            })

        }

        function editLink(card) {
            const urlRegex = /^(https?:\/\/)?([\w-]+\.)+[\w]+(\/[\w-./?%#&=]*)?$/;

            // تحقق من مطابقة الرابط للتعبير المنتظم
            Swal.fire({
                title: 'Enter New Link',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Edit',
                showLoaderOnConfirm: true,
                preConfirm: (newLink) => {
                    if (!urlRegex.test(newLink)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid link! Please enter a valid URL.',
                        })
                        return false;
                    } // قم بتغيير هنا من url إلى newLink
                    return fetch(`https://daady.link/card/${card}/editLink?newLink=${newLink}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })

                },
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Success',
                        text: 'Link updated successfully. The page will be updated automatically',
                        icon: 'success'
                    }).then(() => {
                        location.reload(); // إعادة تحميل الصفحة بعد النقر على "OK"
                    });
                }
            })
        }
    </script>
    @if (request('url'))
        <script>
            var currentURL = new URL(window.location.href);
            var parameterValue = currentURL.searchParams.get("url");
            document.getElementById("urlInput").value = parameterValue;
            setTimeout(function() {
                sohwLinkPreview();
            }, 1000);
        </script>
    @endif
</x-app-layout>
