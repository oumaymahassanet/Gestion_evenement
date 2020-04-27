        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Evenement</h1>
          <center><a class="btn btn-success"  href="<?php echo base_url();?>MyPanel/city/add_city">Ajouter Une ville</a></center><br>

        <table class='table' >
            <tr>   
                <th>Id</th> 
                <th>Nom de ville</th> 
                <th>Nom de Pays</th>
                <th>Banned</th>
                <th>Modifier</th>
                <th>Effacer</th>
            </tr>

            <?php foreach ($all_city as $key => $city):
                $this->load->model("country_model");
      $list_country=$this->country_model-> all_country($city->id_country);
                ?>
            <tr>
                <td><?php echo $city->id ?></td>
                <td><?php echo $city->name ?></td>
                <td><?php  if (!empty($list_country)){echo $list_country[0]->name ;} else {echo 'No type Found!';} ?></td>
                <td><?php echo $city->banned ?></td>
                <td><a href="<?php echo base_url();?>MyPanel/city/modif_city/<?php echo $city->id ?>" class='btn btn-success'>Modifier</a></td>
                <td><a  data-toggle="modal" data-target="#myModal" onclick="return supp_city('<?php echo $city->id ?>')"  class='btn btn-danger' >Effacer</a></td>
            </tr>
            <?php endforeach ?>
        </table>
   <?php  echo $this->pagination->create_links() ?>  

          
        </div>
      </div>
    </div>
    <!-- Modal -->
<form method='post' action="<?php echo base_url();?>city/supp_city_2">
    <input type="hidden" class="form-control" id="id" name="id" value="">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Confirmation de Suppression</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de supprimer cette ville ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Supprimer</button>
      </div>
    </div>
  </div>
</div>
</form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script> 
    <script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script>
  <script>
     function supp_city(id){
         //alert(id);
         $('#id').val(id);
     }     
 </script>
          
  </body>
</html>
