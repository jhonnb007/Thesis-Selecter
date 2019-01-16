function getProcessTable()
{
  $('#verificacionTesis').DataTable({
    responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: -3 },
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


function getRejectedTable()
{
  $('#rechazadasTesis').DataTable({
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
   $("#tecnology").attr('disabled','disabled');
   $("#plazas").attr('disabled','disabled');
   $("#researcher").attr('disabled','disabled');
   $("#funding_agency").attr('disabled','disabled');
   $("#summary").attr('disabled','disabled');
   $("#save").attr('disabled','disabled');

}

function editable()
{
   $("#edit").attr('disabled','disabled');
   $("#thesis_name").removeAttr('disabled');
   $("#thesis_picture").removeAttr('disabled');
   $("#student_profile").removeAttr('disabled');
   $("#plazas").removeAttr('disabled');
   $("#funding_agency").removeAttr('disabled');
   $("#summary").removeAttr('disabled');
   $("#save").removeAttr('disabled');


}

function getThesisDetails(id)
{

  $.getJSON("administrator/process_thesis.php", function (result) {
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
      $("#tecnology").attr("value",result[i].RequirementsALL);
      $("#researcher").attr("value",result[i].ResearcherName);
      $("#funding_agency").attr("value",result[i].FundingAgencyAllID);
      $("#summary").attr("value",result[i].Summary);
    }
  }
}

// function getTopic(result)
// {
//   $.getJSON("administrator/topic.php", function (result) {
//     var arrayConcat="";
//     for (var i = 0; i < result.length; i++) {
//         arrayConcat = arrayConcat.concat("<option value="+result[i].TopicID+"> "+result[i].TopicName+"</option>")
//       }
//         $("#central_topic").html(arrayConcat);
//  });
// }

// function getProfile(result)
// {
//   $.getJSON("administrator/student_profile.php", function (result) {
//     var arrayConcat="";
//     for (var i = 0; i < result.length; i++) {
//         arrayConcat = arrayConcat.concat("<option value="+result[i].EducativeProgramID+"> "+result[i].EducativeProgramName+"</option>")
//       }
//         $("#student_profile").html(arrayConcat);
//  });
// }

// function getSupport(result)
// {
//   $.getJSON("administrator/details.php", function (result) {
//     var support="";
//     for (var i = 0; i < result.length; i++) {
//         support = support.concat("<option value="+result[i].SupportID+"> "+result[i].SupportName+"</option>")
//       }
//         $("#support").html(support);
//  });
// }

function getFundingAgency(result)
{
  $.getJSON("administrator/funding_agency.php", function (result) {
    var arrayConcat="";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].FundingAgencyAllID+"> "+result[i].FundingAgencyAllName+"</option>")
      }
        $("#funding_agency").html(arrayConcat);
 });
}

// function getTecnology(result)
// {
//   $.getJSON("administrator/requirements.php", function (result) {
//     var arrayConcat="";
//     for (var i = 0; i < result.length; i++) {
//         arrayConcat = arrayConcat.concat("<option value="+result[i].RequirementsID+"> "+result[i].RequirementsName+"</option>")
//       }
//         $("#tecnology").html(arrayConcat);
//  });
// }

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
     $.post("administrator/thesis.php",
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
     $.post("administrator/thesis.php",
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
     $.post("administrator/thesis.php",
       {
        acceptID: id
       },
        function(){
        location.href = "thesis-requests.php";
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
     var agency = $("#funding_agency").val();
     var summary = $("#summary").val();
     $.post("administrator/thesis.php",
       {
        modifyID: id,
        thesisName: name,
        thesisAgency: agency,
        thesisSummary: summary
       },
        function(){
          location.href = "thesis-requests.php";
       });
   });
}

$(document).ready(function() {
  postModifyThesis();
  postRejectThesis();
  postAcceptThesis();
  postRevertThesis();
  getProcessTable();
  getRejectedTable();
  getThesisDetails(0);
  enaledEdit();
  getFundingAgency();

});
