<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct(){
        parent::__construct();
        $this->load->database();
                $this->load->model("events_model");

    }
    public function func_alias($name=''){
              $alias = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name);
              $alias = str_replace(' ', '-', $alias);
              $alias = preg_replace('#[^A-Za-z0-9\-_]#u', '', $alias);
              $alias= preg_replace('#[\-+]#u  ', '-', $alias);   
                        
                        
      return $alias ;
  }
    public function logout(){
        $this->session->sess_destroy();
         redirect('');
        
    }
    


    public function add_users2(){
 
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model("user_model");
        $role=$this->input->post ('role');
        if ($role=='user'){ $validation='yes';}
        else {$validation='no';}
        $data = ['id'=> null,
          'role' =>$this->input->post ('role'),
          'validation'=> $validation,
          'email' => $this->input->post ('email'),
          'password' => md5($this->input->post ('password')),
          'first_name' => $this->input->post ('first_name'),
          'last_name' => $this->input->post ('last_name'),    
          ];
                $redirect_url= $this->input->post ('redirect_url');
        
        
        $this->form_validation->set_rules('first_name', 'Nom', 'required' );
        $this->form_validation->set_rules('last_name', 'prenom', 'required');
        $this->form_validation->set_rules('password', 'Mots de Passe', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('comfpassword', 'Comfirmation de Mots de Passe', 'required|matches[password]');
                if ($this->form_validation->run() == TRUE  ) 
                {
                    $this->user_model-> ajout($data); 
                    if($validation=='yes'){
                            $this->session->set_userdata('user',$data);
                    }
                   header('Location: '.$redirect_url);
                }
                       
        $this->load->view('front_view/header_home');
        $this->load->view('front_view/inscrire_view');
        $this->load->view('front_view/footer_home');

} 
public function inscrire (){
                    
        $data['all_type_events']=$this->getdata_type_events();

        $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/inscrire_view',$data);
        $this->load->view('front_view/footer_home',$data);
 
           }

public function check_login(){  
             $this->load->model('user_model');

    $data['username']= $this->input->post ('name'); 
    $data['password']=$this->input->post ('pwd');
      $redirect_url=$this->input->post ('redirect_url');
    
    $res=$this->user_model->islogin($data); 
    if($res){     
        $this->session->set_userdata('user',$res); 
      echo $redirect_url; 
    } 
    
    else{  
       echo '';  
    }   
    }
   

    public function getdata_type_events(){
 
             $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events();

      
        return $list_type;
 
           }
           public function getdata_city(){
                
       $this->load->model("city_model");   
      $list_ville=$this->city_model-> all_city();
       
      
      
       
        return $list_ville;
 
           }
           public function getdata_user(){
                     
       
       $this->load->model('user_model');
     
       $data=$this->session->userdata("user");
        
        return $data;
 
           }
           public function getdata_country(){
                     
       

       $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
             
        return $list_country;
 
           }
           public function getdata_all_picture_type_events(){
                     
       

      $this->load->model("File");
      $list_picture_type_events=$this->File-> all_picture_type_events();
    
        return $list_picture_type_events;
 
           }
           public function getdata_all_picture_user(){
                     
       

      $this->load->model("File");
      $list_picture_user=$this->File-> all_picture_user();
    
        return $list_picture_user;
 
           }
           public function getdata_all_picture_events(){
                     
       

      $this->load->model("File");
      $list_picture_events=$this->File-> all_picture_events();
    
        return $list_picture_events;
 
           }
            
           public function getdata_plus_proche_events(){
                     
      $this->load->model("events_model");
      
      $list_proche=$this->events_model-> plus_proche_events();
      
        return $list_proche;
 
           }
               public function getdata_top_10_events(){
                     
      $this->load->model("events_model");
      
      $list_top_10=$this->events_model-> top_10_events();
      
        return $list_top_10;
 
           }
           public function getdata_top_10_user(){
                     
      $this->load->model("user_model");
      
      $list_top_10=$this->user_model-> top_10_user();
      
        return $list_top_10;
 
           }
    public function getdata_all_favorites(){
                     
       

      $this->load->model("favorites_model");
      $list_favorites=$this->favorites_model->all_favorites();
    
        return $list_favorites;
 
           }
           
            public function getdata_all_reservation(){
                     
       

      $this->load->model("reservation_model");
      $list_reservation=$this->reservation_model->all_reservation();
    
        return $list_reservation;
 
           }
     public function profile_all_user(){
        $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
            $data['all_picture_user']=  $this->getdata_all_picture_user();
            $this->load->model("user_model"); 
            $list_users_profile=$this->user_model->all_users_profile($data['user']['id']);
            $data['all_users_profile']=$list_users_profile ;
            $list_users=$this->user_model->all_users($data['user']['id']);
            $data['all_users']=$list_users ;
            $list_orginazer=$this->user_model-> all_organizer($data['user']['id']);
            $data['all_organizer']=$list_orginazer ;
            $data['all_type_events']=$this->getdata_type_events();
            $data['all_country']=$this->getdata_country();
            $data['all_favorites']=  $this->getdata_all_favorites();
            $this->load->model("likes_model");
            $list_likes=$this->likes_model-> nbr_likes($data['user']['id']);
            $data['nbr_likes']=$list_likes;
            $this->load->model("comments_model");
            $list_comments=$this->comments_model-> nbr_comments($data['user']['id']);
            $data['nbr_comments']=$list_comments;
            $this->load->model("favorites_model");
            $list_favorites=$this->favorites_model-> nbr_favorites($data['user']['id']);
            $data['nbr_favorites']=$list_favorites;
            $this->load->model("events_model");
            $list_events=$this->events_model-> nbr_events($data['user']['id']);
            $data['nbr_events']=$list_events;
              
          if ($data['user']['role']=='user'){
        
         if (!empty($data['all_users_profile'])){
           $id_country=$data['all_users_profile'][0]->id_country ;
           $this->load->model("city_model");
           $list_ville=$this->user_model-> all_city($id_country);
          $data['all_city']=$list_ville;}}
          
          if ($data['user']['role']!='user'){
   
         if (!empty($data['all_organizer'])){
           $id_country=$data['all_organizer'][0]->id_country ;
           $this->load->model("city_model");
           $list_ville=$this->user_model-> all_city($id_country);
          $data['all_city']=$list_ville;}}
        $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/profile_all_user',$data);
        $this->load->view('front_view/footer_home',$data);
        
    }
     public function profile_all_user2(){
         $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        $this->load->model("user_model");
        $alias= $this->input->post ('first_name')." ".$this->input->post ('last_name');
        $data['user']=$this->session->userdata("user");
        
        if ($data['user']['role']=='user'){ ////////////test role(user)////////
            
                    $list_users=$this->user_model->all_users_profile($data['user']['id']);
                    if (!empty($this->input->post ('password')) ){ ////test password////
                    $data= ['id'=> $this->input->post ('id'),
                      'email' => $this->input->post ('email'),
                      'password' => md5($this->input->post ('password')),
                      'first_name' => $this->input->post ('first_name'),
                      'last_name' => $this->input->post ('last_name'),
                       'alias'=> $this->func_alias($alias)
                      ];
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                    $this->form_validation->set_rules('last_name', 'Prénom', 'required');
                    $this->form_validation->set_rules('first_name', 'Nom', 'required');
                    $this->form_validation->set_rules('password', 'Mots de Passe', 'min_length[8]');
                    $this->form_validation->set_rules('comfpassword', 'Comfirmation de Mots de Passe', 'matches[password]');
                    }
                    
                    if (empty($this->input->post ('password')) and (empty($this->input->post ('comfpassword'))) ){
                    $data= ['id'=> $this->input->post ('id'),
                      'email' => $this->input->post ('email'),
                      'first_name' => $this->input->post ('first_name'),
                      'last_name' => $this->input->post ('last_name'),
                       'alias'=> $this->func_alias($alias)
                      ];
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                    $this->form_validation->set_rules('last_name', 'Prénom', 'required');
                    $this->form_validation->set_rules('first_name', 'Nom', 'required');
                    }
                    
                                if ($this->form_validation->run() == TRUE  ) {  ////////// test form validation ///////////
                                    $this->user_model-> modif($data);
                                        ////////// test existance des profile(pas de profile)/////
                                        if (empty($list_users)) { 
                                                $data1=[
                                                  'id'=> null,
                                                  'id_user' =>$this->input->post ('id'),
                                                  'id_country' =>$this->input->post ('id_country'),
                                                  'id_city' =>$this->input->post ('id_city'),
                                                  'adress' => $this->input->post ('adress'),
                                                  'zip' => $this->input->post ('zip'),
                                                  'gendre' => $this->input->post ('gendre'),
                                                  'phone' => $this->input->post ('phone'),    
                                                ];
                                                $this->user_model-> ajout_users($data1);
                                        }
                                        else {////////// test existance des profile(profile  existe deja)/////

                                                    $data1=[
                                                    'id'=> $list_users[0]->id,
                                                  'id_user' =>$this->input->post ('id'),
                                                  'id_country' =>$this->input->post ('id_country'),
                                                  'id_city' =>$this->input->post ('id_city'),
                                                  'adress' => $this->input->post ('adress'),
                                                  'zip' => $this->input->post ('zip'),
                                                  'gendre' => $this->input->post ('gendre'),
                                                  'phone' => $this->input->post ('phone'),    
                                                ];
                                                     $this->user_model-> modif_user($data1);
                                        }


                                             redirect('');    

                                }////////////// fin test form validation //////////////////////////////////////

                                else{ 
                                            $data['user']=$this->getdata_user();
                                            $data['all_picture_user']=  $this->getdata_all_picture_user();
                                            $this->load->model("user_model"); 
                                            $list_users_profile=$this->user_model->all_users_profile($data['user']['id']);
                                            $data['all_users_profile']=$list_users_profile ;
                                            $list_users=$this->user_model->all_users($data['user']['id']);
                                            $data['all_users']=$list_users ;
                                            $list_orginazer=$this->user_model-> all_organizer($data['user']['id']);
                                            $data['all_organizer']=$list_orginazer ;
                                            $data['all_type_events']=$this->getdata_type_events();
                                            $data['all_country']=$this->getdata_country();
                                            $data['all_favorites']=  $this->getdata_all_favorites();
                                            $this->load->model("likes_model");
                                            $list_likes=$this->likes_model-> nbr_likes($data['user']['id']);
                                            $data['nbr_likes']=$list_likes;
                                            $this->load->model("comments_model");
                                            $list_comments=$this->comments_model-> nbr_comments($data['user']['id']);
                                            $data['nbr_comments']=$list_comments;
                                            $this->load->model("favorites_model");
                                            $list_favorites=$this->favorites_model-> nbr_favorites($data['user']['id']);
                                            $data['nbr_favorites']=$list_favorites;
                                            $this->load->model("events_model");
                                            $list_events=$this->events_model-> nbr_events($data['user']['id']);
                                            $data['nbr_events']=$list_events;
                                            
                                                if ($data['user']['role']=='user'){
                                               if (!empty($data['all_users_profile'])){
                                                        $id_country=$data['all_users_profile'][0]->id_country ;
                                                        $this->load->model("city_model");
                                                        $list_ville=$this->user_model-> all_city($id_country);
                                                       $data['all_city']=$list_ville;    
                                               }}

                                         

                                        $this->load->view('front_view/header_home',$data);
                                        $this->load->view('front_view/profile_all_user',$data);
                                        $this->load->view('front_view/footer_home',$data);


                                }   
        }////////////////////////////////////////fin test role(user)////////////////////////////////////////////////
        
        ////////////////////////////////////////fin test role(admin ou organizer)////////////////////////////////////////////////
        
        else if (($data['user']['role']=='admin') || ($data['user']['role']=='organizer') ){
            
        $list_organizer=$this->user_model->all_organizer($data['user']['id']);
        if (!empty($this->input->post ('password')) ){
        $data= ['id'=> $this->input->post ('id'),
          'email' => $this->input->post ('email'),
          'password' => md5($this->input->post ('password')),
          'first_name' => $this->input->post ('first_name'),
          'last_name' => $this->input->post ('last_name'),
           'alias'=> $this->func_alias($alias)
          ];
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('last_name', 'Prénom', 'required');
        $this->form_validation->set_rules('first_name', 'Nom', 'required');
        $this->form_validation->set_rules('password', 'Mots de Passe', 'min_length[8]');
        $this->form_validation->set_rules('comfpassword', 'Comfirmation de Mots de Passe', 'matches[password]');
        }
        if (empty($this->input->post ('password')) and (empty($this->input->post ('comfpassword'))) ){
        $data= ['id'=> $this->input->post ('id'),
          'email' => $this->input->post ('email'),
          'first_name' => $this->input->post ('first_name'),
          'last_name' => $this->input->post ('last_name'),
           'alias'=> $this->func_alias($alias)
          ];
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                    $this->form_validation->set_rules('last_name', 'Prénom', 'required');
                    $this->form_validation->set_rules('first_name', 'Nom', 'required'); 
        }
        
          if ($this->form_validation->run() == TRUE  ) {
                        $this->user_model-> modif($data);
        
                if (empty($list_organizer)) {
        
                   $data1=[
                          'id'=> null,
                          'id_user' =>$this->input->post ('id'),
                          'id_country' =>$this->input->post ('id_country'),
                          'id_city' =>$this->input->post ('id_city'),
                          'adress' => $this->input->post ('adress'),
                          'zip' => $this->input->post ('zip'),
                          'gendre' => $this->input->post ('gendre'),
                          'phone1' => $this->input->post ('phone1'),  
                          'phone2' => $this->input->post ('phone2'), 
                          'organisation_name' => $this->input->post ('organisation_name'), 
                          'description ' => $this->input->post ('description '), 
                          'fax' => $this->input->post ('fax'), 
                          'facebook ' => $this->input->post ('facebook'), 
                        ];
                     $this->user_model-> ajout_organizer($data1);
                     
                }
                else {
                 
                            $data1=[
                            'id'=> $list_organizer[0]->id,
                          'id_user' =>$this->input->post ('id'),
                          'id_country' =>$this->input->post ('id_country'),
                          'id_city' =>$this->input->post ('id_city'),
                          'adress' => $this->input->post ('adress'),
                          'zip' => $this->input->post ('zip'),
                          'gendre' => $this->input->post ('gendre'),
                          'phone1' => $this->input->post ('phone1'), 
                          'phone2' => $this->input->post ('phone2'), 
                          'organisation_name' => $this->input->post ('organisation_name'), 
                          'description' => $this->input->post ('description'), 
                          'fax' => $this->input->post ('fax'), 
                          'facebook ' => $this->input->post ('facebook')                                
                        ];
                             $this->user_model-> modif_organizer($data1);
                  
                }
                         redirect('');
 
          }
/////////////////////////////////////////////////
            else{ 
 $data['user']=$this->getdata_user();
            $data['all_picture_user']=  $this->getdata_all_picture_user();
            $this->load->model("user_model"); 
            $list_users_profile=$this->user_model->all_users_profile($data['user']['id']);
            $data['all_users_profile']=$list_users_profile ;
            $list_users=$this->user_model->all_users($data['user']['id']);
            $data['all_users']=$list_users ;
            $list_orginazer=$this->user_model-> all_organizer($data['user']['id']);
            $data['all_organizer']=$list_orginazer ;
            $data['all_type_events']=$this->getdata_type_events();
            $data['all_country']=$this->getdata_country();
            $data['all_favorites']=  $this->getdata_all_favorites();
              $this->load->model("likes_model");
            $list_likes=$this->likes_model-> nbr_likes($data['user']['id']);
            $data['nbr_likes']=$list_likes;
            $this->load->model("comments_model");
            $list_comments=$this->comments_model-> nbr_comments($data['user']['id']);
            $data['nbr_comments']=$list_comments;
            $this->load->model("favorites_model");
            $list_favorites=$this->favorites_model-> nbr_favorites($data['user']['id']);
            $data['nbr_favorites']=$list_favorites;
            $this->load->model("events_model");
            $list_events=$this->events_model-> nbr_events($data['user']['id']);
            $data['nbr_events']=$list_events;
          
          if ($data['user']['role']!='user'){
   
         if (!empty($data['all_organizer'])){
           $id_country=$data['all_organizer'][0]->id_country ;
           $this->load->model("city_model");
           $list_ville=$this->user_model-> all_city($id_country);
          $data['all_city']=$list_ville;}}
          
        $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/profile_all_user',$data);
        $this->load->view('front_view/footer_home',$data);
                   
            
            }   
///////////////////////////////////////////////////
                }
        
     }


	 public function index(){
            
            $data['all_type_events']=$this->getdata_type_events();
            $data['user']=$this->getdata_user();
            $data['all_city']=$this->getdata_city();
            $data['all_country']=$this->getdata_country();
            $data['all_picture_type_events']=  $this->getdata_all_picture_type_events();
            $data['plus_proche_events']=$this->getdata_plus_proche_events();
            $this->load->model("user_model"); 
            $list_users=$this->user_model->all_users();
            $data['all_users']=$list_users ;
            
       $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/home',$data);
        $this->load->view('front_view/footer_home',$data);
        
            }
            
            public function events (){
                $this->load->model("note_model");
                $list_note=$this->note_model->all_note_rows();
                $data['note']=$list_note;
                 $this->load->model('events_model');
                    $perpage=2;
                      $page = intval($this->input->get ('page'));
                      if($page<1) {$page=1;}
               $alias=$this->uri->segment(2);
               $this->load->model("type_events_model");
               $list_type=$this->type_events_model-> all_type_events('',$alias);
               $id_type=$list_type[0]->id;
                              
               $this->load->model("events_model");

            $data['chercher_events']= $this-> events_model -> chercher_events($id_type,'','','','',$page);
               //var_dump($data['chercher_events']);
             $data['num_rows']=$this-> events_model -> chercher_events_rows($id_type,'','','','');
           $total_pages=ceil($data['num_rows']/$perpage);
           $data['total_pages']=$total_pages;
            $data['user']=$this->getdata_user();
            $data['all_type_events']=$this->getdata_type_events();
            $data['all_city']=$this->getdata_city();
            $data['all_country']=$this->getdata_country();
            $data['all_picture_type_events']=  $this->getdata_all_picture_type_events();
            $data['all_favorites']=  $this->getdata_all_favorites();
                        $data['all_reservation']=  $this->getdata_all_reservation();            

      
            $pagination='';
            ob_start();
            for($i=1 ;$i <= $total_pages;$i++) {?>
                <li <?php if ($i==intval($this->input->get('page'))){?> class="active" <?php } ?>><a href="<?php echo base_url();?>Events/<?php echo $this->uri->segment(2);?>?page=<?php echo $i?>"><?php echo $i?>.</a></li>
		<?php } 
                $pagination= ob_get_contents();
                ob_clean();
            $data['pagination']=$pagination;
               
        $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/chercher_events_view',$data);
        $this->load->view('front_view/footer_home',$data);
        
            }
            
            public function chercher(){
                $this->load->model("note_model");
                       $this->load->model('events_model');
        $perpage=2;
          $page = intval($this->input->get ('page'));
          if($page<1) {$page=1;}
          $id_city = $this->input->get ('id_city');
          $id_country = $this->input->get ('id_country');
          $id_type = $this->input->get ('id_type');
          $strat_date= $this->input->get ('start_date');
          $titre= $this->input->get ('titre');
            //var_dump($data);
            $data['chercher_events']= $this-> events_model -> chercher_events($id_type,$id_country,$id_city,$strat_date,$titre,$page);
            //var_dump($data1);
            $data['num_rows']=$this-> events_model -> chercher_events_rows($id_type,$id_country,$id_city,$strat_date,$titre);
           $total_pages=ceil($data['num_rows']/$perpage);
           $data['total_pages']=$total_pages;
           //var_dump($total_pages);
           $data['all_type_events']=$this->getdata_type_events();
            $data['user']=$this->getdata_user();
            $data['all_city']=$this->getdata_city();
            $data['all_country']=$this->getdata_country();
            $data['all_picture_user']=  $this->getdata_all_picture_user();
            $data['all_favorites']=  $this->getdata_all_favorites();
            $data['all_reservation']=  $this->getdata_all_reservation();            
            $data['plus_proche_events']=$this->getdata_plus_proche_events();
            $this->load->model("user_model"); 
            $list_users=$this->user_model->all_users();
            $data['all_users']=$list_users ;
            
            $pagination='';
            ob_start();
            for($i=1 ;$i <= $total_pages;$i++) {?>
                <li <?php if ($i==intval($this->input->get('page'))){?> class="active" <?php } ?>><a href="<?php echo base_url();?>Chercher_Events?page=<?php echo $i?>&id_type=<?php echo $this->input->get ('id_type');?>&id_country=<?php echo $this->input->get ('id_country');?>&id_city=<?php echo $this->input->get ('id_city');?>&start_date=<?php echo $this->input->get ('start_date');?>&titre=<?php echo $this->input->get ('titre');?>"><?php echo $i?>.</a></li>
		<?php } 
                $pagination= ob_get_contents();
                ob_clean();
            $data['pagination']=$pagination;
            
       $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/chercher_events_view',$data);
        $this->load->view('front_view/footer_home',$data);
            
            }
             public function read_more(){
                $this->load->model('events_model');

                $this->load->model("File");
                $list_picture=$this->File-> all_picture_events();
                $data['all_picture']=  $list_picture ;
                $data['all_type_events']=$this->getdata_type_events();
                $data['user']=$this->getdata_user();
                $data['all_city']=$this->getdata_city();
                $data['all_country']=$this->getdata_country();
                $data['all_picture_user']=  $this->getdata_all_picture_user();
                $this->load->model("user_model"); 
                $list_users=$this->user_model->all_users();
                $list_users_comments=$this->user_model->all_users();
                $data['all_users']=$list_users ;
                    $data['all_users_comments']=$list_users_comments ;
                $list_orginazer=$this->user_model-> all_organizer();
                $data['all_organizer']=$list_orginazer ;
                $this->load->model("likes_model");
                $list_likes=$this->likes_model->all_likes();
                $data['all_likes']=$list_likes ;
                $list_likes_rows=$this->likes_model->all_likes_rows();
                $data['all_likes_rows']=$list_likes_rows ;
                $this->load->model("dislikes_model");
                $list_dislikes=$this->dislikes_model->all_dislikes();
                $data['all_dislikes']=$list_dislikes ;
                $list_dislikes_rows=$this->dislikes_model->all_dislikes_rows();
                $data['all_dislikes_rows']=$list_dislikes_rows ;
                $this->load->model("comments_model");
                $list_comments=$this->comments_model->all_comments_valider();
                $data['all_comments_valider']=$list_comments ;
                $this->load->model("note_model");
                $list_note=$this->note_model->all_note();
                $data['all_note']=$list_note ;

            
        $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/read_more_view',$data);
        $this->load->view('front_view/footer_home',$data);
            
            }
            public function all_mes_favorites(){
                $this->load->model("note_model");
                $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
            $this->load->model("File");
            $list_picture=$this->File-> all_picture_events();
            $data['all_picture']=  $list_picture ;
            $data['all_type_events']=$this->getdata_type_events();    
            $data['user']=$this->getdata_user();
            $data['all_city']=$this->getdata_city();
            $data['all_country']=$this->getdata_country();
            $data['all_picture_user']=  $this->getdata_all_picture_user();
             $this->load->model("events_model"); 
            $list_events=$this->events_model->all_events();
             $this->load->model("user_model"); 
            $list_users=$this->user_model->all_users();
            $data['all_users']=$list_users ;
            $list_orginazer=$this->user_model-> all_organizer();
            $data['all_organizer']=$list_orginazer ;
                $id_user=$data['user']['id'];
                $this->load->model("favorites_model");
                $list_favorites=$this->favorites_model->all_favorites('',$id_user);
                $data['all_favorites']=$list_favorites;
                $data['all_events']=$list_events;
                //var_dump($list_favorites);
                
                
        $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/favorites_view',$data);
        $this->load->view('front_view/footer_home',$data);
                
            }
     public function profile(){
            $this->load->model('user_model');

            $this->load->model("File");
            $list_picture=$this->File-> all_picture_events();
            $data['all_picture']= $list_picture ;
            $data['all_type_events']=$this->getdata_type_events();
            $data['user']=$this->getdata_user();
            $data['all_city']=$this->getdata_city();
            $data['all_country']=$this->getdata_country();
            $data['all_picture_user']=  $this->getdata_all_picture_user();
            $this->load->model("user_model"); 
            $list_users=$this->user_model->all_users();
            $data['all_users']=$list_users ;
            $list_orginazer=$this->user_model-> all_organizer();
            $data['all_organizer']=$list_orginazer ;
            $this->load->model("events_model");
            $list_active_events=$this->events_model-> active_events();
            $data['active_events']= $list_active_events ;
            $list_non_active_events=$this->events_model-> non_active_events();
            $data['non_active_events']= $list_non_active_events ;
            
        $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/profile_view',$data);
        $this->load->view('front_view/footer_home',$data);
            
     }
     public function contact(){
         $data['all_type_events']=$this->getdata_type_events();
                     $data['user']=$this->getdata_user();
                      $data['all_city']=$this->getdata_city();
            $data['all_country']=$this->getdata_country();

         $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/Contact_view',$data);
        $this->load->view('front_view/footer_home',$data);
     }

     public function top10 (){
         $this->load->model("File");
            $list_picture=$this->File-> all_picture_events();
            $data['all_picture']=  $list_picture ;
            $data['all_type_events']=$this->getdata_type_events();    
            $data['user']=$this->getdata_user();
            $data['all_city']=$this->getdata_city();
            $data['all_country']=$this->getdata_country();
            $data['all_picture_user']=  $this->getdata_all_picture_user();
            $data['top_10_events']=$this->getdata_top_10_events();
            $data['top_10_user']=$this->getdata_top_10_user();
             $this->load->model("events_model"); 
            $list_events=$this->events_model->all_events();
             $this->load->model("user_model"); 
            $list_users=$this->user_model->all_users();
            $data['all_users']=$list_users ;
            $list_orginazer=$this->user_model-> all_organizer();
            $data['all_organizer']=$list_orginazer ;
                        $data['all_type_events']=$this->getdata_type_events();



        $this->load->view('front_view/header_home',$data);
        $this->load->view('front_view/top10_view',$data);
        $this->load->view('front_view/footer_home',$data);
               
     }

     public function add_favorites_2(){
         $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("favorites_model");
         $id_user =$this->session->userdata("user");
         
        $data = [
            'id_user' => $id_user['id'],
             'id_events' => $this->input->post ('id_events'),
          ]; 
                  
                  $this->favorites_model->ajout($data);
                  
               
             
     }
      public function supp_favorites_2(){
         $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("favorites_model");
         $id_user1 =$this->session->userdata("user");
         
      
        $id_user=$id_user1['id'];
        $id_events = $this->input->post ('id_events');
        
                  $data1=$this->favorites_model->all_favorites($id_events,$id_user);
                 // var_dump($data1);
                 $this->favorites_model->delete($data1);
                  
               
             
     }
      public function add_reservation_2(){
         $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("reservation_model");
         $id_user =$this->session->userdata("user");
         
        $data = [
            'id_user' => $id_user['id'],
             'id_events' => $this->input->post ('id_events'),
          ]; 
                  
                  $this->reservation_model->ajout($data);
                  
               
             
     }
      public function supp_reservation_2(){
         $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("reservation_model");
         $id_user1 =$this->session->userdata("user");
         
      
        $id_user=$id_user1['id'];
        $id_events = $this->input->post ('id_events');
        
                  $data1=$this->reservation_model->all_reservation($id_events,$id_user);
                 //var_dump($data1);
                 $this->reservation_model->delete($data1);
                 
               
             
     }
      public function add_likes_2(){
         $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("likes_model");
        $this->load->model("dislikes_model");
                $this->load->model("events_model");
         $id_user =$this->session->userdata("user");
         
        $data = [
            'id_user' => $id_user['id'],
             'id_events' => $this->input->post('id_events'),
          ]; 
                   $id_events = $this->input->post ('id_events');
                 //  var_dump($id_events);
                  $this->likes_model->ajout($data);
                  $list_events=$this->events_model->all_events($id_events,'');
                  $nbre_jaime=$list_events[0]->nbr_jaime ;
                  $nbre_jaime++ ;
                  $row =[
                      'id'=>$id_events ,
                      'nbr_jaime'=>$nbre_jaime,
                  ];
                  $this->events_model->modif_jaime($row);
       $list_dislike=$this->dislikes_model->all_dislikes($id_events,$id_user['id']);
           if (!empty($list_dislike)){
                 $this->dislikes_model->delete($list_dislike);
           }    
          $nbre_dislikes=$this->dislikes_model->all_dislikes_rows($id_events);
          $nbre_likes=$this->likes_model->all_likes_rows($id_events);
          $res= array (
              $nbre_likes,
              $nbre_dislikes
          );
          //var_dump($res);
          echo json_encode($res,true);  
     
     }
      public function supp_likes_2(){
         $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("likes_model");
                $this->load->model("events_model");
         $id_user1 =$this->session->userdata("user");
         
        $id_user=$id_user1['id'];
        $id_events = $this->input->post ('id_events');
        
                  $data1=$this->likes_model->all_likes($id_events,$id_user);
           
                 $this->likes_model->delete($data1);
                                   $list_events=$this->events_model->all_events($id_events,'');
                  $nbre_jaime=$list_events[0]->nbr_jaime ;
                  $nbre_jaime-- ;
                  $row =[
                      'id'=>$id_events ,
                      'nbr_jaime'=>$nbre_jaime,
                  ];
                  $this->events_model->modif_jaime($row);
                  
               
             
     }

            public function add_dislikes_2(){
         $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("likes_model");
        $this->load->model("dislikes_model");
        
         $id_user =$this->session->userdata("user");
         
        $data = [
            'id_user' => $id_user['id'],
             'id_events' => $this->input->post('id_events'),
          ]; 
                   $id_events = $this->input->post ('id_events');
                 //  var_dump($id_events);
                  $this->dislikes_model->ajout($data);
       $list_likes=$this->likes_model->all_likes($id_events,$id_user['id']);
           if (!empty($list_likes)){
                 $this->likes_model->delete($list_likes);
           }    
          $nbre_dislikes=$this->dislikes_model->all_dislikes_rows($id_events);
          $nbre_likes=$this->likes_model->all_likes_rows($id_events);
          $res= array (
              $nbre_likes,
              $nbre_dislikes
          );
          //var_dump($res);
          echo json_encode($res,true);
               
             
     }
      public function supp_dislikes_2(){
         $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("dislikes_model");
         $id_user1 =$this->session->userdata("user");
         
        $id_user=$id_user1['id'];
        $id_events = $this->input->post ('id_events');
        
                  $data1=$this->dislikes_model->all_dislikes($id_events,$id_user);
           
                 $this->dislikes_model->delete($data1);
                  
               
             
     }

public function add_comments(){
         $this->load->helper('date');
        $this->load->helper(array('form', 'url'));
        $this->load->model("comments_model");
         $id_user =$this->session->userdata("user");
         if ($id_user['role']=='admin'){ $validation= 'yes';}
         elseif ($id_user['role']!='admin'){ $validation= 'no';}
         
$datestring = '%h:%i %a %Y-%m-%d';
$time = time();
$date=mdate($datestring, $time);    
$date0=date("Y-m-d H:i:s");
$data = [
            'id_user' => $id_user['id'],
            'id_events' => $this->input->post ('id_events'),
            'content'=> $this->input->post ('content'),
            'uploaded_on'=> $date0 ,
            'validation'=> $validation
          ];
                    $redirect_url= $this->input->post ('redirect_url');
                    //var_dump($redirect_url);
                  $this->comments_model->ajout($data);
                   header('Location: '.$redirect_url);
               
             
     }
     public function noter_events(){
         $data['user']=$this->getdata_user();
        if(empty($data['user'])){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("note_model");
         $id_user1 =$this->session->userdata("user");
         
        $id_user=$id_user1['id'];
        $id_events = $this->input->post ('id_events');
        $nb_star = $this->input->post ('nb_star');
        
                  $data1= $this->note_model->all_note($id_events,$id_user);
           
                  //var_dump($data1);
                   //var_dump($nb_star);
                    //var_dump($id_events);
                    //var_dump($id_user);
                  if (!empty($data1)){      
          $data = [
            'id'=>$data1[0]->id,
            'id_user' => $id_user,
            'id_events' => $this->input->post ('id_events'),
            'nb_star'=>$nb_star,
          ];
           //var_dump($data);
           
           $this->note_model->modif($data);
           }
           else {
               
                $data = [
            'id_user' => $id_user,
            'id_events' => $this->input->post ('id_events'),
            'nb_star'=> $this->input->post ('nb_star'),
          ];
            $this->note_model->ajout($data);
           }
                  
     }
     
    
}
