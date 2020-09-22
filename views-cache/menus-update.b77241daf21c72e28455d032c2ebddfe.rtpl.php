<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Pratos
      </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Pratos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/menus/<?php echo htmlspecialchars( $menu["idmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="desmenu">Nome do Prato</label>
                  <input type="text" class="form-control" id="desmenu" name="desmenu" placeholder="Digite o nome do prato" value="<?php echo htmlspecialchars( $menu["desmenu"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="form-group">
                    <label>Loja</label>
                    <select class="form-control" name="idstore">
                      <?php $counter1=-1;  if( isset($stores) && ( is_array($stores) || $stores instanceof Traversable ) && sizeof($stores) ) foreach( $stores as $key1 => $value1 ){ $counter1++; ?>               
                        <?php if( $value1["idstore"] == $menu["idstore"] ){ ?>
                            <option value="<?php echo htmlspecialchars( $value1["idstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" selected="selected"><?php echo htmlspecialchars( $value1["idstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["desstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo htmlspecialchars( $value1["idstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["desstore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                      <?php } ?>                     
                    </select>
                  </div>
                <div class="form-group">
                  <label for="vlprice">Preço</label>
                  <input type="number" class="form-control" id="vlprice" name="vlprice" step="0.01" placeholder="0.00" value="<?php echo htmlspecialchars( $menu["vlprice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" id="descompossition" name="descompossition" rows="3" placeholder="Description..."><?php echo htmlspecialchars( $menu["descompossition"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                </div>
                <div class="form-group">
                  <label for="file">Foto</label>
                  <input type="file" class="form-control" id="file" name="file" value="/res/site/img/<?php echo htmlspecialchars( $menu["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <div class="box box-widget">
                    <div class="box-body" style="width: 300px;height: 300px;">
                      <img class="img-responsive" id="image-preview" src="/res/site/img/<?php echo htmlspecialchars( $menu["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo" onerror="this.onerror=null; this.src='/res/site/img/product.jpg'">
                    </div>
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
    <script>
    document.querySelector('#file').addEventListener('change', function(){
      
      var file = new FileReader();
    
      file.onload = function() {
        
        document.querySelector('#image-preview').src = file.result;
    
      }
    
      file.readAsDataURL(this.files[0]);
    
    });
    </script>