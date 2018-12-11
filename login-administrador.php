<!-- Modal -->
<div class="modal fade" id="loginAdministrador" tabindex="-1" role="dialog" aria-labelledby="loginAdministradorLabel" aria-hidden="true">
<form class="form-horizontal form-without-legend" role="form" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="loginAdministradorLabel">Iniciar sesión como Administrador</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-without-legend" role="form" method="post">
            <div class="form-group">
                <label for="emailAdmin" class="col-lg-4 control-label">Correo electrónico <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="email" class="form-control" id="emailAdmin" name="emailAdmin" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="passwordAdmin" class="col-lg-4 control-label">Contraseña <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" class="form-control" id="passwordAdmin" name="passwordAdmin" required="required">
                </div>
            </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLoginAdmin">Iniciar sesión</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>


      </div>
    </div>
  </div>
</form>
</div>
