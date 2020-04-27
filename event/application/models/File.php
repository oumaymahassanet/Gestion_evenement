<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File extends CI_Model{
    function __construct() {
        $this->tableName = 'file';
        $this->tableName = 'file_type_events';

    }
    
    /*
     * Fetch files data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = '',$id_events=''){
        $this->db->select('id,file_name,uploaded_on');
        $this->db->from('file');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        elseif($id_events){
            $this->db->where('id_events',$id_events);
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        else{
            $this->db->order_by('uploaded_on','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    
     public function all_picture_events($id = '',$id_events=''){
  
          $this->db->select('*');
          $this->db->from('file');
          if($id!='') {$this->db->where('id', $id);}
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
    public function insert($data = array()){
        $insert = $this->db->insert_batch('file',$data);
        return $insert?true:false;
    }
    
     public function delete($row){
     	     	
        
            $this->db->where('id', $row['id']);  
            $this->db->delete('file',$row);

          }
   public function getRows_type_events($id = '',$id_type_events=''){
        $this->db->select('id,file_name,uploaded_on');
        $this->db->from('file_type_events');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        elseif($id_type_events){
            $this->db->where('id_type_events',$id_type_events);
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        else{
            $this->db->order_by('uploaded_on','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    
     public function all_picture_type_events($id = '',$id_type_events=''){
  
          $this->db->select('*');
          $this->db->from('file_type_events');
          if($id!=0) {$this->db->where('id', $id);}
          if($id_type_events!=0) {$this->db->where('id_type_events', $id_type_events);}
          $this->db->order_by('id',"asc");
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
    public function insert_type($data = array()){
        $insert = $this->db->insert_batch('file_type_events',$data);
        return $insert?true:false;
    }
    
     public function delete_type($row){
     	     	
        
            $this->db->where('id', $row['id']);  
            $this->db->delete('file_type_events',$row);

          }       
 
          
   public function getRows_user($id = '',$id_user=''){
        $this->db->select('id,file_name,uploaded_on');
        $this->db->from('file_user');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        elseif($id_user){
            $this->db->where('id_user',$id_user);
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        else{
            $this->db->order_by('uploaded_on','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    
     public function all_picture_user($id = '',$id_user=''){
  
          $this->db->select('*');
          $this->db->from('file_user');
          if($id!=0) {$this->db->where('id', $id);}
          if($id_user!=0) {$this->db->where('id_user', $id_user);}
          $this->db->order_by("id", "desc");
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
    public function insert_user($data = array()){
        $insert = $this->db->insert_batch('file_user',$data);
        return $insert?true:false;
    }
    
     public function delete_user($row){
     	     	
        
            $this->db->where('id', $row['id']);  
            $this->db->delete('file_user',$row);

          }       
 
}