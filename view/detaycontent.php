<?php require_once "view/_header.php"; ?>
<?php require_once "view/_navbar.php"; ?>
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
            <!-- Title -->
            <br>
            <h1><?=$haber->title?></h1>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?=date('d-m-Y H:i:s', strtotime($haber->created_at));?></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="<?=$haber->fotograf?>" style="width:70%;">

    <hr>

    <!-- Post Content -->
    <p class="lead"><?=$haber->content?></p>
    <hr>
    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form" method="post">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="yorum"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    <div class="media">

        <div class="media-body">
            <?php foreach($yorumlar as $yrm): ?>
                <h5 class="media-heading">Anonim</h5>
                <img src="http://placehold.it/64x64"/>
                <?=$yrm->yorum?>
            <?php endforeach; ?>
        </div>
    </div>


    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <br>
            <h4>Haber Ara</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i>                            </button></span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <br>
            <h4>Kategoriler</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php foreach ($getKat as $kategori): ?>
                        <li><a href="#"><?=$kategori->title?></a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

    </div>

    </div>
    <!-- /.row -->
    <hr>
</div>
<?php require_once "view/_footer.php"; ?>
