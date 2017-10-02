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
        $get = $this->con->query("SELECT * FROM yorumlar WHERE onay = 0")->fetchAll(PDO::FETCH_OBJ);
        return $get;
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
    }

	public function addContent($title,$aciklama,$content,$category_id){
	    $add = $this->con->prepare("INSERT INTO haberler (title,aciklama,content,category_id) VALUES (?,?,?,?)");
	    $isadded = $add->execute(array($title,$aciklama,$content,$category_id));
	    if($isadded)
	        return $isadded;
	    return false;
    }

	public function editCategory($catId, $catName){
		$edit = $this->con->prepare("UPDATE kategoriler SET title=? WHERE id=?");
		$control = $edit->execute(array($catName,$catId));
		if($control){
		    return true;
        }
        return false;
	}

	public function addCategory($catName){
		$add = $this->con->prepare("INSERT INTO kategoriler (title) VALUES (?)");
		$control = $add->execute(array($catName));
		if($control)
			return $control;
		return false;
	}

	public function deleteCategory($catId){
		$delete = $this->con->exec("DELETE FROM kategoriler WHERE id=".$catId);
		if($delete)
			return true;
		return false;
	}
}