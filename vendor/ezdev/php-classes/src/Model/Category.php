<?php

namespace Ezdev\Model;

use \Ezdev\DB\Sql;
use \Ezdev\Model;

class Category extends Model
{

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT DISTINCT tab1.*, tab3.idstore FROM tb_categories tab1
        INNER JOIN tb_menuscategories tab2
        ON tab1.idcategory = tab2.idcategory
        INNER JOIN tb_menus tab3
        ON tab2.idmenu = tab3.idmenu");

    }

    public static function listByStore($idstore)
    {

        $sql = new Sql();

        return $sql->select("SELECT DISTINCT tab1.* FROM tb_categories tab1
        INNER JOIN tb_menuscategories tab2
        ON tab1.idcategory = tab2.idcategory
        INNER JOIN tb_menus tab3
        ON tab2.idmenu = tab3.idmenu
        WHERE tab3.idstore = :idstore", array(
            ":idstore"=>$idstore
        ));
        
    }

    public function save()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(
            ":idcategory" => $this->getidcategory(),
            ":descategory" => $this->getdescategory()
        ));

        $this->setData($results[0]);

        //Category::updateFile();

    }

    public function get($idcategory)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", array(
            ":idcategory"=>$idcategory
        ));

        $this->setData($results[0]);

    }

    public function delete()
    {
        
        $sql = new Sql();

        $sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
            ":idcategory"=>$this->getidcategory()
        ]);

        //Category::updateFile();

    }

    public static function updateFile()
    {

        $categories = Category::listAll();

        $html = [];
        
        foreach ($categories as $row) {
            array_push($html, '<li><a href="/categories/'.$row['idcategory'].'">'.$row['descategory'].'</a></li>');
        }

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "/views/" . DIRECTORY_SEPARATOR . "categories-menu.html", implode('', $html));

    }

    public function getMenus($related = true)
    {

        $sql = new Sql();

        if($related === true)
        {
            
            return $sql->select("SELECT * FROM tb_menus WHERE idmenu IN(
                    SELECT a.idmenu FROM tb_menus a 
                    INNER JOIN tb_menuscategories b 
                    ON a.idmenu = b.idmenu 
                    WHERE b.idcategory = :idcategory);
                 ", [
                     ":idcategory"=>$this->getidcategory()
                 ]);

        }
        else
        {

            return $sql->select("SELECT * FROM tb_menus WHERE idmenu NOT IN(
                SELECT a.idmenu FROM tb_menus a 
                INNER JOIN tb_menuscategories b 
                ON a.idmenu = b.idmenu 
                WHERE b.idcategory = :idcategory);
                ", [
                     ":idcategory"=>$this->getidcategory()
                 ]);

        }

    }
   

    public function addMenu(Menu $menu)
    {

        $sql = new Sql();

        $sql->query("INSERT INTO tb_menuscategories (idcategory, idmenu) VALUES (:idcategory, :idmenu)", [
            ":idcategory"=>$this->getidcategory(),
            ":idmenu"=>$menu->getidmenu()
        ]);

    }

    public function removeMenu(Menu $menu)
    {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_menuscategories WHERE idcategory = :idcategory AND idmenu = :idmenu", [
            ":idcategory"=>$this->getidcategory(),
            ":idmenu"=>$menu->getidmenu()
        ]);

    }    

    public static function getPage($page = 1, $itemsPerPage = 12)
    {

        $start = ($page-1) * $itemsPerPage;

        $sql = new Sql();
        

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
        FROM tb_categories ORDER BY descategory
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
        FROM tb_categories 
		WHERE descategory LIKE :search
		ORDER BY descategory
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
