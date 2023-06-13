<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .login-image {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .overlay {
            position: absolute;
            top: 60%;
            left: 0;
            transform: translateY(50%);
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .overlay-top-right {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            text-align: right;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 px-0">
                <div class="login-image">
                    <img src="{{ asset('/uploads/images/login-image.jpeg') }}" alt="Login image" class="w-100 h-100"
                        style="object-fit: cover; object-position: left;">
                    <div class="overlay">
                        <p>Wakil adminstratur <br>
                        <div class="text-uppercase">kph bogor</div>
                        </p>
                        <h4 class="mb-4">Deni Rusyana</h4>
                    </div>
                    <div class="overlay-top-right text-white">
                        <p>
                            "Terus berupaya menjadi manusia yg berguna bukan sekedar jadi manusia yg berhasil" <br>
                            "Terus berupaya dan berdo'a, lalu bersabar sisanya urusan Allah Swt"
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 text-black">
                <div class="px-5 ms-xl-4">
                    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                </div>

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form style="width: 23rem;" role="form" action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"></h3>
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form2Example18"
                                class="form-control form-control-lg" />
                            <label class="form-label" for="form2Example18">Email address</label>

                            @error('email')
                                <div class="invalid-feedback d-block">*{{ $message }} <i class="fas fa-arrow-up"></i>
                                </div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example28"
                                class="form-control form-control-lg" />
                            <label class="form-label" for="form2Example28">Password</label>
                            @error('password')
                                <div class="invalid-feedback d-block">*{{ $message }} <i class="fas fa-arrow-up"></i>
                                </div>
                            @enderror
                        </div>
                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                        </div>
                    </form>
                </div>

                <div class="text-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                    <h2>Sadapan Getah <br> KPH Bogor</h2> <br>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
