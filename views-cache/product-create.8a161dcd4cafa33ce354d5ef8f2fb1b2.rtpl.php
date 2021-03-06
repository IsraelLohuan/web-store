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
              <h3 class="box-title">Adicionar Produto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="http://localhost/store-web/admin/product/create" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="desperson">Titulo</label>
                  <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required>
                </div>
                <div class="form-group">
                    <label for="desperson">Descricao</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descricao"  required>
                </div>
                <div class="form-group">
                  <label for="desperson">Valor</label>
                  <input type="text" class="form-control" id="preco" name="preco" placeholder="Valor" required>
                </div>
                <div class="form-group">
                    <label for="desperson">Desconto</label>
                    <input type="text" class="form-control" id="desconto" name="desconto" placeholder="Desconto"  required>
                </div>
                <div class="form-group">
                  <label for="desperson">URL (Imagem do Produto)</label>
                  <input type="text" class="form-control" id="url_image" name="url_image" placeholder="URL" required>
                </div>
                <label for="desperson">Categoria</label>
                <select class="form-control select2" style="width: 100%;" id="produto_categoria_id" name="produto_categoria_id">
                  <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>

                      <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>

               </select>
                <div class="checkbox">
                    <label>
                      <input type="checkbox" name="destaque" id="destaque" value="0"> Produto Em Destaque
                    </label>
                  </div>
                <div class="checkbox">
                    <label>
                      <input type="checkbox" name="masculino" id="masculino" value="0"> Produto Masculino
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