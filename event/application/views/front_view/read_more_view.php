
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/events.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>conference/styles/events_responsive.css">
 
		

<?php $alias=$this->uri->segment(3); 
                $this->load->model("events_model");
                $events=$this->events_model-> all_events('',$alias);
                $this->load->model("type_events_model");
                $list_type=$this->type_events_model-> all_type_events($events[0]->id_type);
                $this->load->model("city_model");
                $list_ville=$this->city_model-> all_city($events[0]->id_city);
                $this->load->model("country_model");
                $list_country=$this->country_model-> all_country($events[0]->id_country);
                $this->load->model("File");
                $list_picture=$this->File-> all_picture_events('',$events[0]->id);
                //var_dump($list_picture);
                $list_picture_user=$this->File-> all_picture_user('',$events[0]->id_creator);
                //var_dump($list_picture_user);
                $this->load->model("user_model");
                $list_users=$this->user_model-> all_users($events[0]->id_creator);
                $list_orginazer=$this->user_model-> all_organizer($events[0]->id_creator);
                $this->load->model("likes_model");
                $list_likes=$this->likes_model->all_likes($events[0]->id,$user['id']);
                $list_likes_rows=$this->likes_model->all_likes_rows($events[0]->id);
                $number_likes = preg_replace("/[^0-9]{1,4}/", '', $list_likes_rows);
                $this->load->model("dislikes_model");
                $list_dislikes=$this->dislikes_model->all_dislikes($events[0]->id,$user['id']);
                $list_dislikes_rows=$this->dislikes_model->all_dislikes_rows($events[0]->id);
                $number_dislikes = preg_replace("/[^0-9]{1,4}/", '', $list_dislikes_rows);
                $this->load->model("comments_model");
                $list_comments=$this->comments_model->all_comments_valider($events[0]->id,'');
                $this->load->model("note_model");
                $list_note=$this->note_model->all_note($events[0]->id,$user['id']);
                                                              ?>

<center>
    <br><br><br><br><br><br><br><br><br><br>
    <div class="bg">
