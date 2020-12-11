<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Produtos
      </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Produto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="http://localhost/store-web/admin/product/edit/<?php echo htmlspecialchars( $product["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="desperson">Titulo</label>
                  <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="<?php echo htmlspecialchars( $product["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                </div>
                <div class="form-group">
                    <label for="desperson">Descricao</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descricao" value="<?php echo htmlspecialchars( $product["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                </div>
                <div class="form-group">
                  <label for="desperson">Valor</label>
                  <input type="text" class="form-control" id="preco" name="preco" placeholder="Valor" value="<?php echo htmlspecialchars( $product["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                </div>
                <div class="form-group">
                    <label for="desperson">Desconto</label>
                    <input type="text" class="form-control" id="desconto" name="desconto" placeholder="Desconto" value="<?php echo htmlspecialchars( $product["desconto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                </div>
                <div class="form-group">
                  <label for="desperson">URL (Imagem do Produto)</label>
                  <input type="text" class="form-control" id="url_image" name="url_image" placeholder="URL"  value="<?php echo htmlspecialchars( $product["url_image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                </div>
                <label for="desperson">Categoria</label>
                <select class="form-control select2" style="width: 100%;" id="produto_categoria_id" name="produto_categoria_id">
                  <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>

                      <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $product["produto_categoria_id"] == $value1["id"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>

               </select>
                <div class="checkbox">
                    <label>
                      <input type="checkbox" name="destaque" id="destaque" value="1" <?php if( $product["destaque"] == 1 ){ ?>checked<?php } ?>> Produto Em Destaque
                    </label>
                  </div>
                <div class="checkbox">
                    <label>
                      <input type="checkbox" name="masculino" id="masculino" value="1" <?php if( $product["masculino"] == 1 ){ ?>checked<?php } ?>> Produto Masculino
                    </label>
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