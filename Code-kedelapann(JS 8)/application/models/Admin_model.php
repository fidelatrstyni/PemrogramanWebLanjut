<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

   public function getAlluser(){
       //$query=$this->db->get('mahasiswa');
       //return $query ->result_array();
       return $this->db->get('user')->result_array();
   }

   public function tambahdatauser(){
       $data=[
            "nama"=> $this->input->post('nama',true),
            "ktp"=> $this->input->post('ktp',true),
            "tlp"=> $this->input->post('tlp',true),
            "alamat"=> $this->input->post('alamat',true),
       ];
       $this->db->insert('user',$data);
   }

   public function hapusdatauser($id_user){
       $this->db->where('id_user',$id_user);
       $this->db->delete('user');
   }

   public function getuserByID($id_user){
       return $this->db->get_where('user',['id_user'=>$id_user])->row_array();
   }

   public function ubahdatauser(){
        $data=[
            "nama"=> $this->input->post('nama',true),
            "username"=> $this->input->post('username',true),
            "password"=> $this->input->post('password',true),
            "tlp"=> $this->input->post('tlp',true),
            "level"=> $this->input->post('level',true),
            "status"=> $this->input->post('status',true),
        ];
        $this->db->where('id_user',$this->input->post('id_user'));
        $this->db->update('user',$data);
   }

   public function cariDatauser(){
       $keyword=$this->input->post('keyword');
       $this->db->like('nama',$keyword);
       $this->db->or_like('ktp',$keyword);
       return $this->db->get('user')->result_array();
   }

   //user

    public function getuserByName($nama){
        return $this->db->get_where('user',['nama'=>$nama])->row_array();
    }
    
    public function getuserBy($nama){
        $this->db->select('id_user');
		$this->db->from('user');
        $this->db->where('nama',$nama);
        $query = $this->db->get();
        return $query->result();
    }

    public function getReservasiName($nama){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('reservasi', 'user.id_user = reservasi.id_user', 'kamar', 'kamar.id_kamar = reservasi.id_kamar');
        //$this->db->where('user',['nama'=>$nama]);
        $query = $this->db->get();
        //p.id_user = $nama AND k.id_kamar = r.id_kamar
        //$this->db->query("SELECT r.id_reservasi, p.nama, p.alamat, p.tlp, p.ktp, k.no_kamar, k.type, k.harga, r.tgl_masuk, r.tgl_keluar FROM user AS p JOIN reservasi AS r ON p.id_user = r.id_user JOIN kamar AS k ON k.id_kamar = r.id_kamar");
        //$query = $this->db->query("SELECT r.id_reservasi, p.nama, p.alamat, p.tlp, p.ktp, k.no_kamar, k.type, k.harga, r.tgl_masuk, r.tgl_keluar FROM user AS p, kamar AS k  WHERE p.id_user = $nama AND k.id_kamar = r.id_kamar");
        //$query = $this->db->get_where(['nama'=>$nama]);
        return $query->result();
    }

    public function datatabels($id = null) {
        if ($id === null) {
            $query = $this->db->order_by('id_user','DESC')->get('user');
            return $query->result_array();
        } else {
            return $this->db->get_where('user', ['id_user' => $id])->result_array();
        }
        
    }

    public function hapusUser($id){
        $this->db->delete('user', ['id_user' => $id]);
        return $this->db->affected_rows();
    }

    public function tambahUser($data2){
        $this->db->insert('user', $data2);
        return $this->db->affected_rows();
    }

    public function tambahPengunjung($data1){
        $this->db->insert('pengunjung', $data1);
        return $this->db->affected_rows();
    }

    public function cekUser($username){
		$this->db->select('username,password,level,status');
		$this->db->from('user');
		$this->db->where('username',$username);
        //$this->db->limit(1);
        return $this->db->affected_rows();
    }
    
    public function ubahPengunjung($data1, $id){
        $this->db->update('pengunjung', ['id_pengunjung' => $id]);
        return $this->db->affected_rows();
    }

    public function ubahUser($data, $id){
        $this->db->update('user', $data, ['id_user' => $id]);
        return $this->db->affected_rows();
    }
    


}



?>