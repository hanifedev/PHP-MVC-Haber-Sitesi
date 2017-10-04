<?php 
class Admin extends Connection{
	/*public function getAllCategories(){
		$kategoriler = $this->con->query("SELECT * FROM kategoriler")->fetchAll(PDO::FETCH_OBJ);
		return $kategoriler;
	}

	public function getCategory($catId){
		$get = $this->con->query("SELECT * from kategoriler WHERE id=".$catId)->fetch(PDO::FETCH_ASSOC);
		return $get;
	}*/

	public function onayBekleyenYorumlar(){
        $get = $this->con->query("SELECT * FROM yorumlar WHERE onay = '0'")->fetchAll(PDO::FETCH_OBJ);
        return $get;
    }

    public function yorumOnayla($yorum_id)
    {
        $onayla = $this->con->prepare("UPDATE yorumlar SET onay=? WHERE id=?");
        $control = $onayla->execute(array('1', $yorum_id));
        if ($control)
            return true;
        else
            return false;
    }

	public function addPicture($picture){
        $uzanti = array('image/jpeg', 'image/png', 'image/jpg', 'image/x-png', 'image/gif');
        $dizin = "images";
        if(in_array($_FILES["fotograf"]["type"],$uzanti)){
            move_uploaded_file($_FILES['fotograf']['tmp_name'],"./$dizin/{$_FILES['fotograf']['name']}");
            $ekle = $this->con->prepare("INSERT INTO haberler (fotograf) VALUES (?)");
            $add = $ekle->execute(array($picture));
            return $add;
        }
        else{
            return false;
        }
    }

	public function addContent($baslik,$kategori,$aciklama,$metin,$fotograf=""){
	    $add = $this->con->prepare("INSERT INTO haberler (title ,aciklama,content,category_id,fotograf) VALUES (?,?,?,?,?)");
	    $isadded = $add->execute(array($baslik,$aciklama,$metin,$kategori,$fotograf));
	    if($isadded)
	        return $isadded;
	    else
	        return false;
    }

	public function editCategory($catId, $catName){
		$edit = $this->con->prepare("UPDATE kategoriler SET title=? WHERE id=?");
		$control = $edit->execute(array($catName,$catId));
		if($control)
		    return true;
		else
            return false;
	}

	public function addCategory($catName){
		$add = $this->con->prepare("INSERT INTO kategoriler (title) VALUES (?)");
		$control = $add->execute(array($catName));
		if($control)
			return $control;
		else
		    return false;
	}

	public function deleteCategory($catId){
		$delete = $this->con->exec("DELETE FROM kategoriler WHERE id=".$catId);
		if($delete)
			return true;
		else
		    return false;
	}

	public function deleteContent($cntId){
        $delete = $this->con->exec("DELETE FROM haberler WHERE id=".$cntId);
        if($delete)
            return true;
        else
            return false;
    }

    public function deleteComment($cmtId){
	    $delete = $this->con->exec("DELETE FROM yorumlar WHERE id=".$cmtId);
	    if($delete)
	        return true;
	    else
	        return false;
    }
}