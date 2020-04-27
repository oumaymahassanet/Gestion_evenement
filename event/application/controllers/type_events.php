     <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class type_events extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
           $this->load->model('user_model');
        $this->load->model('type_events_model');
                   $this->load->model('events_model');

    }

  public function func_alias($name=''){
              $alias = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name);
              $alias = str_replace(' ', '-', $alias);
              $alias = preg_replace('#[^A-Za-z0-9\-_]#u', '', $alias);
              $alias= preg_replace('#[\-+]#u', '-', $alias);   
                        
                        
      return $alias ;
  }

    public function all_type_events(){
      
     $this->load->model('type_events_model');
        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));

    
   
     $this->load->library('pagination');
      $this->db->where('banned','no')  ;
     $query = $this->db->get('type_events','5',$this->uri->segment(3));
     $data['all_type_events']=$query->result();
      $this->db->where('banned','no')  ;
     $query2 = $this->db->get('type_events');

    $config['base_url'] = 'http://localhost/event/MyPanel/type_events';
     
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

        $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }        
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_type_events_view', $data);   
    }
     public function add_type_events(){
         

        $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }      
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_type_events_formulaire', $data);
                
                        
    }
    public function add_type_events2(){
    
             //  $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
          $this->load->model('user_model');
           $this->load->model('events_model');
           $this->load->model('type_events_model');

  
        $data =['id'=> null,
          'banned' => 'no',
          'name' => $this->input->post ('name'),
            'alias' => $this->func_alias($this->input->post ('name'))
       ];
      
        $this->form_validation->set_rules('name', 'Nom Type', 'required' );

        if ($this->form_validation->run() == TRUE  ) 
                {
      
                     $id_type_events = $this-> type_events_model -> ajout($data);
                     redirect('MyPanel/type_events/image/'.$id_type_events);
                  

               }
                 

        $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }  
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_type_events_formulaire', $data);
                 
    }
public function modif_type_events(){
      
        $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }  
             $id_type_events =$this->uri->segment(4); 
            $this->load->model("type_events_model"); 
            $data['type_events_data']=$this->type_events_model-> all_type_events($id_type_events);
           
            $this->load->view('mypanel/templates/header_view',$data);
            $this->load->view('mypanel/templates/menu_view', $data);
            $this->load->view('mypanel/templates/modif_type_events_formulaire', $data);
                 
    }
     public function modif_type_events_2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model("type_events_model");
      $data =  [
          'id' =>  $this->input->post ('id'),
           'banned' =>  $this->input->post ('banned'),
          'name' => $this->input->post ('name'),
         
       ];
   
        
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('banned', 'banned', 'required');

        if ($this->form_validation->run() == TRUE  ) 
                
                {        
                          {    
                         $this->type_events_model-> modif($data); 
                         echo "<script>alert(\"la Modification est effectuée avec succée\")</script>";
                          }
                          {
                            return redirect('MyPanel/type_events');
                          }
                }
                        
             $id_type_events =$this->uri->segment(4); 
            $this->load->model("type_events_model"); 
            $data['type_events_data']=$this->type_events_model-> all_type_events($id_type_events);
           
        $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }  
            $this->load->view('mypanel/templates/header_view',$data);
            $this->load->view('mypanel/templates/menu_view', $data);
            $this->load->view('mypanel/templates/modif_type_events_formulaire', $data);
                        
   
     }
     
     public function supp_type_events_2(){
         
        $x=$this->session->userdata("user");
        if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }  
        $this->load->helper(array('form', 'url'));
        $this->load->model("type_events_model");
         $data = [
            'id' => $this->input->post ('id'),
          ];         
        
                  $this->type_events_model->delete($data);
                  
               return redirect('MyPanel/type_events');
             
     }

    
    
}
