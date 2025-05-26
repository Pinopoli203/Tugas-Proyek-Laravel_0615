<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css">

  <title>.:Website - @yield('title'):.</title>
</head>

<body>
  <div class="container-fluid">
    <!-- Baris Pertama: Header -->
    <div class="row">
      <div class="col-md-12 bg-primary py-2">
        <div class="dropdown float-right">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" 
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person-fill"></i> User
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">
              <div class="media">
                <img src="https://www.logoai.com/oss/icons/2021/12/02/SU8HhT2n6tL-p-_.png" height="50" width="50" 
                     class="align-self-center mr-3" alt="User Image">
                <div class="media-body">
                  <h5 class="mt-0">Siti</h5>
                  <small><p class="mb-0"><i class="bi bi-clock"></i> Pkl 18.00 WIB</p></small>
                </div>
              </div>
            </a>
            <a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Setting</a>
            <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Baris Kedua: Sidebar & Content -->
    <div class="row">
      <div class="col-md-3 vh-100 border">
        <div class="nav flex-column nav-pills pt-3">
          <a class="nav-link {{ ($key ?? 'home') ? 'active':'' }}" href="/">Home</a>
          <a class="nav-link {{ ($key ?? 'movie') ? 'active':'' }}" href="/movie">Data Movie</a>
          <a class="nav-link {{ ($key ?? 'kategori') ? 'active':'' }}" href="/kategori">Data Kategori</a>
          <a class="nav-link" href="/genre">Data Genre</a>
        </div>
      </div>
      <div class="col-md-9 vh-100 border">
        @yield('content')
      </div>
    </div>

    <!-- Baris Ketiga: Footer -->
    <div class="row">
      <div class="col-md-12 bg-primary py-3"></div>
    </div>
  </div>

  <!-- JavaScript Dependencies -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
  <script>
    new DataTable('#example');
  </script>
</body>

</html>