<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class type_events_model extends CI_Model{
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
     
      public function all_type_events($id='',$alias=''){
  
          $this->db->select('*');
          $this->db->from('type_events');
          if($id!='') {$this->db->where('id', $id);}
          if($alias!='') {$this->db->where('alias', $alias);}
          $this->db->where('banned','no')  ;
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
     	

          $res=$this->db->insert('type_events',$row);
          $insert_id = $this->db->insert_id();
   return  $insert_id;

}
public function modif($row){
     	     	
        
  $this->db->where('id', $row['id']);  
          $this->db->update('type_events',$row);
        
     
          }
    
 public function delete($row){
     	     	
        
            $this->db->where('id', $row['id']);  
            $this->db->delete('type_events',$row);

}
    
    
     
     
     
     
}