<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Modifier Une Pays</h1>
          <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>
<form action='<?php echo base_url();?>country/modif_country_2' method="post">

 <div class="form-group">
     
      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $country_data[0]->id ?> ">
  
       <label for="exampleInputNomType">Nom Pays</label>
       <input type="texte" class="form-control" id="name" name="name" required="required" value="<?php echo $country_data[0]->name ?> ">
    
       <label for="exampleInputValidation" >Banned</label>
        <select name="banned" class="form-control"  value="<?php echo $country_data[0]->banned ?>" >
            <option value="yes" <?php if( $country_data[0]->banned =='yes') {echo "selected" ;}?>>banned</option>
            <option value="no" <?php if( $country_data[0]->banned =='no') {echo "selected" ;}?>>non banned</option>
       </select>  <br>
    
    <div class="checkbox">
    <label>
      <input type="checkbox" required="required" > vous êtes sûre de modifier Cette Pays ?
    </label>
    </div>
    
  <button type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Submit</button>
  <a   href='<?php echo base_url();?>MyPanel/city' class="btn btn-success" >Annuler</a>

</form>
          
        </div>
      </div>
    </div>