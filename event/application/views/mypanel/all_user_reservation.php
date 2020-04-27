        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Liste des Utilisateurs Réservé </h1>
          <hr>
          <br><br>
          <?php if ( count($user)):?>
        
        <table class='table' >
            <tr>   
                <th>email</th> 
                <th>Nom</th> 
                <th>Prénom</th>                 
                <th>validation</th>
                
                <th>Effacer</th>
            </tr>
            
            
            <?php foreach ($all_users_reservation as $key => $reservation):
                $this->load->model("user_model");
            
                $list_user_reservation=$this->user_model-> all_users($reservation->id_user);
                //var_dump($all_users_reservation[1]->id_user);
               // var_dump($id_events);
               //var_dump($list_user_reservation);
                                           ?>
            <tr>
                <td><?php echo $list_user_reservation[0]->email ;?></td>
                <td><?php echo $list_user_reservation[0]->first_name ?></td>
                <td><?php echo $list_user_reservation[0]->last_name ?></td>
                <td><?php echo $list_user_reservation[0]->validation ?></td>
                <td><a  data-toggle="modal" data-target="#myModalsupp_reservation" onclick="return supp_users('<?php echo $reservation->id ?>')"  class='btn btn-danger' >Effacer</a></td>
            </tr>
            <?php endforeach ?>
            <?php else: ?>
            <tr>pas de reservation pour maintenant</tr>
            <?php endif; ?>
        </table>
   <?php   echo $this->pagination->create_links() ?>  

          
        </div>
</div>
  
      </div>
    </div>
<!-- Modal -->
<form method='post' action="<?php echo base_url();?>user/supp_reservation_2">
    <input type="hidden" class="form-control" id="id" name="id" value="">
    <input type="hidden" class="form-control" id="redirect_url" name="redirect_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'] ?>">
<div class="modal fade" id="myModalsupp_reservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Confirmation de Suppression</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de supprimer cette Réservation ?
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
     function supp_users(id){
         //alert(id);
         $('#id').val(id);
     }  

 </script>
          
  </body>
</html>
