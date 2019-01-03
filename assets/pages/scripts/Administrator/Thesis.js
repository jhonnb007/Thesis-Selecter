'use strict'
function getThesisTable()
{
  $('#tesis').DataTable({
    responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 },
                { responsivePriority: 3, targets: -2 },
                
            ],
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
   $("#edit").removeAttr('disabled');
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
   $("#edit").attr('disabled','disabled');
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

  $.getJSON("http://127.0.0.1/thesis-selecter/administrator/thesis.php", function (result) {
   getThesisHtml(id, result);
 });
}



function getThesisHtml(id, result) {

  for (var i = 0; i < result.length; i++) {
    if (result[i].ThesisID == id) {
      $("#thesisID").html(result[i].ThesisID);
      $("#thesis_name").attr("value",result[i].ThesisName);
      $("#thesis_picture").attr("src",result[i].Image);
      $("#central_topic").attr("value",result[i].TopicID);
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
    var arrayConcat="";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].SupportID+"> "+result[i].SupportName+"</option>")
      }
        $("#support").html(arrayConcat);
 });
}



function getTopic(result)
{
  $.getJSON("http://127.0.0.1/thesis-selecter/administrator/topic.php", function (result) {
    var arrayConcat="";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].TopicID+"> "+result[i].TopicName+"</option>")
      }
        $("#central_topic").html(arrayConcat);
 });
}

function getProfile(result)
{
  $.getJSON("http://127.0.0.1/thesis-selecter/administrator/student_profile.php", function (result) {
    var arrayConcat="";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].EducativeProgramID+"> "+result[i].EducativeProgramName+"</option>")
      }
        $("#student_profile").html(arrayConcat);
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
function headerDeleteID(id)
{
  $("#thesisID_Delete").attr("value",id);
  $("#thesisID_Delete").text(id);
}
function postDeleteThesis()
{
   $("#frm_delete").on("submit", function (e)
   {
     e.preventDefault();
     var id = $("#thesisID_Delete").text();
     console.log(id);
     $.post("http://127.0.0.1/thesis-selecter/administrator/thesis.php",
       {
        deleteID: id
       },
        function(){
        location.href = "administrador.php";
       });
   });
}

function postModifyThesis()
{
   $("#frm_edit").on("submit", function (e)
   {
     e.preventDefault();
     var id = $("#thesisID").text();
     var name = $("#thesis_name").val();
     var topic = $("#central_topic").val();
     var profile = $("#student_profile").val();
     var tecnology = $("#tecnology").val();
     var support = $("#support").val();
     var agency = $("#funding_agency").val();
     var summary = $("#summary").val();
     $.post("http://127.0.0.1/thesis-selecter/administrator/thesis.php",
       {
        modifyID: id,
        thesisName: name,
        thesisTopic: topic,
        thesisProfile: profile,
        thesisTecnology: tecnology,
        thesisSupport: support,
        thesisAgency: agency,
        thesisSummary: summary
       },
        function(){
        location.href = "administrador.php";
       });
   });
}


$(document).ready(function() {
  getThesisTable();
  getThesisDetails(0);
  enaledEdit();
  getSupport();
  getFundingAgency();
  getTecnology();
  getProfile();
  getTopic();
  postDeleteThesis();
  postModifyThesis();

});
