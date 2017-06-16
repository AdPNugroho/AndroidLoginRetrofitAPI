<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class model_mhs extends CI_Model{
    function login($data){
        $this->db->select('*');
        $this->db->from('tbl_mhs');
        $this->db->where('username',$data['username']);
        $dbrows = $this->db->get();
        if($dbrows->num_rows()>0){
            foreach($dbrows->result() as $row){
                $nim = $row->nim;
                $nama = $row->nama;
                $alamat = $row->alamat;
                $tanggal_lahir = $row->tanggal_lahir;
                $tempat_lahir = $row->tempat_lahir;
                $username = $row->username;
                $pwhash = $row->password;
            }
            $verify = password_verify($data['password'], $pwhash) ;
            if($verify){
                $arr = array(
                    'nim'=>$nim,
                    'nama'=>$nama,
                    'alamat'=>$alamat,
                    'tanggal_lahir'=>$tanggal_lahir,
                    'tempat_lahir'=>$tempat_lahir,
                    'username'=>$username,
                    'status'=>true
                );    
                return $arr;
            }else{
                $arr = array(
                    'nim'=>$nim,
                    'nama'=>$nama,
                    'alamat'=>$alamat,
                    'tanggal_lahir'=>$tanggal_lahir,
                    'tempat_lahir'=>$tempat_lahir,
                    'username'=>$username,
                    'status'=>false
                );    
                return $arr;
            }
        }else{
            
                $arr = array(
                    'nim'=>"Unknown",
                    'nama'=>"Unknown",
                    'alamat'=>"Unknown",
                    'tanggal_lahir'=>"Unknown",
                    'tempat_lahir'=>"Unknown",
                    'username'=>"Unknown",
                    'status'=>false
                );    
                return $arr;
        }
    }
}