<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Evènements</h1>
                    <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>
<form action='<?php echo base_url();?>city/add_city2' method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nom ville</label>
       <input type="texte" class="form-control" id="name" name="name" required="required">
           <label for="exampleInputtype">Nom Pays</label>
       <select   class="form-control" name="id_country" id="id_country" required="required"  >
        <?php    if ( count($all_country)>0):?>    
            <?php foreach ( $all_country as $key => $country):?>
             <option value="<?php echo $country->id?>"  ><?php echo $country->name?></option>
            <?php endforeach ?>        
            <?php else: ?>
            <option>No type Found!<option>
            <?php endif; ?>
        </select>

    
  <div class="checkbox">
    <label>
      <input class="btn btn-default" type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Ajouter</button>
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