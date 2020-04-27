        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Utilisateurs</h1>
          
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
 
 

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      
      <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo base_url();?>MyPanel/users/chercher_users">
          <?php if ($this->uri->segment(3)=='chercher_users'){ ?>
          <input class="form-control mr-sm-2" required="required" type="search" id="chercher" name="chercher" placeholder="Email" aria-label="Chercher" value="<?php echo $cher ?>">
          <?php }else { ?>
      <input class="form-control mr-sm-2" type="search" id="chercher" required="required" name="chercher" placeholder="Email" aria-label="Chercher">
         <?php }?>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
          
          <center><a class="btn btn-success"  href="<?php echo base_url();?>MyPanel/users/add_users">Ajouter Un Utilisateur</a></center><br>
        
        <table class='table' >
            <tr>   
                <th>email</th> 
                <th>role</th> 
                <th>validation</th>
                <th>Images</th>
                <th>Modifier</th>
                <th>Effacer</th>
            </tr>
            <?php if ( count($user)):?>
            
            <?php foreach ($all_user as $key => $user):?>
            <tr>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->role ?></td>
                <td><?php echo $user->validation ?></td>
                <td><a href="<?php echo base_url();?>MyPanel/users/image/<?php echo $user->id ?>" class='btn btn-success'>Images</a></td>               
                <td><a href="<?php echo base_url();?>MyPanel/users/modif_users/<?php echo $user->id ?>" class='btn btn-success'>Modifier</a></td>
                <td><a  data-toggle="modal" data-target="#myModal" onclick="return supp_users('<?php echo $user->id ?>')"  class='btn btn-danger' >Effacer</a></td>
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
    </div>
<!-- Modal -->
<form method='post' action="<?php echo base_url();?>user/supp_users_2">
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
        Vous êtes sûre de supprimer cette utilisateur ?
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
