<?php 

use \Ezdev\PageAdmin;
use \Ezdev\Model\User;
use \Ezdev\Model\Category;
use \Ezdev\Model\Menu;

$app->get("/admin/categories", function(){

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$qtdcategories = (isset($_GET['qtdcategories']) && $_GET['qtdcategories'] !== '') ? (int)$_GET['qtdcategories'] : 10;
	if($qtdcategories === 0){
		$qtdcategories = 10;
	}

	if ($search != ''){

		$pagination = Category::getPageSearch($search, $page, $qtdcategories);

	} else {

		$pagination = Category::getPage($page, $qtdcategories);

	}	

	$pages = [];

	for($x = 0; $x < $pagination['pages']; $x++){

		array_push($pages, [
			'href'=>'/admin/categories?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search,
				'qtdcategories'=>$qtdcategories
			]),
			'text'=>$x+1
		]);

	}

	$page = new PageAdmin();	

	$page->setTpl("categories", [
		"categories" => $pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"qtdcategories"=>$qtdcategories
	]);

});

$app->get("/admin/categories/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();	

	$page->setTpl("categories-create");

});

$app->post("/admin/categories/create", function(){

	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
	exit;

});

$app->get("/admin/categories/:idcategory/delete", function($idcategory){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header("Location: /admin/categories");
	exit;

});

$app->get("/admin/categories/:idcategory", function($idcategory){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)($idcategory));

	$page = new PageAdmin();	

	$page->setTpl("categories-update", [
		"category"=>$category->getValues()
	]);

});

$app->post("/admin/categories/:idcategory", function($idcategory){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");

	exit;

});


$app->get("/admin/categories/:idcategory/menus", function($idcategory){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)($idcategory));

	$page = new PageAdmin();

	$page->setTpl("categories-menus", [
		"category"=>$category->getValues(),
		"menusRelated"=>$category->getmenus(),
		"menusNotRelated"=>$category->getmenus(false)
	]);

});

$app->get("/admin/categories/:idcategory/menus/:idmenu/add", function($idcategory, $idmenu){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)($idcategory));	

	$menu = new Menu();

	$menu->get((int)($idmenu));

	$category->addMenu($menu);

	header("Location: /admin/categories/".$idcategory."/menus");
	exit;

});

$app->get("/admin/categories/:idcategory/menus/:idmenu/remove", function($idcategory, $idmenu){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)($idcategory));

	$menu = new Menu();

	$menu->get((int)($idmenu));

	$category->removeMenu($menu);

	header("Location: /admin/categories/".$idcategory."/menus");
	exit;

});

?>