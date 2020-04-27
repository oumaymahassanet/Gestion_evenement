        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Utilisateurs</h1>
          <table class='table' >
            <tr>   
                <th>email</th> 
                <th>role</th> 
                <th>validation</th>
                <th>valider</th>
                <th>Effacer</th>
            </tr>
            <?php if ( count($user)):?>
            
            <?php foreach ($all_user as $key => $user):?>
            <tr>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->role ?></td>
                <td><?php echo $user->validation ?></td>
                <td><div  id="valider_<?php echo $user->id ?>"><a onclick="valide_user(<?php echo $user->id ?>)" class='btn btn-success'>valider</a></div></td>
                <td><div  id="supprimer_<?php echo $user->id ?>"><a  data-toggle="modal" data-target="#myModal" onclick="return supp_user('<?php echo $user->id ?>')"  class='btn btn-danger' >Effacer</a></div></td>
            </tr>
            <?php endforeach ?>
            <?php else: ?>
            <tr>No User Found!</tr>
            <?php endif; ?>
        </table>
   <?php   echo $this->pagination->create_links() ?>  

          
        </div>
<!-- Modal -->
<form method='post' >
    <input type="hidden" class="form-control" id="id" name="id" value="">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Confirmation de Suppression</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de supprimer cette utilisateur ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="supp_user2()">Supprimer</button>
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
 
     
      function valide_user(id){
         //alert(id);
    $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "user/valider_users",  
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
 function supp_user(id){
        
         $('#id').val(id);
     }
     function supp_user2(){
         var id=$('#id').val();
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "user/supp_users",  
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
