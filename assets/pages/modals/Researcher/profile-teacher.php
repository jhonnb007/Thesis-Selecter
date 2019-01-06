<link rel="stylesheet" href="assets/pages/css/modal.css">

<!-- Modal -->
<div class="modal fade" id="profileTeacher" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
  <div class="modal-dialog profileModalTeacher" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="modal-title" id="profileTeacherLabel">Perfil</h6>
      </div>
      <div class="modal-body">
        <div class="row text-center margin-bottom-20">
          <img src="<?php echo $_SESSION['researcher']->get_image_profile();?>" class="profilePicture" alt="">
        </div>
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><h5><a href="javascript:;">Nombre:</a></h5></td>
                    <td id="researchID"><?php echo $_SESSION['researcher']->get_full_name(); ?></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Correo:</a></h5></td>
                    <td id="email"><?php echo $_SESSION['researcher']->get_email(); ?></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Dependencia:</a></h5></td>
                    <td><?php echo $_SESSION['researcher']->get_university(); ?></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Edificio:</a></h5></td>
                    <td><?php echo $_SESSION['researcher']->get_building(); ?></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Cubiculo:</a></h5></td>
                    <td><?php echo $_SESSION['researcher']->get_room(); ?></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Grupo de investigacion:</a></h5></td>
                    <td id="groupID"><?php echo $_SESSION['researcher']->get_research_group_key() . "" . $_SESSION['researcher']->get_research_group();?></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">linea de investigacion:</a></h5></td>
                    <td id="lineID"><?php echo $_SESSION['researcher']->get_research_line(); ?></td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
