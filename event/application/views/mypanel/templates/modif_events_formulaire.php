<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Modifier Evènements</h1>
                    <?php echo validation_errors('<div class= "alert alert-danger" >', '</div>' ); ?>

<form action='<?php echo base_url();?>events/modif_events_2' method="post">
  <div class="form-group">
      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $events_data[0]->id ?> ">
    <label for="exampleInputEmail1">titre</label>
       <input type="texte" class="form-control" id="titre" name="titre" value="<?php echo $events_data[0]->titre ?>" required="required" >
    <label for="exampleInputdate_debut">date_debut</label>
       <input type="date" class="form-control" id="start_date" name="start_date" required="required" value="<?php echo $events_data[0]->start_date ?>" >
    <label for="exampleInputdate_fin">date_fin</label>
       <input type="date" class="form-control" id="end_date" name="end_date" required="required" value="<?php echo $events_data[0]->end_date ?>" >
    <label for="exampleInputsponseurs">Sponsors</label>
       <input type="texte" class="form-control" id="sponsors" name="sponsors" value="<?php echo $events_data[0]->sponsors?>" >
    <label for="exampleInputdescription">description</label>
       <input type="texte" class="form-control" id="description" name="description" required="required" value="<?php echo $events_data[0]->description ?>" >
    <label for="exampleInputlocalisation">localisation</label>
       <input type="texte" class="form-control" id="localisation" name="localisation" required="required" value="<?php echo $events_data[0]->localisation ?>" >
    <label for="exampleInputZip">Code Postale</label>
       <input type="texte" class="form-control" id="zip" name="zip" required="required" value="<?php echo $events_data[0]->zip ?>">
    <label for="exampleInputtype">type</label>
    <select   class="form-control" name="id_type" id="id_type" required="required" value="<?php echo $events_data[0]->id_type  ?>" >
        <?php    if ( count($all_type_events)>0):?>    
            <?php foreach ( $all_type_events as $key => $type_events):?>
                       <?php if ($type_events->banned == 'no'){?>    
             <option value="<?php echo $type_events->id?>" <?php if( $events_data[0]->id_type == $type_events->id ) {echo "selected" ;}?> ><?php echo $type_events->name?></option>
            <?php } ?>
                 <?php endforeach ?>          
            <?php else: ?>
            <option>No type Found!<option>
            <?php endif; ?>
        </select>
    <label for="exampleInputtype">Pays</label>
    <select   class="form-control" name="id_country" id="id_country" required="required" value="<?php echo $events_data[0]->id_country  ?>" >
        <?php    if ( count($all_country)>0):?>    
            <?php foreach ( $all_country as $key => $country):?>
                               <?php if ($country->banned == 'no'){?>    
             <option value="<?php echo $country->id?>" <?php if( $events_data[0]->id_country == $country->id ) {echo "selected" ;}?> ><?php echo $country->name?></option>
                               <?php } ?>
                 <?php endforeach ?>          
            <?php else: ?>
            <option>No Country Found!<option>
            <?php endif; ?>
        </select>
    <label for="exampleInputtype">Ville</label>
    <select   class="form-control" name="id_city" id="id_city" required="required" value="<?php echo $events_data[0]->id_city  ?>" >
        <?php    if ( count($all_city)>0):?>    
            <?php foreach ( $all_city as $key => $city):?>
             <option value="<?php echo $city->id?>" <?php if( $events_data[0]->id_city == $city->id ) {echo "selected" ;}?> ><?php echo $city->name?></option>
            <?php endforeach ?>          
            <?php else: ?>
            <option>No City Found!<option>
            <?php endif; ?>
        </select>
    <?php if ($user['role']=='admin'){ ?>
       <label for="exampleInputValidation" >Validation</label>
        <select name="validation" class="form-control"  value="<?php echo $events_data[0]->validation ?>" required='required' >
            <option value="yes" <?php if( $events_data[0]->validation =='yes') {echo "selected" ;}?>>Validé</option>
            <option value="no" <?php if( $events_data[0]->validation =='no') {echo "selected" ;}?>>Non Validé</option>
        </select>  
       
         
    <?php } ?>    
  </div>
 
  <div class="checkbox">
    <label>
      <input type="checkbox" required="required" > vous êtes sûre de modifier l'évennement ?
    </label>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
          
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script> 
  <script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script>
 <script>
    let func=async()=>{
        let res = await $.get("<?php echo base_url();?>MyPanel/cities/"+$("#id_country")[0].value);
        res = JSON.parse(res);
        let inner = "";
        for(let i = 0;i<res.length;i++){
            inner+=`<option value="${res[i].id}">${res[i].name}</option>`;
        }
        $("#id_city").html(inner);
    }
    $("#id_country").change(func);
    </script>
  </body>
</html>


