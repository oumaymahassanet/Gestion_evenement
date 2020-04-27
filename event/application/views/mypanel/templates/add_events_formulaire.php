<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Ajouter Un Evènements</h1>
          
<form action='<?php echo base_url();?>events/add_events2' method="post">
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
       <select   class="form-control" name="id_country" id="id_country" required="required"  >
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
    
    <label for="exampleInputVille">Ville</label>
       <select   class="form-control" name="id_city" id="id_city" required="required"  >
                      <option value="">select</option>

        </select>
 </div>
  
  <button type="submit" class="btn btn-success">Ajouter</button>
     

</form>
          
          
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
        let inner = ' <option value="">select</option>';
        for(let i = 0;i<res.length;i++){
            inner+=`<option value="${res[i].id}">${res[i].name}</option>`;
        }
        $("#id_city").html(inner);
    }
    $("#id_country").change(func);
    </script>
  </body>
</html>


