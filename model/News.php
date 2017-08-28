<?php
class News extends Connection{

    public function getNews($orderBy = "LAST", $count = 3, $startFrom = 0){
        if($orderBy == "LAST")
        {
            $orderByAtQuery = "DESC";
        }
        elseif($orderBy == "FIRST")
        {
            $orderByAtQuery = "ASC";
        }
        else
        {
            $orderByAtQuery = "DESC";
        }
        $count = (int)$count;
        $startFrom = (int)$startFrom;
        $posts = $this->con->query("SELECT * FROM haberler ORDER BY created_at ".$orderByAtQuery." LIMIT ".$startFrom.",".$count)->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    public function getAllNews($orderBy = "FIRST"){
        if($orderBy==="FIRST") $orderByAtQuery = "ASC";
        elseif($orderBy==="LAST") $orderByAtQuery = "DESC";
        else $orderByAtQuery = "DESC";
        $posts = $this->con->query("SELECT * FROM haberler ORDER BY created_at ".$orderByAtQuery)->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    public function orderByRead($orderBy = "FIRST" , $count = 4, $startFrom = 0){
        if($orderBy === "FIRST") $orderByAtRead = "ASC";
        elseif($orderBy === "LAST") $orderByAtRead = "DESC";
        else $orderByAtRead = "DESC";
        $count = (int)$count;
        $startFrom = (int)$startFrom;
        $posts = $this->con->query("SELECT * FROM haberler ORDER BY readcount ".$orderByAtRead." LIMIT ".$startFrom.",".$count)->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    public function orderByKat($katId = 1){
        $katId = (int)$katId;
        $posts = $this->con->query("SELECT * FROM haberler WHERE category_id = ".$katId)->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    public static function all($orderBy = "FIRST"){
        $selfObj = new self;
        return $selfObj->getAllNews($orderBy);
    }

    public static function get($orderBy = "LAST", $count = 3, $startFrom = 0){
        $selfObj = new self;
        return $selfObj->getNews($orderBy,$count,$startFrom);
    }

    public static function orderRead($orderBy = "FIRST", $count = 4, $startFrom = 0){
        $selfObj = new self;
        return $selfObj->orderByRead($orderBy,$count,$startFrom);
    }

    public static function orderKategori($katId = 1){
        $selfObj = new self;
        return $selfObj->orderByKat($katId);
    }
}