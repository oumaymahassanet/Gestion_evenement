	<!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="container">
				<div class="row">
					
					<!-- Footer Column -->
					<div class="col-lg-4 footer_col">
						<div class="footer_about">
							<div>
								<a href="#">
									<div class="logo_container d-flex flex-row align-items-start justify-content-start">
										<div class="logo_content">
											<div id="logo_text" class="logo_text logo_text_not_ie"><img src="<?php echo base_url();?>conference/images/like/logo2.png" alt="" style="width:250px; height:80px"></div>
											<div class="logo_sub">Juin 06, 2019 - Tunisie</div>
										</div>
									</div>
								</a>	
							</div>
							<div class="footer_about_text">
                                                            <p>description site ...</p>
                                                        </div>
						</div>
					</div>

					<!-- Footer Column -->
                                        <div class="col-lg-3 footer_col" style="padding-left:200px">
						<div class="footer_links">
							<ul>
								<li><a href="<?php echo base_url();?>">Accueil</a></li>
								<li><a href="<?php echo base_url();?>Top10">Top 10</a></li>
								<li><a href="<?php echo base_url();?>Chercher_Events?page=1&id_type=&id_country=&id_city=&start_date=&titre=">Evènements</a></li>
								<li><a href="<?php echo base_url();?>Contact">Contact</a></li>
								
							</ul>
						</div>
					</div>

					

				</div>
			</div>
		</div>
		<div class="footer_extra">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_extra_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-start justify-content-center">
							<div class="footer_social">
								<div class="footer_social_title">Suivez-nous sur les réseaux sociaux</div>
								<ul class="footer_social_list">
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
		
</div>
 
          
            
<!-- Modal -->
<form  method="get" action='<?php echo base_url();?>Chercher_Events'>
       <input type="hidden" name="page" value="1">

<div class="modal fade" id="myModalchercher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" style="color:red;" >Chercher Evènements</h4>
      </div>
      <div class="modal-body">
          <div class="col">
            <div class="search_content d-flex flex-row align-items-center justify-content-end">
                <label for="exampleInputtype" class="home_text"style="color: #000000"><b>type&nbsp;&nbsp;</b></label>
         <select   class="form-control" name="id_type" id="id_type" style="color: #007bff"  >
             <option value="" >select</option>          
             <?php    if ( count($all_type_events)>0):?>    
             <?php foreach ( $all_type_events as $key => $type_events):?>
                                    <?php if ($type_events->banned == 'no'){?>    
              <option value="<?php echo $type_events->id?>"  ><?php echo $type_events->name?></option>
                                                        <?php  } ?>
             <?php endforeach ?>        
             <?php else: ?>
             <option>No type Found!<option>
             <?php endif; ?>
          </select>
         <label for="exampleInputdate_debut" class="home_text"style="color: #000000"><b>&nbsp;&nbsp;date_debut&nbsp;&nbsp;</b></label>
        <input type="date" class="form-control" id="start_date" name="start_date" style="color: #007bff">
        </div>
              </div>
          <div class="col">
            <div class="search_content d-flex flex-row align-items-center justify-content-end">
                <label for="exampleInputtype" class="home_text" style="color: #000000"><b>Pays&nbsp;&nbsp;</b></label>
         <select   class="form-control" name="id_country" id="id_country2" style="color: #007bff"  >
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
            
          
         <label for="exampleInputVille" class="home_text" style="color: #000000"><b>&nbsp;&nbsp;Ville&nbsp;&nbsp;</b></label>
         <select   class="form-control" name="id_city" id="id_city2" style="color: #007bff">
                        <option value="">select</option>
          </select>
         </div>
          </div>
        <div class="col">
                        <div class="search_content d-flex flex-row align-items-center justify-content-end" >
                            <input type="text" class="search_container_input" id="titre" name="titre" placeholder="Search" style="background-color: #a6e1ec" >												
                        </div>
            </div>	
          </div>
    

      <div class="modal-footer">
        <button type="submit" class="btn btn-success">chercher</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>  
      </div>
    </div>
  </div>
</div>
 </div>
</form>  


    <form  method='post' >
   
