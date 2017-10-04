<?php
class User extends Connection{
    public function getAllUsers(){
        $users = $this->con->query("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    public function getOneUser($userId){
        $user = $this->con->query("SELECT * FROM users WHERE user_id=".$userId)->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function registerUser($username,$password,$email,$fullname,$yetki=0){
        $isThereUser = $this->con->prepare("SELECT * FROM users WHERE username=:username OR email=:email LIMIT 1");
        $isThereUser->execute(array(':username'=>$username, ':email'=>$email));
        if($isThereUser->rowCount()>0){
            return false;
        }
        else{
            $userRegister = $this->con->prepare("INSERT INTO users(username,password,email,fullname,yetki) VALUES (:username,:password,:email,:fullname,:yetki)");
            $userRegister->bindParam(":username", $username);
            $userRegister->bindParam(":password", $password);
            $userRegister->bindParam(":email", $email);
            $userRegister->bindParam(":fullname", $fullname);
            $userRegister->bindParam(":yetki", $yetki);
            $userRegister->execute();
        }
        return $userRegister;
    }

    public function userUpdate($userId,$username,$email,$fullname,$yetki=0){
        $edit = $this->con->prepare("UPDATE users SET username=?, email=?, fullname=? yetki=? WHERE user_id=".$userId);
        $cntrl = $edit->execute(array($username,$email,$fullname,$yetki));
        if($cntrl){
            return true;
        }
        return false;
    }

    public function userDelete($userId){
        $del = $this->con->exec("DELETE FROM users WHERE user_id=".$userId);
        if($del){
            return true;
        }
        return false;
    }

    public function login($username,$password)
    {
        $isThereUser = $this->con->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
        $isThereUser->execute(array(':username' => $username));
        $userRow = $isThereUser->fetch(PDO::FETCH_ASSOC);
        if ($isThereUser->rowCount() > 0) {
            if (password_verify($password, $userRow['password'])) {
                session_start();
                $_SESSION['user_id'] = $userRow['user_id'];
                    return true;
                }
                else {
                    return false;
                }
            }
    }

    public function redirect($url){
        header("Location: $url");
        exit;
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }
    }

    public function logout(){
        if(isset($_SESSION['user_id'])){
            session_destroy();
            unset($_SESSION['user_id']);
        }
    }
}