<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - eHotel</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/js/bootstrap.min.js') }}">
    <link rel="shortcut icon" href="{{ asset('image/f.png') }}" type="image/x-icon">
</head>

<body>
    <main class="form-signin">
        <div class="tgh shadow-lg d-flex">
            <div class="img">
                <img class="pgr" src="{{ asset('image/lgn.jpg') }}" alt="">
            </div>
            <form action="admin" method="post">
                @csrf
                <h1 class="h3 mb-3 text-center">Login</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="floatingInput" placeholder="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary lgn" type="submit">Log in</button>
            </form>
        </div>
    </main>
</body>

</html>
