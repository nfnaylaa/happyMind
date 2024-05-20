<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>happyMind | {{ $tittle }} </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        .message {
            margin-bottom: 10px;
        }

    .outgoing-message {
    background-color: #DCF8C6;
    padding: 5px 10px;
    border-radius: 8px;
    align-self: flex-end;
    max-width: 60%;
    margin-left: auto; /* Tambahkan ini */
    margin-right: 10px; /* Tambahkan ini */
}

.incoming-message {
    background-color: #E2E2E2;
    padding: 5px 10px;
    border-radius: 8px;
    align-self: flex-start;
    max-width: 60%;
    margin-right: auto; /* Tambahkan ini */
    margin-left: 10px; /* Tambahkan ini */
}


        .chat-heading {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .no-message {
            text-align: center;
        }
    </style>
</head>
<body class="bg-sageold">
 
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-sageold sticky-top border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <h5><img src="images/mental-health.gif" class="rounded-circle bg-dark mx-2" style="width: 7%;"></i>HappyMind</h5>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              
                <ul class="navbar-nav ms-auto nav-underline">
                  @auth
                  <li class="nav-item nav-underline">
                    <a class="nav-link {{ ($tittle === "Konsultasi") ? 'active' : '' }}" aria-current="page" href="/chat"><i class="bi bi-chat-square-text-fill"></i>  Konsultasi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ ($tittle === "Tips") ? 'active' : '' }}" aria-current="page" href="/tips"><i class="bi bi-lightbulb"></i>  Tips</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link {{ ($tittle === "Dashboard") ? 'active' : '' }}" aria-current="page" href="/dashboard"><i class="bi bi-house-fill"></i> Dashboard</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-person-square"></i> Hallo, {{ auth()->user()->username }} 
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                      <li><a class="dropdown-item" href="/tips">Tips &amp; Trik</a></li>
                      <li><a class="dropdown-item" href="/emotions">Pemantauan Emosi</a></li>
                      <li><a class="dropdown-item" href="/schedules">Pengingat Jadwal</a></li>
                      <li><a class="dropdown-item" href="/chat">Konsultasi</a></li>
                      <li><a class="dropdown-item" href="/deteksi-stress">Deteksi Stress</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <form action="/logout" method="POST">
                        @csrf
                       <li><button type="submit" class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right"></i>  Keluar</button></li>
                      </form>
                    </ul>
                  </li>

                  @else
                    <li class="nav-item">
                      <a class="nav-link {{ ($tittle === "Konsultasi") ? 'active' : '' }} " aria-current="page" href="/chat"><i class="bi bi-chat-square-text-fill"></i>  Konsultasi</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ ($tittle === "Tips") ? 'active' : '' }}" aria-current="page" href="/tips"><i class="bi bi-lightbulb"></i>  Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($tittle === "Home") ? 'active' : '' }}" aria-current="page" href="/"><i class="bi bi-house-fill"></i> Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Fitur
                        </a>
                        <ul class="dropdown-menu">
                          {{-- <li><a class="dropdown-item" href="/fitrah">Tes Kepribadian</a></li> --}}
                          <li><a class="dropdown-item" href="/tips">Tips &amp; Trik</a></li>
                          <li><a class="dropdown-item" href="/emotions">Pemantauan Emosi</a></li>
                          <li><a class="dropdown-item" href="/schedules">Pengingat Jadwal</a></li>
                          <li><a class="dropdown-item" href="/chat">Konsultasi</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="/deteksi-stress">Deteksi Stress</a></li>
                        </ul>
                      </li>
                </ul>
                <a href="/login"class="btn btn-outline-light" type="submit">Masuk</a>
            </div>
            @endauth
        </div>
    </nav>


    <div class="container rounded">
        @yield('container')
      </div>

      <script>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
  
<!-- Start footer section -->
<footer class="bg-sageold text-light mt-3 border-top">
    <div class="container p-3">
      <div class="row">
        <div class="col-md-4">
          <h5>Tentang HappyMind</h5>
          <p>HappyMind adalah aplikasi berbasis web yang membantu pengguna untuk mengatasi stress akademik dan meningkatkan kesehatan mental.</p>
        </div>
        <div class="col-md-4">
          <h5>Fitur</h5>
          <ul class="list-unstyled">
            <li><a class="text-decoration-none text-light" href="#">Deteksi Tingkat Stress</a></li>
            <li><a class="text-decoration-none text-light"  href="#">Tips & Trik </a></li>
            <li><a class="text-decoration-none text-light"  href="#">Pemantauan Emosi</a></li>
            <li><a class="text-decoration-none text-light"  href="#">Pengingat Jadwal Belajar/Kegiatan</a></li>
            <li><a class="text-decoration-none text-light"  href="#">Konsultasi</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Hubungi Kami</h5>
          <address>
            Jl. Jend. Sudirman No. 123<br>
            Jakarta Selatan, Indonesia<br>
            <i class="bi bi-telephone"></i> +62 123 4567 890<br>
            <i class="bi bi-envelope"></i> info@happymind.com
          </address>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer section -->
  <script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
  

