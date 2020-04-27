<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class events_model extends CI_Model{
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
    

   
    public function all_events($id='',$alias=''){
  
          $this->db->select('*');
          $this->db->from('events');
          if($id!='') {$this->db->where('id', $id);}
          if($alias!='') {$this->db->where('alias', $alias);}
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
    public function chercher_events($id_type='',$id_country='',$id_city='',$start_date='',$titre='',$page=1){
  $perpage=2;
  $pos=($page-1)*$perpage;
        $this->db->select('*');
          $this->db->from('events');
          $this->db->where('banned','no')  ;
            $this->db->where('validation','yes')  ;
            //$this->db->where('end_date >= date_format(now(),"%Y-%m-%d")');
          if($id_type!='') {$this->db->where('id_type', $id_type);}
           if($id_country!=''){ $this->db->where('id_country', $id_country);}
            if($id_city!='') {$this->db->where('id_city', $id_city);}
            if($start_date!='') {$this->db->where('start_date >=', $start_date);}
            if($titre!=''){ $this->db->like("titre", $titre);}
            $this->db->limit($perpage,$pos);
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
    public function chercher_events_rows($id_type='',$id_country='',$id_city='',$start_date='',$titre=''){
  
        $this->db->select('*');
          $this->db->from('events');
          $this->db->where('banned','no')  ;
            $this->db->where('validation','yes')  ;
            //$this->db->where('end_date >= date_format(now(),"%Y-%m-%d")');
          if($id_type!='') {$this->db->where('id_type', $id_type);}
           if($id_country!=''){ $this->db->where('id_country', $id_country);}
            if($id_city!='') {$this->db->where('id_city', $id_city);}
            if($start_date!='') {$this->db->where('start_date >=', $start_date);}
            if($titre!=''){ $this->db->like("titre", $titre);}
           
        $query = $this->db->get();
        $res=$query->num_rows();
        
            return $res;
        }
    public function events_validation_rows(){
  
        $this->db->select('*');
          $this->db->from('events');
          $this->db->where('banned','no');
            $this->db->where('validation','no')  ;
            
        $query = $this->db->get();
        $res=$query->num_rows();
        
            return $res;
        }
        public function events_reservation_rows($id_events=''){
  
        $this->db->select('*');
          $this->db->from('reservation');
            $this->db->where('id_events',$id_events)  ;
            
        $query = $this->db->get();
        $res=$query->num_rows();
        
            return $res;
        }
        public function events_banned_rows(){
  
        $this->db->select('*');
          $this->db->from('events');
          $this->db->where('banned','yes')  ;
            
        $query = $this->db->get();
        $res=$query->num_rows();
        
            return $res;
        }
    public function plus_proche_events(){
       
          $this->db->select('*');
          $this->db->from('events');
          $this->db->where('start_date >= date_format(now(),"%Y-%m-%d")' );
          $this->db->where('banned',"no" );
          $this->db->where('validation',"yes" );
          $this->db->order_by("start_date", "asc");
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
    public function top_10_events(){
       
          $this->db->select('*');
          $this->db->from('events');
          
          $this->db->order_by("nbr_jaime", "desc");
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
    public function active_events($id_creator=''){
       
          $this->db->select('*');
          $this->db->from('events');
          if($id_creator!='') {$this->db->where('id_creator', $id_creator);}
          $this->db->where('start_date >= date_format(now(),"%Y-%m-%d")' );
          $this->db->where('banned',"no" );
          $this->db->where('validation',"yes" );
          $this->db->order_by("start_date", "asc");
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
    public function non_active_events($id_creator=''){
       
          $this->db->select('*');
          $this->db->from('events');
          if($id_creator!='') {$this->db->where('id_creator', $id_creator);}
          $this->db->where('start_date <= date_format(now(),"%Y-%m-%d")' );
          $this->db->where('banned',"no" );
          $this->db->where('validation',"yes" );
          $this->db->order_by("start_date", "asc");
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
  
    public function all_country($id=''){
  
          $this->db->select('*');
          $this->db->from('country');
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
    public function all_city($id_country){
  
          $this->db->select('*');
          $this->db->from('city');
          $this->db->where('id_country', $id_country);
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
     	

          $res=$this->db->insert('events',$row);
       $insert_id = $this->db->insert_id();
   return  $insert_id;
    }
           public function modif($row){
     	     	
          $this->db->where('id', $row['id']);  
          $this->db->update('events',$row);
        
          }
          public function modif_jaime($row){
     	     	
          $this->db->where('id', $row['id']);  
          $this->db->update('events',$row);
        
          }
    
    public function delete($row){
     	     	
        
            $this->db->where('id', $row['id']);  
            $this->db->delete('events',$row);

          }
          
     public function insert($data = array()){
        $this->db->insert_batch('picture_events',$data);
    }      

    
    public function nbr_events($id_user=''){
  
          $this->db->select('*');
          $this->db->from('events');
          if($id_user!='') {$this->db->where('id_creator', $id_user);}
         $query = $this->db->get();
        $res=$query->num_rows();
        
            return $res;
        }
    
    
    
    
}    