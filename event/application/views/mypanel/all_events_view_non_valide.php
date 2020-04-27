        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Evènements</h1>
          <table class='table' >
            <tr>   
                <th>Titre</th> 
                <th>date de début</th>
                <th>date fin</th>
                <th>validation</th>
                <th>valider</th>
                <th>Effacer</th>
            </tr>
            <?php if ( count($user)):?>
            
            <?php foreach ($all_events as $key =>$events ):?>
            <tr>
                <td><?php echo $events->titre ?></td>
                <td><?php echo $events->start_date ?></td>
                <td><?php echo $events->end_date ?></td>
                <td><?php echo $events->validation ?></td>
                <td><div  id="valider_<?php echo $events->id ?>"><a onclick="valide_events(<?php echo $events->id ?>)" class='btn btn-success'>valider</a></div></td>
                <td><div  id="supprimer_<?php echo $events->id ?>"><a  data-toggle="modal" data-target="#myModal" onclick="return supp_events('<?php echo $events->id ?>')"  class='btn btn-danger' >Effacer</a></div></td>
            </tr>
            <?php endforeach ?>
            <?php else: ?>
            <tr>No Evènts Found!</tr>
            <?php endif; ?>
        </table>
   <?php   echo $this->pagination->create_links() ?>  

          
        </div>
<!-- Modal -->
<form method='post' >
    <input type="hidden" class="form-control" id="id" name="id" value="">
            <input type="hidden" class="form-control" id="redirect_url" name="redirect_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'] ?>">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Confirmation de Suppression</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de supprimer cette Evènements ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="supp_events2()">Supprimer</button>
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
 
     
      function valide_events(id){
         //alert(id);
    $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "events/valider_events",  
        data: {id: id},  
        cache: false,  
        success: function(result){ //  console.log(result);
            document.getElementById('valider_'+id).innerHTML = '<div id="valider_\''+id+'\'"   style="color:green">Validé</div>'; 
        },
        error: function(result){ //console.log(result);console.log(id_events);
           alert('error');
        }
        });  //end ajax
     }   
 function supp_events(id){
        
         $('#id').val(id);
     }
     function supp_events2(){
         var id=$('#id').val();
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "events/supp_events_2",  
        data: {id: id},  
        cache: false,  
        success: function(result){  //console.log(result);
           document.getElementById('supprimer_'+id).innerHTML = '<div id="supprimer_\''+id+'\'"   style="color:red">supprimé</div>'; 
               },

        error:function(result){  
           alert('error');
        }
        });  //end ajax
     }    

 </script>
          
  </body>
</html>
