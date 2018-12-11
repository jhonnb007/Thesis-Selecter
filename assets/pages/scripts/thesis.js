function getThesis()
{
  $.getJSON("http://127.0.0.1/Thesis-Selecter-Back-End/GET_Tesis.php", function (result) {
   const thesisHtml = getThesisHtml(result);
   $('#thesisTable').html(thesisHtml);
 });
}

function getThesisHtml(result) {
  const thesisHtml = result.map((thesis) => {
    const { EducativeProgram, ResearcherName, TopicName, ThesisName} = thesis;
    console.log(thesis);
    return `<tr>
    <td>${ResearcherName}</td>
    <td>${ThesisName}</td>
    <td>${TopicName}</td>
    <td>${EducativeProgram}</td>
    <td width="200" class="text-center">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#thesisAdministrador" onclick="seeThesis()">Ver</button>
     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#thesisEliminar" onclick="rejectThesis()">Rechazar</button>
    </td>
    </tr>`;
  });
  return thesisHtml.join('');

}
