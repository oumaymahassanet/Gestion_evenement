        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Evenement</h1>
          
                   <nav class="navbar navbar-expand-lg navbar-light bg-light">
 
 

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      
      <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo base_url();?>MyPanel/events/chercher_events">
          <?php if ($this->uri->segment(3)=='chercher_events'){ ?>
          <input class="form-control mr-sm-2" type="search" id="chercher" name="chercher" placeholder="Titre" aria-label="Chercher" value="<?php echo $cher ?>">
          <?php }else { ?>
          <input class="form-control mr-sm-2" type="search" id="chercher" name="chercher" placeholder="Titre" aria-label="Chercher" >
         <?php }?>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>  
         
          <center><a class="btn btn-success"  href="<?php echo base_url();?>MyPanel/events/add_events">Ajouter Un Evennement</a></center><br>
        
 
          <table class='table' >
            <tr>   
                <th>titre</th> 
                <th>date de début</th>               
                <th>date fin</th> 
                <th>type</th>
                <th>Pays</th>
                <th>Ville</th>
                <th>validation</th>
                <th>Réservation</th>
                <th>Images</th>
                <th>Modifier</th>
                <th>Effacer</th>
            </tr>

            <?php foreach ($all_events as $key => $events):
                $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events($events->id_type);
      $this->load->model("city_model");
      $list_ville=$this->city_model-> all_city($events->id_city);
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country($events->id_country);
      $this->load->model("events_model");
      $list_reservation=$this->events_model-> events_reservation_rows($events->id);
                ?>
            <tr>
                <td><?php echo $events->titre ?></td>
                <td><?php echo date("d/m/Y", strtotime($events->start_date)) ?></td>
                <td><?php echo date("d/m/Y", strtotime($events->end_date)) ?></td>
                <td><?php  if (!empty($list_type)){echo $list_type[0]->name ;} else {echo 'No type Found!';} ?></td>
                <td><?php  if (!empty($list_country)){echo $list_country[0]->name ;} else {echo 'No type Found!';} ?></td>
                <td><?php  if (!empty($list_ville)){echo $list_ville[0]->name ;} else {echo 'No type Found!';} ?></td>
                <td><?php echo $events->validation ?></td>
                <td><a href="<?php echo base_url();?>MyPanel/events/Reservation/<?php echo $events->id ?>" class='btn btn-success'>Reservation (<?php echo $list_reservation ?>)</td>
                <td><a href="<?php echo base_url();?>MyPanel/events/image/<?php echo $events->id ?>" class='btn btn-success'>Images</a></td>               
                <td><a href="<?php echo base_url();?>MyPanel/events/modif_events/<?php echo $events->id ?>" class='btn btn-success'>Modifier</a></td>
                <td><a data-toggle="modal" data-target="#myModal" onclick="return supp_events('<?php echo $events->id ?>')"  class='btn btn-danger' >Effacer</a></td> 
        </tr>
            <?php endforeach ?>
        </table>
   <?php   echo $this->pagination->create_links() ?>  

          
        </div>
      </div>
    </div>
    <!-- Modal -->
<form method='post' action="<?php echo base_url();?>events/supp_events_2">
    <input type="hidden" class="form-control" id="id" name="id" value="">
        <input type="hidden" class="form-control" id="redirect_url" name="redirect_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'] ?>">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Confirmation de Suppression</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de supprimer cette évennement ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-danger">Supprimer</button>
      </div>
    </div>
  </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script>	
	<script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script>
 <script>
     function supp_events(id){
         //alert(id);
         $('#id').val(id);
     }     
 </script>
          
  </body>
</html>