<div class="modal fade" id="myModalvalidation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" >Ooupss</h4>
      </div>
      <div class="modal-body">
          <h4><sty style="color:darkcyan">Désolé, votre compte n'est pas validé jusqu'a maintenant<br><br>Vous pouvez contacter l'administrateur sur cette mail :<b style="color:greenyellow"> admin@events.com</b></sty></h4>
                  
        </div>
    

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>  
      </div>
    </div>
  </div>
</div>
 </div>
</form>  
<form  method='post' >
   
<div class="modal fade" id="myModalcontact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" >Succès</h4>
      </div>
      <div class="modal-body">
          <h4><sty style="color:darkcyan">Votre messgage à été envoyé avec succès !!<br></sty></h4>
                  
        </div>
    

      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">D'accord</button>
      </div>
    </div>
  </div>
</div>
 </div>
</form>  



  <form  method='post' >
   
<div class="modal fade" id="myModalconnecter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" >Connecter</h4>
      </div>
      <div class="modal-body">
          <div class="login-form-1">
            <br>
            <h4><div id='err_msg' style='display: none'>  
                <div id='content_result'>  
                <div id='err_show' class="w3-text-red">  
                <div id='msg'> </div></label>  
                </div></div></div> </h4>
            <br>
                                <input type="hidden" class="form-control" id="redirect_url" name="redirect_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'] ?>">
            <label for='username'>Username</label>
            <input  class="form-control" type='text' name='username' id='username' size='25' placeholder="Username" /><br />
        
            <label for='password'>Password </label>
            <input class="form-control" type='password' name='password' id='password' size='25' placeholder="Password" /><br />                            
        
                  
        </div>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <input type='submit' class="btn btn-primary" value='Connecter' id="Connecter" />
           
          <a href="<?php echo base_url();?>inscrire" >S'inscrire</a>
      </div>
    
  </div>
</div>
 </div>
</form>  
  <script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script> 
  <script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script>
 <script type="text/javascript">  
  
        // Ajax post  
        $(document).ready(function(){  
        $("#Connecter").click(function(){  
        var user_name = $("#username").val();  
        var password = $("#password").val();
        var redirect_url = $("#redirect_url").val();  
        // Returns error message when submitted without req fields.  
        if(user_name==''||password=='')  
        {  
        jQuery("div#err_msg").show();  
        jQuery("div#msg").html("All fields are required");  
        }  
        else  
        {  
            
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/check_login",  
        data: {name: user_name, pwd: password, redirect_url: redirect_url},  
        cache: false,  
        success: function(result){  console.log(result);
            if(result!=''){  
                // On success redirect.  
            window.location.replace(result);  
            }  
            else { 
                jQuery("div#err_msg").show();  
                jQuery("div#msg").html("Login Failed"); 
            }
        },
       error:function(result){  alert('result');
             console.log(result);
        }
        });  //end ajax
        }  
        return false;  
        });  // end click
        }); //end doc 
        
   
        </script>    
     
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
     <script>
    let func2=async()=>{
        let res = await $.get("<?php echo base_url();?>MyPanel/cities/"+$("#id_country2")[0].value);
        res = JSON.parse(res);
        let inner = ' <option value="">select</option>';
        for(let i = 0;i<res.length;i++){
            inner+=`<option value="${res[i].id}">${res[i].name}</option>`;
        }
        $("#id_city2").html(inner);
    }
    $("#id_country2").change(func2);
    </script>
               
    <script>
    let func3=async()=>{
        let res = await $.get("<?php echo base_url();?>MyPanel/cities/"+$("#id_country3")[0].value);
        res = JSON.parse(res);
        let inner = ' <option value="">select</option>';
        for(let i = 0;i<res.length;i++){
            inner+=`<option value="${res[i].id}">${res[i].name}</option>`;
        }
        $("#id_city3").html(inner);
    }
    $("#id_country3").change(func3);
    </script>
        
      
        
<script src="<?php echo base_url();?>conference/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url();?>conference/styles/bootstrap4/popper.js"></script>
<script src="<?php echo base_url();?>conference/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>conference/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url();?>conference/plugins/easing/easing.js"></script>
<script src="<?php echo base_url();?>conference/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url();?>conference/js/custom.js"></script>
          <script src="<?php echo base_url();?>conference/stars/js/star-rating.js" type="text/javascript"></script>
  
  <script>
      $("#input-id").rating();

        </script>
          
</body>

</html>