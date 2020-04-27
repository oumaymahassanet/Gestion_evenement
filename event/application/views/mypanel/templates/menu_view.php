
<style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 10;
  left: 0;
  background-color: #EAF2F2;
  overflow-x: hidden;
  padding-top: 0px;
  font-size:1px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #428bca ;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: #428bca;
}
.active a{
  color: #EAF2F2;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 4px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 10px;}
  .sidenav a {font-size: 15px;}
}
</style>

          <?php  $uri =$this->uri->segment(2); ?> 

               <?php if ($user['role']=='admin') 
                  {  ?> 
<div class="sidenav">

    <li class="<?php if($uri==''){ ?> active <?php } ?>"><a  class="<?php if($uri==''){ ?> active <?php } ?>" href="<?php echo base_url();?>MyPanel">Dashboard</a></li>
  
    <li class="<?php if(($uri=='users')||($uri=='users_banned')||($uri=='users_non_valide')){ ?> active <?php } ?>">
  <a class="dropdown-btn">Utilisateurs 
   
      </a>
   
      <?php  $this->load->model("user_model");
                                    $list_user_non_valide=$this->user_model-> user_validation_rows();
                                    $list_user_banned=$this->user_model-> user_banned_rows();?>
  <div class="dropdown-container">
    <a href="<?php echo base_url();?>MyPanel/users" style="color:white" >Tous Les Utilisateurs</a>
    <a href="<?php echo base_url();?>MyPanel/users_non_valide" style="color:white">Utilisateurs Non Validé (<?php echo $list_user_non_valide; ?>)</a>
    <a href="<?php echo base_url();?>MyPanel/users_banned" style="color:white"> Utilisateurs Banned (<?php echo $list_user_banned; ?>)</a>
  </div>
         </li>
         <li class="<?php if(($uri=='events')||($uri=='events_banned')||($uri=='events_non_valide')||($uri=='creation-evenements')){ ?> active <?php } ?>">
  <a class="dropdown-btn">Evenements
   
  </a>
    <?php $this->load->model("events_model");
                                    $list_events_non_valide=$this->events_model-> events_validation_rows();
                                    $list_events_banned=$this->events_model-> events_banned_rows();?>
  <div class="dropdown-container">
    <a href="<?php echo base_url();?>MyPanel/events"style="color:white">Tous Les Evènements</a>
    <a href="<?php echo base_url();?>MyPanel/events_non_valide" style="color:white">Evènements Non Validé (<?php echo $list_events_non_valide; ?>)</a>
    <a href="<?php echo base_url();?>MyPanel/events_banned" style="color:white" >Evènements Banned (<?php echo $list_events_banned; ?>)</a>
  </div>
         </li>
    <li class="<?php if($uri=='type_events'){ ?> active <?php } ?>"><a href="<?php echo base_url();?>MyPanel/type_events">Type Des Evenements</a></li>
    <li class="<?php if($uri=='city'){ ?> active <?php } ?>"><a href="<?php echo base_url();?>MyPanel/city">Ville</a></li>
    <li class="<?php if($uri=='country'){ ?> active <?php } ?>"><a href="<?php echo base_url();?>MyPanel/country">Pays</a></li>
    <li class="<?php if($uri=='comments'){ ?> active <?php } ?>"><a href="<?php echo base_url();?>MyPanel/comments">Commentaires</a></li>              
    
</div>
<?php     
                  }
               
               if ($user['role']=='organizer') 
                  {?>
<div class="sidenav">
       
    <li class="<?php if($uri==''){ ?> active <?php } ?>"><a href="<?php echo base_url();?>MyPanel">Dashboard</a></li>
   <li class="<?php if($uri=='events'){ ?> active <?php } ?>"><a href="<?php echo base_url();?>MyPanel/events">Mes Evenements</a></li>
</div>
       <?php } ?>


<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>


