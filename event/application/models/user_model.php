<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class user_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
    }
    
    
    public function islogin($data){  
    $query=$this->db->get_where('user',array('email'=>$data['username'],'password'=> md5($data['password']))); 
            $res=$query->result();    
            if(!empty($res))
        {  $row = $query->row();
            $data = array(
                    'id' => $row->id,
                    'first_name' => $row->first_name,
                    'last_name' => $row->last_name,
                    'email' => $row->email,
                    'role' => $row->role,
                    'validation' => $row->validation,
                    );
           // $this->session->set_userdata($data);
          
            return $data;
    //return $query->num_rows();  
          }  
          if(empty($res)){
          return $query->num_rows();
              }
    
          }
          
          
          
    public function validate(){
        // grab user input
         $username = $this->security->xss_clean($this->input->post('username'));
         $password = $this->security->xss_clean($this->input->post('password'));
        
      
        $this->db->select('*');
        $this->db->from('user');
        // Prep the query
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
        
        // Run the query
        $query = $this->db->get();
        $res=$query->result();
       
        // Let's check if there are any results
        if(!empty($res))
        {
            // If there is a user, then create session data
            $row = $query->row();            
           
            $data = array(
                    'id' => $row->id,
                    'first_name' => $row->first_name,
                    'last_name' => $row->last_name,
                    'email' => $row->email,
                    'role' => $row->role,
                    'validation' => $row->validation,
                    );
           // $this->session->set_userdata($data);
          
            return $data;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    public function all_users($id=''){
  
          $this->db->select('*');
          $this->db->from('user');
          if($id!='') {$this->db->where('id', $id);}
          
        $query = $this->db->get();
        $res=$query->result();
           if(!empty($res))
        {
           
            return $res;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    
        public function all_users_alias($alias=''){
  
          $this->db->select('*');
          $this->db->from('user');
          if($alias!='') {$this->db->where('alias', $alias);}
          
        $query = $this->db->get();
        $res=$query->result();
           if(!empty($res))
        {
           
            return $res;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    
     public function all_organizer($id_user=''){
  
          $this->db->select('*');
          $this->db->from('organizer_profile');
          if($id_user!='') {$this->db->where('id_user', $id_user);}
        $query = $this->db->get();
        $res=$query->result();
           if(!empty($res))
        {
           
            return $res;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    public function all_users_profile($id_user=null){
  
          $this->db->select('*');
          $this->db->from('user_profile');
          if(!is_null($id_user)) $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        $res=$query->result();
           if(!empty($res))
        {
           
            return $res;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    public function all_city($id_country){
  
          $this->db->select('*');
          $this->db->from('city');
          $this->db->where('id_country', $id_country);
        
          $query = $this->db->get();
        $res=$query->result();
           if(!empty($res))
        {
           
            return $res;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    public function user_validation_rows(){
  
        $this->db->select('*');
          $this->db->from('user');
          $this->db->where('banned','no')  ;
            $this->db->where('validation','no')  ;
            
        $query = $this->db->get();
        $res=$query->num_rows();
        
            return $res;
        }
        public function user_banned_rows(){
  
        $this->db->select('*');
          $this->db->from('user');
            $this->db->where('banned','yes')  ;
            
        $query = $this->db->get();
        $res=$query->num_rows();
        
            return $res;
        }
    
         
     public function ajout($row){
     	     	


          $res=$this->db->insert('user',$row);
       $insert_id = $this->db->insert_id();
   return  $insert_id;
          
   
     }
          public function ajout_users($row){
     	     	


          $this->db->insert('user_profile',$row);
     
          }
           public function ajout_organizer($row){
     	     	


          $this->db->insert('organizer_profile',$row);
     
          }
          
    public function all_country($id=null){
  
          $this->db->select('*');
          $this->db->from('country');
          if(!is_null($id)) $this->db->where('id', $id);
        $query = $this->db->get();
        $res=$query->result();
           if(!empty($res))
        {
           
            return $res;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    
    public function modif($row){
     	     	
        
          $this->db->where('id', $row['id']);  
          $this->db->update('user',$row);
        
     
          }
    public function modif_user($row){
     	     	
        
          $this->db->where('id_user', $row['id_user']);  
          $this->db->update('user_profile',$row);
        
     
          }
    public function modif_organizer($row){
     	     	
        
          $this->db->where('id_user', $row['id_user']);  
          $this->db->update('organizer_profile',$row);
        
     
          }      
    public function delete($row){
     	     	
        
            $this->db->where('id', $row['id']);  
            $this->db->delete('user',$row);

          }
          public function modif_nbr_events($row){
     	     	
          $this->db->where('id', $row['id']);  
          $this->db->update('user',$row);
        
          }
           public function top_10_user(){
       
          $this->db->select('*');
          $this->db->from('user');
          $this->db->where('banned','no');
          $this->db->order_by("nbr_events", "desc");
          $this->db->limit(10);
        $query = $this->db->get();
        $res=$query->result();
           if(!empty($res))
        {
           
            return $res;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

}
    
