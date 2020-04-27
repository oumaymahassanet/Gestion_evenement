<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Evènements</h1>
                    <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>
<form action='<?php echo base_url();?>country/add_country2' method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nom Pays</label>
       <input type="texte" class="form-control" id="name" name="name" required="required">
           
  <div class="checkbox">
    <label>
      <input class="btn btn-default" type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Submit</button>
</div>

</form>
          
       
          
        
      </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script> 
  <script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script>
 
  </body>
</html>