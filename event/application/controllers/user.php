<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class user extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
             $this->load->model('events_model');

    }
    
  public function func_alias($name=''){
              $alias = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name);
              $alias = str_replace(' ', '-', $alias);
              $alias = preg_replace('#[^A-Za-z0-9\-_]#u', '', $alias);
              $alias= preg_replace('#[\-+]#u  ', '-', $alias);   
                        
                        
      return $alias ;
  }
    
    public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
       
        $this->load->view('mypanel/login_view', $data);
    }
    
    public function process(){
        // Load the model
        $this->load->model('user_model');
        // Validate the user can user
        $result = $this->user_model->validate();
        // Now we verify the result
       
        if($result==false){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            if($result['validation']=='no'){
                 $msg = '<font color=red>Your account is not validated.</font><br />';
            $this->index($msg);
            }
            else{
                $this->session->set_userdata("user",$result);
              
      
                redirect('MyPanel');
               
            }
        }
            // If user did validate, 
            // Send them to members area
            //redirect('home');
        }
 public function my_panel(){
     
          $this->islogged();
               $this->load->model('user_model');
               $this->load->model('events_model');


        // Load our view to be displayed
        // to the user
        $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']=='user') ){
            redirect('');
        }
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/panel_view', $data);
    }    
    public function all_users_reservation(){
                $data['user']=$this->session->userdata("user");

        if((empty($data['user']))|| ($data['user']['role']=='user') ){
            redirect('');
        }
        $this->islogged();
     $this->load->model('user_model');
    $id_events=$this->uri->segment(4);
     $this->load->model('reservation_model');
     $this->load->library('pagination');
    $this->db->where('id_events', $id_events);
     $query = $this->db->get('reservation','5',$this->uri->segment(5));
     $data['all_users_reservation']=$query->result();
  $data['id_events']=$id_events;
    $this->db->where('id_events', $id_events);
     $query2 = $this->db->get('reservation');
        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));
    $config['base_url'] = 'http://localhost/event/MyPanel/events/Reservation';
     
     $config['total_rows'] = $query2->num_rows();
     $config['per_page'] = 5;
     $config['num_links'] =1;
    
     
             $config["full_tag_open"] = "<ul class='pagination'>";
             $config["full_tag_close"] = "</ul>";
         
             $config["first_tag_open"] = "<li>";
             $config["last_tag_open"] = "<li>";

                 
             $config["next_tag_open"] = "<li>";
             $config["prev_tag_open"] = "<li>"; 
                 
             $config["num_tag_open"] = "<li>";
             $config["num_tag_close"] = "</li>";
                           
             $config["prev_tag_close"] = "</li>";
             $config["next_tag_close"] = "</li>";
                 
             $config["last_tag_close"] = "</li>";
             $config["first_tag_close"] = "</li>";
    
                 
             $config["cur_tag_open"] = "<li class=\"active\"><span><b>";
             $config["cur_tag_close"] = "</li></span></b>";

       $this->pagination->initialize($config);
    
             

        $data['user']=$this->session->userdata("user");
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_user_reservation', $data);
        
    }


    public function all_users(){
     $this->islogged();
     $this->load->model('user_model');
                    $this->load->model('events_model');
     $this->load->library('pagination');
    $this->db->where('banned', 'no');
    $this->db->where('validation', 'yes');
     $query = $this->db->get('user','5',$this->uri->segment(3));
     $data['all_user']=$query->result();
    $this->db->where('banned', 'no');
    $this->db->where('validation', 'yes');
     $query2 = $this->db->get('user');
        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));
    $config['base_url'] = 'http://localhost/event/MyPanel/users';
     
     $config['total_rows'] = $query2->num_rows();
     $config['per_page'] = 5;
     $config['num_links'] =1;
    
     
             $config["full_tag_open"] = "<ul class='pagination'>";
             $config["full_tag_close"] = "</ul>";
         
             $config["first_tag_open"] = "<li>";
             $config["last_tag_open"] = "<li>";

                 
             $config["next_tag_open"] = "<li>";
             $config["prev_tag_open"] = "<li>"; 
                 
             $config["num_tag_open"] = "<li>";
             $config["num_tag_close"] = "</li>";
                           
             $config["prev_tag_close"] = "</li>";
             $config["next_tag_close"] = "</li>";
                 
             $config["last_tag_close"] = "</li>";
             $config["first_tag_close"] = "</li>";
    
                 
             $config["cur_tag_open"] = "<li class=\"active\"><span><b>";
             $config["cur_tag_close"] = "</li></span></b>";

       $this->pagination->initialize($config);
    
             

        $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_users_view', $data);
    } 
    public function chercher_users(){
     $this->islogged();
     $this->load->model('user_model');
     $this->load->model('events_model');
     $this->load->library('pagination');
       $chercher=$this->input->post ('chercher');
    $this->db->like('email', $chercher);
     $query = $this->db->get('user','5',$this->uri->segment(3));
     $data['all_user']=$query->result();
     $data['cher']=$chercher;

    $this->db->like('email', $chercher);
     $query2 = $this->db->get('user');
 
    $config['base_url'] = 'http://localhost/event/MyPanel/chercher_users';
     
     $config['total_rows'] = $query2->num_rows();
     $config['per_page'] = 5;
     $config['num_links'] =1;
    
     
             $config["full_tag_open"] = "<ul class='pagination'>";
             $config["full_tag_close"] = "</ul>";
         
             $config["first_tag_open"] = "<li>";
             $config["last_tag_open"] = "<li>";

                 
             $config["next_tag_open"] = "<li>";
             $config["prev_tag_open"] = "<li>"; 
                 
             $config["num_tag_open"] = "<li>";
             $config["num_tag_close"] = "</li>";
                           
             $config["prev_tag_close"] = "</li>";
             $config["next_tag_close"] = "</li>";
                 
             $config["last_tag_close"] = "</li>";
             $config["first_tag_close"] = "</li>";
    
                 
             $config["cur_tag_open"] = "<li class=\"active\"><span><b>";
             $config["cur_tag_close"] = "</li></span></b>";

       $this->pagination->initialize($config);
    
             

        $data['user']=$this->session->userdata("user");
          if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_users_view', $data);
    }

    public function all_users_non_valide(){
     $this->islogged();
                    $this->load->model('events_model');

     $this->load->model('user_model');
     $this->load->library('pagination');
     $this->db->where('validation', 'no');
     $query = $this->db->get('user','5',$this->uri->segment(3));
     $data['all_user']=$query->result();
     $this->db->where('validation', 'no');
     $query2 = $this->db->get('user');
        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));
    $config['base_url'] = 'http://localhost/event/MyPanel/users_non_valide';
     
     $config['total_rows'] = $query2->num_rows();
     $config['per_page'] = 5;
     $config['num_links'] =1;
    
     
             $config["full_tag_open"] = "<ul class='pagination'>";
             $config["full_tag_close"] = "</ul>";
         
             $config["first_tag_open"] = "<li>";
             $config["last_tag_open"] = "<li>";

                 
             $config["next_tag_open"] = "<li>";
             $config["prev_tag_open"] = "<li>"; 
                 
             $config["num_tag_open"] = "<li>";
             $config["num_tag_close"] = "</li>";
                           
             $config["prev_tag_close"] = "</li>";
             $config["next_tag_close"] = "</li>";
                 
             $config["last_tag_close"] = "</li>";
             $config["first_tag_close"] = "</li>";
    
                 
             $config["cur_tag_open"] = "<li class=\"active\"><span><b>";
             $config["cur_tag_close"] = "</li></span></b>";

       $this->pagination->initialize($config);
    
             

        $data['user']=$this->session->userdata("user");
 if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }           
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_users_view_non_valide', $data);
    }        
    public function all_users_banned(){
                       $this->load->model('events_model');

     $this->islogged();
     $this->load->model('user_model');
     $this->load->library('pagination');
                         $this->db->where('banned', 'yes');
     $query = $this->db->get('user','5',$this->uri->segment(3));
     $data['all_user']=$query->result();
                         $this->db->where('banned', 'yes');
     $query2 = $this->db->get('user');
        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));
    $config['base_url'] = 'http://localhost/event/MyPanel/users_banned';
     
     $config['total_rows'] = $query2->num_rows();
     $config['per_page'] = 5;
     $config['num_links'] =1;
    
     
             $config["full_tag_open"] = "<ul class='pagination'>";
             $config["full_tag_close"] = "</ul>";
         
             $config["first_tag_open"] = "<li>";
             $config["last_tag_open"] = "<li>";

                 
             $config["next_tag_open"] = "<li>";
             $config["prev_tag_open"] = "<li>"; 
                 
             $config["num_tag_open"] = "<li>";
             $config["num_tag_close"] = "</li>";
                           
             $config["prev_tag_close"] = "</li>";
             $config["next_tag_close"] = "</li>";
                 
             $config["last_tag_close"] = "</li>";
             $config["first_tag_close"] = "</li>";
    
                 
             $config["cur_tag_open"] = "<li class=\"active\"><span><b>";
             $config["cur_tag_close"] = "</li></span></b>";

       $this->pagination->initialize($config);
    
             

        $data['user']=$this->session->userdata("user");
          if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_users_view_banned', $data);
    }        
    
    
    public function add_users(){
        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));
            $this->islogged();

    $this->load->model('events_model');
                    $this->load->model('user_model');
      $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_users_formulaire', $data);
                 
    }
     public function add_users2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model("user_model");
        $alias= $this->input->post ('first_name')."-".$this->input->post ('last_name');
         $this->load->model('events_model');
        $data = ['id'=> null,
          'role' =>$this->input->post ('role'),
          'validation'=> 'yes' ,
          'email' => $this->input->post ('email'),
          'password' => md5($this->input->post ('password')),
          'first_name' => $this->input->post ('first_name'),
          'last_name' => $this->input->post ('last_name'),
           'alias'=> $this->func_alias($alias)
          ];
     $role = $this->input->post ('role');
                   $this->form_validation->set_rules('first_name', 'Nom', 'required' );
        $this->form_validation->set_rules('last_name', 'prenom', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('comfpassword', 'Comfirmation Password', 'required|matches[password]');
                if ($this->form_validation->run() == TRUE  ) 
                {
                       $id_user= $this->user_model-> ajout($data); 
                       
                      
                      if ($role== 'user') {
                        return redirect('MyPanel/users/add_users_profile/'.$id_user);
                         }  
                      if ($role!= 'user') {
                        return redirect('MyPanel/users/add_organizer/'.$id_user);
                         }
                }
                       
               if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_users_formulaire', $data);
                 

} 
 public function add_users_profile(){
                         $this->load->model('events_model');
                    $this->load->model('user_model');

        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));
            $this->islogged();

        $this->load->model("country_model");
        $list_country=$this->country_model-> all_country();
        $this->load->model("city_model");
        $list_ville=$this->city_model-> all_city();

      $data['user']=$this->session->userdata("user");
            
                    $data['all_country']=$list_country;
                     $data['all_city']=$list_ville;
 if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_users_profile_formulaire', $data);
                 
    }
    public function add_users_profile2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
         $this->load->model('events_model');
        $this->load->model("user_model");
        $data = ['id'=> null,
          'id_user' =>$this->input->post ('id_user'),
          'id_country' =>$this->input->post ('id_country'),
          'id_city' =>$this->input->post ('id_city'),
          'adress' => $this->input->post ('adress'),
          'zip' => $this->input->post ('zip'),
          'gendre' => $this->input->post ('gendre'),
          'phone' => $this->input->post ('phone'),    
          ];
        $this->form_validation->set_rules('adress', 'Adresse', 'required' );
        $this->form_validation->set_rules('id_country', 'Votre Pays', 'required');
                $this->form_validation->set_rules('id_city', 'Votre Ville', 'required');
        $this->form_validation->set_rules('zip', 'Code Postale', 'required');
        $this->form_validation->set_rules('gendre', 'Sexe', 'required');
        $this->form_validation->set_rules('phone', 'Numéro de Télephone', 'required');
                if ($this->form_validation->run() == TRUE  ) 
                {
                        $this->user_model-> ajout_users($data); 
                        $id_user=$this->input->post ('id_user');
                     redirect('MyPanel/users/image/'.$id_user);
                        
                }
                 
        $this->load->model("country_model");
        $list_country=$this->country_model-> all_country();
        $this->load->model("city_model");
        $list_ville=$this->city_model-> all_city();

              $data['user']=$this->session->userdata("user");
                     $data['all_country']=$list_country;
                     $data['all_city']=$list_ville;
 if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }        
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_users_profile_formulaire', $data);
                 
    }
     public function add_organizer(){
        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));
            $this->islogged();
            $this->load->model('events_model');
            $this->load->model('user_model');
        $this->load->model("country_model");
        $list_country=$this->country_model-> all_country();
        $this->load->model("city_model");
        $list_ville=$this->city_model-> all_city();
