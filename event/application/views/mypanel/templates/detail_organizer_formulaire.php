<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Utilisateur</h1>
          <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>

  <div class="form-group">
      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $organizer_data[0]->id ?> ">
    <label for="exampleInputEmail1">Nom de l'organistion </label>
    <input type="text" class="form-control" id="organisation_name" name="organisation_name" value="<?php echo $organizer_data[0]->organisation_name ?>  ">
    <label for="exampleInputEmail1">Description</label>
       <input type="texte" class="form-control" id="description" name="description" required="required">
        <label for="exampleInputEmail1">Adress</label>
       <input type="texte" class="form-control" id="adress" name="adress" placeholder='Exemple@gmail.com' required="required">
        <label for="exampleInputEmail1">Sexe</label>
        <select  name="gendre" class="form-control" >
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select>  <br>
       <label for="exampleInputEmail1">Zip</label>
       <input type="texte" class="form-control" id="zip" name="zip" required="required" >
       <label for="exampleInputtype">Pays</label>
    <select   class="form-control" name="id_city" id="id_city" required="required" value="<?php echo $organizer_data[0]->country  ?>" >
        <?php    if ( count($all_city)>0):?>    
            <?php foreach ( $all_city as $key => $city):?>
             <option value="<?php echo $city->id?>" <?php if( $events_data[0]->id_city == $city->id ) {echo "selected" ;}?> ><?php echo $city->Country?></option>
            <?php endforeach ?>          
            <?php else: ?>
            <option>No type Found!<option>
            <?php endif; ?>
        </select>
       <label for="exampleInputEmail1">Téléphone 1</label>
       <input type="texte" class="form-control" id="phone1" name="phone1" placeholder='+216' required="required">
       <label for="exampleInputEmail1">Téléphone 2</label>
       <input type="texte" class="form-control" id="phone2" name="phone2" placeholder='+216' required="required">
       <label for="exampleInputEmail1">Fax</label>
       <input type="texte" class="form-control" id="fax" name="fax" placeholder='+216' required="required">
       <label for="exampleInputEmail1">Facebook</label>
       <input type="texte" class="form-control" id="facebook" name="facebook" required="required" >


  </div>
  
  <a type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Submit</a>

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


