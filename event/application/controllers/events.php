     <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class events extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');
                $this->load->model("events_model");

    }
public function func_alias($name=''){
              $alias = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name);
              $alias = str_replace(' ', '-', $alias);
              $alias = preg_replace('#[^A-Za-z0-9\-_]#u', '', $alias);
              $alias= preg_replace('#[\-+]#u', '-', $alias);   
                        
                        
      return $alias ;
  }

    public function all_events(){
     $this->load->model('events_model');
      $data['user']=$this->session->userdata("user");
if(empty($data['user'])|| ($data['user']['role']=='user') ){
            redirect('');
        }
       if ( $this->session->userdata('user')['role']=='admin'){
     $this->load->library('pagination');
           $this->db->where('banned','no')  ;
                $this->db->where('validation','yes')  ;     
        $this->db->order_by('start_date','desc');
     $query = $this->db->get('events','5',$this->uri->segment(3));
     $data['all_events']=$query->result();
     $this->db->where('banned','no')  ;
          $this->db->where('validation','yes')  ;     
        $this->db->order_by('start_date','desc');

       $query2 = $this->db->get('events'); }

    
        if ( $this->session->userdata('user')['role']=='organizer'){
$this->load->library('pagination');
      $this->db->where('banned','no')  ;
      $this->db->where('id_creator',$this->session->userdata('user')['id'])  ;
              $this->db->order_by('start_date','desc');

     $query = $this->db->get('events','5',$this->uri->segment(3));
     $data['all_events']=$query->result();
     $this->db->where('banned','no')  ;
      $this->db->where('id_creator',$this->session->userdata('user')['id'])  ;
              $this->db->order_by('start_date','desc');

        $query2 = $this->db->get('events');}
        
    $config['base_url'] = 'http://localhost/event/MyPanel/events';
     
     $config['total_rows'] = $query2->num_rows();
     $config['per_page'] = 5;
     $config['num_links'] = 1;
     
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

      $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events();
      $this->load->model("city_model");
      $list_ville=$this->city_model-> all_city();
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      
      $data['user']=$this->session->userdata("user");
       
            $data['all_type_events']=$list_type;
            $data['all_city']=$list_ville;
            $data['all_country']=$list_country;

      $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_events_view', $data);
     
    
        }
    
        public function chercher_events(){
     $this->load->model('events_model');
    $data['user']= $this->session->userdata('user');
if(empty($data['user'])|| ($data['user']['role']=='user') ){
            redirect('');
        }
       if ( $this->session->userdata('user')['role']=='admin'){
     $this->load->library('pagination');
     $chercher=$this->input->post ('chercher');
    $this->db->like('titre', $chercher);
     $query = $this->db->get('events','5',$this->uri->segment(3));
     $data['all_events']=$query->result();
   
    $this->db->like('titre', $chercher);

       $query2 = $this->db->get('events'); }

    
        if ( $this->session->userdata('user')['role']=='organizer'){
$this->load->library('pagination');
$chercher=$this->input->post ('chercher');
    $this->db->like('titre', $chercher);
      $this->db->where('id_creator',$this->session->userdata('user')['id'])  ;
     $query = $this->db->get('events','5',$this->uri->segment(3));
     $data['all_events']=$query->result();
         $this->db->like('titre', $chercher);
      $this->db->where('id_creator',$this->session->userdata('user')['id'])  ;
        $query2 = $this->db->get('events');}
        $data['cher']=$chercher;
    $config['base_url'] = 'http://localhost/event/MyPanel/events';
     
     $config['total_rows'] = $query2->num_rows();
     $config['per_page'] = 5;
     $config['num_links'] = 1;
     
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

      $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events();
      $this->load->model("city_model");
      $list_ville=$this->city_model-> all_city();
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      
      $data['user']=$this->session->userdata("user");
      
            $data['all_type_events']=$list_type;
            $data['all_city']=$list_ville;
            $data['all_country']=$list_country;

      $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_events_view', $data);
     
    
        }
    
        public function all_events_non_valide(){
     $this->load->model('events_model');

     $this->load->library('pagination');
           $this->db->where('banned','no')  ;
           $this->db->where('validation','no')  ;
     $query = $this->db->get('events','5',$this->uri->segment(3));
     $data['all_events']=$query->result();
     $this->db->where('banned','no')  ;
     $this->db->where('validation', 'no');
       $query2 = $this->db->get('events'); 
       $config['base_url'] = 'http://localhost/event/MyPanel/events_non_valide';
      
     $config['total_rows'] = $query2->num_rows();
     $config['per_page'] = 5;
     $config['num_links'] = 1;
     
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

      $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events();
      $this->load->model("city_model");
      $list_ville=$this->city_model-> all_city();
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      
$data['user']= $this->session->userdata('user');
if(empty($data['user'])|| ($data['user']['role']!='admin') ){
            redirect('');
        }      
            $data['all_type_events']=$list_type;
            $data['all_city']=$list_ville;
            $data['all_country']=$list_country;

      $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_events_view_non_valide', $data);
     
    
        }
        
        public function all_events_banned(){
     $this->load->model('events_model');

     $this->load->library('pagination');
           $this->db->where('banned','yes')  ;
     $query = $this->db->get('events','5',$this->uri->segment(3));
     $data['all_events']=$query->result();
     $this->db->where('banned','yes')  ;
       $query2 = $this->db->get('events'); 
       $config['base_url'] = 'http://localhost/event/MyPanel/events_banned';
      
     $config['total_rows'] = $query2->num_rows();
     $config['per_page'] = 5;
     $config['num_links'] = 1;
     
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

      $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events();
      $this->load->model("city_model");
      $list_ville=$this->city_model-> all_city();
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      
      $data['user']=$this->session->userdata("user");
        if(empty($data['user'])|| ($data['user']['role']!='admin') ){
            redirect('');
        }   
            $data['all_type_events']=$list_type;
            $data['all_city']=$list_ville;
            $data['all_country']=$list_country;

      $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_events_view_banned', $data);
     
    
        }
        
    
    public function add_events(){
            $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events();
      $this->load->model("city_model");
      $list_ville=$this->city_model-> all_city();
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      
      
      $data['user']=$this->session->userdata("user");

          if(empty($data['user'])|| ($data['user']['role']=='user') ){
            redirect('');
        }   
      $data['all_type_events']=$list_type;
      $data['all_city']=$list_ville;
      $data['all_country']=$list_country;

      $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_events_formulaire', $data);
        
                


    }
    
    public function add_events2(){
               $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
          $this->load->model('user_model');
           $this->load->model('events_model');

    if ( $this->session->userdata('user')['role']=='admin'){
        $validation="yes" ;
        }
        else {$validation="no";  }
        $data = [
         'id_creator'=> $this->session->userdata('user')['id'],
          'id'=> null,
          'validation' => $validation,
          'banned' => 'no',
          'start_date' => $this->input->post ('start_date'),
          'end_date' => $this->input->post ('end_date'),
          'description' => $this->input->post ('description'),
          'zip' => $this->input->post ('zip'),
          'sponsors' => $this->input->post ('sponsors'),
          'id_city' => $this->input->post ('id_city'),
          'id_country' => $this->input->post ('id_country'),
          'localisation' => $this->input->post ('localisation'),
          'titre' => $this->input->post ('titre'),
          'id_type' => $this->input->post ('id_type'),
            'alias' => $this->func_alias($this->input->post ('titre')),
       ];
        $this->form_validation->set_rules('titre', 'titre', 'required' );
        $this->form_validation->set_rules('zip', 'zip', 'required');
        $this->form_validation->set_rules('localisation', 'localisation', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('end_date', 'date_fin', 'required');
        $this->form_validation->set_rules('start_date', 'date_debut', 'required');
        $this->form_validation->set_rules('id_type', 'id_type', 'required');

            if ($this->form_validation->run() == TRUE  ) 
                {
                    $id_user=$this->session->userdata('user')['id'];
                     $id_events= $this-> events_model -> ajout($data);
                     $list_user=$this->user_model->all_users($id_user);
                  $nbre_events=$list_user[0]->nbr_events ;
                  $nbre_events++ ;
                  $row =[
                      'id'=>$id_user ,
                      'nbr_events'=>$nbre_events,
                  ];
                  $this->user_model->modif_nbr_events($row);
                     redirect('MyPanel/events/image/'.$id_events);
                     

                }
                 
              $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events();
      $this->load->model("city_model");
      $list_ville=$this->city_model-> all_city();
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      
$data['user']= $this->session->userdata('user');
if(empty($data['user'])|| ($data['user']['role']=='user') ){
            redirect('');
        }      
      $data['all_city']=$list_ville;
      $data['all_type_events']=$list_type;
      $data['all_country']=$list_country;
                  
      $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_events_formulaire', $data);
                 
    }
    
 public function modif_events(){
                 $data['user']=$this->session->userdata("user");


             $id_events =$this->uri->segment(4); 
            $this->load->model("events_model"); 
            $data['events_data']=$this->events_model-> all_events($id_events);

             $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events();     
      $data['all_type_events']=$list_type;

      
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      $data['all_country']=$list_country;
     $id_country=$data['events_data'][0]->id_country ;
      $this->load->model("city_model");
      $list_ville=$this->events_model-> all_city($id_country);
      $data['all_city']=$list_ville;

if(empty($data['user'])|| ($data['user']['role']=='user') ){
            redirect('');
        }
      
            $this->load->view('mypanel/templates/header_view',$data);
            $this->load->view('mypanel/templates/menu_view', $data);
            $this->load->view('mypanel/templates/modif_events_formulaire', $data);
    }
 public function modif_events_2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model("events_model");
        $this->load->model("type_events_model");
        $this->load->model("city_model");
         $data['user']=$this->session->userdata("user");
      $data =[
          'id' => $this->input->post ('id'),
         'id_creator'=> $this->session->userdata('user')['id'],
          'start_date' => $this->input->post ('start_date'),
          'end_date' => $this->input->post ('end_date'),
          'description' => $this->input->post ('description'),
          'zip' => $this->input->post ('zip'),
          'sponsors' => $this->input->post ('sponsors'),
          'id_country' => $this->input->post ('id_country'),
          'localisation' => $this->input->post ('localisation'),
          'titre' => $this->input->post ('titre'),
          'id_type' => $this->input->post ('id_type'),
          'id_city' => $this->input->post ('id_city'),
           'validation' => $this->input->post ('validation'),

      ];
   
        $this->form_validation->set_rules('titre', 'titre', 'required|max_length[50]' );
        $this->form_validation->set_rules('zip', 'zip', 'required');
        $this->form_validation->set_rules('localisation', 'localisation', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('end_date', 'date_fin', 'required');
        $this->form_validation->set_rules('start_date', 'date_debut', 'required');
        $this->form_validation->set_rules('id_type', 'id_type', 'required');

        if ($this->form_validation->run() == TRUE  ) 
                
                        {    
                         $this->events_model-> modif($data); 
                        return redirect('MyPanel/events'); 
                        }
                        $data['user']=$this->session->userdata("user");


             $id_events =$this->uri->segment(4); 
            $this->load->model("events_model"); 
            $data['events_data']=$this->events_model-> all_events($id_events);

             $this->load->model("type_events_model");
      $list_type=$this->type_events_model-> all_type_events();     
      $data['all_type_events']=$list_type;

      
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      $data['all_country']=$list_country;
     $id_country=$data['events_data'][0]->id_country ;
      $this->load->model("city_model");
      $list_ville=$this->events_model-> all_city($id_country);
      $data['all_city']=$list_ville;

if(empty($data['user'])|| ($data['user']['role']=='user') ){
            redirect('');
        }
      
            $this->load->view('mypanel/templates/header_view',$data);
            $this->load->view('mypanel/templates/menu_view', $data);
            $this->load->view('mypanel/templates/modif_events_formulaire', $data);
   
     }
     public function valider_events(){
         $data['user']= $this->session->userdata('user');
    if(empty($data['user'])|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("events_model");
         $data = [
            'id' => $this->input->post ('id'),
             'validation' => 'yes' ,
          ];         
        
                  $this->events_model->modif($data);
                  
             
     }
      public function supp_events_2(){
         $data['user']= $this->session->userdata('user');
if(empty($data['user'])|| ($data['user']['role']=='user') ){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("events_model");
         $data = [
            'id' => $this->input->post ('id'),
             'banned'=>'yes'
          ];         
        
                  $this->events_model->modif($data);
                                   $redirect_url= $this->input->post ('redirect_url');
               return redirect($redirect_url);
             
     }

     public function recuperer_events(){
         $data['user']= $this->session->userdata('user');
       if(empty($data['user'])|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("events_model");
         $data = [
            'id' => $this->input->post ('id'),
             'validation' => 'no' ,
             'banned'=>'no'
          ];         
          //var_dump($data);
                  $this->events_model->modif($data);
                  
             
     }
   }   