<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChicRental</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/8acbe8f3e0.js" crossorigin="anonymous"></script>
    <style>
        .footer-link {
            text-decoration: none;
        }
        .footer-link:hover {
            text-decoration: underline;
        }
        .footer-icon a {
            color: #B9B9B9;
            margin: 8px;
            font-size: 40px;
        }
        .footer-icon a:hover {
            color: rgb(83, 78, 152);
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <main>
        @yield('content')
    </main>

    <footer class=" mt-5 mb-0" id="contact-us">
        <div class="bg-dark p-3">
            <h3 style="color: orange;" class="text-center mt-2">ChicRental</h3>
            <p class="text-white text-center mb-0">Uttara, Dhaka, Bangladesh</p>
            <div class="d-flex justify-content-center mt-0">
                <a class="text-white footer-link" href="">Privacy Ploicy</a>
                <p class="text-white ms-2 me-2">|</p>
                <a class="text-white footer-link" href="">Terms and Condition</a>
            </div>
            <div class="d-flex justify-content-center footer-icon">
                <a href="https://www.facebook.com/share/1EwdFSaJRh/" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://www.linkedin.com/in/sakib7495/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-square-twitter"></i></a>
            </div>
            <div class="text-center">
                <p style="color: rgb(255, 255, 255);"><small>2025 ChicRental. All rights reserved.</small>
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
