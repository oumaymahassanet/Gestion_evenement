<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_Files extends CI_Controller {
    function  __construct() {
        parent::__construct();
        // Load session library
        $this->load->library('session');
        
        // Load file model
        $this->load->model('File');
        
                $this->load->database();
           $this->load->model('user_model');
                      $this->load->model('events_model');

    }
    
    function index(){
        $data = array();
        // If file upload form submitted
        if($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])){
                   $id_events= $this->input->post('id_events');
            $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/files/';
               //if(!file_exists($uploadPath))
                   //mkdir($uploadPath);
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['id_events'] = $id_events;

                }
            }
            
            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->File->insert($uploadData);
                
                // Upload status message
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        
        // Get files data from the database
        $data['files'] = $this->File->getRows('',$this->uri->segment(4));
        
        // Pass the files data to view
         $data['user']=$this->session->userdata("user");
         
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_picture_formulaire', $data);
    }
     public function supp_picture_2(){
         
        $this->load->helper(array('form', 'url'));
        $this->load->model("events_model");
        $this->load->model("File");
        
        
        $data1 = [
            'id' => $this->input->post ('id'),
            'id_events' => $this->input->post ('id_events'),
          ];
        $id= $this->input->post ('id') ;
        $id_events = $this->input->post ('id_events');
        $data['picture_events_data']= $this->File->all_picture_events($id,$id_events);
        //var_dump($data['picture_events_data']);
        $file_name=$data['picture_events_data'][0]->file_name;
        //var_dump($file_name);
        
        $uploadPath  = $this->config->config['upload_path'];
        unlink ( $uploadPath.$file_name);
        
        $this->File->delete($data1);
                  
               return redirect('MyPanel/events/image/'.$this->input->post ('id_events'));
             
     }
     
     function index_type_events(){
        $data = array();
        // If file upload form submitted
        if($this->input->post('type_eventsSubmit') && !empty($_FILES['type_events']['name'])){
                   $id_type_events= $this->input->post('id_type_events');
            $type_eventsCount = count($_FILES['type_events']['name']);
            for($i = 0; $i < $type_eventsCount; $i++){
                $_FILES['file_type_events']['name']     = $_FILES['type_events']['name'][$i];
                $_FILES['file_type_events']['type']     = $_FILES['type_events']['type'][$i];
                $_FILES['file_type_events']['tmp_name'] = $_FILES['type_events']['tmp_name'][$i];
                $_FILES['file_type_events']['error']     = $_FILES['type_events']['error'][$i];
                $_FILES['file_type_events']['size']     = $_FILES['type_events']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/type_events/';
              
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file_type_events')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['id_type_events'] = $id_type_events;

                }
            }
            
            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->File->insert_type($uploadData);
                
                // Upload status message
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        
        // Get files data from the database
        $data['type_events'] = $this->File->getRows_type_events('',$this->uri->segment(4));
        
        // Pass the files data to view
         $data['user']=$this->session->userdata("user");
        
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_picture_type_events', $data);
    }
     public function supp_picture_type_events_2(){
         
        $this->load->helper(array('form', 'url'));
        $this->load->model("events_model");
        $this->load->model("File");
        
        
        $data1 = [
            'id' => $this->input->post ('id'),
            'id_type_events' => $this->input->post ('id_type_events'),
          ];
        $id= $this->input->post ('id') ;
                    $id_type_events = $this->input->post ('id_type_events');
        $data['picture_type_events_data']= $this->File->all_picture_type_events($id,$id_type_events);
        //var_dump($data['picture_type_events_data']);
        $file_name=$data['picture_type_events_data'][0]->file_name;
       //var_dump($file_name);
        
        $uploadPath  = $this->config->config['upload_path_type_events'];
        unlink ( $uploadPath.$file_name);
        
        $this->File->delete_type($data1);
                  
               return redirect('MyPanel/type_events/image/'.$this->input->post ('id_type_events'));
             
             
             
     }
     
function index_user(){
        $data = array();
        // If file upload form submitted
        if($this->input->post('userSubmit') && !empty($_FILES['user']['name'])){
                   $id_user= $this->input->post('id_user');
            $userCount = count($_FILES['user']['name']);
            for($i = 0; $i < $userCount; $i++){
                $_FILES['file_user']['name']     = $_FILES['user']['name'][$i];
                $_FILES['file_user']['type']     = $_FILES['user']['type'][$i];
                $_FILES['file_user']['tmp_name'] = $_FILES['user']['tmp_name'][$i];
                $_FILES['file_user']['error']     = $_FILES['user']['error'][$i];
                $_FILES['file_user']['size']     = $_FILES['user']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/user/';
              
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file_user')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['id_user'] = $id_user;

                }
            }
            
            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->File->insert_user($uploadData);
                
                // Upload status message
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        
        // Get files data from the database
        $data['user_picture'] = $this->File->getRows_user('',$this->uri->segment(4));
        
        // Pass the files data to view
         $data['user']=$this->session->userdata("user");
         $data['id_user']=$this->session->userdata("id_user");
        
        $this->load->view('mypanel/templates/header_view',$data);
        $this->load->view('mypanel/templates/menu_view', $data);
        $this->load->view('mypanel/templates/add_picture_user', $data);
    }
    function index_user2(){
             $x['user']=$this->session->userdata("user");
             
        $data = array();
        // If file upload form submitted
        if($this->input->post('userSubmit') && !empty($_FILES['user']['name'])){
                   $id_user= $x['user']['id'];
            $userCount = count($_FILES['user']['name']);
            for($i = 0; $i < $userCount; $i++){
                $_FILES['file_user']['name']     = $_FILES['user']['name'][$i];
                $_FILES['file_user']['type']     = $_FILES['user']['type'][$i];
                $_FILES['file_user']['tmp_name'] = $_FILES['user']['tmp_name'][$i];
                $_FILES['file_user']['error']     = $_FILES['user']['error'][$i];
                $_FILES['file_user']['size']     = $_FILES['user']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/user/';
              
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file_user')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['id_user'] = $id_user;

                }
            }
            
            if(!empty($uploadData)){
                // Insert files data into the database
                $this->File->insert_user($uploadData);
                
                
            }
        }
   
            
         redirect('Profile');
    }
     public function supp_picture_user_2(){
         
        $this->load->helper(array('form', 'url'));
        $this->load->model("user_model");
        $this->load->model("File");
        
        
        $data1 = [
            'id' => $this->input->post ('id'),
            'id_user' => $this->input->post ('id_user'),
          ];
        $id= $this->input->post ('id') ;
        $id_user = $this->input->post ('id_user');
        //var_dump($id_user);
        $data['picture_user_data']= $this->File->all_picture_user($id,$id_user);
        //var_dump($data['picture_user_data']);
        $file_name=$data['picture_user_data'][0]->file_name;
       //var_dump($file_name);
        
        $uploadPath  = $this->config->config['upload_path_user'];
        unlink ( $uploadPath.$file_name);
        
        $this->File->delete_user($data1);
                  
               return redirect('MyPanel/users/image/'.$this->input->post ('id_user'));
             
             
             
     }
     

}
