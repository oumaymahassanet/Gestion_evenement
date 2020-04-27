  
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/contact_responsive.css">
<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url();?>conference/images/contact.jpg" data-speed="0.8"></div>

		<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="current_page">Contact</div>
							
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
					<div class="contact_form_container">
						<div class="contact_form_title">Restez en Contact</div>
                                                <form class="contact_form"  method="post" action="">
                                                    <input type="text" name="nom" id="nom" class="contact_input" placeholder="Nom" required="required" title="Entrer Votre Nom">
							<input type="email" name="email" id="email" class="contact_input" placeholder="E-mail" required="required|valid_mail" title="Entrer Votre E-mail">
							<input type="text" name="objet" id="objet" class="contact_input" placeholder="Objet" title="Entrer L'objet"  >
							<textarea name="contact_textarea" id="contact_textarea" class="contact_textarea contact_input" placeholder="Message" required="required" title="Entrer Votre Message"></textarea>
							<button class="button contact_button" ><a data-toggle="modal" data-target="#myModalcontact" ><span>Envoyer</span></a></button>
						</form>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="contact_info_container">
						<div>
							<a href="#">
								<div class="logo_container d-flex flex-row align-items-start justify-content-start">
									<div class="logo_content">
										<div id="logo_text" class="logo_text logo_text_not_ie"><img src="<?php echo base_url();?>conference/images/like/logo2.png" alt="" style="width:250px; height:80px"></div>
									</div>
								</div>
							</a>	
						</div>
						<div class="contact_info_list_container">
							<ul class="contact_info_list">
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div class="contact_info_icon text-center"><img src="<?php echo base_url();?>conference/images/contact_1.png" alt=""></div></div>
									<div class="contact_info_text">Tunisie,Monastir</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div class="contact_info_icon text-center"><img src="<?php echo base_url();?>conference/images/contact_2.png" alt=""></div></div>
									<div class="contact_info_text">+216 50 85 81 24</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div class="contact_info_icon text-center"><img src="<?php echo base_url();?>conference/images/contact_3.png" alt=""></div></div>
									<div class="contact_info_text">Contact.Pub.Events@gmail.com</div>
								</li>
							</ul>
						</div>
						<div class="contact_info_pin"><div></div></div>
					</div>
				</div>
			</div>
		</div>
	</div>