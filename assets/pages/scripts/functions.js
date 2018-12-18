function seeThesis(id) {

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
