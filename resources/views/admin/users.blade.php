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

    <div style="min-height: 55vh;" class="pb-12 mt-5">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-md-6 col-sm-12 ms-auto mb-3">
                            <form action="" method="get">
                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" class="form-control" name="search" id="search"
                                            aria-describedby="search" placeholder="search...">
                                    </div>
                                    <div class="col-md-2 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-outline-danger">Search</button>
                                    </div>
                                    <div class="col-md-2 col-sm-12 text-center"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 col-sm-12 ms-auto mb-3"></div>
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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Social Type</th>
                                    <th scope="col">Cards</th>
                                    <th scope="col">Clicks total</th>
                                    <th scope="col">Action 1</th>
                                    <th scope="col">Action 2</th>
                                    <th scope="col">Action 3</th>
                                    <th scope="col">Action 4</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($users as $user)
                                    <tr class="">
                                        <td scope="row">{{ $i++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->social_type }}</td>
                                        <td>{{ $user->cards_count }}</td>
                                        <td>{{ $user->cards->sum('clicks') }}</td>
                                        <td>
                                            @if ($user->role != 'super admin')
                                                <button class="btn btn-info"
                                                    onclick="transferToAnother(`{{ $user->id }}`)"><i
                                                        class="fa-solid fa-right-to-bracket"></i> signin
                                                </button>
                                        </td>
                                @endif

                                <td>
                                    @if (
                                        (Auth::user()->role == 'super admin' && $user->role != 'admin') ||
                                            ($user->role != 'admin' && $user->role != 'super admin'))
                                        <button onclick="convertToUserAdmin(`{{ $user->id }}`)"
                                            class="btn btn-success">
                                            <i class="fa-solid fa-list-check"></i>
                                            admin
                                        </button>
                                    @elseif (Auth::user()->role == 'super admin' && $user->role == 'admin')
                                        <button onclick="convertToUser(`{{ $user->id }}`)"
                                            class="btn btn-outline-success">
                                            <i class="fa-solid fa-list-check"></i>
                                            user
                                        </button>
                                    @endif

                                </td>
                                <td>
                                    @if (Auth::user()->role == 'super admin' || $user->role != 'super admin')
                                        <button onclick="editPassword(`{{ $user->id }}`)"
                                            class="btn btn-warning"><i class="fa-solid fa-key"></i>
                                            Passrowd</button>
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::user()->role == 'super admin' || ($user->role != 'admin' && $user->role != 'super admin'))
                                        <button onclick="deleteUser(`{{ $user->id }}`)" class="btn btn-danger"><i
                                                class="fa-solid fa-user-xmark"></i>
                                            remove</button>
                                    @endif
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $users->appends(['search' => request('search')])->links() }}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        const orderSelect1 = document.getElementById('orderSelect1');
        const submitOrder1 = document.getElementById('submitOrder1');

        // إضافة مستمع لحدث تغيير القيمة في العنصر select
        orderSelect1.addEventListener('change', function() {
            // قم بنقر زر الإرسال بشكل تلقائي عند تغيير القيمة
            submitOrder1.click();
        });

        function transferToAnother(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You requested a transfer from the admin account to another account",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, transfer!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //code
                    window.location.href = id + "/transfer";
                }
            })
        }

        function convertToUserAdmin(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to set the user as an admin",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //code
                    window.location.href = id + "/changeRole?role=admin";
                }
            })
        }

        function convertToUser(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to set the admin as an user.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //code
                    window.location.href = id + "/changeRole?role=user";
                }
            })
        }

        function deleteUser(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to remove this user.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //code
                    window.location.href = id + "/deleteUser";
                }
            })
        }

        function editPassword(id) {

            // تحقق من مطابقة الرابط للتعبير المنتظم
            Swal.fire({
                title: 'Enter New Password',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Edit',
                showLoaderOnConfirm: true,
                preConfirm: (password) => {
                    return fetch(`https://daady.link/admin/${id}/editPassword?password=${password}`)
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
                        text: 'Password updated successfully',
                        icon: 'success'
                    });
                }
            })
        }
    </script>
</x-app-layout>
