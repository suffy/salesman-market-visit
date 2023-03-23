<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activity Semut Gajah | Briefing</title>
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

      /* .content {
          margin-top: 0;
          max-width: 600px;
      } */

      /* .content h1 {
          font-size: 50px;
          font-family: serif;
          color: var(--title-color);
          font-weight: 600;
      } */

      /* .content h2 {
          margin-top: 10px;
          font-size: 30px;
          font-family: serif;
          color: var(--title-color);
          font-weight: 400;
      } */

      /* .content p {
          margin-top: 10px;
          font-size: 20px;
          font-family: serif;
          color: var(--title-color);
          font-weight: 600;
      } */

      /* .content h1 span {
          font-family: serif;
          font-weight: 400;
          font-style: italic;
      } */

      /* .content a {
          background: #d07839;
          color: #fff;
          padding: 15px 70px;
          border-radius: 30px;
          cursor: pointer;
          display: inline-block;
          margin-top: 30px;
          text-decoration: none;
      } */

      /* about section */
/* .about {
  padding: 3rem 3rem 3rem;
} */


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
}

td {
  padding: 15px;
  text-align: left;
}

/* td {
  text-align: center;
} */

/* .about span,
.menu span,
.contact span {
  color: var(--primary);
}

.about .row {
  display: flex;
}

.about .row .about-img {
  flex: 1 1 45rem;
}

.about .row .about-img img {
  width: 100%;
}

.about .row .content {
  flex: 1 1 35rem;
  padding: 0 1rem;
}

.about .row .content h3 {
  font-size: 1.8rem;
  margin-bottom: 1rem;
}

.about .row .content p {
  margin-bottom: 0.8rem;
  font-size: 1.4rem;
  font-weight: 100;
  line-height: 1.6;
} */

    </style>
  </head>
  <body>


    <div class="header">
      <nav>
        <a href="{{ url('/') }}" class="logo">
        <img src="{{ public_path('foto/icon-semut-gajah.png') }}">
        </a>
        <ul>
          <li><a href="https://semutgajah.com/">semutgajah.com</a> | </li>
          <li><a href="https://play.google.com/store/apps/details?id=com.semutgajah">android</a></li>
        </ul>
      </nav>
    </div>
      <section id="about" class="about">
        
       <h3>Briefing</h3>
  
        <div class="row">
          <div class="content">

            <table border="1">
              <tr>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Keterangan</th>
              </tr>
              <tr>
                <td>{{ $data->tgl_briefing }}</td>
                <td>{{ $data->jenis }}</td>
                <td width="60%">{!! $data->keterangan !!}</td>
              </tr>
              
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