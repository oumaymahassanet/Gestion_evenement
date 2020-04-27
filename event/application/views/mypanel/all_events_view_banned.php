        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Evenement</h1>
         
        <table class='table' >
            <tr>   
                <th>titre</th> 
                <th>date de début</th> 
                <th>date fin</th>
                <th>type</th>
                <th>banned</th>
                <th>récupérer</th>
            </tr>
            <?php if ( count($user)):?>
            
            <?php foreach ($all_events as $key => $events):
             $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events($events->id_type);?>
            <tr>
                <td><?php echo $events->titre ?></td>
                <td><?php echo $events->start_date ?></td>
                <td><?php echo $events->end_date ?></td>
                <td><?php  if (!empty($list_type)){echo $list_type[0]->name ;} else {echo 'No type Found!';} ?></td>
                <td><?php echo $events->banned ?></td>
                <td><div  id="recuperer_<?php echo $events->id ?>"><a data-toggle="modal" data-target="#myModal" onclick="return recup_events('<?php echo $events->id ?>')" class='btn btn-success'>Récupérer</a></div></td>
            </tr>
            <?php endforeach ?>
            <?php else: ?>
            <tr>No User Found!</tr>
            <?php endif; ?>
        </table>
   <?php   echo $this->pagination->create_links() ?>  

          
        </div>
      </div>
    </div>
<!-- Modal -->
<form method='post' >
    <input type="hidden" class="form-control" id="id" name="id" value="">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Récupération</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de recupérer cette évènement ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary"data-dismiss="modal" onclick="recup_events2()">Récupérer</button>
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
     function recup_events(id){
         //alert(id);
         $('#id').val(id);
     } 
     function recup_events2(){
         var id=$('#id').val();
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "events/recuperer_events",  
        data: {id: id},
        cache: false,  
        success: function(result){  //console.log(result);
           document.getElementById('recuperer_'+id).innerHTML = '<div id="recuperer\''+id+'\'"   style="color:green">Récupérer</div>'; 
               },

        error:function(result){  
           alert('error');
        }
        });  //end ajax
     }    

 </script>
          
  </body>
</html>
