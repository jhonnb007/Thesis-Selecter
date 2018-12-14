<!-- Modal -->
<div class="modal fade" id="thesisAdministrador" tabindex="-1" role="dialog" aria-labelledby="thesisAdministradorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="thesisAdministradorLabel"></h5>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <div class="row margin-bottom-10 margin-top-10">
                            <div class="col-lg-4 col-lg-offset-4 gallery-item">
                                <a>
                                    <img id="thesis_picture" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="34%"><h5><a href="javascript:;">Tema Central:</a></h5></td>
                    <td id="central_topic"></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Grupo de Investigación:</a></h5></td>
                    <td id="research_group"></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Linea de Investigación:</a></h5></td>
                    <td id="research_line">Redes de computadoras</td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Perfil de Estudiante:</a></h5></td>
                    <td id="student_profile"></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Alumnos requeridos: </a></h5></td>
                    <td id="plazas">2</td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Nombre del asesor:</a></h5></td>
                    <td id="researcher"></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Tipo de apoyo al alumno:</a></h5></td>
                    <td id="support"></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Institución financiadora:</a></h5></td>
                    <td id="funding_agency"></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Resumen:</a></h5></td>
                    <td id="summary"></td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="location.href='modify.php'">Modificar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
