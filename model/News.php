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

    public function findById($id){
        $kats = $this->con->query("SELECT * FROM kategoriler WHERE id =".$id)->fetchObject();
        return $kats;
    }

    public function getAllKats(){
        $kats = $this->con->query("SELECT * FROM kategoriler")->fetchAll(PDO::FETCH_OBJ);
        return $kats;
    }

    public function getSomeKats($startFrom = 0, $count = 6){
        $kats = $this->con->query("SELECT * FROM kategoriler LIMIT ".$startFrom ."," .$count)->fetchAll(PDO::FETCH_OBJ);
        return $kats;
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
        $posts = $this->con->query("SELECT * FROM haberler ORDER BY readcount ".$orderByAtRead." LIMIT ".$startFrom.",".$count);
        return $posts;
    }

    public function addYorum($haber_id, $yorum,$onay=0){
        $add = $this->con->prepare("INSERT INTO yorumlar (konu_id,yorum,onay) VALUES (?,?,?)");
        $isadded = $add->execute(array($haber_id,$yorum,$onay));
        if($isadded)
            return $isadded;
        return false;
    }

    public function getYorum($haber_id){
        $get = $this->con->query("SELECT * FROM yorumlar WHERE konu_id = ".$haber_id)->fetchAll(PDO::FETCH_OBJ);
        return $get;
    }

    public function orderByKat($katId){
        $posts = $this->con->query("SELECT * FROM haberler WHERE category_id = ".$katId)->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }

    public function initById($id){
        $postById = $this->con->query("SELECT * FROM haberler WHERE id =".$id)->fetchObject();
        return $postById;
    }

    public static function find($id){
        $returnObj = new self;
        return $returnObj->initById($id);
    }

    public static function all($orderBy = "FIRST"){
        $selfObj = new self;
        return $selfObj->getAllNews($orderBy);
    }

    public static function allKategories(){
        $selfObj = new self;
        return $selfObj->getAllKats();
    }

    public static function get($orderBy = "LAST", $count = 3, $startFrom = 0){
        $selfObj = new self;
        return $selfObj->getNews($orderBy,$count,$startFrom);
    }

    public static function orderKategori($katId){
        $selfObj = new self;
        return $selfObj->orderByKat($katId);
    }
}