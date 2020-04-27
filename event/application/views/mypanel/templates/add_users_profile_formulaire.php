<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Utilisateur</h1>
          <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>
<form action='<?php echo base_url();?>user/add_users_profile2' method="post">
    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user =$this->uri->segment(4);?>">
  <div class="form-group">
       <label for="exampleInputtype">Pays</label>
       <select   class="form-control" name="id_country" id="id_country" required="required"  >
           <option value="">select</option>
         <?php    if ( count($all_country)>0):?> 
             <?php foreach ( $all_country as $key => $country): ?>
                       <?php if ($country->banned == 'no'){?>    
             <option value="<?php echo $country->id?>"  ><?php echo $country->name?> </option>
                    <?php  } ?>
         <?php endforeach ?>
             <?php  else: ?>
             <option>No type Found!<option>
         <?php endif ?>
        </select>
      <label for="exampleInputVille">Ville</label>
       <select   class="form-control" name="id_city" id="id_city" required="required"  >
                      <option value="">select</option>

        </select>
    
<label for="exampleInputEmail1">Adresse</label>
    <input type="text" class="form-control" id="adress" name="adress" required="required"  >
    <label for="exampleInputEmail1">Zip</label>
       <input type="texte" class="form-control" id="zip" name="zip" required="required" >
      <label for="exampleInputEmail1">Sexe</label>
        <select  name="gendre" class="form-control" >
            <option value="">select</option>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select>  <br>
        <label for="exampleInputEmail1">Téléphone</label>
       <input type="texte" class="form-control" id="phone" name="phone" placeholder='+216' required="required">


  </div>
  
  
  <button type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Submit</button>
</form>
        </div>
         <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script> 
  <script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script>
   <script>
    let func=async()=>{
        let res = await $.get("<?php echo base_url();?>MyPanel/cities/"+$("#id_country")[0].value);
        res = JSON.parse(res);
        let inner = ' <option value="">select</option>';
        for(let i = 0;i<res.length;i++){
            inner+=`<option value="${res[i].id}">${res[i].name}</option>`;
        }
        $("#id_city").html(inner);
    }
    $("#id_country").change(func);
    </script>
  </body>
</html>


