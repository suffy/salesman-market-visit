<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('landing-page') }}/style.css" />
    <title>SemutGajah.com | Salesman Market Visit</title>
  </head>
  <body>
    <div class="header">
      <nav>
        <a href="#" class="logo"><img src="{{ asset('landing-page') }}/images/icon-semut-gajah.png" id="logo" /></a>
        <ul>
          <li><a href="#">Home</a></li>
          {{-- <li><a href="#">Portfolio</a></li>
          <li><a href="#">Clients</a></li> --}}
          {{-- <li><a href="#">Contact</a></li> --}}
        </ul>
        <div class="toggle-btn" id="btn">
          <span id="btnText">Dark</span>
          <img src="{{ asset('landing-page') }}/images/moon.png" id="btnIcon" />
        </div>
      </nav>

      <div class="content">
        <h1>SemutGajah.com</h1>
        {{-- <h2><span>Market</span> Visit</h2> --}}
        <p>
          Silahkan masukkan data kunjungan anda ke toko di website ini dengan cara klik tombol berikut.
        </p>
        <a href="{{ url('auth/redirect') }}">Click Here</a>
      </div>
      <br><br>
      <div class="image-box">
        <img src="{{ asset('landing-page') }}/images/pngwing.com.png" />
        <div class="patternx">
          {{-- <img src="{{ asset('landing-page') }}/images/background.png" /> --}}
          {{-- <img src="{{ asset('landing-page') }}/images/background.png" /> --}}
        </div>
      </div>
    </div>

    <script>
      let btn = document.getElementById("btn");
      let btnText = document.getElementById("btnText");
      let btnIcon = document.getElementById("btnIcon");
      let logo = document.getElementById("logo");

      btn.onclick = function () {
        document.body.classList.toggle("dark-theme");

        if (document.body.classList.contains("dark-theme")) {
          btnIcon.src = "{{ asset('landing-page') }}/images/sun.png";
          btnText.innerHTML = "Light";
          logo.src = "{{ asset('landing-page') }}/images/icon-semut-gajah.png";
        } else {
          btnIcon.src = "{{ asset('landing-page') }}/images/moon.png";
          btnText.innerHTML = "Dark";
          logo.src = "{{ asset('landing-page') }}/images/icon-semut-gajah.png";
        }
      };
    </script>
  </body>
</html>
