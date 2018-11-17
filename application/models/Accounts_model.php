<?php

class Accounts_model extends CI_Model{

    function insert($table,$data){
        $this->db->insert($table,$data);
        return $this->db->affected_rows();
    }
    function getinfo($table,$where=NULL){
        if($where !== NULL){
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }
    function fetchAlltbl($tbl){
        $query = $this->db->get($tbl);
        return $query->result();
    }
    function fetchby($tbl,$row,$data){
        $this->db->where($row,$data);
        $query = $this->db->get($tbl);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }
    function editstatus($tbl,$accode,$data){
        $this->db->where('access_code',$accode);
        $this->db->update($tbl,$data);
    }
    function editLineemail($tbl,$email,$row,$data){
        $this->db->where($row,$email);
        $this->db->update($tbl,$data);
    }
}