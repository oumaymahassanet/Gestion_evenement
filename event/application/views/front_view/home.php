<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/responsive.css">

<!-- Home -->

	<div class="home">
		<!-- <div class="home_background" style="background-image: url(<?php echo base_url();?>conference/images/index.jpg)"></div> -->
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url();?>conference/images/index.jpg" data-speed="0.8"></div>


		
<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_date">Juin 06, 2019</div>
							<div class="home_title">Pub Events</div>
                                                        <div class="home_location"><br></div>
							<div class="home_buttons">
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Intro -->
<?php    if ( !empty($all_type_events)){ ?> 
	<div class="intro">
		<div class="intro_content d-flex flex-row flex-wrap align-items-start justify-content-between">

                        
			<!-- Intro Item -->
                         <?php     foreach ($all_type_events as $key => $type_events):
                                            $this->load->model("File");
                                            $list_picture_type_events=$this->File-> all_picture_type_events('',$type_events->id);
                                           
                                                      ?>
			<div class="intro_item">
				<div class="intro_image"><img src="<?php echo base_url();?>uploads/type_events/<?php  if (!empty($list_picture_type_events)){echo $list_picture_type_events[0]->file_name ;} else {echo 'No type Found!';}?>" style="width:555.5px; height:300px"></div>
				<div class="intro_body">
					<div class="intro_title"><a href="<?php echo base_url();?>Events/<?php echo $type_events->alias?>"><?php echo $type_events->name ?></a></div>
			        </div>
			</div>

			<?php endforeach ?>

		</div>
	</div>
   <?php } else {  ?>
        <div class="event_title">no type found</div>
   <?php }   ?>

	<!-- Calendar -->

	<div class="calendar">
		<div class="container reset_container">
			<div class="row">
				<div class="col-xl-12 calendar_col">
					<div class="calendar_container">
						<div class="calendar_title_bar d-flex flex-row align-items-center justify-content-start">
							<div><div class="calendar_icon"><img src="<?php echo base_url();?>conference/images/calendar.svg" ></div></div>
							<div class="calendar_title">Les plus proche évènements</div>
						</div>
                                                                <?php    if ( !empty($plus_proche_events)){ ?> 
						<div class="calendar_items row">
							
							<!-- Calendar Item -->
                                                        <?php foreach ($plus_proche_events as $key => $events):
                                                               $this->load->model("type_events_model");
                                                              $list_type=$this->type_events_model-> all_type_events($events->id_type);
                                                              $this->load->model("city_model");
                                                              $list_ville=$this->city_model-> all_city($events->id_city);
                                                              $this->load->model("country_model");
                                                              $list_country=$this->country_model-> all_country($events->id_country);
                                                              $this->load->model("File");
                                                              $list_picture=$this->File-> all_picture_events('',$events->id);
                                                              $this->load->model("user_model");
                                                              $list_users=$this->user_model-> all_users($events->id_creator);
                                                              
                                                      ?>
                                                        
							<div class="calendar_item col-md-6 d-flex flex-row align-items-center justify-content-start">
                                                            <div><div class="calendar_item_image" ><a href="<?php echo base_url();?>Event/Titre/<?php echo $events->alias?>"><img src="<?php echo base_url();?>uploads/files/<?php  if (!empty($list_picture)){echo $list_picture[0]->file_name ;} else {echo 'No type Found!';}?>" style="width:103px; height:103px;"></a></div></div>
								<div class="calendar_item_text">
									<div><?php echo date("d/m/Y", strtotime($events->start_date)) ?></div>
                                                                        <div><?php echo date("d/m/Y", strtotime($events->end_date)) ?></div>
									</div>
								<div class="calendar_item_time">
                                                                    <div><a href="<?php echo base_url();?>Event/Titre/<?php echo $events->alias?>"><p style="color:blue;font-size:18px"><?php echo $events->titre ?></p></a></div>
									<div><?php  if (!empty($list_country)){echo $list_country[0]->name ;} else {echo 'No type Found!';}?>, <?php  if (!empty($list_ville)){echo $list_ville[0]->name ;} else {echo 'No type Found!';} ?> </div>
                                                                        
                                                                        <div>organisateur de l'évènement : <a href="<?php echo base_url();?>Oranizer_profile/<?php echo $list_users[0]->alias?>"><?php  if (!empty($list_users)){echo $list_users[0]->first_name ;} else {echo 'No organizer Found!';}?> <?php  if (!empty($list_users)){echo $list_users[0]->last_name ;} ?></a></div>
								</div>
							</div>
                                                              <?php endforeach ?>
							
							

						</div>
                                               <?php } else {  ?>
                                            <br><div class="calendar_item_time">Pas des évènements</div><br>
                                        <?php }   ?>
					</div>
				</div>

				

			</div>
		</div>
	</div>

	<!-- Call to action -->

	<div class="cta">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url();?>conference/images/cta_1.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta_content text-center">
						<div class="cta_title">Chercher votre évènement Maintenant</div>
					</div>
				</div>
			</div>
		</div>
	</div>
        
        