$this->load->model('events_model');
   
      $data['user']=$this->session->userdata("user");
        
            $data['all_city']=$list_ville;
            $data['all_country']=$list_country; 
            if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
      
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_organizer_formulaire', $data);
                 
    }
    public function add_organizer2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model("user_model");
         $this->load->model('events_model');
        $data = ['id'=> null,
          'id_user' =>$this->input->post ('id_user'),
          'id_country'     =>$this->input->post ('id_country'),
          'id_city'     =>$this->input->post ('id_city'),
          'adress' => $this->input->post ('adress'),
          'zip' => $this->input->post ('zip'),
          'gendre' => $this->input->post ('gendre'),
          'phone1' => $this->input->post ('phone1'),    
          'phone2' => $this->input->post ('phone1'), 
          'fax' => $this->input->post ('fax'), 
          'facebook' => $this->input->post ('facebook'),  
          'organisation_name' => $this->input->post ('organisation_name'),
          'description' => $this->input->post ('description'),  


          ];
        $this->form_validation->set_rules('id_country', 'Pays', 'required' );
        $this->form_validation->set_rules('adress', 'Adresse', 'required');
        $this->form_validation->set_rules('gendre', 'Sexe', 'required');
        $this->form_validation->set_rules('phone1', 'Numéro de Télephone', 'required');


        if ($this->form_validation->run() == TRUE  ) 
                {
                        $this->user_model-> ajout_organizer($data);
                         $id_user=$this->input->post ('id_user');
                     redirect('MyPanel/users/image/'.$id_user);
                }
        $this->load->model("country_model");
        $list_country=$this->country_model-> all_country();
        $this->load->model("city_model");
        $list_ville=$this->city_model-> all_city();

      $data['user']=$this->session->userdata("user");
            
            $data['all_country']=$list_country;
            $data['all_city']=$list_ville;
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_organizer_formulaire', $data);
                 
    }
    
      
    
        public function modif_users(){
                 $this->islogged();
$this->load->model('events_model');
      $data['user']=$this->session->userdata("user");
             $id_users =$this->uri->segment(4);
             
             $this->load->model("user_model"); 
            
             $this->load->model("country_model");      
             $list_country=$this->country_model-> all_country();
             
            
            $this->load->model("user_model"); 
            $data['all_country']=$list_country;
            
            $data['user_data']=$this->user_model-> all_users($id_users);
            if ($data['user_data'][0]->role=='user'){ 
           $data['user_profile_data']=$this->user_model-> all_users_profile($id_users);
           if (!empty($data['user_profile_data'][0]->id_country)){
           $id_country=$data['user_profile_data'][0]->id_country ;
            $this->load->model("country_model");      
             $list_country=$this->country_model-> all_country();
                          $data['all_country']=$list_country;
                          
               $this->load->model("city_model");
           $list_ville=$this->user_model-> all_city($id_country);
           //var_dump($list_ville);
            $data['all_city']=$list_ville;
           }
            }
            
            if ($data['user_data'][0]->role!='user'){ 
           $data['organizer_profile_data']=$this->user_model-> all_organizer($id_users);
           if (!empty($data['organizer_profile_data'][0]->id_country)){
           $id_country=$data['organizer_profile_data'][0]->id_country ;
                    
           $this->load->model("country_model");      
             $list_country=$this->country_model-> all_country();
                          $data['all_country']=$list_country;
                          
               $this->load->model("city_model");
           $list_ville=$this->user_model-> all_city($id_country);
           //var_dump($list_ville);
            $data['all_city']=$list_ville;
           }           
           }
            if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
           $this->load->view('mypanel/templates/header_view',$data);
           $this->load->view('mypanel/templates/menu_view', $data);
           $this->load->view('mypanel/templates/modif_users_formulaire', $data);
                 
    }
    
     public function modif_users_2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
 $this->load->model('events_model');
                    $this->load->model('user_model');
                    $alias= $this->input->post ('first_name')." ".$this->input->post ('last_name');
        if (!empty($this->input->post ('password')) ){
               $data = [
            'id' => $this->input->post ('id'),
          'first_name' => $this->input->post ('first_name'),
          'last_name' => $this->input->post ('last_name'),  
          'role' => $this->input->post ('role'),
          'validation' => $this->input->post ('validation'),
          'email' => $this->input->post ('email'),
           'password' => md5($this->input->post ('password')),
               'alias'=> $this->func_alias($alias) 
          ];
           $data1 = ['id'=>null,
            'id_user' => $this->input->post ('id_user'),
          'id_country' => $this->input->post ('id_country'),
          'id_city' => $this->input->post ('id_city'),  
          'zip' => $this->input->post ('zip'),
          'adress' => $this->input->post ('adress'),
          'gendre' => $this->input->post ('gendre'),
           'phone' => $this->input->post ('phone'),
          ];    
           $data2 = ['id'=>null,
            'id_user' => $this->input->post ('id_user'),
          'id_country' => $this->input->post ('id_country'),
          'id_city' => $this->input->post ('id_city'),  
          'organisation_name' => $this->input->post ('organisation_name'),
          'description' => $this->input->post ('description'),               
          'zip' => $this->input->post ('zip'),
          'adress' => $this->input->post ('adress'),
          'gendre' => $this->input->post ('gendre'),
          'phone1' => $this->input->post ('phone1'),
          'phone2' => $this->input->post ('phone2'),
          'fax' => $this->input->post ('fax'),
          'facebook' => $this->input->post ('facebook'),
          ];    

               
        $this->form_validation->set_rules('password', 'Password', 'min_length[8]');
        $this->form_validation->set_rules('comfpassword', 'Comfirmation Password', 'matches[password]');

        if ($this->form_validation->run() == TRUE  ) 
                
                        {    $id_user=$this->input->post ('id_user');
                         $this->user_model-> modif($data); 
                             if ($this->input->post ('role')=='user')
                             {    $x= $this->user_model->all_users_profile($id_user);
                                 if (empty($x)){
                                   $this->user_model-> ajout_users($data1);  
                                 }
                                 else{
                                 $this->user_model-> modif_user($data1);}
                             }
                             if ($this->input->post ('role')!='organizer')
                             {
                                 $x= $this->user_model->all_organizer($id_user);
                                 if (empty($x)){
                                   $this->user_model-> ajout_organizer($data2);  
                                 }
                                 else{
                                 $this->user_model-> modif_organizer($data2);}
                             }    
                        return redirect('MyPanel/users');
                        }
                                               
                        return redirect('MyPanel/users/modif_users/'.$this->input->post('id_user'));

              
           }
           else if ((empty($this->input->post ('password'))) and (empty($this->input->post ('comfpassword'))) )
                     {
                $data = [
            'id' => $this->input->post ('id'),
          'first_name' => $this->input->post ('first_name'),
          'last_name' => $this->input->post ('last_name'),  
          'role' => $this->input->post ('role'),
          'validation' => $this->input->post ('validation'),
          'email' => $this->input->post ('email'),
          'alias'=> $this->func_alias($alias)                   
                     ];
         $data1 = ['id'=>null,
            'id_user' => $this->input->post ('id_user'),
          'id_country' => $this->input->post ('id_country'),
          'id_city' => $this->input->post ('id_city'),  
          'zip' => $this->input->post ('zip'),
          'adress' => $this->input->post ('adress'),
          'gendre' => $this->input->post ('gendre'),
           'phone' => $this->input->post ('phone'),
          ]; 
          $data2 = ['id'=>null,
            'id_user' => $this->input->post ('id_user'),
          'id_country' => $this->input->post ('id_country'),
          'id_city' => $this->input->post ('id_city'),  
          'zip' => $this->input->post ('zip'),
          'organisation_name' => $this->input->post ('organisation_name'),
          'description' => $this->input->post ('description'),
          'adress' => $this->input->post ('adress'),
          'gendre' => $this->input->post ('gendre'),
          'phone1' => $this->input->post ('phone1'),
          'phone2' => $this->input->post ('phone2'),
          'fax' => $this->input->post ('fax'),
          'facebook' => $this->input->post ('facebook'),
          ];   
                     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                    $this->form_validation->set_rules('last_name', 'Prénom', 'required');
                    $this->form_validation->set_rules('first_name', 'Nom', 'required');
           if ($this->form_validation->run() == TRUE  ) {
                         $this->user_model-> modif($data); 
                            if ($this->input->post ('role')=='user')
                             {
                                 $this->user_model-> modif_user($data1);
                             }
                             if ($this->input->post ('role')=='organizer')
                             {
                                $this->user_model-> modif_organizer($data2);
                             }
                         return redirect('MyPanel/users');
                 }
                                                         
                return redirect('MyPanel/users/modif_users/'.$this->input->post('id_user'));

           }             
                       
                                                 
                
   
     }
    
     public function supp_users_2(){
               $x=$this->session->userdata("user");

           if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
 $this->load->model('events_model');
                    $this->load->model('user_model');
                    $data = [
            'id' => $this->input->post ('id'),
             'banned'=>'yes'
          ];         
        
                  $this->user_model->modif($data);
                 $redirect_url= $this->input->post ('redirect_url');
               return redirect($redirect_url);
             
     }
     public function supp_users(){
          $x=$this->session->userdata("user");

           if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }
          $this->load->model('events_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model("user_model");
         $data = [
            'id' => $this->input->post ('id'),
             'banned'=>'yes'
          ];         
        
                  $this->user_model->modif($data);
                
     }
     public function valider_users(){
          $x=$this->session->userdata("user");

           if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }
          $this->load->model('events_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model("user_model");
         $data = [
            'id' => $this->input->post ('id'),
             'validation' => 'yes' ,
          ];         
        
                  $this->user_model->modif($data);
                  
             
     }
     public function recuperer_users(){
         $x=$this->session->userdata("user");

           if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }
          $this->load->model('events_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model("user_model");
         $data = [
            'id' => $this->input->post ('id'),
             'validation' => 'no' ,
             'banned'=>'no'
          ];         
          //var_dump($data);
                  $this->user_model->modif($data);
                  
             
     }
     
     
     public function islogged(){
         $data['user']=$this->session->userdata("user");
         if (empty($data['user']))
             {             redirect('');
             return false ;
            
             }
     }
     public function logout(){
          $x=$this->session->userdata("user");

           if((empty($x)) ){
            redirect('');
        }
          $this->load->model('events_model');
                    $this->load->model('user_model');
      $this->session->sess_destroy();
         $data['user']=$this->session->userdata("user");
         redirect('');
         //var_dump($data);
         
     }
     public function supp_reservation_2(){
           $x=$this->session->userdata("user");

           if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }
        
        $this->load->helper(array('form', 'url'));
        $this->load->model("reservation_model");
         $id =$this->input->post('id');
       
         $data=[
             'id' => $id 
         ];
         
                 $this->reservation_model->delete_id($data);
                 $redirect_url= $this->input->post ('redirect_url');
                 header('Location: '.$redirect_url);
                
     }
     
}
