<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Lojas
      </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Loja</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/stores/<?php echo htmlspecialchars( $store["idstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="desstore">Nome da Loja</label>
                  <input type="text" class="form-control" id="desstore" name="desstore" placeholder="Digite o nome da categoria" value="<?php echo htmlspecialchars( $store["desstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="form-group">
                  <label for="file">Foto</label>
                  <input type="file" class="form-control" id="file" name="file" value="/res/site/img/<?php echo htmlspecialchars( $store["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <div class="box box-widget">
                    <div class="box-body" style="width: 300px;height: 300px;">
                      <img class="img-responsive" id="image-preview" src="/res/site/img/logo/<?php echo htmlspecialchars( $store["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo" onerror="this.onerror=null; this.src='/res/site/img/logo/logo.jpg'">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>
          </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->