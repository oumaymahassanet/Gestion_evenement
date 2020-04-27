     <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class comments extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
           $this->load->model('user_model');
        $this->load->model('comments_model');
                   $this->load->model('events_model');

    }

  
public function all_comments(){
     
     $this->load->model('comments_model');
     
     $this->load->library('pagination');
                $this->db->where('validation','no')  ;
     $query = $this->db->get('comments','5',$this->uri->segment(3));
     $data['all_comments']=$query->result();
                     $this->db->where('validation','no')  ;
     $query2 = $this->db->get('comments');

    $config['base_url'] = 'http://localhost/event/MyPanel/comments';
     
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

         $this->load->model("user_model"); 
            $list_users=$this->user_model->all_users();
            $data['all_users']=$list_users ;
        
        $data['user']=$this->session->userdata("user");
        if((empty($data['user']))|| ($data['user']['role']!='admin') ){
            redirect('');
        }  
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/all_comments_view', $data); 
        }  
        
    
    public function valider_comments(){
         
        $this->load->helper(array('form', 'url'));
        $this->load->model("comments_model");
         $data = [
            'id' => $this->input->post ('id'),
             'validation' => 'yes' ,
          ];         
        
                  $this->comments_model->modif($data);
                  
             
        $x=$this->session->userdata("user");
        if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }  
     }
   
    
    public function supp_comments_2(){
         
        $this->load->helper(array('form', 'url'));
        $this->load->model("comments_model");
         $data = [
            'id' => $this->input->post ('id'),
          ];         
        
                  $this->comments_model->delete($data);
        $x=$this->session->userdata("user");
        if((empty($x))|| ($x['role']!='admin') ){
            redirect('');
        }  
     }

}
