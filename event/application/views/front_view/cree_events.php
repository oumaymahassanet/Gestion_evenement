<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/contact.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/contact_responsive.css">

<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url();?>conference/images/contact.jpg" data-speed="0.8"></div>

<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="current_page">Ajouter Un Evènement</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li>Crée un évènement</li>
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
					<div class="contact_form_container">
						<div class="contact_form_title">Créer Votre Compte</div>
		 <form action='<?php echo base_url();?>Welcome/add_events2' method="post">
                                   <div class="form-group">
         <label for="exampleInputEmail1">titre</label>
         <input type="texte" class="form-control" id="titre" name="titre" required="required" >
        
       <label for="exampleInputdate_debut">date_debut</label>
       <input type="date" class="form-control" id="start_date" name="start_date" required="required" >
    
       <label for="exampleInputdate_fin">date_fin</label>
       <input type="date" class="form-control" id="end_date" name="end_date" required="required" >
    
       <label for="exampleInputsponseurs">sponseurs</label>
       <input type="texte" class="form-control" id="sponsors" name="sponsors" >
    
       <label for="exampleInputdescription">description</label>
       <input type="texte" class="form-control" id="description" name="description" required="required" >
    
       <label for="exampleInputlocalisation">localisation</label>
       <input type="texte" class="form-control" id="localisation" name="localisation" required="required" >
    
       <label for="exampleInputZip">Zip</label>
       <input type="texte" class="form-control" id="zip" name="zip" required="required">
    
       <label for="exampleInputtype">type</label>
       <select   class="form-control" name="id_type" id="id_type" required="required"  >
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
    
    
       <label for="exampleInputtype">Pays</label>
       <select   class="form-control" name="id_country2" id="id_country2" required="required"  >
           <option value="">select</option>
         <?php    if ( count($all_country2)>0):?> 
             <?php foreach ( $all_country2 as $key => $country): ?>
                       <?php if ($country->banned == 'no'){?>    
             <option value="<?php echo $country->id?>"  ><?php echo $country->name?> </option>
                    <?php  } ?>
         <?php endforeach ?>
             <?php  else: ?>
             <option>No type Found!<option>
         <?php endif ?>
        </select>
    
    
       <label for="exampleInputVille" class="home_text">Ville</label>
          <select   class="form-control" name="id_city2" id="id_city2">
             <option value="">select</option>
          </select>    
       </div> 
            <button type="submit" value='valider' class="btn btn-success" id='bouton_envoi'>Inscrire</button>
 </form>
					
				</div>
				
			</div>
		</div>
	</div>
            </div>
            





















