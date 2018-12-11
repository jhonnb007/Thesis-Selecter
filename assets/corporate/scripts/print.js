$(document).ready(function () {
    $('.alert-autocloseable-danger').hide();

    $("#btnPrint").click(function()
    {
        
        ca = $("#nameCoasesor").val();
        ventana();
        
//       if(imprimir())
//       {
//           //window.print();
//           ventana();
//       }
//       else
//       {
//            $('#autoclosable-btn-danger').prop("disabled", true);
//            $('.alert-autocloseable-danger').show();
//
//            $('.alert-autocloseable-danger').delay(4000).fadeOut( "slow", function() {
//                // Animation complete.
//                $('#autoclosable-btn-danger').prop("disabled", false);
//            });
//       }
    });
    
    function imprimir()
    {
        var print = true;
        ps = $("#nameProfesorSeminario").val();
        ca = $("#nameCoasesor").val();
        
           if(ps === '')
              print = false;

         return print;  
    }
    
    function ventana()
    {
        var n = "width=1354,height=836,status=0,titlebar=0,scrollbars=1,menubar=0,toolbar=0,location=0,resizable=1";
        window.open("letter.php?ca=" + ca,"Carta de Compromiso", n);
        //window.open("letter.php?ps=" + ps + "&ca=" + ca,"Carta de Compromiso", n);
    } 
});