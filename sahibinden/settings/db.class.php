<?php
//Buraya dokunmayın

class db{
    protected static $db;

    public function __construct(){
        try{
            include('router.php');
            self::$db = new PDO($dsn, $user, $password);
            self::$db->exec("SET NAMES utf8");
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exception)
        {
            print $exception->getMessage();
        }
    }

    public function getIlList(){
        $data=array();
        $query = self::$db->query("SELECT DISTINCT il from ilceler", PDO::FETCH_ASSOC);
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["il"];
            }
        }
        echo json_encode($data);
    }

    public function getIlceList($il){
        $data=array();
        $query = self::$db->prepare("SELECT DISTINCT ilce FROM ilceler WHERE il=:il");
        $query->execute(array(":il"=>$il));
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["ilce"];
            }
        }
        echo json_encode($data);
    }
}
?>