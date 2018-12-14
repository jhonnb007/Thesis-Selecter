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
            <th>Perfil</th>
            <th>Ver</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
            <th>#</th>
            <th>Asesor</th>
            <th>Nombre</th>
            <th>Tema</th>
            <th>Perfil</th>
            <th>Ver</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </tr>
      </tfoot>
      <?php
      while($rowProcess = mysqli_fetch_assoc($processResult)) {
        echo "<tr>
            <td>" . $rowProcess["ThesisID"]. "</td>
            <td>" . $rowProcess["ResearcherName"]. "</td>
            <td>" . $rowProcess["ThesisName"]. "</td>
            <td>" . $rowProcess["TopicName"]. "</td>
            <td>" . $rowProcess["EducativeProgramName"]. "</td>"
            ?>
            <td class="text-center">
              <button type="button" class="btn btn-primary">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </td>
            <td class="text-center">
              <button type="button" class="btn btn-warning">
                <span class="glyphicon glyphicon-pencil"></span>
              </button>
            </td>
            <td class="text-center">
              <button type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-minus"> </span>
              </button>
            </td>
            <?php
            echo "</tr>";
    }
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
            <th>#</th>
            <th>Asesor</th>
            <th>Nombre</th>
            <th>Tema</th>
            <th>Perfil</th>
            <th>Ver</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
            <th>#</th>
            <th width="120">Asesor</th>
            <th width="280">Nombre</th>
            <th width="150">Tema</th>
            <th width="100">Perfil</th>
            <th>Ver</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </tr>
      </tfoot>
      <?php
      while($rejectedRow = mysqli_fetch_assoc($rejectedResult)) {
        echo "<tr>
            <td>" . $rejectedRow["ThesisID"]. "</td>
            <td>" . $rejectedRow["ResearcherName"]. "</td>
            <td>" . $rejectedRow["ThesisName"]. "</td>
            <td>" . $rejectedRow["TopicName"]. "</td>
            <td>" . $rejectedRow["EducativeProgramName"]. "</td>"
            ?>
            <td class="text-center">
              <button type="button" class="btn btn-primary">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </td>
            <td class="text-center">
              <button type="button" class="btn btn-warning">
                <span class="glyphicon glyphicon-pencil"></span>
              </button>
            </td>
            <td class="text-center">
              <button type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-minus"> </span>
              </button>
            </td>
            <?php
            echo "</tr>";
    }
   ?>
  </table>
  </div>
</div>
