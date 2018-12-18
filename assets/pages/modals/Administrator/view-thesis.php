<link rel="stylesheet" href="assets/pages/css/modal.css">
<!-- Modal -->
<div class="modal fade" onshow="enaledEdit()" id="thesisAdministrador" tabindex="-1" role="dialog" aria-labelledby="thesisAdministradorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="thesisAdministradorLabel">Tesis # <span id="thesisID"></span></h5>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <div class="row margin-bottom-10 margin-top-10">
                          <button type="button" id="view" class="btn btn-warning" style="float:right; margin-right: 10%" onclick="editable()">
                            <span class="glyphicon glyphicon-pencil"></span>
                          </button>
                            <div class="col-lg-4 col-lg-offset-4 gallery-item">
                                <a><img id="thesis_picture" class="img-responsive"></a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><h5><a href="">Nombre:</a></h5></td>
                    <td> <textarea id="thesis_name" name="name" class="form form-control" rows="2" cols="20"></textarea> </td>
                </tr>
                <tr>
                    <td width="34%"><h5><a href="">Tema Central:</a></h5></td>
                    <td><input type="text" name="topic" class="form form-control" id="central_topic"></td>
                </tr>
                <tr>
                    <td><h5><a href="">Perfil de Estudiante:</a></h5></td>
                    <td><select class="form form-control" name="profile" id="student_profile" value="0">
                      <option></option>
                      <option value="1">Ingeniería de Software</option>
                      <option value="2">Ingeniería en Telemática</option>
                    </select></td>
                </tr>
                <tr>
                    <td><h5><a href="">Tecnologías:</a></h5></td>
                    <td> <select id="tecnology" class="form form-control" name="tecnology"></select></td>
                </tr>
                <tr>
                    <td><h5><a href="">Nombre del asesor:</a></h5></td>
                    <td><input type="text" name="researcher" class="form form-control" id="researcher"></td>
                </tr>
                <tr>
                    <td><h5><a href="">Tipo de apoyo al alumno:</a></h5></td>
                    <td> <select id="support" class="form form-control" name="tecnology"></select></td>
                </tr>
                <tr>
                    <td><h5><a href="">Institución financiadora:</a></h5></td>
                    <td><select id="funding_agency" class="form form-control" name="agency"></select></td>
                </tr>
                <tr>
                    <td><h5><a href="">Resumen:</a></h5></td>
                    <td> <textarea id="summary" name="summary" class="form form-control" rows="5" cols="20"></textarea> </td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button id="save" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
