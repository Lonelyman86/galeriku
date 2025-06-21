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
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <style>
    /* Tambahkan atau modifikasi CSS ini */
    .form {
      display: grid; /* Mengubah display menjadi grid */
      grid-template-columns: 1fr 1fr; /* Membuat dua kolom dengan lebar yang sama */
      gap: 20px; /* Jarak antar elemen grid */
      padding: 20px; /* Padding di sekitar form */
      border-radius: 8px; /* Sudut membulat */
      /* Sesuaikan lebar form agar tidak terlalu lebar */
      max-width: 700px; /* Sesuaikan lebar maksimum form */
      margin: 50px auto; /* Pusatkan form di tengah halaman */
      background-color: #fff; /* Warna latar belakang form */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    }

    .form p.title, .form p.message, .form .submit, .form .signin {
      grid-column: 1 / -1; /* Membuat elemen-elemen ini merentang seluruh lebar grid */
      text-align: center; /* Pusatkan teks */
    }

    /* Pastikan input dan label mengisi seluruh lebar kolomnya */
    .form label {
      width: 100%;
    }

    .form .input {
      width: calc(100% - 20px); /* Sesuaikan jika ada padding/border */
      padding: 10px;
      margin-bottom: 10px; /* Jarak di bawah input */
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form .invalid-feedback {
      grid-column: span 2; /* Agar pesan error juga merentang 2 kolom */
      color: red;
      font-size: 0.85em;
      margin-top: -8px; /* Sedikit naik agar dekat dengan input */
      margin-bottom: 10px;
    }

    /* Media query untuk tampilan mobile */
    @media (max-width: 768px) {
      .form {
        grid-template-columns: 1fr; /* Kembali ke satu kolom untuk layar kecil */
      }
      .form p.title, .form p.message, .form .submit, .form .signin {
        grid-column: auto;
      }
      .form .invalid-feedback {
        grid-column: auto;
      }
    }
  </style>
</head>

<body class="">
  <main class="main-content   mt-0">
    <section>
      <div class="container">
      <form action="/sign-up" class="form" method="POST">
        @csrf
        <p class="title">Register </p>
        <p class="message">Signup now and get full access to our app. </p>

        <label>
        <input type="text" name="fullname" class="input @error('fullname') is-invalid @enderror" id="fullname" required value="{{  old('fullname') }}">
        <span>Fullname</span>
          @error('fullname')
          <div class="invalid-feedback">
            {{  $message }}
          </div>
          @enderror
        </label>

        <label>
        <input type="text" name="name" class="input @error('name') is-invalid @enderror" id="name" required value="{{  old('name') }}">
        <span>Nickname</span>
          @error('name')
          <div class="invalid-feedback">
            {{  $message }}
          </div>
          @enderror
        </label>

        <label>
          <input type="text" name="address" class="input @error('address') is-invalid @enderror" id="address" required value="{{  old('address') }}">
            <span>Address</span>
            @error('address')
            <div class="invalid-feedback">
              {{  $message }}
            </div>
            @enderror
        </label>

        <label>
          <input type="text" name="username" class="input @error('username') is-invalid @enderror" id="username" required="min:7|max:15|unique:users" value="{{  old('username') }}">
            <span>Username</span>
            @error('username')
            <div class="invalid-feedback">
              {{  $message }}
            </div>
            @enderror
        </label>

        <label>
          <input type="text" name="email" class="input @error('email') is-invalid @enderror" id="email" required="email:dns|unique:users" value="{{  old('email') }}">
            <span>Email</span>
            @error('email')
            <div class="invalid-feedback">
              {{  $message }}
            </div>
            @enderror
        </label>

        <label>
          <input type="password" name="password" class="input @error('password') is-invalid @enderror" id="password" required="">
            <span>Password</span>
            @error('password')
            <div class="invalid-feedback">
              {{  $message }}
            </div>
            @enderror
        </label>

        {{-- <label>
            <input required="" placeholder="" type="password" class="input">
            <span>Confirm password</span>
        </label> --}}
        <button class="submit">Submit</button>
        <p class="signin">Already have an acount? <a href="/sign-in">Login</a> </p>
         </form>
        </div>
      </div>
    </section>
  </main>
</body>

</html>