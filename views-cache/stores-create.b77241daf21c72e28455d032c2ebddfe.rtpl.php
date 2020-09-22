<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Lojas
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/categories">Lojass</a></li>
        <li class="active"><a href="/admin/categories/create">Cadastrar</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Nova Loja</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/stores/create" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="desstore">Nome da Loja</label>
                  <input type="text" class="form-control" id="desstore" name="desstore" placeholder="Digite o nome da loja">
                </div>
                <div class="form-group">
                  <label for="file">Logo</label>
                  <input type="file" class="form-control" id="file" name="file">
                  <div class="box box-widget">
                    <div class="box-body" style="width: 300px;height: 300px;">
                      <img class="img-responsive" id="image-preview" src="/res/site/img/logo/logo.jpg" alt="Photo" onerror="this.onerror=null; this.src='/res/site/img/logo/logo.jpg'">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Cadastrar</button>
              </div>
            </form>
          </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->