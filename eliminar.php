<!-- Modal -->
 <div class="modal fade" id="thesisEliminar" role="dialog">
   <form class="form-horizontal form-without-legend" action="administrador.php" method="post">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Thesis-Selecter</h4>
       </div>
       <div class="modal-body">
         <h4>¿Seguro de rechazar tesis?</h4>
         <input type="hidden" id="rejectID" name="reject">
       </div>
       <div class="modal-footer">
         <button type="submit" name="btnReject" class="btn btn-primary">Aceptar</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       </div>
     </div>

   </div>
 </form>
 </div>
