  
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/contact_responsive.css">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php if($user['role']=='user') { ?>
<div class="container bootstrap snippet" style="background-color:#white">
    <br>
<br><br>

    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              
         <div class="text-center">
          <?php $this->load->model("File");
          $list_picture_users=$this->File->all_picture_user('',$user['id']); 
          if (!empty($list_picture_users)){?>
        <img src="<?php echo base_url();?>uploads/user/<?php echo $list_picture_users[0]->file_name ?>" style="width:245px; height:200px" class="avatar img-circle img-thumbnail" alt="avatar">
          <?php }else{?>
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" style="width:245px; height:200px" class="avatar img-circle img-thumbnail" >
          <?php }?>
        <br><br> <form enctype='multipart/form-data' method="post" action="<?php echo base_url();?>Upload_Files/index_user2">
            <input type="file" name="user[]" ><br><br>
        <input type="submit" class="btn btn-success" name="userSubmit" value="UPLOAD"/>
        </form>
      </div></hr><br>
         
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activité <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Evènements favoris</strong></span><?php echo $nbr_favorites ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>J'aime</strong></span><?php echo $nbr_likes ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Commentaire</strong></span><?php echo $nbr_comments ?></li>
          </ul> 
               

          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>
              
                  <form class="form" action="<?php echo base_url();?>Welcome/profile_all_user2" method="post">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user['id'] ?>  ">
                            <input type="hidden" class="form-control" id="role" name="role24" value="<?php echo $user['role'] ?>  ">

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="nom"><h4>Nom</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo($all_users[0]->first_name); ?>" placeholder="Nom" title="entrer votre Nom." required="required" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="Prénom"><h4>Prénom</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo($all_users[0]->last_name); ?>" placeholder="Prénom" title="entrer votre Prénom." required="required">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" value="<?php echo($all_users[0]->email); ?>"placeholder="you@email.com" title="entrer votre email." required="required" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Sexe</h4></label>
                              <?php if (!empty($all_users_profile[0]->gendre)) { ?>
                              <select id="gendre" name="gendre" class="form-control" value="<?php echo $all_users_profile[0]->gendre?>">
                                  <option value="">select</option>
                                  <option value="homme" <?php if( $all_users_profile[0]->gendre == "homme" ) {echo "selected" ;}?> >homme</option>
                                  <option value="femme" <?php if( $all_users_profile[0]->gendre == "femme" ) {echo "selected" ;} ?>>Femme</option>
                              </select>
                              <?php } else if  (empty($all_users_profile[0]->gendre)){ ?>
                              <select  name="gendre" class="form-control" >
                                        <option value="">select</option>
                                        <option value="homme">Homme</option>
                                        <option value="femme">Femme</option>
                              </select> 
                                <?php }  ?>
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="location"><h4>Adresse</h4></label>
                              <input type="text" class="form-control" name="adress"  id="adress"  <?php if (!empty($all_users_profile[0]->adress)) { ?> value="<?php echo $all_users_profile[0]->adress?>" <?php }?> placeholder="Adresse" title="Entrer votre adresse" >
                          </div>
                      </div>
                         <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Code Postale</h4></label>
                              <input type="select" class="form-control" name="zip" id="zip"<?php if (!empty($all_users_profile[0]->zip)) { ?> value="<?php echo $all_users_profile[0]->zip?>" <?php }?> placeholder="Entrer votre code postale" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="pays"><h4>Pays</h4></label>
                            <?php if (!empty($all_users_profile[0]->id_country)) { ?>
                             <select   class="form-control" name="id_country" id="id_country3"  value="<?php echo $all_users_profile[0]->id_country  ?>" >
                                <?php    if ( count($all_country)>0):?>    
                                <?php foreach ( $all_country as $key => $country):?>
                                 <option value="<?php echo $country->id?>" <?php if( $all_users_profile[0]->id_country == $country->id ) {echo "selected" ;}?> ><?php echo $country->name?></option>
                                <?php endforeach ?>          
                                <?php else: ?>
                                <option>No type Found!<option>
                                <?php endif; ?>
                            </select>                     
                            <?php } else if  (empty($all_users_profile[0]->id_country)){ ?>
                              <select   class="form-control" name="id_country" id="id_country3">
                                            <option value="">select</option>
                                            <?php    if ( count($all_country)>0):?> 
                                            <?php foreach ( $all_country as $key => $country): ?>
                                                      <?php if ($country->banned == 'no'){?>    
                                            <option value="<?php echo $country->id?>"  ><?php echo $country->name?> </option>
                                                   <?php  } ?>
                                            <?php endforeach ?>
                                            <?php  else: ?>
                                            <option>No Country Found!<option>
                                            <?php endif ?>
                                  <?php }  ?>
                         </select>
                         </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label class="home_text" for="city"><h4>Ville</h4></label>
                                      <?php if (!empty($all_users_profile[0]->id_city)) { ?>
                               <select   class="form-control" name="id_city" id="id_city3"  value="<?php echo $all_users_profile[0]->id_city  ?>" >
                                <?php    if ( count($all_city)>0):?>    
                                    <?php foreach ( $all_city as $key => $city):?>
                                     <option value="<?php echo $city->id?>" <?php if( $all_users_profile[0]->id_city == $city->id ) {echo "selected" ;}?> ><?php echo $city->name?></option>
                                    <?php endforeach ?>          
                                    <?php else: ?>
                                    <option>No type Found!<option>
                                    <?php endif; ?>
                                </select>
                                <?php } else if  (empty($all_users_profile[0]->id_city)){ ?>
                             <select   class="form-control" name="id_city" id="id_city3" >
                                    <option value="">select</option>
                            </select> 
                                <?php }  ?>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Téléphone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" <?php if (!empty($all_users_profile[0]->phone)) { ?> value="<?php echo $all_users_profile[0]->phone?>" <?php }?> placeholder="+216 " title="entrer votre numéro portable">
                          </div>
                      </div>
                  
                      
                      <div class="form-group">                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Mots de Passe</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Mots de Passe" title="enter your password." >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Comfirmation de Mots de Passe</h4></label>
                              <input type="password" class="form-control" name="comfpassword" id="comfpassword" placeholder="Comfirmation de mots de Passe" title="enter your password2.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                            </div>
                      </div>
                     
              	</form>
              
             
          <!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                        
