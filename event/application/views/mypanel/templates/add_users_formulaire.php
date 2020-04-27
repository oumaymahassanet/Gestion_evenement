<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Utilisateur</h1>
          <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>
<form action='<?php echo base_url();?>user/add_users2' method="post">
  <div class="form-group">
  
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" class="form-control" id="first_name" name="first_name" required="required" >

    <label for="exampleInputEmail1">Prénom</label>
       <input type="texte" class="form-control" id="last_name" name="last_name" required="required" >

    <label for="exampleInputRole" >role</label>
        <select name="role" class="form-control"  required="required" >
            <option value="">select</option>
            <option value="user">Interesant</option>
            <option value="admin">Administrateur</option>
            <option value="organizer">Createur evenement</option>
        </select>  <br>
       
        <label for="exampleInputEmail1"><h5>Email</h5></label>
        <input type="email" class="form-control" id="email" name="email" required="required|valid_mail" placeholder='Exemple@gmail.com' required="required">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" required="required" class="form-control" id="exampleInputPassword1" name='password' placeholder='Password'>
           </div>
     <div class="form-group">
    <label for="exampleInputPassword1">Comfirmation Password</label>
    <input type="password" class="form-control"  id="exampleInputPassword1" required="required" name='comfpassword' placeholder='Password'>
    </div>
  
  <button type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Submit</button>
</form>
                    
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script> 
  <script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script>
 
  </body>
</html>


