function getProcessTable()
{
  $('#verificacionTesis').DataTable({
    "language":
    {
      "sZeroRecords":    "No se encontraron resultados",
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
       "sLoadingRecords": "Cargando...",
      "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }

      }
  });
}


function getRejectedTable()
{
  $('#rechazadasTesis').DataTable({
    "language":
    {
      "sZeroRecords":    "No se encontraron resultados",
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
       "sLoadingRecords": "Cargando...",
      "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }

      }
  });
}

function enaledEdit()
{
   $("#thesis_name").attr('disabled','disabled');
   $("#thesis_picture").attr('disabled','disabled');
   $("#central_topic").attr('disabled','disabled');
   $("#research_group").attr('disabled','disabled');
   $("#research_line").attr('disabled','disabled');
   $("#student_profile").attr('disabled','disabled');
   $("#tecnology").attr('disabled','disabled');
   $("#plazas").attr('disabled','disabled');
   $("#researcher").attr('disabled','disabled');
   $("#support").attr('disabled','disabled');
   $("#funding_agency").attr('disabled','disabled');
   $("#summary").attr('disabled','disabled');
   $("#save").attr('disabled','disabled');

}

function editable()
{
   $("#thesis_name").removeAttr('disabled');
   $("#thesis_picture").removeAttr('disabled');
   $("#central_topic").removeAttr('disabled');
   $("#research_group").removeAttr('disabled');
   $("#research_line").removeAttr('disabled');
   $("#student_profile").removeAttr('disabled');
   $("#tecnology").removeAttr('disabled');
   $("#plazas").removeAttr('disabled');
   $("#support").removeAttr('disabled');
   $("#funding_agency").removeAttr('disabled');
   $("#summary").removeAttr('disabled');
   $("#save").removeAttr('disabled');

}

function getThesisDetails(id)
{

  $.getJSON("http://127.0.0.1/thesis-selecter/administrator/process_thesis.php", function (result) {
    console.log(id);
    console.log(result);
   getThesisHtml(id, result);

 });
}



function getThesisHtml(id, result) {

  for (var i = 0; i < result.length; i++) {
    if (result[i].ThesisID == id) {
      $("#thesisID").html(result[i].ThesisID);
      $("#thesis_name").attr("value",result[i].ThesisName);
      $("#thesis_picture").attr("src",result[i].Image);
      $("#central_topic").attr("value",result[i].TopicName);
      $("#research_group").attr("value",result[i].ResearchGroupName);
      $("#research_line").attr("value",result[i].ResearchLineName);
      $("#student_profile").attr("value",result[i].EducativeProgramID);
      $("#tecnology").attr("value",result[i].RequirementsID);
      $("#plazas").attr("value",result[i].PlazasID);
      $("#researcher").attr("value",result[i].ResearcherName);
      $("#support").attr("value",result[i].SupportID);
      $("#funding_agency").attr("value",result[i].FundingAgencyAllID);
      $("#summary").attr("value",result[i].Summary);
    }
  }
}

function getSupport(result)
{
  $.getJSON("http://127.0.0.1/thesis-selecter/administrator/details.php", function (result) {
    var support="";
    for (var i = 0; i < result.length; i++) {
        support = support.concat("<option value="+result[i].SupportID+"> "+result[i].SupportName+"</option>")
      }
        $("#support").html(support);
 });
}

function getFundingAgency(result)
{
  $.getJSON("http://127.0.0.1/thesis-selecter/administrator/funding_agency.php", function (result) {
    var arrayConcat="";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].FundingAgencyAllID+"> "+result[i].FundingAgencyAllName+"</option>")
      }
        $("#funding_agency").html(arrayConcat);
 });
}

function getTecnology(result)
{
  $.getJSON("http://127.0.0.1/thesis-selecter/administrator/requirements.php", function (result) {
    var arrayConcat="";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].RequirementsID+"> "+result[i].RequirementsName+"</option>")
      }
        $("#tecnology").html(arrayConcat);
 });
}

function headerAcceptID(id)
{
  $("#thesisID_Accept").attr("value",id);
  $("#thesisID_Accept").text(id);
}

function headerRejectID(id)
{
  $("#thesisID_Reject").attr("value",id);
  $("#thesisID_Reject").text(id);
}

function headerRevertID(id)
{
  $("#thesisID_Revert").attr("value",id);
  $("#thesisID_Revert").text(id);
}

function postRevertThesis()
{
   $("#frm_revert").on("submit", function (e)
   {
     e.preventDefault();
     var id = $("#thesisID_Revert").text();
     console.log(id);
     $.post("http://127.0.0.1/thesis-selecter/administrator/thesis.php",
       {
        revertID: id
       },
        function(){
        location.href = "thesis-requests.php";
       });
   });
}

function postRejectThesis()
{
   $("#frm_reject").on("submit", function (e)
   {
     e.preventDefault();
     var id = $("#thesisID_Reject").text();
     console.log(id);
     $.post("http://127.0.0.1/thesis-selecter/administrator/thesis.php",
       {
        rejectID: id
       },
        function(){
        location.href = "thesis-requests.php";
       });
   });
}

function postAcceptThesis()
{
   $("#frm_accept").on("submit", function (e)
   {
     e.preventDefault();
     var id = $("#thesisID_Accept").text();
     console.log(id);
     $.post("http://127.0.0.1/thesis-selecter/administrator/thesis.php",
       {
        acceptID: id
       },
        function(){
        location.href = "thesis-requests.php";
       });
   });
}
$(document).ready(function() {
  postRejectThesis();
  postAcceptThesis();
  postRevertThesis();
  getProcessTable();
  getRejectedTable();
  getThesisDetails(0);
  enaledEdit();
  getSupport();
  getFundingAgency();
  getTecnology();
});
