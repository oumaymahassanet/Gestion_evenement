        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Commentaires</h1>

        <table class='table' >
            <tr>   
                <th>Id</th> 
                <th>Contenu</th>
                <th>Utilisatur</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>

            <?php foreach ($all_comments as $key => $comments):
            $this->load->model("user_model");
             $list_users=$this->user_model-> all_users('',$comments->id_user);
              ?>                                                
            <tr>
                <td><?php echo $comments->id ?></td>
                <td><?php echo $comments->content ?></td>
                <td><?php echo $list_users[0]->email ?></td>
                <td><div  id="valider_<?php echo $comments->id ?>"><a onclick="valide_comments(<?php echo $comments->id ?>)" class='btn btn-success'>Valider</a></div></td>
                <td><div  id="supprimer_<?php echo $comments->id ?>"><a  data-toggle="modal" data-target="#myModal" onclick="return supp_comments('<?php echo $comments->id?>')"  class='btn btn-danger' >Effacer</a></div></td>
            </tr>
            <?php endforeach ?>
        </table>
   <?php  echo $this->pagination->create_links() ?>  

          
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
        Vous êtes sûre de supprimer cette Commentaire ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supp_comments2()">Supprimer</button>
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
   
      function valide_comments(id){
         //alert(id);
    $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "comments/valider_comments",  
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
 function supp_comments(id){
        
         $('#id').val(id);
     }
     function supp_comments2(){
         var id=$('#id').val();
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "comments/supp_comments_2",  
        data: {id: id},  
        cache: false,  
        success: function(result){  //console.log(result);
           document.getElementById('supprimer_'+id).innerHTML = '<div id="supprimer_\''+id+'\'"   style="color:red">supprimer</div>'; 
               },

        error:function(result){  
           alert('error');
        }
        });  //end ajax
     }    
     </script>
      
  </body>
</html>
