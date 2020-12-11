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
              <h3 class="box-title">Endereco de Entrega</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="form-group">
                  <label for="desperson">Rua</label>
                  <input type="text" class="form-control"  value="<?php echo htmlspecialchars( $endereco["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="nrphone">Logradouro</label>
                    <input type="tel" class="form-control" value="<?php echo htmlspecialchars( $endereco["logradouro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                  </div>
                <div class="form-group">
                  <label for="deslogin">Cidade</label>
                  <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="nrphone">Bairro</label>
                  <input type="tel" class="form-control" value="<?php echo htmlspecialchars( $endereco["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="desemail">CEP</label>
                  <input type="email" class="form-control" value="<?php echo htmlspecialchars( $endereco["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="desemail">Numero</label>
                    <input type="email" class="form-control" value="<?php echo htmlspecialchars( $endereco["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                </div>
              </div>
          </div>
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->