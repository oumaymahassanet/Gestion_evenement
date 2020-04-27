<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Modifier Utilisateur</h1>
                    <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>

<form action='<?php echo base_url();?>user/modif_users_2' method="post">

   <h2 class="page-header">-----------------------------------Modifier Compte---------------------------------</h2><br><br>
  <div class="form-group">
    
      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user_data[0]->id ?>  ">
      <input type="hidden" class="form-control" id="redirect_url" name="redirect_url" value="  <?php echo  $_SERVER['HTTP_REFERER'] ?>">

    <label for="exampleInputEmail1">Nom</label>
    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_data[0]->first_name ?> " required="required" >
    <label for="exampleInputEmail1">Prénom</label>
       <input type="texte" class="form-control" required='required' id="last_name" name="last_name" value="<?php echo $user_data[0]->last_name ?>" >

        <input type="hidden" class="form-control" id="role" name="role"  value="<?php echo $user_data[0]->role ?>">     
       <label for="exampleInputValidation" >Validation</label>
        <select name="validation" class="form-control"  value="<?php echo $user_data[0]->validation ?>" required='required' >
            <option value="yes" <?php if( $user_data[0]->validation =='yes') {echo "selected" ;}?>>Validé</option>
            <option value="no" <?php if( $user_data[0]->validation =='no') {echo "selected" ;}?>>Non Validé</option>
        </select>  <br>
        <label for="exampleInputEmail1">Email</label>
       <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data[0]->email ?> " required='required'>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Nouveau Password</label>
    <input type="password"  class="form-control" id="exampleInputPassword1" name='password' placeholder='Password'>
    
    <label for="exampleInputComfirmationPassword">Comfirmation Nouveau Password</label>
    <input type="password" class="form-control"  id="exampleInputPassword1" name='comfpassword' placeholder='Comfirmation Password'>
  </div>

   <?php if ($user_data[0]->role=='user'){?>
   <br><br>
        <h2 class="page-header">-----------------------------------Modifier Profile---------------------------------</h2><br><br>
<br>
       <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user =$this->uri->segment(4);?>">
  <div class="form-group">
      
<label for="exampleInputtype">Pays</label>
    <select   class="form-control" name="id_country" id="id_country" required="required" value="<?php  if (!empty($user_profile_data[0]->id_country)) {echo $user_profile_data[0]->id_country ;} ?>" >
                <option value="">select</option>
        <?php    if ( count($all_country)>0){?>    
            <?php foreach ( $all_country as $key => $country):?>
             <option value="<?php echo $country->id?>" <?php if (!empty($user_profile_data[0]->id_country)) {if( $user_profile_data[0]->id_country == $country->id ) {echo "selected" ;};}?> ><?php echo $country->name?></option>
            <?php endforeach ?>          
        <?php }else{ ?>
            <option>Pas de pays disponible pour cette moment<option>
        <?php } ?>
        </select>
    <label for="exampleInputtype">Ville</label>
    <select   class="form-control" name="id_city" id="id_city" required="required" value="<?phpif (!empty($user_profile_data[0]->id_city)) { echo $user_profile_data[0]->id_city ;} ?>" >
        <?php    if ( count($all_city)>0){?>    
            <?php foreach ( $all_city as $key => $city):?>
             <option value="<?php echo $city->id?>" <?php if (!empty($user_profile_data[0]->id_city)) {if( $user_profile_data[0]->id_city == $city->id ) {echo "selected" ;};}?> ><?php echo $city->name?></option>
            <?php endforeach ?>          
            <?php }else{ ?>
            <option>No type Found!<option>
            <?php } ?>
        </select>
    
<label for="exampleInputEmail1">Adresse</label>
    <input type="text" class="form-control" id="adress" name="adress" required="required" value="<?php if (!empty($user_profile_data[0]->adress)) {echo $user_profile_data[0]->adress ;}?>" >
    <label for="exampleInputEmail1">Code Postale</label>
       <input type="texte" class="form-control" id="zip" name="zip" required="required" value="<?php if (!empty($user_profile_data[0]->zip)) {echo $user_profile_data[0]->zip;}?>">
    <label for="exampleInputEmail1">Sexe</label>
        <select id="gendre" name="gendre" class="form-control" value="<?php if (!empty($user_profile_data[0]->gendre)) {echo $user_profile_data[0]->gendre;}?>">
            <option value="">select</option>
            <option value="homme" <?php if (!empty($user_profile_data[0]->gendre)) { if( $user_profile_data[0]->gendre == "homme" ) {echo "selected" ;};}?> >homme</option>
            <option value="femme" <?php if (!empty($user_profile_data[0]->gendre)) { if( $user_profile_data[0]->gendre == "femme" ) {echo "selected" ;};} ?>>Femme</option>
        </select>  <br>
        <label for="exampleInputEmail1">Téléphone</label>
       <input type="texte" class="form-control" id="phone" name="phone" placeholder='+216' required="required" value="<?php if (!empty($user_profile_data[0]->phone)) { echo $user_profile_data[0]->phone;}?>">


  </div>
  <?php } ?>
  <?php  if ($user_data[0]->role!='user'){ ?> 
       <br><br>
        <h2 class="page-header">-----------------------------------Modifier Profile---------------------------------</h2><br><br>
<br>
       <div class="form-group">
      <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user =$this->uri->segment(4);?>">
    <label for="exampleInputEmail1">Nom de l'organistion </label>
    <input type="text" class="form-control" id="organisation_name" name="organisation_name"  value="<?php if (!empty($organizer_profile_data[0]->organisation_name)) {echo $organizer_profile_data[0]->organisation_name;}?>" >
    <label for="exampleInputEmail1">Description</label>
       <input type="texte" class="form-control" id="description" name="description"  value="<?php if (!empty($organizer_profile_data[0]->description)) { echo $organizer_profile_data[0]->description; }?>">
        <label for="exampleInputtype">Votre Pays</label>
    <select   class="form-control" name="id_country" id="id_country" required="required" value="<?php if (!empty($organizer_profile_data[0]->id_country)) { echo $organizer_profile_data[0]->id_country ;} ?>" >
        <option value="">select</option>
        <?php    if ( count($all_country)>0){?>    
            <?php foreach ( $all_country as $key => $country):?>
             <option value="<?php echo $country->id?>" <?php if (!empty($organizer_profile_data[0]->id_country)) {if( $organizer_profile_data[0]->id_country == $country->id ) {echo "selected" ;};}?> ><?php echo $country->name?></option>
            <?php endforeach ?>          
        <?php }else{?>
            <option>liste Pays vide<option>
  <?php } ?>
        </select>
    <label for="exampleInputtype">Votre Ville</label>
    <select   class="form-control" name="id_city" id="id_city" required="required" value="<?php echo $organizer_profile_data[0]->id_city  ?>" >
        <?php    if ( count($all_city)>0):?>    
            <?php foreach ( $all_city as $key => $city):?>
             <option value="<?php echo $city->id?>" <?php if( $organizer_profile_data[0]->id_city == $city->id ) {echo "selected" ;}?> ><?php echo $city->name?></option>
            <?php endforeach ?>          
            <?php else: ?>
            
            <?php endif; ?>
        </select>
    
<label for="exampleInputEmail1">Adresse</label>
    <input type="text" class="form-control" id="adress" name="adress" required="required" value="<?php if (!empty($organizer_profile_data[0]->adress)) { echo $organizer_profile_data[0]->adress;}?>" >
    <label for="exampleInputEmail1">Code Postale</label>
       <input type="texte" class="form-control" id="zip" name="zip" required="required" value="<?php if (!empty($organizer_profile_data[0]->zip)) {echo $organizer_profile_data[0]->zip;}?>">
    <label for="exampleInputEmail1">Sexe</label>
        <select id="gendre" name="gendre" class="form-control" value="<?php echo $organizer_profile_data[0]->gendre?>">
            <option value="">select</option>
            <option value="homme" <?php if (!empty($organizer_profile_data[0]->gendre)) {if( $organizer_profile_data[0]->gendre == "homme" ) {echo "selected" ;};}?> >homme</option>
            <option value="femme" <?php if (!empty($organizer_profile_data[0]->gendre)) {if( $organizer_profile_data[0]->gendre == "femme" ) {echo "selected" ;};} ?>>Femme</option>
        </select>  <br>
      
       <label for="exampleInputEmail1">Téléphone 1</label>
       <input type="texte" class="form-control" id="phone1" name="phone1" placeholder='+216' required="required" value="<?php if (!empty($organizer_profile_data[0]->phone1)) {echo $organizer_profile_data[0]->phone1;}?>">
       <label for="exampleInputEmail1">Téléphone 2</label>
       <input type="texte" class="form-control" id="phone2" name="phone2" placeholder='+216' value="<?php if (!empty($organizer_profile_data[0]->phone2)) {echo $organizer_profile_data[0]->phone2;}?>">
       <label for="exampleInputEmail1">Fax</label>
       <input type="texte" class="form-control" id="fax" name="fax" placeholder='+216'   value="<?php if (!empty($organizer_profile_data[0]->fax)) {echo $organizer_profile_data[0]->fax;}?>">
       <label for="exampleInputEmail1">Facebook</label>
       <input type="texte" class="form-control" id="facebook" name="facebook"  value="<?php if (!empty($organizer_profile_data[0]->facebook)) {echo $organizer_profile_data[0]->facebook;}?>">


  </div>
  <?php } ?>
  <button type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Submit</button>
  <a type="submit"  href='<?php echo base_url();?>MyPanel/users' class="btn btn-success" id='bouton_envoi'>Annuler</a>
</form>
        </div>
      </div>
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


