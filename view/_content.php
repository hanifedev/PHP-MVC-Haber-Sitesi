<?php require_once "view/_header.php"; ?>
<?php require_once "view/_navbar.php"; ?>

<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <?php foreach($kategori as $post):?>
                <img class="d-block w-100" src="<?=$post->fotograf?>" style="width: 100%;">
                <?php endforeach;?>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
        <small>Son Haberler</small>
    </h1>
    <!-- Son Haberler -->
    <div class="row">

        <?php foreach($all_news as $news): ?>
        <div class="col-md-4">
                <a href="detay.php?id=<?=$news->id?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?=$news->fotograf?>" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><?=$news->title?></h3>
                <p><?=$news->aciklama?></p>
                <a class="btn btn-primary" href="detay.php?id=<?=$news->id?>">Devamını Oku
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <hr>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>


    <!-- Portfolio Section -->
    <h2>Popüler Haberler</h2>

    <div class="row">
       <?php foreach($tumb as $news): ?>
            <div class="col-lg-3 portfolio-item">
            <div class="card h-100">
                <a href="detay.php?id=<?=$news->id?>"><img class="card-img-top" src="<?=$news->fotograf?>" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="detay.php?id=<?=$news->id?>"><?=$news->title?></a>
                    </h4>
                    <p class="card-text"><?=$news->aciklama?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <h1 class="mt-4 mb-3">
        <small>Samsun Haber</small>
    </h1>
    <hr>
    <div class="row">
        <?php foreach($kategori as $news): ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <a href="detay.php?id=<?=$news->id?>" class="thumbnail">
                <img src="<?=$news->fotograf?>" style="width:242px;height:200px;">
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <hr>
</div>
<!-- /.container -->
<?php require_once "view/_footer.php"; ?>

