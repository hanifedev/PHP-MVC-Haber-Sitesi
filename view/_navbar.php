<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php foreach($getKat as $kat): ?>
                <li class="nav-item">
                    <a class="nav-link" href="kategoriDetay.php?id=<?=$kat->id?>"><?=$kat->title?></a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</nav>