</div>  
    
<br>
<br>
<br>
<br>
<br><br>


<?php } else if($user['role']!='user') { ?>
<div class="container bootstrap snippet" style="background-color:#white">
    <br>
<br><br>

    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

                    
      <div class="text-center">
          <?php $this->load->model("File");
          $list_picture_users=$this->File->all_picture_user('',$user['id']); 
          if (!empty($list_picture_users)){?>
        <img src="<?php echo base_url();?>uploads/user/<?php echo $list_picture_users[0]->file_name ?>" class="profile-img" style="width:245px; height:200px"class="avatar img-circle img-thumbnail" alt="avatar">
          <?php }else{?>
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" style="width:245px; height:200px" class="profile-img" class="avatar img-circle img-thumbnail" >
          <?php }?>
        <br><br> <form enctype='multipart/form-data' method="post" action="<?php echo base_url();?>Upload_Files/index_user2">
            <input type="file" name="user[]" ><br><br>
        <input type="submit" class="btn btn-success" name="userSubmit" value="UPLOAD"/>
        </form>
      </div></hr><br>

               
         
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activité <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Publications</strong></span><?php echo $nbr_events ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Evènements favoris</strong></span><?php echo $nbr_favorites ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>J'aime</strong></span><?php echo $nbr_likes ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Commentaire</strong></span><?php echo $nbr_comments ?></li>
          </ul> 
               

          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>
                  <form class="form" action="<?php echo base_url();?>Welcome/profile_all_user2" method="post">

                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user['id'] ?>  ">
                            <input type="hidden" class="form-control" id="role" name="role" value="<?php echo $user['role'] ?>  ">

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="nom"><h4>Nom</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo($all_users[0]->first_name); ?>" placeholder="Nom" title="entrer votre Nom." required="required" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="Prénom"><h4>Prénom</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo($all_users[0]->last_name); ?>" placeholder="Prénom" title="entrer votre Prénom." required="required">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" value="<?php echo($all_users[0]->email); ?>"placeholder="you@email.com" title="entrer votre email." required="required" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Sexe</h4></label>
                              <?php if (!empty($all_organizer[0]->gendre)) { ?>
                              <select id="gendre" name="gendre" class="form-control" value="<?php echo $all_organizer[0]->gendre?>">
                                  <option value="">select</option>
                                  <option value="homme" <?php if( $all_organizer[0]->gendre == "homme" ) {echo "selected" ;}?> >homme</option>
                                  <option value="femme" <?php if( $all_organizer[0]->gendre == "femme" ) {echo "selected" ;} ?>>Femme</option>
                              </select>
                              <?php } else if  (empty($all_organizer[0]->gendre)){ ?>
                              <select  name="gendre" class="form-control" >
                                        <option value="">select</option>
                                        <option value="homme">Homme</option>
                                        <option value="femme">Femme</option>
                              </select> 
                                <?php }  ?>
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="location"><h4>Adresse</h4></label>
                              <input type="text" class="form-control" name="adress"  id="adress"  <?php if (!empty($all_organizer[0]->adress)) { ?> value="<?php echo $all_organizer[0]->adress?>" <?php }?> placeholder="Adresse" title="Entrer votre adresse" >
                          </div>
                      </div>
                         <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Code Postale</h4></label>
                              <input type="select" class="form-control" name="zip" id="zip"<?php if (!empty($all_organizer[0]->zip)) { ?> value="<?php echo $all_organizer[0]->zip?>" <?php }?> placeholder="code postale" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="pays"><h4>Pays</h4></label>
                            <?php if (!empty($all_organizer[0]->id_country)) { ?>
                             <select   class="form-control" name="id_country" id="id_country3"  value="<?php echo $all_organizer[0]->id_country  ?>" >
                                <?php    if ( count($all_country)>0):?>    
                                <?php foreach ( $all_country as $key => $country):?>
                                 <option value="<?php echo $country->id?>" <?php if( $all_organizer[0]->id_country == $country->id ) {echo "selected" ;}?> ><?php echo $country->name?></option>
                                <?php endforeach ?>          
                                <?php else: ?>
                                <option>No type Found!<option>
                                <?php endif; ?>
                            </select>                     
                            <?php } else if  (empty($all_organizer[0]->id_country)){ ?>
                              <select   class="form-control" name="id_country" id="id_country3">
                                            <option value="">select</option>
                                            <?php    if ( count($all_country)>0):?> 
                                            <?php foreach ( $all_country as $key => $country): ?>
                                                      <?php if ($country->banned == 'no'){?>    
                                            <option value="<?php echo $country->id?>"  ><?php echo $country->name?> </option>
                                                   <?php  } ?>
                                            <?php endforeach ?>
                                            <?php  else: ?>
                                            <option>No Country Found!<option>
                                            <?php endif ?>
                                  <?php }  ?>
                         </select>
                         </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label class="home_text" for="city"><h4>Ville</h4></label>
                                      <?php if (!empty($all_organizer[0]->id_city)) { ?>
                               <select   class="form-control" name="id_city" id="id_city3"  value="<?php echo $all_organizer[0]->id_city  ?>" >
                                <?php    if ( count($all_city)>0):?>    
                                    <?php foreach ( $all_city as $key => $city):?>
                                     <option value="<?php echo $city->id?>" <?php if( $all_organizer[0]->id_city == $city->id ) {echo "selected" ;}?> ><?php echo $city->name?></option>
                                    <?php endforeach ?>          
                                    <?php else: ?>
                                    <option>No type Found!<option>
                                    <?php endif; ?>
                                </select>
                                <?php } else if  (empty($all_organizer[0]->id_city)){ ?>
                             <select   class="form-control" name="id_city" id="id_city3" >
                                    <option value="">select</option>
                            </select> 
                                <?php }  ?>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Téléphone</h4></label>
                              <input type="text" class="form-control" name="phone1" id="phone1" <?php if (!empty($all_organizer[0]->phone1)) { ?> value="<?php echo $all_organizer[0]->phone1?>" <?php }?> placeholder="+216" title="entrer votre numéro portable">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Téléphone 2</h4></label>
                              <input type="text" class="form-control" name="phone2" id="phone2" <?php if (!empty($all_organizer[0]->phone2)) { ?> value="<?php echo $all_organizer[0]->phone2?>" <?php }?> placeholder="+216" title="entrer votre numéro portable">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Fax</h4></label>
                              <input type="text" class="form-control" name="fax" id="fax" <?php if (!empty($all_organizer[0]->fax)) { ?> value="<?php echo $all_organizer[0]->fax?>" <?php }?> placeholder="fax" title="entrer votre numéro portable">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Facebook</h4></label>
                              <input type="text" class="form-control" name="facebook" id="facebook" <?php if (!empty($all_organizer[0]->facebook)) { ?> value="<?php echo $all_organizer[0]->facebook?>" <?php }?> placeholder="https://www.facebook.com/????????????" >
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Organisation</h4></label>
                              <input type="text" class="form-control" name="organisation_name" id="organisation_name" <?php if (!empty($all_organizer[0]->organisation_name)) { ?> value="<?php echo $all_organizer[0]->organisation_name?>" <?php }?> title="entrer votre numéro portable">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Description</h4></label>
                             <input type="text"  class="form-control" name="description" id="description" cols="100" rows="2" <?php if (!empty($all_organizer[0]->description)) { ?> value="<?php echo $all_organizer[0]->description?>" <?php }?>title="entrer votre Spécialité">
                          </div>
                      </div>
                      <div class="form-group">                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Mots de Passe</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Mots de Passe" title="enter your password." >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Comfirmation de Mots de Passe</h4></label>
                              <input type="password" class="form-control" name="comfpassword" id="comfpassword" placeholder="Comfirmation de mots de Passe" title="enter your password2.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                            </div>
                      </div>
                     
              	</form>
              
             
          <!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                        
</div>  
    
<br>
<br>
<br>
<br>
<br><br>
<?php } ?>
<style>
    
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>




     
     