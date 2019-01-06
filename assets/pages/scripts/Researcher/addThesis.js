function getSupport()
{
  $.getJSON("administrator/details.php", function (result) {
    var arrayConcat="<option></option>";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].SupportID+"> "+result[i].SupportName+"</option>")
      }
        $("#addThesisSupport").html(arrayConcat);
 });
}

function getTopic()
{
  $.getJSON("administrator/topic.php", function (result) {
    var arrayConcat="<option></option>";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].TopicID+"> "+result[i].TopicName+"</option>")
      }
        $("#addThesisTopic").html(arrayConcat);
 });
}

function getProfile()
{
  $.getJSON("administrator/student_profile.php", function (result) {
    var arrayConcat="<option></option>";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].EducativeProgramID+"> "+result[i].EducativeProgramName+"</option>")
      }
        $("#addThesisProfile").html(arrayConcat);
 });
}
function getFundingAgency()
{
  $.getJSON("administrator/funding_agency.php", function (result) {
    var arrayConcat="<option></option>";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].FundingAgencyAllID+"> "+result[i].FundingAgencyAllName+"</option>")
      }
        $("#addThesisAgency").html(arrayConcat);
 });
}

function getTecnology()
{
  $.getJSON("administrator/requirements.php", function (result) {
    var arrayConcat="<option></option>";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].RequirementsID+"> "+result[i].RequirementsName+"</option>")
      }
        $("#addThesisTecnology").html(arrayConcat);
 });
}
function getResearcher()
{
  var id, lineID, groupID;
  const Email = $('#email').text();
  $.getJSON(`administrator/researcher.php?EmailAddress=${Email}`, function(result) {
    for (var i = 0; i < result.length; i++)
    {
        id = result[i].ResearcherID;
        lineID = result[i].ResearchLineID;
        groupID = result[i].ResearchGroupID;
     }
 }).done(function() {
   $("#researchID").attr("value",id);
   $("#groupID").attr("value",lineID);
   $("#lineID").attr("value",groupID);
   postAddThesis(id, lineID, groupID);
 });
}


function postAddThesis(id, lineID, groupID)
{
  $("#frm_add").on("submit", function (e)
  {
    e.preventDefault();
    var name = $('#addThesisName').val();
    console.log(name);
    var topic =$('#addThesisTopic').val();
    var plaza = $('#addThesisPlaza').val();
    var profile =$('#addThesisProfile').val();
    var tecnology = $('#addThesisTecnology').val();
    var support =$('#addThesisSupport').val();
    var agency =$('#addThesisAgency').val();
    var picture = $('#addThesisPicture').val();
    console.log(picture);
    var summary =$('#addThesisSummary').val();
    $.post("administrator/add_thesis.php",
      {
       addThesisName: name,
       addThesisTopic: topic,
       addThesisPlaza: plaza,
       addThesisProfile: profile,
       addThesisTecnology: tecnology,
       addThesisSupport: support,
       addThesisAgency: agency,
       addThesisPicture: picture,
       addThesisSummary: summary,
       researcherID: id,
       lineID : lineID,
       groupID: groupID
      },
       function(result){
         alert(result);
         location.href = "my-theses.php";
      });
  });
}
$(document).ready(function()
{
  getResearcher();
  getFundingAgency();
  getTecnology();
  getProfile();
  getTopic();
  getSupport();
});
