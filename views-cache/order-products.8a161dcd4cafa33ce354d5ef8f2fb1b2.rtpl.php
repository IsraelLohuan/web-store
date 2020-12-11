<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Itens do Pedido
      </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary">
                
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Desconto</th>
                        <th>Quantidade</th>
                        <th>Valor Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>R$ <?php echo formatPrice($value1["preco"]); ?></td>
                        <td>R$ <?php echo formatPrice($value1["desconto"]); ?></td>
                        <td><?php echo htmlspecialchars( $value1["quantidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>R$ <?php echo formatPrice($value1["preco"] - $value1["desconto"] * $value1["quantidade"]); ?></td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                    <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                    <?php } ?>

                  </ul>
                </div>
              </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->