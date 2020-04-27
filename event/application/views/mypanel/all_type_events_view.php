        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">type des Evenement</h1>
          <center><a class="btn btn-success"  href="<?php echo base_url();?>MyPanel/type_events/add_type_events">Ajouter Un Type Evennement</a></center><br>

        <table class='table' >
            <tr>   
                <th>Id_Type</th> 
                <th>Nom Type</th>
                <th>Banned</th>
                <th>Images</th>
                <th>Modifier</th>
                <th>Effacer</th>
            </tr>

            <?php foreach ($all_type_events as $key => $type_events):?>
            <tr>
                <td><?php echo $type_events->id ?></td>
                <td><?php echo $type_events->name ?></td>
                <td><?php echo $type_events->banned ?></td>
                <td><a href="<?php echo base_url();?>MyPanel/type_events/image/<?php echo $type_events->id ?>" class='btn btn-success'>Images</a></td>               
                <td><a href="<?php echo base_url();?>MyPanel/type_events/modif_type_events/<?php echo $type_events->id ?>" class='btn btn-success'>Modifier</a></td>
                <td><a  data-toggle="modal" data-target="#myModal" onclick="return supp_type_events('<?php echo $type_events->id ?>')"  class='btn btn-danger' >Effacer</a></td>
            </tr>
            <?php endforeach ?>
        </table>
   <?php   echo $this->pagination->create_links() ?>  

          
        </div>
      </div>
    </div>
    <!-- Modal -->
<form method='post' action="<?php echo base_url();?>type_events/supp_type_events_2">
    <input type="hidden" class="form-control" id="id" name="id" value="">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Confirmation de Suppression</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de supprimer cette Type ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Supprimer</button>
      </div>
    </div>
  </div>
</div>
</form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script>	
	<script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script>
 <script>
     function supp_type_events(id){
         //alert(id);
         $('#id').val(id);
     }     
 </script>
          
  </body>
</html>
