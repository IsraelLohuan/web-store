<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Pedidos
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
                        <th>Valor Total</th>
                        <th>Data Cadastro</th>
                        <th>Cliente</th>
                        <th>Status Atual</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>

                      <tr>
                        <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>R$ <?php echo htmlspecialchars( $value1["valor_total"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["data_cadastro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["cliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                          <a href="./order/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Atualizar Status do Pedido</a>
                          <a href="./order/address/<?php echo htmlspecialchars( $value1["endereco_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Endereco para Entrega</a>
                          <a href="./order/delete/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                        </td>
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