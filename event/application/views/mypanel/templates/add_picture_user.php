<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Ajouter des Images</h1>
          <!-- display status message -->
<p><?php echo $this->session->flashdata('statusMsg'); ?></p>

<!-- file upload form -->
<form method="post" action="" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $this->uri->segment(4);?>">

    <div class="form-group">
        <label>Choose Picture</label>
        <input type="file" name="user[]" >
    </div>            
    <div class="form-group">
        <input type="submit" name="userSubmit" value="UPLOAD"/>
    </div>
</form>
<!-- display uploaded images -->
<div class="row">
        <?php if(!empty($user_picture)){ foreach($user_picture as $file_user){ ?>
     <div class="col-xs-6 col-md-3">
    <div  class="thumbnail" >
     <img src="<?php echo base_url('uploads/user/'.$file_user['file_name']); ?>"
            <p><a data-toggle="modal" data-target="#myModal" onclick="return supp_picture_user('<?php echo $file_user['id'] ?>')"  class='btn btn-danger' >Effacer</a> </p>
    </div>
  </div>
            
        <?php } }else{ ?>
        <p>Image(s) not found.....</p>
        <?php } ?>
</div>
<br><br>
     <a   href='<?php echo base_url();?>MyPanel/users' class="btn btn-success" >Terminer</a>

        </div>
      </div>
    </div>
    <!-- Modal -->
<form method='post' action="<?php echo base_url();?>Upload_Files/supp_picture_user_2">
    <input type="hidden" class="form-control" id="id" name="id" value="">
              <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $this->uri->segment(4);?>">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Confirmation de Suppression</h4>
      </div>
      <div class="modal-body">
        Vous êtes sûre de supprimer cette Images ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-danger">Supprimer</button>
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
     function supp_picture_user(id){
         //alert(id);
         $('#id').val(id);
     }     
 </script>
  </body>
</html>


