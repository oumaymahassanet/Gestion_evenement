<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class city_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
    }
  
     public function getCitiesByCountry($id){
        $query = $this->db->query("select ci.id,ci.name from city ci join country co on ci.id_country=co.id where co.id = '$id'");
        $res = array();
        foreach ($query->result() as $row)
{            array_push($res, $row);
}
return json_encode($res);
     }
      public function all_city($id=''){
  
          $this->db->select('*');
          $this->db->from('city');
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
    public function all_country($id=null){
  
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
      

          $this->db->insert('city',$row);

}

public function modif($row){
     	     	
        
          $this->db->where('id', $row['id']);  
          $this->db->update('city',$row);
        
     
          }
    
    
 public function delete($row){
     	     	
        
            $this->db->where('id', $row['id']);  
            $this->db->delete('city',$row);

          }
    
    
     
     
     
     
}