<!DOCTYPE html>
<html lang="en">
<head>
<title>Evènement</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Conference project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/bootstrap4/bootstrap.min.css">
<link href="<?php echo base_url();?>conference/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/plugins/OwlCarousel2-2.2.1/animate.css">

</head>
<body>
    		<!-- Header -->

                <div class="super_container">

	<!-- Menu -->
        

        <div class="menu trans_500" style="background:linear-gradient(to right, #E1A832, #E1325E);"><div style="padding-left:50px;padding-top:30px;">
                           <?php if (empty($user)) { ?>
                <div class="button header_button" style="background-color: red"><a data-toggle="modal" data-target="#myModalconnecter" style="color:white" >Connecter</a></div>
                             <?php } else {   ?> 
                            <ul class="nav nav-pills">

                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"  aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>conference/images/like/icon_profile.png" style="width:30px; height:30px" ></a>
                           <div class="dropdown-menu">
                                  <a class="dropdown-item" style="color:black" href="<?php echo base_url();?>Profile" >
                                    <?php if(empty($user['first_name']) and empty($user['last_name']) )
                                  {echo $user['email']; } 
                              else    
                                 { echo $user['first_name'].' '.$user['last_name'] ;
                             }  ?></a> 
                                 <?php  if ($user['role']!='user'){ if ($user['validation']=='yes'){  ?>
                            <a class="dropdown-item" style="color:black"href="<?php echo base_url();?>MyPanel" >Mon Espace</a>
                                 <?php }} ?>
                            <a class="dropdown-item" style="color:black" href="<?php echo base_url();?>Mes_favorites">Mes Favoris</a>        
                                     <a class="dropdown-item" style="color:black" href="<?php echo base_url();?>Welcome/logout">Déconnexion</a>         

                           </div>
                         </li>
                       </ul>
                        <?php }?></div>
            
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center" >
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo">
				<a href="#">
					<div class="logo_container d-flex flex-row align-items-start justify-content-start">
						<div class="logo_image"></div>
						<div class="logo_content">
							<div class="logo_text logo_text_not_ie"><img src="<?php echo base_url();?>conference/images/like/logo2.png" alt="" style="width:250px; height:80px"></div>
							<div class="logo_sub">Juin 06, 2019 - Tunisie</div>
						</div>
					</div>
                                </a>
			</div>
			<ul><?php  $uri =$this->uri->segment(1); ?> 
				<li class="menu_item"><a href="<?php echo base_url();?>">Acceuil</a></li>
				<li class="menu_item"><a href="#">Top 10</a></li>
                                <li class="menu_item"><a data-toggle="modal" data-target="#myModalchercher" style="color:white">Evènements</a></li>
                                <li class="menu_item"><a href="<?php echo base_url();?>Contact">Contact</a></li>
			</ul>
		</div>
		
	</div>
                
                          
                
                
                
                
                
		<header class="header" id="header">
                   
			<div>
                           
                            <div class="header_top" style="z-index:200">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="header_top_content d-flex flex-row align-items-center justify-content-start">
									<div>
										<a href="#">
											<div class="logo_container d-flex flex-row align-items-start justify-content-start">
												<div class="logo_image"></div>
												<div class="logo_content">
                                                                                                    <div id="logo_text" class="logo_text logo_text_not_ie"><img src="<?php echo base_url();?>conference/images/like/logo2.png" alt="" style="width:250px; height:80px"></div>
												</div>
											</div>
										</a>	
									</div>
                                                                   
                                                                        <div class="header_social ml-auto" >
                                                                             <?php if (empty($user)) { ?>
                                                                            <div class="button header_button"><a data-toggle="modal" data-target="#myModalconnecter" style="color:white" >Connecter</a></div>
                                                                             <?php } else {   ?> 
                                                                            <ul class="nav nav-pills">
                                                                         
                                                                         <li class="nav-item dropdown">
                                                                             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"  aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>conference/images/like/icon_profile.png" style="width:30px; height:30px" ></a>
                                                                           <div class="dropdown-menu">
                                                                                  <a class="dropdown-item" href="<?php echo base_url();?>Profile" >
                                                                                    <?php if(empty($user['first_name']) and empty($user['last_name']) )
                                                                                  {echo $user['email']; } 
                                                                              else    
                                                                                 { echo $user['first_name'].' '.$user['last_name'] ;
                                                                             }  ?></a> 
                                                                                 <?php  if ($user['role']!='user'){ if ($user['validation']=='yes'){  ?>
                                                                            <a class="dropdown-item" href="<?php echo base_url();?>MyPanel" >Mon Espace</a>
                                                                                 <?php }} ?>
                                                                                    <a class="dropdown-item" href="<?php echo base_url();?>Mes_favorites">Mes Favoris</a>        
                                                                                     <a class="dropdown-item" href="<?php echo base_url();?>Welcome/logout">Déconnexion</a>         
                                                                                                                         
                                                                           </div>
                                                                         </li>
                                                                       </ul>
                                       					<?php }?>
                                                                        </div>
                                                                    <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                                                </div>
							</div>
						</div>
					</div>
				</div>
	
				<div class="header_nav" id="header_nav_pin">
					<div class="header_nav_inner">
						<div class="header_nav_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
											<nav class="main_nav" id='menu'>
                                                                                            
                                                                                            <?php  $uri =$this->uri->segment(1); ?> 
												<ul>
													<li class="<?php if($uri==''){?>active <?php }?>"><a href="<?php echo base_url();?>">Accueil</a></li>
													<li class="<?php if($uri=='Top10'){?>active <?php }?>"><a href="<?php echo base_url();?>Top10">Top 10</a></li>
                                                                                                        <li class="<?php if($uri=='Events'){?>active <?php }?>"><a class="" href="#">Evènements</a>
                                                                                                            <ul>
                                                                                                            <div class="search_container1">
                                                                                                                <div class="container">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-8">
                                                                                                                            <div class="search_content d-flex flex-row align-items-center justify-content-end">

                                                                                                            <?php    if ( count($all_type_events)>0){?>    
                                                                                                                <?php foreach ( $all_type_events as $key => $type_events):?>
                                                                                                                        <?php if ($type_events->banned == 'no'){?>
                                                                                                                                <li style="min-width:100px;width:auto;"><a style="color:black" href="<?php echo base_url();?>Events/<?php echo $type_events->alias?>?page=1"><span ><?php echo $type_events->name?></span></a></li>    
                                                                                                                        <?php  } ?>
                                                                                                                <?php endforeach ?>
                                                                                                            <?php } ?>
                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                        </ul>
                                                                                                        </li>
                                                                                                        <li  class="<?php if($uri=='Contact'){?>active <?php }?>"><a href="<?php echo base_url();?>Contact">Contact</a>
												</ul>
											</nav>
											<div class="header_extra ml-auto">
												<div class="header_search"><i class="fa fa-search" aria-hidden="true"></i></div>
												<?php if ((!empty($user))&&(($user['role']=='admin')||($user['role']=='organizer')) ) {
                                                                                                    if ($user['validation']=='yes'){?>
                                                                                                <div class="button header_button"><a href="<?php echo base_url();?>MyPanel/creation-evenements">Créer Un Evènement!</a></div>
                                                                                                <?php } else {?>
                                                                                                <div class="button header_button"><a data-toggle="modal" data-target="#myModalvalidation" style="color:white">Créer Un Evènement!</a></div>
                                                                                                <?php } } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                                                <form  method="get" action='<?php echo base_url();?>Chercher_Events'>		
                                                    <input type="hidden" name="page" value="1">
                                                        <div class="search_container">
							<div class="container">
								<div class="row">
                                                                    <div class="col">
                                                                        <div class="search_content d-flex flex-row align-items-center justify-content-end">
                                                                               <label for="exampleInputtype" class="home_text">type&nbsp;&nbsp;</label>
                                                                                    <select   class="form-control" name="id_type" id="id_type"   >
                                                                                         <option value="">select</option>          
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
                                                                            </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="search_content d-flex flex-row align-items-center justify-content-end">
                                                                            <label for="exampleInputtype" class="home_text">Pays&nbsp;&nbsp;</label>
                                                                                    <select   class="form-control" name="id_country" id="id_country"  >
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
                                                                            </div>  
                                                                            
                                                                    </div>
                                                                        <div class="col">
                                                                                <div class="search_content d-flex flex-row align-items-center justify-content-end">
                                                                                   <label for="exampleInputVille" class="home_text">Ville&nbsp;&nbsp;</label>
                                                                                   <select   class="form-control" name="id_city" id="id_city">
                                                                                                  <option value="">select</option>
                                                                                    </select>
                                                                                 </div>
                                                                                </div>
                                                                        <div class="col">
                                                                                <div class="search_content d-flex flex-row align-items-center justify-content-end">
                                                                                    <label for="exampleInputdate_debut" class="home_text">date_debut&nbsp;&nbsp;</label>
                                                                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                                                                 </div>
                                                                                </div>                                                                    
									<div class="col">
										<div class="search_content d-flex flex-row align-items-center justify-content-end">
											 <input type="text" class="search_container_input" id="titre" name="titre" placeholder="Search" >												
                                                                                        
										</div>
									</div>
                                                                    <div class="col">
										<div class="search_content d-flex flex-row align-items-center justify-content-end">
                                                                                           <button type="submit" class="btn btn-success">chercher</button>
							                        </div>
							            </div>	
                                                            </div>
							</div>
						</div>
                                            </form>

					</div>
				</div>	
			</div>
                    
		</header>
                
<style>
#menu ul {
margin:0;
padding:0;
list-style-type:none;
text-align:center;
}
#menu li {
float:left;
margin:auto;
padding:0;
background-color:#e9eef2;
}
#menu li a {
display:block;
width:100px;

text-decoration:none;
padding:5px;
}
#menu li a:hover {
 color:#fff;
}
.active a{
 color:#fff;
}

#menu ul li ul {
display:none;
}
#menu ul li:hover ul {
        display:block;
        }
#menu li:hover ul li {
        float:none;
        }

#menu li ul {
   position:absolute;
    }
</style>