<style>
.mySlides {display:none;}
.bg{background-color: #f3f7f9;}
</style>

   <?php if(!empty($list_picture)) {   foreach ($list_picture as $key => $file): ?>
  <img class="mySlides" src="<?php echo base_url();?>uploads/files/<?php echo $file->file_name?>"   style="width:600px; height:350px;">
   <?php endforeach ?>
  <?php } else {  ?>
          <img class="mySlides" src="<?php echo base_url();?>conference/images/index.jpg"   style="width:800px; height:400px ;padding-bottom:500px; ">
   <?php }   ?>
     </div>
    </center>
<div class="events">
		<div class="container">
			<div class="row">
				<div class="col"> 
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      

      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $events[0]->titre ;?>   <span class="badge badge-info pull-right"><?php echo $list_type[0]->name ;?></span></h2>
        <?php if($events[0]->start_date==$events[0]->end_date) {?>
        <div><p style="color:black">Le<hhh style="color:#f50136"> <?php echo date("d F Y",  strtotime($events[0]->end_date)) ; ?></hhh></p></div>
        <?php } else {?>
        <div><p style="color:black">De :&nbsp;<hhh style="color:#f50136"><?php echo date("d F Y",  strtotime($events[0]->start_date)) ;?> </hhh>&nbsp;&nbsp;&nbsp;Jusqu'au :&nbsp; <hhh style="color:#f50136"><?php echo date("d F Y", strtotime($events[0]->end_date)) ;?></hhh></p></div>
        <?php ; }?>
       
        <hr>
        <h3>Description</h3>
      <p><?php  echo $events[0]->description ;?></p>
           <br><br>
          <?php if (!empty($list_orginazer[0]->organisation_name)){ ?>  
       <hr>
       <h3>Organisation</h3>
      <p><?php echo $list_orginazer[0]->organisation_name ;?></p>
      <br><br>
      <hr>
      <hr>
<?php }?>
      <?php if (!empty($user)){ ?>
      	<div class="container" >
            <span id="noter_<?php echo $events[0]->id?>"  ><?php if (!empty($list_note)){?><p style="color:blue">Votre note a été envoyé, merci</p><?php } else { ?><p style="color:red">Noter Cette Evènement</p><?php } ?></span>
        
	<div class="row">
	<div class="rating">
      <input type="radio" id="star5" name="rating" value="5" <?php if (!empty($list_note)){ if ($list_note[0]->nb_star==5){ ?>  checked <?php }} ?>  onclick="rate_events('5',<?php echo $events[0]->id?>)"/><label for="star5" title="Trés Bien">5 stars</label>
      <input type="radio" id="star4" name="rating" value="4" <?php if (!empty($list_note)){ if ($list_note[0]->nb_star==4){ ?>  checked <?php }} ?>  onclick="rate_events('4',<?php echo $events[0]->id?>)"/><label for="star4" title="Bien">4 stars</label>
      <input type="radio" id="star3" name="rating" value="3" <?php if (!empty($list_note)){ if ($list_note[0]->nb_star==3){ ?>  checked <?php }} ?>  onclick="rate_events('3',<?php echo $events[0]->id?>)"/><label for="star3" title="Assez Bien">3 stars</label>
      <input type="radio" id="star2" name="rating" value="2" <?php if (!empty($list_note)){ if ($list_note[0]->nb_star==2){ ?>  checked <?php }} ?>  onclick="rate_events('2',<?php echo $events[0]->id?>)"/><label for="star2" title="Pass">2 stars</label>
      <input type="radio" id="star1" name="rating" value="1" <?php if (!empty($list_note)){ if ($list_note[0]->nb_star==1){ ?>  checked <?php }} ?>  onclick="rate_events('1',<?php echo $events[0]->id?>)"/><label for="star1" title="Sucks big time">1 star</label>
        </div>
	</div>       
        </div>
      <?php } ?>
            <hr>
      <hr>
      <div class="event_title">		
                  <span class="pull-right" id="dislikes_<?php echo $events[0]->id ?>">
                        <?php if (!empty($user)){ ?>
                        <?php if (!empty($list_dislikes)){ ?>
                        <a  onclick="return supp_dislikes('<?php echo $events[0]->id?>','<?php echo $list_dislikes_rows ?>')"> <img  src="<?php echo base_url();?>conference/images/like/dislike_bleu.png"   style="width:30px; height:28px"></a><?php echo $list_dislikes_rows;  ?>  
                        <?php }else { ?>                     
                        <a  onclick="return add_dislikes('<?php echo $events[0]->id?>','<?php echo $list_dislikes_rows ?>')"><img  src="<?php echo base_url();?>conference/images/like/dislike_blan.png"   style="width:30px; height:28px"></a><?php echo $list_dislikes_rows;  ?>  
                        <?php }} else { ?>                     
                        <a data-toggle="modal" data-target="#myModalconnecter" ><img  src="<?php echo base_url();?>conference/images/like/dislike_blan.png"   style="width:30px; height:28px"></a><?php echo $list_dislikes_rows;  ?> 
                        <?php }  ?>  
                    
                  </span>
          <span class="pull-right" >
          &nbsp;&nbsp;&nbsp;
                </span>
                 <span class="pull-right" id="likes_<?php echo $events[0]->id ?>">
                        <?php if (!empty($user)){ ?>
                        <?php if (!empty($list_likes)){ ?>
                     <a  onclick="return supp_likes('<?php echo $events[0]->id?>','<?php echo $list_likes_rows;  ?>')"> <img  src="<?php echo base_url();?>conference/images/like/like_bleu.png"   style="width:30px; height:28px"></a><?php echo $list_likes_rows;  ?>
                        <?php }else { ?>                     
                        <a  onclick="return add_likes('<?php echo $events[0]->id?>','<?php echo $list_likes_rows;  ?>')"><img  src="<?php echo base_url();?>conference/images/like/like_blan.png"   style="width:30px; height:28px"></a><?php echo $list_likes_rows;  ?>  
                        <?php }} else { ?>                     
                        <a data-toggle="modal" data-target="#myModalconnecter" ><img  src="<?php echo base_url();?>conference/images/like/like_blan.png"   style="width:30px; height:28px"></a> <?php echo $list_likes_rows;  ?>  
                        <?php } ?>  
                    
                  </span>
          
                                                                                                     
       </div>
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

    .rating:not(:checked) > label:hover,
    .rating:not(:checked) > label:hover ~ label {
        color: dodgerblue;
        
    }

    .rating > input:checked + label:hover,
    .rating > input:checked + label:hover ~ label,
    .rating > input:checked ~ label:hover,
    .rating > input:checked ~ label:hover ~ label,
    .rating > label:hover ~ input:checked ~ label {
        color: dodgerblue;
        
    }

    .rating > label:active {
        position:relative;
        top:2px;
        left:2px;
    }
      </style>
        
        <br>
        <br>
        <br>
      <div class="ajout_de_commentaire">
            <h2>Ajouter un commentaire</h2>
         
            <form method="post" action="<?php echo base_url();?>Welcome/add_comments">
                <p>
                    <label for="commentaire">Commentaire</label><br />
                    <textarea name="content" id="content" cols="70" rows="3" required="required"></textarea><br />
                                <input type="hidden" class="form-control" id="redirect_url" name="redirect_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'] ?>">
                    <input type="hidden" class="form-control" id="id_events" name="id_events" value="<?php echo $events[0]->id ?>">
                                            <?php if (!empty($user)){ ?>
                    <input type='submit' class='btn btn-info' style="color:red"  value='Ajouter' id="Ajouter"/>
                                            <?php } else {  ?>
                    <a type='submit' class='btn btn-info' style="color:red" data-toggle="modal" data-target="#myModalconnecter" >Ajouter</a>
                                        <?php } ?>
                </p>
            </form>
      </div>  
      
     </div> 
      <!-- /.blog-post -->
      
     


    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
          <div class="contact_info_icon text-center"><img src="<?php echo base_url();?>conference/images/contact_1.png" alt=""><h3 class="font-italic" style="color:black"><em>Lieu</em></h3></div>
        <p class="mb-1"><?php echo $list_country[0]->name ;?>, <?php echo $list_ville[0]->name ;?>, <?php echo $events[0]->localisation ;?></p>
        <p class="mb-1">Code Postale: <?php echo $events[0]->zip ;?>    
      </div>
        <div style="overflow:hidden;width: px;position: relative;">
    <iframe width="" height="" src="https://maps.google.com/maps?width=&amp;height=&amp;hl=en&amp;q=<?php echo $events[0]->localisation ;?>%2C%20+(Titre)&amp;ie=UTF8&amp;t=&amp;z=11&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">      
</iframe>
    
    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div><br />


      <div class="p-4 mb-3 bg-light rounded">
        <h3 class="font-italic">Créateur de l'évènement :</h3>
        <ol class="list-unstyled mb-0">
           <div class="event_speakers">
        <!-- Event Speaker -->
        <div class="event_speaker d-flex flex-row align-items-center justify-content-start">
                <div><div class="event_speaker_image"><img src="<?php echo base_url();?>uploads/user/<?php  if (!empty($list_picture_user)){echo $list_picture_user[0]->file_name ;}?>" style="width:48px; height:48px;" alt=""></div></div>
                <div class="event_speaker_content">
                    <div class="event_speaker_name"><a style="color:brown;font-family:arial;font-size:20px" href="<?php echo base_url();?>Oranizer_profile/<?php echo $list_users[0]->alias?>"><?php  if ((!empty($list_users[0]->first_name ))&&(!empty($list_users[0]->last_name ))){echo $list_users[0]->first_name ; echo' ';echo $list_users[0]->last_name ;} else {$list_users[0]->email ;}  ?></a></div>
                    <?php  if (!empty($list_orginazer)){ if (!empty($list_orginazer[0]->description)){?><div class="event_speaker_name"><?php echo $list_orginazer[0]->description ;?></div><?php }} ?> 
                </div>
        </div>

</div>

            
        </ol>
      </div>
<?php if ($list_users[0]->role !='admin') {?>
<div class="p-4 bg-light rounded">
        <h4 class="font-italic">Contact</h4>
        <ol class="list-unstyled">
            <li><div class="event_speaker_name"><img src="<?php echo base_url();?>conference/images/contact_3.png" alt="">&nbsp;&nbsp;Mail: <?php  echo $list_users[0]->email ; ?></div></li> <br>
           <li><div class="event_speaker_name"><img src="<?php echo base_url();?>conference/images/contact_2.png" alt="">&nbsp;&nbsp;Téléphone 1: <?php  echo $list_orginazer[0]->phone1 ; ?></div></li><br>
            <?php  if (!empty($list_orginazer[0]->phone2)){ ?>
           <li><div class="event_speaker_name"><img src="<?php echo base_url();?>conference/images/contact_2.png" alt="">&nbsp;&nbsp;Téléphone 2: <?php  echo $list_orginazer[0]->phone2 ; ?></div></li><br>
            <?php } if (!empty($list_orginazer[0]->fax)){ ?>
            <li><div class="event_speaker_name"><img src="<?php echo base_url();?>conference/images/contact_2.png" alt="">&nbsp;&nbsp;Fax: <?php  echo $list_orginazer[0]->fax ; ?></div></li><br>
            <?php } ?>
            <li><a href="https://www.facebook.com/<?php  echo $list_orginazer[0]->facebook;?>">Facebook&nbsp;&nbsp;<img src="<?php echo base_url();?>conference/images/facebook.png" alt="" style="width:30px; height:24px"></a></li>
        </ol>
      </div>
                 <?php }?>
      
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main>
             <br><h3>Commentaire</h3>                        
        <?php if (!empty($list_comments)){ 
      foreach ($list_comments as $key => $comments) {
                $this->load->model("user_model");
                $list_users_comments=$this->user_model-> all_users($comments->id_user);
                $list_picture_user=$this->File-> all_picture_user('',$comments->id_user);
                //var_dump($list_users_comments);?>
     <br> 
    <div class="row" style="margin-right:-15px;margin-left:-15px;">
    <div class="col-sm-1" style="position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:8.33333333%">
        <div class="thumbnail" style="display:block;padding:4px;margin-bottom:20px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out">
        <?php if (empty($list_picture_user)){ ?>
    <img class="img-responsive user-photo" style="display:block;width:100% \9;max-width:100%;height:auto" src="<?php echo base_url();?>conference/images/like/photo_de_profile.png">
        <?php } else { ?>
    <img class="img-responsive user-photo" style="display:block;width:100% \9;max-width:100%;height:auto" src="<?php echo base_url();?>uploads/user/<?php echo $list_picture_user[0]->file_name ;?>" >
        <?php }  ?>
        </div><!-- /thumbnail -->
</div><!-- /col-sm-1 -->

<div class="col-sm-5" style="position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:41.66666667%">
    <div class="panel panel-default" style="margin-bottom:20px;background-color:#fff;border:1px solid transparent;border-radius:4px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05);border-color:#ddd">
        <div class="panel-heading" style="padding:10px 15px;border-bottom:1px solid transparent;border-top-left-radius:3px;border-top-right-radius:3px;color:#333;background-color:#f5f5f5;border-color:#ddd">
    <strong><?php if ((empty($list_users_comments[0]->first_name)) and (empty($list_users_comments[0]->last_name))){echo $list_users_comments[0]->email; } 
                  else { echo $list_users_comments[0]->first_name; echo ' '; echo $list_users_comments[0]->last_name ;}?></strong> <span class="badge badge-info pull-right"><?php echo $comments->uploaded_on ?></span>
</div>
        <div class="panel-body" style="border-top-color:#ddd">
<?php echo $comments->content ?>
</div><!-- /panel-body -->
</div><!-- /panel panel-default -->
</div><!-- /col-sm-5 -->


</div><!-- /row -->
      <?php }} ?>

                                    </div>
                            
                        </div>
                    
                    </div>
    
    </div>



<script>
    var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
    <script>       
      function add_comments(){
        var content = $("#content").val();
        var id_events = $("#id_events").val(); 

       
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/add_comments_2",  
        data: {id_events: id_events , content:content},  
        cache: false,  
        success: function(result){ console.log(result);console.log(id_events);
           alert('commnetaire ajouter '+id_events+''+content);
        },
        error: function(result){ console.log(result);console.log(id_events);
                    
           alert('commnetaire non ajouter '+id_events+''+content);
        }
        });  //end ajax
     };
     
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin_template/js/jquery-2.1.4.min.js"></script> 
  <script src="<?php echo base_url();?>assets/admin_template/js/bootstrap.js"></script> 
  

