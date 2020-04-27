<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class reservation_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
    }
    public function all_reservation($id_events='',$id_user=''){
  
          $this->db->select('*');
          $this->db->from('reservation');
          if($id_user!='') {$this->db->where('id_user', $id_user);}
          if($id_events!='') {$this->db->where('id_events', $id_events);}
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
      

          $this->db->insert('reservation',$row);

}

 public function delete($row){
     	     	
        
            $this->db->where('id', $row[0]->id);  
            $this->db->delete('reservation');

          }
          
       public function delete_id($row){
     	     	    
          $this->db->where('id', $row['id']);  
           $this->db->delete('reservation');

          }
}
