<?php require_once "view/_header.php"; ?>
<?php require_once "view/_navbar.php"; ?>

<!-- Page Content -->
<div class="container">
    <br>
    <!-- Project One -->
    <div class="row">
        <?php foreach($kategoriDetay as $news): ?>
        <div class="col-md-7">
            <a href="detay.php?id=<?=$news->id?>">
                <img class="img-fluid rounded mb-3 mb-md-0" src="<?=$news->fotograf?>">
            </a>
        </div>
        <div class="col-md-5">
            <h3><?=$news->title?></h3>
            <p><?=$news->aciklama?></p>
            <a class="btn btn-primary" href="detay.php?id=<?=$news->id?>">Devamını Oku
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
        <?php endforeach;?>
        <hr>
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

</div>
<!-- /.container -->
<?php require_once "view/_footer.php"; ?>
