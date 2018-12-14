<!-- Modal -->
<div class="modal fade" id="addThesis" tabindex="-1" role="dialog" aria-labelledby="addThesisLabel" aria-hidden="true">
<form class="form-horizontal form-without-legend" role="form" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="addThesisloginAdministradorLabel">Agregar tesis</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-without-legend" role="form" method="post">
            <div class="form-group">
                <label for="addThesisName" class="col-lg-4 control-label">Nombre de tesis <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="addThesisName" name="addThesisName" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="addThesisTopic" class="col-lg-4 control-label">Tema Central: <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="addThesisTopic" name="addThesisTopic" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="addThesisPlaza" class="col-lg-4 control-label">Alumnos requeridos: <span class="require">*</span></label>
                <div class="col-lg-8">
                  <select class="form-control" id="addThesisPlaza" name="addThesisPlaza" required="required">
                    <option value="1">Uno</option>
                    <option value="2">Dos</option>
                    <option value="3">Tres</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label for="addThesisProfile" class="col-lg-4 control-label">Perfil de Estudiante: <span class="require">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control" id="addThesisTopic" name="addThesisProfile" required="required">
                      <option value="1">Ingenieria en Telematica</option>
                      <option value="2">Ingenieria de Software</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="addThesisSupport" class="col-lg-4 control-label">Tipo de apoyo: <span class="require">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control" id="addThesisSupport" name="addThesisSupport" required="required">
                      <option value="1">N/A</option>
                      <option value="2">Equipo de cómputo, materiales y espacio de trabajo</option>
                      <option value="3">Equipo de cómputo y materiales</option>
                      <option value="4">Equipo de cómputo</option>
                      <option value="5">PRODEP</option>
                      <option value="7">Movilidad</option>
                      <option value="8">Espacio de trabajo</option>
                      <option value="9">Beca</option>
                      <option value="10">Pago de publicaciones</option>
                      <option value="11">Materiales</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="addThesisAgency" class="col-lg-4 control-label">Institución financiadora: <span class="require">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control" id="addThesisAgency" name="addThesisAgency" required="required">
                      <option value="1">N/A</option>
                      <option value="2">PRODEP</option>
                      <option value="3">Universidad de Colima</option>
                      <option value="4">CONACYT</option>
                      <option value="5">Empresa privada</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="addThesisSummary" class="col-lg-4 control-label">Resumen: <span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea class="form-control" id="addThesisSummary" name="addThesisSummary" required="required" rows="8" cols="80"></textarea>
                </div>
            </div>

      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLoginAdmin">Agregar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</form>
</div>
