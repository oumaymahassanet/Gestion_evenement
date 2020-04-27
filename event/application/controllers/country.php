     <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class country extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
           $this->load->model('user_model');
        $this->load->model('city_model');
                   $this->load->model('events_model');

    }

  
public function all_country(){
     
     $this->load->model('country_model');
        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));


    
   
     $this->load->library('pagination');
                $this->db->where('banned','no');
     $query = $this->db->get('country','5',$this->uri->segment(3));
     $data['all_country']=$query->result();
     $this->db->where('banned','no');
     $query2 = $this->db->get('country');

    $config['base_url'] = 'http://localhost/event/MyPanel/country';
     
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
        $this->load->view('mypanel/all_country_view', $data); 
        }  
        public function add_country(){
       
        $data['user']= $this->session->userdata('user');
if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_country_formulaire', $data);
                                    
    }
    
    public function add_country2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

           $this->load->model('country_model');

  
        $data =[
          'banned' => 'no',
          'name' => $this->input->post ('name'),
       ];
        $this->form_validation->set_rules('name', 'Nom Pays', 'required' );

        if ($this->form_validation->run() == TRUE  ) 
                {
      
                     $this-> country_model -> ajout($data);
                     redirect('MyPanel/country');

                }
                 
              $data['user']=$this->session->userdata("user");
if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
       $this->load->view('mypanel/templates/add_country_formulaire', $data);
                 
    }
    public function modif_country(){
             $id_country =$this->uri->segment(4); 
            $this->load->model("country_model"); 
            $data['country_data']=$this->country_model-> all_country($id_country);
           $data['user']= $this->session->userdata('user');
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
            $this->load->view('mypanel/templates/header_view',$data);
            $this->load->view('mypanel/templates/menu_view', $data);
            $this->load->view('mypanel/templates/modif_country_formulaire', $data);         
    }
    
    public function modif_country_2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model("country_model");
        $data =  [
             'id' => $this->input->post ('id'),
          'banned' => $this->input->post ('banned'),
          'name' => $this->input->post ('name'),
                ];
   
        
        $this->form_validation->set_rules('name', 'Nom Pays', 'required');
        $this->form_validation->set_rules('banned', 'Banned', 'required');
       

        
        if ($this->form_validation->run() == TRUE  ) 
                
                {                                      
                         $this->country_model-> modif($data);                                          
                         return redirect('MyPanel/country');         
                }
                        
            $id_country =$this->uri->segment(4); 
            $this->load->model("country_model"); 
            $data['country_data']=$this->country_model-> all_city($id_country);
           $data['user']= $this->session->userdata('user');
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
            $this->load->view('mypanel/templates/header_view',$data);
            $this->load->view('mypanel/templates/menu_view', $data);
            $this->load->view('mypanel/templates/modif_city_formulaire', $data);
                        
   
     }
    
    public function supp_country_2(){
         
        $this->load->helper(array('form', 'url'));
        $this->load->model("country_model");
         $data = [
            'id' => $this->input->post ('id'),
          ];         
        $x= $this->session->userdata('user');
    if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }
                  $this->country_model->delete($data);
                  
               return redirect('MyPanel/country');
             
     }

}
