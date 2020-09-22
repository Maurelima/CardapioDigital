<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta property="og:image" itemprop="image" content="/res/site/img/logo/thumb/thumb1.jpg">
    <title>Cardápio 82 - Todos os Pratos</title>
    <link rel="stylesheet" href="/res/cardapio/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="/res/cardapio/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient"
        style="background-color: #4b3519 !important;">
        <div class="container">
            <a class="navbar-brand logo" href="#">
                Selecione um cardápio
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!--<ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="projects-grid-cards.html">Projects</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cv.html">CV</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="hire-me.html">Hire me</a></li>
                </ul>-->
            </div>
        </div>
    </nav>
    <style>
        div.scrollmenu {
        overflow: auto;
        white-space: nowrap;
        }

        div.scrollmenu a {  
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px;
        text-decoration: none;
        }
        div.scrollmenu a:hover {        
            background: linear-gradient(240deg,#7f70f5,#0ea0ff);
        }        
        @media only screen and (max-width: 767px) {
            .scrollmenu {
                margin-top: 24px !important;
            }
        }
        @media only screen and (max-width: 575px) {
            .scrollmenu {
                margin-top: 2px !important;
            }

        }
        /* width */
        div.scrollmenu::-webkit-scrollbar {
            height: 8px;
        }

        /* Track */
        div.scrollmenu::-webkit-scrollbar-track {
            background: #f1f1f1; 
        }
        
        /* Handle */
        div.scrollmenu::-webkit-scrollbar-thumb {
            background: rgb(185, 185, 185); 
        }

        /* Handle on hover */
        div.scrollmenu::-webkit-scrollbar-thumb:hover {
            background: #888; 
        }
        #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background: linear-gradient(120deg,#7f70f5,#0ea0ff);
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
        }

        #myBtn:hover {
            background: linear-gradient(240deg,#7769e2,#0ea0ff);
        }
    </style>
    <button onclick="topFunction()" id="myBtn" title="Voltar ao topo">Subir</button>
    <main class="page projets-page">
        <section class="portfolio-block project-no-images">

            <div class="scrollmenu gradient" style="margin-top: -16px;">
                <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
                <?php if( $value1["idstore"] == 1 ){ ?>
                    <a href="#<?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                <?php } ?>
                <?php } ?>
            </div>

            <div class="container" style="margin-top: 100px;">
                <style>
                    .store-hover:hover {
                        cursor: pointer;
                        -webkit-box-shadow: 10px 10px 5px -4px rgba(128, 128, 128, 1);
                        -moz-box-shadow: 10px 10px 5px -4px rgba(128, 128, 128, 1);
                        box-shadow: 10px 10px 5px -4px rgba(128, 128, 128, 1);
                        transition: .3s;
                    }
                    @media only screen and (max-width: 600px) {
                        .store-hover {
                           
                        }
                    }                    
                </style>
                <div class="heading">
                    <div class="row">
                        <?php $counter1=-1;  if( isset($store) && ( is_array($store) || $store instanceof Traversable ) && sizeof($store) ) foreach( $store as $key1 => $value1 ){ $counter1++; ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="project-card-no-image store-hover"
                                onclick="location.href='/loja/<?php echo htmlspecialchars( $value1["idstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>';">
                                <div class="row">
                                    <div class="col-7">
                                        <h3><?php echo htmlspecialchars( $value1["desstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                                        <h4 style="font-size:15px !important;">Clique para ver o cardápio!</h4>
                                        <div class="tags"></div>
                                    </div>
                                    <div class="col-5">
                                        <img src="/res/site/img/logo/<?php echo htmlspecialchars( $value1["idstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.jpg"
                                            style="width: 100% !important;border-radius: 5px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php $counter1=-1;  if( isset($store) && ( is_array($store) || $store instanceof Traversable ) && sizeof($store) ) foreach( $store as $key1 => $value1 ){ $counter1++; ?>
                
                <h3 class="gradient" style="padding: 10px 5px 10px 10px;border-radius: 5px;">Cárdapio <?php echo htmlspecialchars( $value1["desstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3><hr><br>

                <?php $loja = $value1["idstore"]; ?>
                <?php $counter2=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key2 => $value2 ){ $counter2++; ?>

                <?php if( $loja == $value2["idstore"] ){ ?>
                
                <div class="row">
                    <div class="col-12">
                        <h3 id="<?php echo htmlspecialchars( $value2["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <?php echo htmlspecialchars( $value2["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <?php if( $value2["idcategory"] == 6 ){ ?>
                                <small class="text-muted" style="font-size: 15px !important;">&nbsp;&nbsp;Meio prato será cobrado 70% do valor</small> 
                            <?php } ?>
                            <?php if( $value2["idcategory"] == 16 ){ ?>
                                <small class="text-muted" style="font-size: 15px !important;">&nbsp;&nbsp;Meio prato será cobrado 70% do valor</small> 
                            <?php } ?>
                        </h3>   
                            <?php if( $value2["idcategory"] == 5 ){ ?>
                                <small class="text-muted" style="margin-left: 3px;">De Segunda a Sexta ( Almoço )&nbsp; - Exceto feriados e finais de semana</small> 
                            <?php } ?>
                            <?php if( $value2["idcategory"] == 3 ){ ?>
                                <small class="text-muted" style="margin-left: 3px;">De Segunda a Sexta ( Almoço )&nbsp; - Exceto feriados e finais de semana</small> 
                            <?php } ?>
                            <?php if( $value2["idcategory"] == 2 ){ ?>
                                <small class="text-muted" style="margin-left: 3px;">De Segunda a Sexta ( Almoço )&nbsp; - Exceto feriados e finais de semana</small> 
                            <?php } ?>
                        <br>                     
                        <br>
                    </div>
                    <?php $idcategory = $value2["idcategory"]; ?>
                    <?php $counter3=-1;  if( isset($menus) && ( is_array($menus) || $menus instanceof Traversable ) && sizeof($menus) ) foreach( $menus as $key3 => $value3 ){ $counter3++; ?>
                    <?php if( $value3["idstore"] == $loja ){ ?>
                    <?php if( $idcategory == $value3["idcategory"] ){ ?>
                    <div class="col-md-6 col-lg-6">
                        <div class="project-card-no-image">
                            <div class="row">
                                <div class="col-8">
                                    <h3><?php echo htmlspecialchars( $value3["desmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                                    <h4 style="font-size:15px !important;"><?php echo htmlspecialchars( $value3["descompossition"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                                    <a role="button" href="#">R$<?php echo formatPrice($value3["vlprice"]); ?></a>
                                    <div class="tags"></div>
                                </div>
                                <div class="col-4" style="max-height: 200px !important;">
                                    <img src="/res/site/img/<?php echo htmlspecialchars( $value3["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                        style="width: 100% !important;border-radius: 5px;max-height: 200px;">
                                </div> 
                                <div class="col-12">
                                    <?php if( $idcategory == 5 ){ ?>
                                      <small class="text-muted">De Segunda a Sexta ( Almoço )&nbsp; - Exceto feriados e finais de semana</small> 
                                    <?php } ?>
                                    <?php if( $idcategory == 3 ){ ?>
                                      <small class="text-muted">De Segunda a Sexta ( Almoço )&nbsp; - Exceto feriados e finais de semana</small> 
                                    <?php } ?>
                                    <?php if( $idcategory == 2 ){ ?>
                                      <small class="text-muted">De Segunda a Sexta ( Almoço )&nbsp; - Exceto feriados e finais de semana</small> 
                                    <?php } ?>
                                    <?php if( $idcategory == 6 ){ ?>
                                      <small class="text-muted">Meio prato será cobrado 70% do valor</small> 
                                    <?php } ?>
                                    <?php if( $idcategory == 16 ){ ?>
                                      <small class="text-muted">Meio prato será cobrado 70% do valor</small> 
                                    <?php } ?>
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    <?php } ?>
                </div><br><br><br>

                <?php } ?>

                <?php } ?>

                <?php } ?>
            </div>
        </section>
    </main>