<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/contact_responsive.css">

<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url();?>conference/images/contact.jpg" data-speed="0.8"></div>

<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="current_page">S'inscrire</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li>Crée une compte</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="contact_map_background">

			<!-- Contact Map -->
			<div class="contact_map">

				<!-- Google Map -->
				<div class="map">
					<div id="google_map" class="google_map">
						<div class="map_container">
							<div id="map"></div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="container">
			<div class="row">
                            <div class="col-lg-6">
					<div class="">
						<img src="<?php echo base_url();?>conference/images/like/inscrire.png" alt="" style="width:300px; height:300px">
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Créer Votre Compte</div>
						        <form action='<?php echo base_url();?>Welcome/add_users2' method="post">
                                                                <div class="form-group">
                                                                 <input type="hidden" class="form-control" id="redirect_url" name="redirect_url" value="  <?php echo  $_SERVER['HTTP_REFERER'] ?>">
                                                                  <label for="exampleInputEmail1">Nom</label>
                                                                  <input type="text" class="form-control" id="first_name" name="first_name" required="required" >

                                                                  <label for="exampleInputEmail1">Prénom</label>
                                                                     <input type="texte" class="form-control" id="last_name" name="last_name" required="required" >

                                                                  <label for="exampleInputRole" >role</label>
                                                                      <select name="role" class="form-control"  required="required" >
                                                                          <option value="">select</option>
                                                                          <option value="user">Interesant</option>
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

                                                                <button type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Inscrire</button>
                                                            </form>
					</div>
				</div>
				
			</div>
		</div>
	</div>




















