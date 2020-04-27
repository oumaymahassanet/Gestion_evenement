<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class country_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
    }
     public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
       
        $this->load->view('mypanel/login_view', $data);
     }
     
      public function all_country($id=''){
  
          $this->db->select('*');
          $this->db->from('country');
          if($id!='') {$this->db->where('id', $id);}
          $this->db->where('banned','no');
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
    public function ajout($row){
      

          $this->db->insert('country',$row);

}

public function modif($row){
     	     	
        
          $this->db->where('id', $row['id']);  
          $this->db->update('country',$row);
        
     
          }
    
    
 public function delete($row){
     	     	
        
            $this->db->where('id', $row['id']);  
            $this->db->delete('country',$row);

          }
    
    
     
     
     
     
}