<!doctype html>
<html lang="en">
  <head>

  <style>
  .badge{
    margin-left:3px;
  }
  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src = "https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src = "//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <title><?= $title ?></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
  <a class="navbar-brand" href="#">CI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <!--a class="nav-item nav-link" href="<//?= base_url(); ?>Home"> Home <!--span class="sr-only">[current]</span></a-->
      <!--a class="nav-item nav-link" href="<//?= base_url(); ?>mahasiswa">Data Mahasiswa</a-->
      <a class="nav-item nav-link" href="<?= base_url(); ?>user/laporan_pdf">Cetak Laporan</a>
      <a class="nav-item nav-link" href="<?= base_url(); ?>login/logout">Logout</a>
    </div>
  </div>
  </div>
</nav>