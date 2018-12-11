<div class="tab-content">
  <div id="tesisOnProcess" class="tab-pane fade in active">
    <h3>Tesis en proceso</h3>
    <br>
    <table id="verificacionTesis" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
              <th>Asesor</th>
              <th>Nombre</th>
              <th>Tema</th>
              <th>Perfil</th>
              <th>Acciones</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th>Asesor</th>
              <th>Nombre</th>
              <th>Tema</th>
              <th>Perfil</th>
              <th>Acciones</th>
          </tr>
      </tfoot>

      <?php
      echo "<tbody>";
      while($rowProcess = mysqli_fetch_assoc($processResult)) {
        echo "<tr>
            <td>" . $rowProcess["ResearcherName"]. "</td>
            <td>" . $rowProcess["ThesisName"]. "</td>
            <td>" . $rowProcess["TopicName"]. "</td>
            <td>" . $rowProcess["EducativeProgramName"]. "</td>"
            ?>
            <td width="200" class="text-center">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#thesisRequest" onclick="seeThesis(<?php echo $rowProcess["ThesisID"]; ?>)">Ver</button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#thesisRechazar" onclick="rejectThesis(<?php echo $rowProcess["ThesisID"]; ?>)">Rechazar</button>
            </td>
            <?php
            echo "</tr>";
    }
     echo "</tbody>";
   ?>
  </table>
  <br>
  </div>
  <div id="tesisDecline" class="tab-pane fade">
    <h3>Tesis rechazadas</h3>
    <br>
    <table id="rechazadasTesis" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
              <th>Asesor</th>
              <th>Nombre</th>
              <th>Tema</th>
              <th>Perfil</th>
              <th>Acciones</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th>Asesor</th>
              <th>Nombre</th>
              <th>Tema</th>
              <th>Perfil</th>
              <th>Acciones</th>
          </tr>
      </tfoot>

      <?php
      echo "<tbody>";
      while($rejectedRow = mysqli_fetch_assoc($rejectedResult)) {
        echo "<tr>
            <td>" . $rejectedRow["ResearcherName"]. "</td>
            <td>" . $rejectedRow["ThesisName"]. "</td>
            <td>" . $rejectedRow["TopicName"]. "</td>
            <td>" . $rejectedRow["EducativeProgramName"]. "</td>"
            ?>
            <td  class="text-center">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#thesisRequest" onclick="seeThesis(<?php echo $rejectedRow["ThesisID"]; ?>)">Ver</button>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#thesisRevert" onclick="revertThesis(<?php echo $rejectedRow["ThesisID"]; ?>)">Revertir</button>
            </td>
            <?php
            echo "</tr>";
    }
     echo "</tbody>";
   ?>
  </table>
  </div>
</div>
