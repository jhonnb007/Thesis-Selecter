<link rel="stylesheet" href="assets/pages/css/modal.css">

<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
  <div class="modal-dialog profileModal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="modal-title" id="profileLabel">Perfil</h6>
      </div>
      <div class="modal-body">
        <div class="row text-center margin-bottom-20">
          <img src="<?php echo $_SESSION['researcher']->get_image_profile_administrador();?>" class="profilePicture" alt="">
        </div>
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><h5><a href="javascript:;">Nombre:</a></h5></td>
                    <td><?php echo $_SESSION['researcher']->get_full_name_admnistrador(); ?></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Correo:</a></h5></td>
                    <td><?php echo $_SESSION['researcher']->get_email_administrador(); ?></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Telefono:</a></h5></td>
                    <td><?php echo $_SESSION['researcher']->get_telephone_administrador(); ?></td>
                </tr>
                <tr>
                    <td><h5><a href="javascript:;">Escuela:</a></h5></td>
                    <td><?php echo $_SESSION['researcher']->get_school_administrador(); ?></td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
