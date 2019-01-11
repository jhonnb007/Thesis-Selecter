function getSupport()
{
  $.getJSON("administrator/details.php", function (result) {
    var arrayConcat="";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].SupportID+"> "+result[i].SupportName+"</option>")
      }
        $("#addThesisSupport").html(arrayConcat);
        $(function() {

          $('#addThesisSupport').multiselect({

              includeSelectAllOption: true
          });

      });
 });
}

function getTopic()
{
  $.getJSON("administrator/topic.php", function (result) {
    var arrayConcat="";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].TopicID+">"+result[i].TopicName+"</option>")
      }
        $("#addThesisTopic").html(arrayConcat);
        $(function() {

          $('#addThesisTopic').multiselect({

              includeSelectAllOption: true
          });

      });
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
    var arrayConcat="";
    for (var i = 0; i < result.length; i++) {
        arrayConcat = arrayConcat.concat("<option value="+result[i].RequirementsID+"> "+result[i].RequirementsName+"</option>")
      }
        $("#addThesisTecnology").html(arrayConcat);
        $(function() {

          $('#addThesisTecnology').multiselect({

              includeSelectAllOption: true
          });

      });
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
    $.ajax({
        url: "administrador/add_thesis.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            console.log(data);
        }
    });
  });
}
function showTopic()
{
   $('#topicDiv').ready(function() {
      getTopic();
    });

}

function showSupport()
{
   $('#supportDiv').ready(function() {
      getSupport();
    });

}

function showTecnology()
{
   $('#divTecnology').ready(function() {
      getTecnology();
   });
}
function newTopic()
{
     $("#frm_topic").on("submit", function (e)
     {
       e.preventDefault();
       var name = $("#input-newTopic").val();
       $.post("administrator/add.php",
         {
          newTopic: name,
         },
          function(){
            $("#topicDiv").load(' #topicDiv');
            showTopic();
            $('#newTopic').modal('hide');
         });
     });
}

function newTecnology() {
  $("#frm_tecnology").on("submit", function (e)
  {
    e.preventDefault();
    var name = $("#input-newTecnology").val();
    $.post("administrator/add.php",
      {
       newTecnology: name,
      },
       function(){
         $("#tecnologyDiv").load(' #tecnologyDiv');
         showTecnology();
         $('#newTecnology').modal('hide');
      });
  });
}

function newSupport() {
  $("#frm_support").on("submit", function (e)
  {
    e.preventDefault();
    var name = $("#input-newSupport").val();
    $.post("administrator/add.php",
      {
       newSupport: name,
      },
       function(){
         $("#supportDiv").load(' #supportDiv');
         showSupport();
         $('#newSupport').modal('hide');
      });
  });
}
// function info()
// {
//   var x = $('#addThesisTopic').val();
//   alert(x);
// }
$(document).ready(function()
{
  getResearcher();
  showTopic();
  showTecnology();
  showSupport();
  getFundingAgency();
  getTecnology();
  getProfile();
  getSupport();
  newTopic();
  newTecnology();
  newSupport();

});
