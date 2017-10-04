<?php
class Connection{
    //veritabanı bağlantısı için gereken bilgiler
    protected $con;
    private $host = "localhost";
    private $dbname = "2017_habersitesi";
    private $username = "root";
    private $password = "1234";

    //obje ayağa kaldırılırken çalıştırılan method

    function __construct()
    {
        try
        {
            $this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8", $this->username,$this->password);
        }
        catch(PDOException $e)
        {
            die("Veritabanına bağlantı sağlanamadı.". $e->getMessage());
        }
    }
}