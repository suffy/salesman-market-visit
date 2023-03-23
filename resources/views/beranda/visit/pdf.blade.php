<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activity Semut Gajah | Market Visit</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('landing-page') }}/style.css" />
    <style>
      * {
          margin: 0;
          padding: 0;
          font-family: "Poppins", sans-serif;
          box-sizing: border-box;
      }
      
      :root {
          --background-color: #fff;
          --text-color: #555;
          --title-color: #000;
      }

      .dark-theme {
          --background-color: #000;
          --text-color: #999;
          --title-color: #fff;
      }

      body {
          background: var(--background-color);
          color: var(--text-color);
          transition: background 0.8s, color 0.8s;
      }

      .header {
          width: 100%;
          min-height: 100vh;
          padding: 0 8%;
          position: relative;
          overflow: hidden;
      }

      nav {
          display: flex;
          align-items: center;
          padding: 10px 0;
      }

      .logo img {
          width: 50px;
      }

      nav ul {
          width: 100%;
          text-align: left;
          list-style: none;
          margin-right: 0;
      }

      nav ul li {
          display: inline-block;
          margin: 0 0;
      }

      nav ul li a {
          text-decoration: none;
          color: #d07839;
          font-weight: 700;
      }

      .about {
        /* padding: 20px 20px 20px 20px; */
        padding: 0 8%;
        margin-top: 20px;
      }

      .about h3,
      .menu h3,
      .contact h3 {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
      }

      .about .row .about-img {
        padding: 20px 20px 20px 0;
      }

      .about .row .content p {
        /* margin-bottom: 0.8rem; */
        font-size: 1rem;
        font-weight: 10;
        line-height: 1.6;
      } 

      table{
        width: 100%;
        border-collapse: collapse;
      }

      th{
        height: 5%;
        text-align: center;
        font-size: 12px;
      }

      td {
        padding: 15px;
        text-align: left;
        font-size: 10px;
      }

    </style>
  </head>
  <body>


    <div class="header">
      <nav>
        <a href="{{ url('/') }}" class="logo"><img src="D:\project\laravel10\smv\public\landing-page\images\icon-semut-gajah.png" id="logo" /></a>
        <ul>
          <li><a href="https://semutgajah.com/">semutgajah.com</a> | </li>
          <li><a href="https://play.google.com/store/apps/details?id=com.semutgajah">android</a></li>
        </ul>
      </nav>
    </div>

      {{-- <hr class="garis"> --}}

      <section id="about" class="about">
        
       <h3>Market Visit</h3>
  
       <div class="row">
        <div class="content">

          <p>Tgl Visit : {{ $data[0]->tgl_visit }}</p>
          <p>Toko : {{ $data[0]->nama_toko }}</p>
          <p>Pemilik : {{ $data[0]->nama_pemilik }}</p>
          <p>Type : {{ $data[0]->jenis_toko }}</p>
          <p>Alamat : {{ $data[0]->alamat_toko }}</p>
        </div>
      </div>
      <br>
      
        <div class="row">
          <div class="content">

            <table border="1">
              <tr>
                <th colspan="4">Product MPM</th>
              </tr>
              <tr>
                <th>kodeprod</th>
                <th>namaprod</th>
                <th>group</th>
                <th>Sub</th>
              </tr>
              @foreach ($data as $item)
              <tr>
                <td>{{ $item->kodeprod }}</td>
                <td>{{ $item->namaprod }}</td>
                <td>{{ $item->nama_group }}</td>
                <td>{{ $item->nama_subgroup }}</td>
              </tr>
              @endforeach
              
              
            </table>

            {{-- <p>
              Tanggal : {{ $data->tgl_briefing }}
            </p>
            <p>
              Jenis :  {{ $data->jenis }}
            </p>
            <p>
              keterangan :  {!! $data->keterangan !!}
            </p> --}}
          </div>
        </div>
      </section>


      
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}
  </body>
</html>