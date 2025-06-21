
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Galeriku
  </title>

<link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>

@import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap')
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box
}

body {
    background-color: #eee;
    height: 100vh;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to top, #fff 10%, rgba(6, 45, 172, 0.4) 90%) no-repeat
}

.wrapper {
    max-width: 500px;
    border-radius: 10px;
    margin: 50px auto;
    padding: 30px 40px;
    box-shadow: 20px 20px 80px rgb(206, 206, 206)
}

.h2 {
    font-family:  "Playfair Display", serif;
    font-size: 3.5rem;
    font-weight: bold;
    color: #050f97;
    font-style: italic
}

.h4 {
    font-family: 'Poppins', sans-serif
}

.input-field {
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: 1px solid #050f97;
    color: #050f97
}

.input-field:hover {
    color: #1e3168;
    border: 1px solid #7b4ca0
}

input {
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%;
    padding: 0px 2px;
    font-family: 'Poppins', sans-serif
}

.fa-eye-slash.btn {
    border: none;
    outline: none;
    box-shadow: none
}

a {
    text-decoration: none;
    color: #400485;
    font-weight: 700
}

a:hover {
    text-decoration: none;
    color: #7b4ca0
}

.option {
    position: relative;
    padding-left: 30px;
    cursor: pointer
}

.option label.text-muted {
    display: block;
    cursor: pointer
}

.option input {
    display: none
}

.checkmark {
    position: absolute;
    top: 3px;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    cursor: pointer
}

.option input:checked~.checkmark:after {
    display: block
}

.option .checkmark:after {
    content: "";
    width: 13px;
    height: 13px;
    display: block;
    background: #400485;
    position: absolute;
    top: 48%;
    left: 53%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s
}

.option input[type="radio"]:checked~.checkmark {
    background: #fff;
    transition: 300ms ease-in-out 0s;
    border: 1px solid #400485
}

.option input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1)
}

.btn.btn-block {
    border-radius: 20px;
    background-color: #131c9c;
    color: #fff
}

.btn.btn-block:hover {
    background-color: #1d5dd3e0
}

@media(max-width: 575px) {
    .wrapper {
        margin: 10px
    }
}

@media(max-width:424px) {
    .wrapper {
        padding: 30px 10px;
        margin: 5px
    }

    .option {
        position: relative;
        padding-left: 22px
    }

    .option label.text-muted {
        font-size: 0.95rem
    }

    .checkmark {
        position: absolute;
        top: 2px
    }

    .option .checkmark:after {
        top: 50%
    }

    #forgot {
        font-size: 0.95rem
    }
}
</style>
</head>
<div class="page-header align-items-start min-vh-100">
<body>
@if(session()->has('success'))
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
@endif

@if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
@endif

  <div class="wrapper bg-white">
    <div class="h2 text-center">Bluespace</div>
    <div class="h4 text-muted text-center pt-2">Enter your login details</div>
    <form class="pt-3" action="/sign-in" method="post">
      @csrf
        <div class="form-group py-2">
          <div class="input-field"> <span class="far fa-user p-2"></span>
              <input type="email" name="email" class="@error('email') is-invalid @enderror" id="email" placeholder="Email Address" autofocus required value="{{ old('email') }}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
        </div>
        <div class="form-group py-1 pb-2">
            <div class="input-field"> <span class="fas fa-lock p-2"></span> <input type="password" placeholder="Enter your Password" class="" id="password" name="password" required>
              {{-- <button class="btn bg-white text-muted"> <span class="far fa-eye-slash"></span> </button> --}}
            </div>
        </div>
        <div class="d-flex align-items-start">
            {{-- <div class="remember"> <label class="option text-muted"> Remember me <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div><br> --}}
            {{-- <div class="ml-99"> <a href="#" id="forgot">Forgot Password?</a> </div> --}}
        </div>
        <center><button type="submit" class="btn btn-block text-center my-3">Log in</button></center>
        <div class="text-center pt-3 text-muted">Not a member? <a href="/sign-up">Sign up</a></div>
    </form>
</div>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
