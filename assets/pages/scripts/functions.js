function seeThesis(id) {
$.getJSON('http://127.0.0.1/thesis-selecter/assets/api/thesis.php',
function (data) {
    var tr;
    for (var i = 0; i < data.length; i++) {
      if (data[i].ThesisID ==id) {
        tr = $('<tr/>');
        tr.append("<td>" +  + "</td>");
        $("#acceptID").attr("value",data[i].ThesisID);
        $("#thesisAdministradorLabel").text(data[i].ThesisName);
        $("#thesis_picture").attr("src",data[i].Image);
        $("#central_topic").text(data[i].TopicName);
        $("#research_group").text(data[i].ResearchGroupName);
        $("#research_line").text(data[i].ResearchLineName);
        $("#student_profile").text(data[i].EducativeProgramName);
        $("#plazas").text(data[i].PlazasID);
        $("#researcher").text(data[i].ResearcherName);
        $("#support").text(data[i].SupportName);
        $("#funding_agency").text(data[i].FundingAgencyAllName);
        $("#summary").text(data[i].Summary);
        $('').append(tr);
      }
    }
});
}

function rejectThesis(id)
{
  $("#rejectID").attr("value", id);
}

function revertThesis(id)
{
  $("#revertID").attr("value", id);
}

getThesis()
{
  $('#tesis').DataTable( {
        "ajax": 'http://127.0.0.1/Thesis-Selecter-Back-End/GET_Tesis.php'
    } );
}
