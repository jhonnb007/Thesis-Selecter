<div class="tab-content">
  <div id="tesisOnProcess" class="tab-pane fade in active">
    <h3>Tesis en proceso</h3>
    <br>
    <table id="verificacionTesis" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
            <th>#</th>
            <th>Asesor</th>
            <th>Nombre</th>
            <th>Tema</th>
            <th>Aceptar</th>
            <th>Ver</th>
            <th>Rechazar</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
            <th>#</th>
            <th>Asesor</th>
            <th>Nombre</th>
            <th>Tema</th>
            <th>Aceptar</th>
            <th>Ver</th>
            <th>Rechazar</th>
          </tr>
      </tfoot>
      <?php
      $category = 2;
      get_administrator_thesis($category);
      while($rowProcess = mysqli_fetch_assoc($result)) {
      ?>
        <tr>
            <td><?php echo $rowProcess["ThesisID"] ?></td>
            <td><?php echo $rowProcess["ResearcherName"] ?></td>
            <td><?php echo $rowProcess["ThesisName"] ?></td>
            <td><?php echo $rowProcess["TopicName"] ?></td>
            <td class="text-center">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#thesisAccept" onclick="headerAcceptID(<?php echo $rowProcess["ThesisID"] ?>)">
                <span class="glyphicon glyphicon-ok"></span>
              </button>
            </td>
            <td class="text-center">
              <button type="button" id="view" class="btn btn-primary"  data-toggle="modal" data-target="#thesisAdministrador" onclick="getThesisDetails(<?php echo $rowProcess["ThesisID"]?>)">
                <span class="glyphicon glyphicon-eye-open"></span>
              </button>
            </td>
            <td class="text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#thesisReject" onclick="headerRejectID(<?php echo $rowProcess["ThesisID"]; ?>)">
                <span class="glyphicon glyphicon-remove"></span>
              </button>
            </td>
        </tr>
      <?php } ?>
  </table>
  </div>
  <div id="tesisDecline" class="tab-pane fade">
    <h3>Tesis rechazadas</h3>
    <br>
    <table id="rechazadasTesis" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
            <th>#</th>
            <th>Asesor</th>
            <th>Nombre</th>
            <th>Tema</th>
            <th>Ver</th>
            <th>Revertir</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
            <th>#</th>
            <th width="120">Asesor</th>
            <th width="280">Nombre</th>
            <th width="150">Tema</th>
            <th>Ver</th>
            <th>Revertir</th>
          </tr>
      </tfoot>
      <?php
      $category =3;
      get_administrator_thesis($category);
      while($rejectedRow = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $rejectedRow["ThesisID"]?></td>
            <td><?php echo $rejectedRow["ResearcherName"]?></td>
            <td><?php echo $rejectedRow["ThesisName"]?></td>
            <td><?php echo $rejectedRow["TopicName"]?></td>
            <td class="text-center">
              <button type="button" id="view" class="btn btn-primary"  data-toggle="modal" data-target="#thesisAdministrador" onclick="getThesisDetails(<?php echo $rejectedRow["ThesisID"]?>)">
                <span class="glyphicon glyphicon-eye-open"></span>
              </button>
            </td>

            <td class="text-center">
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#thesisRevert" onclick="headerRevertID(<?php echo $rejectedRow["ThesisID"];?>)">
                <span class="glyphicon glyphicon-repeat"> </span>
              </button>
            </td>
          </tr>
            <?php } ?>
  </table>
  </div>
</div>
