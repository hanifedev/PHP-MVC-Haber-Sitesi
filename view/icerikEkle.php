<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="Admin.php">
                    <i class="fa fa-fw fa-home"></i>
                    <span class="nav-link-text">
                Anasayfa</span>
                </a>
            </li>
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="addContent.php">
                    <i class="fa fa-fw fa-picture-o"></i>
                    <span class="nav-link-text">
                İçerik Ekle</span>
                </a>
            </li>
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="addCat.php">
                    <i class="fa fa-fw fa-pencil"></i>
                    <span class="nav-link-text">
                Kategori Ekle</span>
                </a>
            </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
         
        
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="Admin.php">Anasayfa</a>
          </li>
          <li class="breadcrumb-item active">İçerik Ekle</li>
        </ol>
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Başlık </label>
          <input type="text" class="form-control" placeholder="Başlık Giriniz" name="baslik">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kategori </label>
          <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                <?php foreach($categories as $cat): ?>
                <option value="<?=$cat->id?>"><?=$cat->title?></option>
                <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Açıklama </label>
          <input type="text" class="form-control" name="aciklama">
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Haber Fotoğrafı </label>
          <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
          <input type="file" name="fotograf" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
          <textarea name="metin"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </form>
      <br>
      </div>
      <!-- /.container-fluid -->

      <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Data Table Example
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Sil</th>
                    <th>Düzenle</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Sil</th>
                    <th>Düzenle</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach($icerik as $con): ?>
                <tr>
                    <td><?=$con->id?></td>
                    <td><?=$con->title?></td>
                    <td><?=$con->category_id?></td>
                    <td><a href="?id=<?=$con->id?>&?islem=sil"><i class="fa fa-times"></i></a></td>
                    <td><a href="?id=<?=$con->id?>&?islem=duzenle"><i class="fa fa-cog"></i></a></td>
                    <?php endforeach;?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; Your Website 2017</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>
  </body>
</html>