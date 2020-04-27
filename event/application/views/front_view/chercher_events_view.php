<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/events.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/events_responsive.css">

<!-- Home -->

	
	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url();?>conference/images/events.jpg" data-speed="0.8"></div>
	<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="current_page">Events</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="<?php echo base_url();?>">Acceuil</a></li>
									<li>Events</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        </div>
<!-- Events -->

	<div class="events">
		<div class="container">
                    <?php    if ( !empty($chercher_events)){ ?> 
			<div class="row">
				<div class="col">
					
					<!-- Event -->
                                        
                                        <?php $y=0; foreach ($chercher_events as $key => $events){
                                            $this->load->model("type_events_model");
                                            $list_type=$this->type_events_model-> all_type_events($events->id_type,'');
                                            $this->load->model("city_model");
                                            $list_ville=$this->city_model-> all_city($events->id_city);
                                            $this->load->model("country_model");
                                            $list_country=$this->country_model-> all_country($events->id_country);
                                            $this->load->model("File");
                                            $list_picture=$this->File-> all_picture_events('',$events->id);
                                            $list_picture_user=$this->File-> all_picture_user('',$events->id_creator);
                                            $this->load->model("user_model");
                                            $list_users=$this->user_model-> all_users($events->id_creator);
                                            $this->load->model("favorites_model");
                                            $list_favorites=$this->favorites_model->all_favorites($events->id,$user['id']);
                                            //var_dump($list_favorites);
                                            
                                            $this->load->model("reservation_model");
                                            $list_reservation=$this->reservation_model->all_reservation($events->id,$user['id']);
                                            //var_dump($list_reservation);
                                            $this->load->model("note_model");
                                            $list_note=$this->note_model->all_note_rows($events->id);
                                            //var_dump($list_note);
                                            
                                            if (!empty($list_note)){
                                              
                                              $all_note=$this->note_model->all_note($events->id,'');
                                              $x=0;
                                              foreach ($all_note as $key => $note1){
                                                  $x=$x+($note1->nb_star);
                                              }
                                             // var_dump($x);
                                              $note_moye=$x/$list_note ;
                                             // var_dump($note_moye);
                                              $note_moy= round($note_moye);
                                             // var_dump($note_moy);
                                            }
                                            else {
                                                $note_moye=0 ;
                                                $note_moy= round($note_moye);
                                            }
                                            $y++;
                                            $z=$y % 2;
                                            ?>
                                        
        
					<div class="event">
						<div class="row row-lg-eq-height">
							<div class="col-lg-6 event_col">
								<div class="event_image_container">
                                                                    <div class="background_image" style="background-image:url(<?php echo base_url();?>uploads/files/<?php  if (!empty($list_picture)){echo $list_picture[0]->file_name ;} else {echo 'No picture Found!';}?>)"></div>
									<div class="date_container">
										<a href="#">
											<span class="date_content d-flex flex-column align-items-center justify-content-center">
                                                                                            <div class="date_month"><center><?php echo date( "d " ,strtotime($events->start_date) ) ?><br><br><?php echo date( "F " ,strtotime($events->start_date) ) ?></center></div>
											</span>
										</a>	
									</div>
								</div>
							</div>
							<div class="col-lg-6 event_col">
								<div class="event_content">
                                                                    <div class="event_title"><?php echo $events->titre ?>
                                                                        <?php if (!empty($user)){ ?>
                                                                            <span class="pull-right" id='favoris_<?php echo $events->id ?>'>
                                                                                   <?php if (!empty($list_favorites)){ ?>
                                                                                      
                                                                                                <a data-toggle="modal" data-target="#myModalsupp" onclick="return supp_favorites('<?php echo $events->id?>')"> <img src="<?php echo base_url();?>conference/images/etoile_jaune.jpg" style="width:40px; height:40px"></a>
                                                                                                    <?php } else { ?>
                                                                                                <a data-toggle="modal" data-target="#myModal" onclick="return add_favorites('<?php echo $events->id?>')"> <img src="<?php echo base_url();?>conference/images/etoile_gris.jpg" style="width:40px; height:40px"></a>           
                                                                                                    <?php } ?> 
                                                                         </span>
                                                                                                        <?php } ?>
                                                                    </div>
									<div class="event_location"><?php  if (!empty($list_country)){echo $list_country[0]->name ;} else {echo 'No type Found!';} ?>, <?php  if (!empty($list_ville)){echo $list_ville[0]->name ;} else {echo 'No type Found!';} ?></div>
																		
                                                                        <div class="event_text">
										<p><?php echo $events->description ?></p>
                                                                        </div><br>
                                                                        <div class="container" >
                                                                            <div class="row">
                                                                              <?php if ($z==0)  { ?>
                                                                            <div class="rating1">
                                                                                 <?php if ($note_moy==0){ ?>
                                                                          <input type="radio"  name="rating1" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating1" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating1" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating1" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating1" value="1"     /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                                 <?php if ($note_moy==1){ ?>
                                                                          <input type="radio"  name="rating1" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating1" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating1" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating1" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating1" value="1"   checked  /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                           <?php if ($note_moy==2){ ?>
                                                                          <input type="radio"  name="rating1" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating1" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating1" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating1" value="2"   checked /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating1" value="1"      /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                                <?php if ($note_moy==3){ ?>
                                                                          <input type="radio"  name="rating1" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating1" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating1" value="3"   checked   /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating1" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating1" value="1"      /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                           <?php if ($note_moy==4){ ?>
                                                                          <input type="radio"  name="rating1" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating1" value="4"   checked   /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating1" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating1" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating1" value="1"      /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                           <?php if ($note_moy==5){ ?>
                                                                          <input type="radio"  name="rating1" value="5"   checked  /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating1" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating1" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating1" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating1" value="1"      /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                            </div>
                                                                               <?php } ?> 
                                                                                <?php if ($z==1)  { ?>
                                                                            <div class="rating">
                                                                                 <?php if ($note_moy==0){ ?>
                                                                          <input type="radio"  name="rating" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating" value="1"     /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                                 <?php if ($note_moy==1){ ?>
                                                                          <input type="radio"  name="rating" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating" value="1"   checked  /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                           <?php if ($note_moy==2){ ?>
                                                                          <input type="radio"  name="rating" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating" value="2"   checked /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating" value="1"      /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                                <?php if ($note_moy==3){ ?>
                                                                          <input type="radio"  name="rating" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating" value="3"   checked   /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating" value="1"      /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                           <?php if ($note_moy==4){ ?>
                                                                          <input type="radio"  name="rating" value="5"     /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating" value="4"   checked   /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating" value="1"      /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                           <?php if ($note_moy==5){ ?>
                                                                          <input type="radio"  name="rating" value="5"   checked  /><label for="star5" title="Trés Bien">5 stars</label>
                                                                          <input type="radio"  name="rating" value="4"      /><label for="star4" title="Bien">4 stars</label>
                                                                          <input type="radio"  name="rating" value="3"      /><label for="star3" title="Assez Bien">3 stars</label>
                                                                          <input type="radio"  name="rating" value="2"      /><label for="star2" title="Pass">2 stars</label>
                                                                          <input type="radio"  name="rating" value="1"      /><label for="star1" title="Sucks big time">1 star</label>
                                                                               <?php } ?>
                                                                            </div>
                                                                               <?php } ?> 
                                                                            </div>       
                                                                            </div>
									<div class="event_speakers">
										<!-- Event Speaker -->
										<div class="event_speaker d-flex flex-row align-items-center justify-content-start">
                                                                                    <div><div class="event_speaker_image"><img src="<?php echo base_url();?>uploads/user/<?php  if (!empty($list_picture_user)){echo $list_picture_user[0]->file_name ;}?>" style="width:48px; height:48px;" alt=""></div></div>
											<div class="event_speaker_content">
                                                                                            <div class="event_speaker_name"><a style="color:brown;font-family:arial;font-size:20px" href="<?php echo base_url();?>Oranizer_profile/<?php echo $list_users[0]->alias?>"><?php  if ((!empty($list_users[0]->first_name ))&&(!empty($list_users[0]->last_name ))){echo $list_users[0]->first_name ; echo' ';echo $list_users[0]->last_name ;} else {$list_users[0]->email ;}  ?></a></div>
											</div>
										</div>
										
									</div>
									<div class="event_buttons">
                                                                             <?php if (empty($user)){ ?>
										<div class="button event_button event_button_1"><a data-toggle="modal" data-target="#myModalconnecter" style="color:white">Réservé Maintenant !</a></div>
                                                                             <?php } else if (!empty($user)){ ?> 
                                                                                <?php if ($user['validation']=='yes'){?>
                                                                                <span  id='reservation_<?php echo $events->id ?>'>
                                                                                <?php if (!empty($list_reservation)){ ?>
                                                                                    <div class="button event_button event_button_1"><a data-toggle="modal" data-target="#myModalsuppres" onclick="return supp_reservation('<?php echo $events->id?>')" style="color:white">Supprimer Réservation !</a></div>
                                                                                <?php } else { ?>
                                                                                <div class="button event_button event_button_1"><a data-toggle="modal" data-target="#myModaladdres" onclick="return supp_reservation('<?php echo $events->id?>')" style="color:white">Réservé Maintenant !</a></div>                                                                             
                                                                                <?php } }else { ?>
                                                                                <div class="button event_button event_button_1"><a data-toggle="modal" data-target="#myModalvalidation" style="color:white">Réservé Maintenant !</a></div>  
                                                                                <?php  }}  ?>
                                                                                </span>
                                                                                <div class="button_2 event_button event_button_2"><a href="<?php echo base_url();?>Event/Titre/<?php echo $events->alias?>">Voir Plus</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
                                        <?php } ?> 
                                 
				</div>
                                            

			</div>
			<div class="row">
				<div class="col">
					<div class="pagination">
						<ul>
                                                    <?php echo $pagination ;?>
                                                  <?php /* for($i=1 ;$i <= $total_pages;$i++) {?>
							<li <?php if ($i==intval($this->input->get('page'))){?> class="active" <?php } ?>><a href="<?php echo base_url();?>Chercher_Events?page=<?php echo $i?>&id_type=<?php echo $this->input->get ('id_type');?>&id_country=<?php echo $this->input->get ('id_country');?>&id_city=<?php echo $this->input->get ('id_city');?>&start_date=<?php echo $this->input->get ('start_date');?>&titre=<?php echo $this->input->get ('titre');?>"><?php echo $i?>.</a></li>
						  <?php }*/ ?>
						</ul>
					</div>
				</div>
			</div>
                           <?php } else {  ?>
                                        <div class="event_title">no events found</div>
                                        <?php }   ?>

		</div>
	</div>

	<!-- Call to action -->

	<div class="cta">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url();?>conference/images/cta_1.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta_content text-center">
						<div class="cta_title">Get your tickets now!</div>
						<div class="button cta_button"><a href="#">Find out more</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
        
           
     <!-- Modal -->
<form method='post' >
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="">
    <input type="hidden" class="form-control" id="id_events" name="id_events" value="">

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Ajouter à la liste favoris</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre d'ajouter cette évènement dans votre liste favoris ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="add_favorites2()">Ajouter</button>
      </div>
    </div>
  </div>
</div>
</form>
            
                        <!-- Modal -->
<form method='post' >
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="">
    <input type="hidden" class="form-control" id="id_events" name="id_events" value="">

<div class="modal fade" id="myModalsupp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Supprimer de la liste favoris</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de supprimer cette évènement de votre liste favoris ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supp_favorites2()">Supprimer</button>
      </div>
    </div>
  </div>
</div>
</form>	
                          <!-- Modal -->
<form method='post' >
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="">
    <input type="hidden" class="form-control" id="id_event" name="id_event" value="">

<div class="modal fade" id="myModaladdres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Réserver pour cette évenement</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de faire une réservation pour cette évènement ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="add_reservation2()">Réservé</button>
      </div>
    </div>
  </div>
</div>
</form>
                            <!-- Modal -->
<form method='post' >
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="">
    <input type="hidden" class="form-control" id="id_event" name="id_event" value="">

<div class="modal fade" id="myModalsuppres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Supprimer Votre réservation</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de supprimer votre réservation pour cette évènement ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supp_reservation2()">Supprimer</button>
      </div>
    </div>
  </div>
</div>
</form>	
                        <script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script> 
  <script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script>
        <script>
 function add_favorites(id_events){
         $('#id_events').val(id_events);
     }
     function add_favorites2(){
         var id_events=$('#id_events').val();
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/add_favorites_2",  
        data: {id_events: id_events},  
        cache: false,  
        success: function(result){  
            document.getElementById('favoris_'+id_events).innerHTML = '<a data-toggle="modal" data-target="#myModalsupp" onclick="return supp_favorites(\''+id_events+'\')"> <img src="<?php echo base_url();?>conference/images/etoile_jaune.jpg" style="width:40px; height:40px"></a>';
          

        },
        error: function(result){  
           alert('error');
        }
        });  //end ajax
     }     

     function supp_favorites(id_events){
        
         $('#id_events').val(id_events);
     }
     function supp_favorites2(){
         var id_events=$('#id_events').val();
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/supp_favorites_2",  
        data: {id_events: id_events},  
        cache: false,  
        success: function(result){  //console.log(result);
            document.getElementById('favoris_'+id_events).innerHTML = '<a data-toggle="modal" data-target="#myModal" onclick="return add_favorites(\''+id_events+'\')"> <img src="<?php echo base_url();?>conference/images/etoile_gris.jpg" style="width:40px; height:40px"></a>';
            
        },
        error:function(result){  
           alert('error');
        }
        });  //end ajax
     }    
     function add_reservation(id_events){
         $('#id_event').val(id_events);
     }
     function add_reservation2(){
         var id_events=$('#id_event').val();
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/add_reservation_2",  
        data: {id_events: id_events},  
        cache: false,  
        success: function(result){  
            document.getElementById('reservation_'+id_events).innerHTML ='<div class="button event_button event_button_1"><a data-toggle="modal" data-target="#myModalsuppres" onclick="return supp_reservation(\''+id_events+'\')" style="color:white">Supprimer Réservation !</a></div>';
          

        },
        error: function(result){  
           alert('error');
        }
        });  //end ajax
     }     

     function supp_reservation(id_events){
        
         $('#id_event').val(id_events);
     }
     function supp_reservation2(){
         var id_events=$('#id_event').val();
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/supp_reservation_2",  
        data: {id_events: id_events},  
        cache: false,  
        success: function(result){  console.log(result);
            document.getElementById('reservation_'+id_events).innerHTML = '<div class="button event_button event_button_1"><a data-toggle="modal" data-target="#myModaladdres" onclick="return supp_reservation(\''+id_events+'\')" style="color:white">Réservé Maintenant !</a></div>';
            
        },
        error:function(result){  
           alert(result);
           
        }
        });  //end ajax
     }    

        </script>                         
<style>
          .rating1 {
      float:left;
    }

    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
      follow these rules. Every browser that supports :checked also supports :not(), so
      it doesn’t make the test unnecessarily selective */
    .rating1:not(:checked) > input {
        position:absolute;
        /*top:-9999px;*/
        clip:rect(0,0,0,0);
    }

    .rating1:not(:checked) > label {
        float:right;
        width:1em;
        /* padding:0 .1em; */
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:300%;
        /* line-height:1.2; */
        color:#ddd;
    }

    .rating1:not(:checked) > label:before {
        content: '★ ';
    }

    .rating1 > input:checked ~ label {
        color: dodgerblue;
        
    }

    

    .rating1 > label:active {
        position:relative;
        top:2px;
        left:2px;
    }
      </style>

      
      <style>
          .rating {
      float:left;
    }

    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
      follow these rules. Every browser that supports :checked also supports :not(), so
      it doesn’t make the test unnecessarily selective */
    .rating:not(:checked) > input {
        position:absolute;
        /*top:-9999px;*/
        clip:rect(0,0,0,0);
    }

    .rating:not(:checked) > label {
        float:right;
        width:1em;
        /* padding:0 .1em; */
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:300%;
        /* line-height:1.2; */
        color:#ddd;
    }

    .rating:not(:checked) > label:before {
        content: '★ ';
    }

    .rating > input:checked ~ label {
        color: dodgerblue;
        
    }

    

    .rating > label:active {
        position:relative;
        top:2px;
        left:2px;
    }
      </style>
