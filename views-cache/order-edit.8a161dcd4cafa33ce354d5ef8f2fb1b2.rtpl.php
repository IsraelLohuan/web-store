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
              <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Status do Pedido</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="http://localhost/store-web/admin/order/edit/<?php echo htmlspecialchars( $order_id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="box-body">
                <div class="form-group">

                    <label>Novo Status</label>
                    <select class="form-control select2" style="width: 100%;" id="status_pedido_id" name="status_pedido_id">
                        <?php $counter1=-1;  if( isset($status) && ( is_array($status) || $status instanceof Traversable ) && sizeof($status) ) foreach( $status as $key1 => $value1 ){ $counter1++; ?>

                            <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $status_id_atual == $value1["id"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>

                    </select>
                    
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Atualizar</button>
              </div>
            </form>
          </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->