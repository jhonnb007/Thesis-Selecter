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
        <form id="frm_edit" class="form-horizontal form-without-legend">
        <table class="table table-striped table-hover">
            <tbody style="width: 100%;">
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <div class="row margin-bottom-10 margin-top-10">
                            <div class="col-lg-4 col-lg-offset-4 gallery-item">
                                <a><img id="thesis_picture" class="img-responsive"></a>
                            </div>
                        </div>
                    </td>
                </tr>

                  <div class="form-group">
                      <tr>
                    <td><h5><a href="">Nombre:</a></h5></td>
                    <td> <textarea id="thesis_name" name="name" class="form form-control" rows="2" style="width:100%;"></textarea> </td>
                       </tr>
                  </div>

                <tr>
                    <td width="34%"><h5><a href="">Tema Central:</a></h5></td>
                    <td> <select id="central_topic" class="form form-control" name="topic"></select></td>
                </tr>
                <tr>
                    <td><h5><a href="">Perfil de Estudiante:</a></h5></td>
                    <td> <select id="student_profile" class="form form-control" name="profile"></select></td>
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
        <button id="save" type="submit" name="modifySave" class="btn btn-primary">
          <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
        </button>

        <button type="button" id="edit" class="btn btn-warning" onclick="editable()">
          <span class="glyphicon glyphicon-pencil"></span> Editar
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
