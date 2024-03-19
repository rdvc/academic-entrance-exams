<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Academic Entrance Exams</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ url('assets/css/style.min.css')}}">
  <link rel="stylesheet" href="{{ url('assets/css/app.css')}}">
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-image: url('assets/images/background.jpg');
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
    }

    .container {
      text-align: center;
      padding: 20px;
      background-color: rgba(247, 246, 250, 0.5);
      border-radius: 20px;
      max-width: 600px;
      position: relative;
      z-index: 1;
    }

    .centered-image {
      max-height: 40vh;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: -1;
      /* Put the image behind */
    }
  </style>
</head>

<body>

  <div class="container">
    <h1 class="font-weight-semibold">Academic Entrance Exams</h1>
    <h6 class="font-weight-normal text-muted pb-3">Assessment Test</h6>

    <a href="{{ url('/login') }}" class="btn mt-1 btn-primary"><b>Student Login</b></a>
    <a href="{{ route('register') }}" class="btn mt-1 btn-danger"><b>Student Register</b></a>
    <a href="{{ url('/admin/login') }}" class="btn mt-1 btn-info"><b>Admin Login</b></a>

  </div>

  <img class="centered-image" src="assets/images/online-test.png" alt="">

</body>

</html>