<script>

     function add_likes(id_events,nombre_like){
        $('#id_events').val(id_events);
       nombre_like++;
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/add_likes_2",  
        data: {id_events: id_events},  
        cache: false,  
        success: function(result){ obj = JSON.parse(result); console.log(obj[1]);  console.log(result);
            document.getElementById('likes_'+id_events).innerHTML = '<a onclick="return supp_likes(\''+id_events+'\',\''+obj[0]+'\')"> <img  src="<?php echo base_url();?>conference/images/like/like_bleu.png"   style="width:30px; height:28px"></a>'+obj[0];
            document.getElementById('dislikes_'+id_events).innerHTML = '<a onclick="return add_dislikes(\''+id_events+'\',\''+obj[1]+'\')"> <img  src="<?php echo base_url();?>conference/images/like/dislike_blan.png"   style="width:30px; height:28px"></a>'+obj[1];


        },
        error: function(result){ //console.log(result);console.log(id_events);
           alert('error');
        }
        });  //end ajax
     }     

     function supp_likes(id_events,nombre_like){
        $('#id_events').val(id_events);
        nombre_like--;
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/supp_likes_2",  
        data: {id_events: id_events},  
        cache: false,  
        success: function(result){  //console.log(result); console.log(id_events);
            document.getElementById('likes_'+id_events).innerHTML = '<a onclick="return add_likes(\''+id_events+'\',\''+nombre_like+'\')"> <img  src="<?php echo base_url();?>conference/images/like/like_blan.png"   style="width:30px; height:28px"></a>'+nombre_like;
          
        },
        error:function(result){  //console.log(result);console.log(id_events);
           alert(''+id_events);
        }
        });  //end ajax
     }    
     function add_dislikes(id_events,nombre_dislike){
        $('#id_events').val(id_events);
       nombre_dislike++;
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/add_dislikes_2",  
        data: {id_events: id_events},  
        cache: false,  
        success: function(result){ obj = JSON.parse(result); console.log(obj[1]);  console.log(result);
            document.getElementById('dislikes_'+id_events).innerHTML = '<a onclick="return supp_dislikes(\''+id_events+'\',\''+obj[1]+'\')"> <img  src="<?php echo base_url();?>conference/images/like/dislike_bleu.png"   style="width:30px; height:28px"></a>'+obj[1];
            document.getElementById('likes_'+id_events).innerHTML = '<a onclick="return add_likes(\''+id_events+'\',\''+obj[0]+'\')"> <img  src="<?php echo base_url();?>conference/images/like/like_blan.png"   style="width:30px; height:28px"></a>'+obj[0];
        },
        error: function(result){ //console.log(result);console.log(id_events);
           alert('error');
        }
        });  //end ajax
     }     

     function supp_dislikes(id_events,nombre_dislike){
        $('#id_events').val(id_events);
        nombre_dislike--;
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/supp_dislikes_2",  
        data: {id_events: id_events},  
        cache: false,  
        success: function(result){  //console.log(result); console.log(id_events);
            document.getElementById('dislikes_'+id_events).innerHTML = '<a onclick="return add_dislikes(\''+id_events+'\',\''+nombre_dislike+'\')"> <img  src="<?php echo base_url();?>conference/images/like/dislike_blan.png"   style="width:30px; height:28px"></a>'+nombre_dislike;
          
        },
        error:function(result){  //console.log(result);console.log(id_events);
           alert(''+id_events);
        }
        });  //end ajax
     } 
     function rate_events(nb_star,id_events){
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "Welcome/noter_events",  
        data: {nb_star: nb_star , id_events: id_events},  
        cache: false,  
        success: function(result){  console.log(result);
           document.getElementById('noter_'+id_events).innerHTML = '<p style="color:blue">Votre note a été envoyé, merci</p>';
        },
        error: function(result){ console.log(result);
           alert(nb_star);
        }
        });  //end ajax
    }
        </script>  
                   


