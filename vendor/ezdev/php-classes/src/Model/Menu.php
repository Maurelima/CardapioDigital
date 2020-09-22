<?php

namespace Ezdev\Model;

use \Ezdev\DB\Sql;
use \Ezdev\Model;

class Menu extends Model
{

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT tab1.*, tab2.idcategory FROM tb_menus tab1
        INNER JOIN tb_menuscategories tab2
        ON tab1.idmenu = tab2.idmenu");

    }

    public static function listByStore($idstore)
    {

        $sql = new Sql();

        return $sql->select("SELECT tab1.*, tab2.idcategory FROM tb_menus tab1
        INNER JOIN tb_menuscategories tab2
        ON tab1.idmenu = tab2.idmenu
        WHERE idstore = :idstore", array(
            "idstore"=>$idstore
        ));
        
    }


    public function save()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_menus_save(:idmenu, :idstore, :desmenu, :descompossition, :vlprice, :desurl, :desphoto)", array(
            ":idmenu"=>$this->getidmenu(),
            ":idstore"=>$this->getidstore(),
            ":desmenu"=>$this->getdesmenu(),
            ":descompossition"=>$this->getdescompossition(),
            ":vlprice"=>$this->getvlprice(),
            ":desurl"=>$this->getdesurl(),
            ":desphoto"=>$this->getdesphoto()
        ));

        $this->setData($results[0]);


    }

    public function get($idmenu)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_menus WHERE idmenu = :idmenu", array(
            ":idmenu"=>$idmenu
        ));

        $this->setData($results[0]);

    }

    public function delete()
    {
        
        $sql = new Sql();

        $sql->query("DELETE FROM tb_menus WHERE idmenu = :idmenu", [
            ":idmenu"=>$this->getidmenu()
        ]);


    }


    public function getValues()
    {


        $values = parent::getValues();

        return $values;

    }

    public function updateDesphoto()
    {
        
        $sql = new Sql();

        $sql->query("UPDATE tb_menus SET desphoto = :desphoto WHERE idmenu = :idmenu", [
            ":idmenu"=>$this->getidmenu(),
            ":desphoto"=>$this->getidmenu().'.jpg'
        ]);


    }

    public function setPhoto($file)
    {

        $extension = explode('.',$file['name']);
        $extension = end($extension);

        switch($extension){

            case "jpg":
            case "jpeg":
                $image = imagecreatefromjpeg($file["tmp_name"]);
            break;

            case "gif":
                $image = imagecreatefromgif($file["tmp_name"]);
            break;

            case "png":
                $image = imagecreatefrompng($file["tmp_name"]);
            break;

            case "webp":
                $image = imagecreatefromwebp($file["tmp_name"]);
            break;

        }

        $dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
        "res" . DIRECTORY_SEPARATOR . 
        "site" . DIRECTORY_SEPARATOR . 
        "img" . DIRECTORY_SEPARATOR .
        $this->getidmenu() . ".jpg";

        $this->updateDesphoto();

        imagejpeg($image, $dist);

        imagedestroy($image);


    }

    public function getFromURL($desurl)
    {

        $sql = new Sql();

        $rows = $sql->select("SELECT * FROM tb_menus WHERE desurl = :desurl LIMIT 1", [
            ":desurl"=>$desurl
        ]);

        $this->setData($rows[0]);

    }

    public function getCategories()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_categories a INNER JOIN tb_menuscategories b ON a.idcategory = b.idcategory WHERE b.idproduct = :idproduct", [
            ':idproduct'=>$this->getidproduct()
        ]); 


    }

    public static function getPage($page = 1, $itemsPerPage = 12)
    {

        $start = ($page-1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
        FROM tb_menus ORDER BY desmenu
        LIMIT $start, $itemsPerPage;");

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

	}
	

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 12)
    {

        $start = ($page-1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
        FROM tb_menus
		WHERE desmenu LIKE :search
		ORDER BY desmenu
        LIMIT $start, $itemsPerPage;", [
			':search'=>'%'.$search.'%'
		]);

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }


}
