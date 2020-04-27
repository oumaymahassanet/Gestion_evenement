
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/responsive.css">

 
<!-- Home -->
<div class="home " >
    		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url();?>conference/images/profile_head.jpg" data-speed="0.8"></div>

    
</div>
<?php $alias=$this->uri->segment(2); 
                $this->load->model("user_model");
                $list_users=$this->user_model-> all_users_alias($alias);
                $list_orginazer=$this->user_model-> all_organizer($list_users[0]->id);
                //var_dump($list_orginazer);
                $this->load->model("city_model");
                $list_ville=$this->city_model-> all_city($list_orginazer[0]->id_city);
                $this->load->model("country_model");
                $list_country=$this->country_model-> all_country($list_orginazer[0]->id_country);
                $this->load->model("File");
                $list_picture_user=$this->File-> all_picture_user('',$list_users[0]->id);
                //var_dump($list_picture_user);
                $this->load->model("events_model");
                $list_events_active=$this->events_model-> active_events($list_users[0]->id);
                $list_events_non_active=$this->events_model-> non_active_events($list_users[0]->id);
                
                
                     ?>
<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <?php if (!empty($list_picture_user)){ ?>
                                <img src="<?php echo base_url();?>uploads/user/<?php  echo $list_picture_user[0]->file_name;?>" style="width:245px; height:200px"/>
                            <?php  } else { ?>
                                <img src="<?php echo base_url();?>uploads/user/anonyme.png" style="width:245px; height:200px"/>
                            <?php  } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                     <?php echo strtoupper($list_users[0]->first_name); echo ' '; echo $list_users[0]->last_name; ?>
                                    </h5>
                                    <h6>
                                        <?php if (!empty($list_orginazer)){ echo $list_orginazer[0]->description;}?>
                                    </h6>
                                    <p class="proile-rating"><span></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                       
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list_users[0]->first_name;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Prénom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list_users[0]->last_name;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sexe</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list_orginazer[0]->gendre;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list_orginazer[0]->adress;echo ', ';echo $list_ville[0]->name; ?></p>
                                                 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pays</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php   echo $list_country[0]->name;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Adress Postale</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list_orginazer[0]->zip;?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                               <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list_users[0]->email;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Téléphone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list_orginazer[0]->phone1;?></p>
                                            </div>
                                        </div>
                                <?php if (!empty($list_orginazer[0]->phone2)){ ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Téléphone n°2</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list_orginazer[0]->phone1;?></p>
                                            </div>
                                        </div>
                                <?php } ?>
                                <?php if (!empty($list_orginazer[0]->fax)){ ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Fax</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $list_orginazer[0]->fax;?></p>
                                            </div>
                                        </div>
                                <?php } ?> 
                                <?php if (!empty($list_orginazer[0]->facebook)){ ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Facebook</label>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?php echo $list_orginazer[0]->facebook;?>"><p><?php echo $list_orginazer[0]->facebook;?></p></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                      
        </div>
<div class="calendar">
		<div class="container reset_container">
			<div class="row">
				<div class="col-xl-12 calendar_col">
					<div class="calendar_container">
						<div class="calendar_title_bar d-flex flex-row align-items-center justify-content-start">
							<div><div class="calendar_icon"><img src="<?php echo base_url();?>conference/images/calendar.svg" alt=""></div></div>
							<div class="calendar_title">Evènement active </div>
						</div>
                                                                <?php    if ( !empty($list_events_active)){ ?> 
						<div class="calendar_items row">
							
							<!-- Calendar Item -->
                                                        <?php foreach ($list_events_active as $key => $events):
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
                                                            <div><div class="calendar_item_image" ><a href="<?php echo base_url();?>Event/Titre/<?php echo $events->alias?>"><img src="<?php echo base_url();?>uploads/files/<?php  if (!empty($list_picture)){echo $list_picture[0]->file_name ;} else {echo 'No type Found!';}?>"></a></div></div>
								<div class="calendar_item_text">
									<div><?php echo date("d/m/Y", strtotime($events->start_date)) ?></div>
                                                                        <div><?php echo date("d/m/Y", strtotime($events->end_date)) ?></div>
									</div>
								<div class="calendar_item_time">
                                                                    <div><a href="<?php echo base_url();?>Event/Titre/<?php echo $events->alias?>"><?php echo $events->titre ?></a></div>
									<div><?php  if (!empty($list_country)){echo $list_country[0]->name ;} else {echo 'No type Found!';}?>, <?php  if (!empty($list_ville)){echo $list_ville[0]->name ;} else {echo 'No type Found!';} ?> </div>
                                                                        
                                                                        <div>organisateur de l'évènement : <a href="<?php echo base_url();?>Oranizer_profile/<?php echo $list_users[0]->alias?>"><?php  if (!empty($list_users)){echo $list_users[0]->first_name ;} else {echo 'No organizer Found!';}?> <?php  if (!empty($list_users)){echo $list_users[0]->last_name ;} ?></a></div>
								</div>
							</div>
                                                              <?php endforeach ?>
							
							

						</div>
                                               <?php } else {  ?>
                                        <div class="calendar_item_time">no events found</div>
                                        <?php }   ?>
					</div>
				</div>

				

			</div>
		</div>
	</div>
<div class="calendar">
		<div class="container reset_container">
			<div class="row">
				<div class="col-xl-12 calendar_col">
					<div class="calendar_container">
						<div class="calendar_title_bar d-flex flex-row align-items-center justify-content-start">
							<div><div class="calendar_icon"><img src="<?php echo base_url();?>conference/images/calendar.svg" alt=""></div></div>
							<div class="calendar_title">Ancien Evènement</div>
						</div>
                                                                <?php    if ( !empty($list_events_non_active)){ ?> 
						<div class="calendar_items row">
							
							<!-- Calendar Item -->
                                                        <?php foreach ($list_events_non_active as $key => $events):
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
                                                            <div><div class="calendar_item_image" ><a href="<?php echo base_url();?>Event/Titre/<?php echo $events->alias?>"><img src="<?php echo base_url();?>uploads/files/<?php  if (!empty($list_picture)){echo $list_picture[0]->file_name ;} else {echo 'No type Found!';}?>"></a></div></div>
								<div class="calendar_item_text">
									<div><?php echo date("d/m/Y", strtotime($events->start_date)) ?></div>
                                                                        <div><?php echo date("d/m/Y", strtotime($events->end_date)) ?></div>
									</div>
								<div class="calendar_item_time">
                                                                    <div><a href="<?php echo base_url();?>Event/Titre/<?php echo $events->alias?>"><?php echo $events->titre ?></a></div>
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

