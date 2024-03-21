<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Akun</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label for="">Login</label>
                        <hr>

                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control mt-2" id="email"
                                placeholder="Masukkan Alamat Email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control mt-2" id="password"
                                placeholder="Masukkan Password">
                        </div>

                        <button class="btn btn-login btn-block btn-success mt-2">Login</button>
                    </div>
                </div>

                <div class="text-center mt-3">
                    Belum punya akun? <a href="{{ route('register.index') }}">Silahkan Register</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function () {
              $(".btn-login").click(function () {
                var email = $("#email").val()
                var password = $("#password").val()
                var token = $("meta[name='csrf-token']").attr("content");

                if(!email){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Harap isi kolom Alamat Email',
                    })
                } else if(!password){
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Harap isi kolom Password',
                    })
                } else{
                    $.ajax({
                        url:"{{ route('login.check-login') }}",
                        type: "POST",
                        dataType: "JSON",
                        cache: false,
                        data:{
                            "email": email,
                            "password": password,
                            "_token": token
                        },
                        success: function (response) {
                            if(response.success){
                                Swal.fire({
                                    type: 'success',
                                    title: 'Login Berhasil',
                                    text: 'Anda akan di arahkan dalam 3 Detik',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                }).then(function (params) {
                                    window.location.href = "{{ route('dashboard.index') }}"
                                })
                            } else {
                                console.log(response.success)

                                Swal.fire({
                                    type: 'error',
                                    title: 'Login Gagal',
                                    text: 'Silahkan coba lagi',
                                })
                            }

                            console.table(response)
                        },

                        error: function (response) {
                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });

                            console.log(response);
                        }
                    })
                }
              })
        })
    </script>
</body>

</html>
