     <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class city extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
           $this->load->model('user_model');
        $this->load->model('city_model');
                   $this->load->model('events_model');

    }

public function getCitiesByCountry($id){
    $this->load->model('city_model');
    echo $this->city_model->getCitiesByCountry($id);
}
public function all_city(){
     
     $this->load->model('city_model');
        // Load our view to be displayed
        // to the user
        //var_dump($this->session->userdata("user"));


    
   
     $this->load->library('pagination');
      $this->db->where('banned','no')  ;
     $query = $this->db->get('city','5',$this->uri->segment(3));
     $data['all_city']=$query->result();
      $this->db->where('banned','no');
     $query2 = $this->db->get('city');
     
    $config['base_url'] = 'http://localhost/event/MyPanel/city';
     
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
       
     $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      
        $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $data['all_country']=$list_country;
        
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_city_view', $data); 
        }  
        public function add_city(){
        $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
      
      $data['user']=$this->session->userdata("user");
        $data['user']= $this->session->userdata('user');
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
              $data['all_country']=$list_country;
      
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_city_formulaire', $data);
                                    
    }
    
    public function add_city2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
          $this->load->model('user_model');
           $this->load->model('events_model');
           $this->load->model('city_model');

  
        $data =[
          'banned' => 'no',
          'name' => $this->input->post ('name'),
          'id_country' => $this->input->post ('id_country'),

       ];
        $this->form_validation->set_rules('name', 'Nom ville', 'required' );

        if ($this->form_validation->run() == TRUE  ) 
                {
      
                     $this-> city_model -> ajout($data);
                     redirect('MyPanel/city');
                }
                  
                $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
                 
              $data['user']=$this->session->userdata("user");
 $data['user']= $this->session->userdata('user');
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
              $data['all_country']=$list_country;

        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
       $this->load->view('mypanel/templates/add_city_formulaire', $data);
                 
    }
    public function modif_city(){
      $data['user']=$this->session->userdata("user");
     $data['user']= $this->session->userdata('user');
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
      $this->load->model("country_model");
      $list_country=$this->country_model-> all_country();
                 
             $id_city =$this->uri->segment(4); 
            $this->load->model("city_model"); 
            
            $data['city_data']=$this->city_model-> all_city($id_city);
           
                    $data['all_country']=$list_country;

            $this->load->view('mypanel/templates/header_view',$data);
            $this->load->view('mypanel/templates/menu_view', $data);
            $this->load->view('mypanel/templates/modif_city_formulaire', $data);         
    }
    
    public function modif_city_2(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model("city_model");
        $data =  [
             'id' => $this->input->post ('id'),
          'banned' => $this->input->post ('banned'),
          'name' => $this->input->post ('name'),
          'id_country' => $this->input->post ('id_country'),
        ];
   
         $x= $this->session->userdata('user');
        if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }
        $this->form_validation->set_rules('name', 'Nom ville', 'required');
        $this->form_validation->set_rules('banned', 'Banned', 'required');
        $this->form_validation->set_rules('id_country', 'Nom Pays', 'required');

        
        if ($this->form_validation->run() == TRUE  ) 
                
                {                                      
                         $this->city_model-> modif($data);                                          
                         return redirect('MyPanel/city');         
                }
                        
            $data['user']=$this->session->userdata("user");
            $id_city =$this->uri->segment(4); 
            $this->load->model("city_model"); 
            $data['city_data']=$this->city_model-> all_city($id_city);
          
           $this->load->model("country_model");
           $list_country=$this->country_model-> all_country();
           $data['all_country']=$list_country;
 $data['user']= $this->session->userdata('user');
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
                 
            $this->load->view('mypanel/templates/header_view',$data);
            $this->load->view('mypanel/templates/menu_view', $data);
            $this->load->view('mypanel/templates/modif_city_formulaire', $data);
                        
   
     }
    
    public function supp_city_2(){
         $data['user']= $this->session->userdata('user');
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model("city_model");
         $data = [
            'id' => $this->input->post ('id'),
          ];         
        
                  $this->city_model->delete($data);
                  
               return redirect('MyPanel/city');
             
     }

}
