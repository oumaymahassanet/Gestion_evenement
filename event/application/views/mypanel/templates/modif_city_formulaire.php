<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Modifier Une Ville</h1>
          <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>
<form action='<?php echo base_url();?>city/modif_city_2' method="post">

 <div class="form-group">
     
      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $city_data[0]->id ?> ">
  
       <label for="exampleInputNomType">Nom Ville</label>
       <input type="texte" class="form-control" id="name" name="name" required="required" value="<?php echo $city_data[0]->name ?> ">
    
       <label for="exampleInputNomType">Nom Pays</label>
       <select   class="form-control" name="id_country" id="id_country" required="required" value="<?php echo $events_data[0]->id_city  ?>" >
           <option value="">Select</option>
        <?php    if ( count($all_country)>0):?>    
            <?php foreach ( $all_country as $key => $country):?>
             <option value="<?php echo $country->id?>" <?php if( $city_data[0]->id_country == $country->id ) {echo "selected" ;}?> ><?php echo $country->name?></option>
            <?php endforeach ?>          
            <?php else: ?>
            <option>No type Found!<option>
            <?php endif; ?>
        </select>
       
       <label for="exampleInputValidation" >Banned</label>
        <select name="banned" class="form-control"  value="<?php echo $city_data[0]->banned ?>" >
            <option value="yes" <?php if( $city_data[0]->banned =='yes') {echo "selected" ;}?>>banned</option>
            <option value="no" <?php if( $city_data[0]->banned =='no') {echo "selected" ;}?>>non banned</option>
       </select>  <br>
    
    <div class="checkbox">
    <label>
      <input type="checkbox" required="required" > vous êtes sûre de modifier Cette Ville ?
    </label>
    </div>
    
  <button type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Submit</button>
  <a   href='<?php echo base_url();?>MyPanel/city' class="btn btn-success" >Annuler</a>

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