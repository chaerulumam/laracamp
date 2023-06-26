<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>Sign In | Laracamp</title>
</head>

<body>

    <section class="login-user">
        <div class="left">
            <img src="{{ asset('assets/images/ill_login_new.png') }}" alt="">
        </div>
        <div class="right">
            <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="">
            <h1 class="header-third">
                Start Today
            </h1>
            <p class="subheader">
                Because tomorrow become never
            </p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary w-100" type="submit">Sign in</button>
                </div>
                <div class="pb-3">
                    <a class="btn btn-border w-100 btn-google-login" href="{{ route('signin.google') }}">
                        <img src="{{ asset('assets/images/ic_google.svg') }}" class="icon" alt=""> Sign In with Google
                    </a>
                </div>
            </form>
            {{-- <img src="{{ asset('assets/images/people.png') }}" class="people" alt=""> --}}
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>