<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/responsive.css">

<!-- Home -->

<!-- Home -->
<div class="home " >
    
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url();?>conference/images/like/top1000.png" data-speed="0.8" ></div>
    
</div>

		<!-- Calendar -->

	<div class="calendar">
		<div class="container reset_container">
			<div class="row">
				<div class="col-xl-6 calendar_col">
					<div class="calendar_container">
						<div class="calendar_title_bar d-flex flex-row align-items-center justify-content-start">
							<div><div class="calendar_icon"></div></div>
							<div class="calendar_title">Top 10&nbsp;&nbsp; evèvenements</div>
						</div>
                                            <?php if (!empty($top_10_events)){ ?>
						<div class="calendar_items">
							<?php   $this->load->model('events_model');
                                                        foreach ($top_10_events as $key => $events):
                                                            if ($events->nbr_jaime!=0){
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
							<!-- Calendar Item -->
							<div class="calendar_item col-md-6 d-flex flex-row align-items-center justify-content-start">
                                                            <div><div class="calendar_item_image" ><a href="<?php echo base_url();?>Event/Titre/<?php echo $events->alias?>"><img src="<?php echo base_url();?>uploads/files/<?php  if (!empty($list_picture)){echo $list_picture[0]->file_name ;} else {echo 'event_3.jpg';}?> " style="width:103px; height:103px;"></a></div></div>
								<div class="calendar_item_text">
									<div><?php echo date("d/m/Y", strtotime($events->start_date)) ?></div>
                                                                        <div style="font-size: 18px;font-weight: 500;color: #4c4c4c;"><?php echo date("d/m/Y", strtotime($events->end_date)) ?></div>
									</div>
								<div class="calendar_item_time">
                                                                    <div><a href="<?php echo base_url();?>Event/Titre/<?php echo $events->alias?>"><p style="color:#FF03F7;font-size: 18px;font-weight: 500;font-family: 'Raleway', sans-serif;text-align: left;    text-decoration: none;-webkit-font-smoothing: antialiased; "><?php echo $events->titre ?></p></a></div>
                                                                    <div><p><i><?php  if (!empty($list_country)){echo $list_country[0]->name ;} else {echo 'No type Found!';}?>,<?php  if (!empty($list_ville)){echo $list_ville[0]->name ;} else {echo 'No type Found!';} ?> </i></p></div>
                                                                        
                                                                        <div style="">Type&nbsp;:&nbsp;<?php echo $list_type[0]->name ;?></div>
								</div>
							</div><hr style="color: red">
                                                            <?php  } endforeach ?>
						</div>
                                            <?php } else { ?>
                                             <div class="calendar_item">Pas Des Evènement</div>
                                        <?php }   ?>
					</div>
				</div>

				<div class="col-xl-6 calendar_col">
					<div class="calendar_container">
						<div class="calendar_title_bar d-flex flex-row align-items-center justify-content-start">
							<div><div class="calendar_icon"></div></div>
							<div class="calendar_title">Top 10&nbsp;&nbsp; Créateur des evèvenements</div>
						</div>
                                            <?php if (!empty($top_10_user)){?>
						<div class="calendar_items">
                                                        
                                                    <?php   $this->load->model('user_model');
                                                        foreach ($top_10_user as $key => $user):
                                                            if ($user->nbr_events!=0){
                                                              $this->load->model("File");
                                                              $list_picture=$this->File-> all_picture_user('',$user->id);
                                                              $this->load->model("user_model");
                                                              $list_users=$this->user_model-> all_organizer($user->id); 
                                                              $this->load->model("city_model");
                                                              if ((!empty($list_users[0]->id_city)) and (!empty($list_users[0]->id_country))){
                                                              $list_ville=$this->city_model-> all_city($list_users[0]->id_city);
                                                              $this->load->model("country_model");
                                                              $list_country=$this->country_model-> all_country($list_users[0]->id_country);}
                                                              
                                                              
                                                             ?>
							<!-- Calendar Item -->
							<div class="calendar_item d-flex flex-row align-items-center justify-content-start">
                                                            <div><div class="calendar_item_image"><img src="<?php echo base_url();?>uploads/user/<?php  if (!empty($list_picture)){echo $list_picture[0]->file_name ;} else {echo 'anonyme.png';}?>" style="width:103px; height:103px;"></div></div>
								<div class="calendar_item_time">
                                                                    <div><?php if (!empty($list_country)){echo $list_country[0]->name;}?></div>
                                                                        <div><?php if (!empty($list_country)){echo $list_ville[0]->name;}?></div>
								</div>
								<div class="calendar_item_text">
                                                                    <div><a href="<?php echo base_url();?>Oranizer_profile/<?php echo $user->alias?>" style="color:#FF03F7"><?php echo $user->first_name?>&nbsp;<?php echo $user->last_name?></a></div>
									<div>Email:</div>
                                                                        <b><div style="color: black"><?php echo $user->email?></div></b>
								</div>
                                                        </div><hr>

							 <?php  } endforeach ?>
						</div>
                                            <?php } else { ?>
                                             <div class="calendar_items">no events found</div>
                                        <?php }   ?>
					</div>
				</div>

			</div>
		</div>
	</div>
        
        
		