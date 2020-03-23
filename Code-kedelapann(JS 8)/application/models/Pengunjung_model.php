<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_model extends CI_Model {

    public function getAllpengunjung($id = null){
        if ($id === null) {
            return $this->db->get('pengunjung')->result_array();
        } else {
            return $this->db->get_where('pengunjung', ['id_pengunjung' => $id])->result_array();
        }
        
    }

    public function hapusPengunjung($id){
        $this->db->delete('pengunjung', ['id_pengunjung' => $id]);
        return $this->db->affected_rows();
    }

    public function tambahPengunjung($data1){
        $this->db->insert('pengunjung', $data1);
        return $this->db->affected_rows();
    }

    public function cekPengunjung($nama){
		$this->db->select('nama');
		$this->db->from('pengunjung');
		$this->db->where('nama',$nama);
        $this->db->limit(1);
        return $this->db->affected_rows();
    }

   public function tambahdatapj(){
       $data=[
            "nama"=> $this->input->post('nama',true),
            "ktp"=> $this->input->post('ktp',true),
            "tlp"=> $this->input->post('tlp',true),
            "alamat"=> $this->input->post('alamat',true),
       ];
       $this->db->insert('pengunjung',$data);
   }

   public function hapusdatapj($id_pengunjung){
       $this->db->where('id_pengunjung',$id_pengunjung);
       $this->db->delete('pengunjung');
   }

   public function getpengunjungByID($id_pengunjung){
       return $this->db->get_where('pengunjung',['id_pengunjung'=>$id_pengunjung])->row_array();
   }

   public function ubahdatapj(){
        $data=[
            "nama"=> $this->input->post('nama',true),
            "ktp"=> $this->input->post('ktp',true),
            "tlp"=> $this->input->post('tlp',true),
            "alamat"=> $this->input->post('alamat',true),
        ];
        $this->db->where('id_pengunjung',$this->input->post('id_pengunjung'));
        $this->db->update('pengunjung',$data);
   }

   public function cariDataPengunjung(){
       $keyword=$this->input->post('keyword');
       $this->db->like('nama',$keyword);
       $this->db->or_like('ktp',$keyword);
       return $this->db->get('pengunjung')->result_array();
   }

   //user

    public function getpengunjungByName($nama){
        return $this->db->get_where('pengunjung',['nama'=>$nama])->row_array();
    }
    
    public function getpengunjungBy($nama){
        $this->db->select('id_pengunjung');
		$this->db->from('pengunjung');
        $this->db->where('nama',$nama);
        $query = $this->db->get();
        return $query->result();
    }

    public function getReservasiName($nama){
        $this->db->select('*');
        $this->db->from('pengunjung');
        $this->db->join('reservasi', 'pengunjung.id_pengunjung = reservasi.id_pengunjung', 'kamar', 'kamar.id_kamar = reservasi.id_kamar');
        //$this->db->where('pengunjung',['nama'=>$nama]);
        $query = $this->db->get();
        //p.id_pengunjung = $nama AND k.id_kamar = r.id_kamar
        //$this->db->query("SELECT r.id_reservasi, p.nama, p.alamat, p.tlp, p.ktp, k.no_kamar, k.type, k.harga, r.tgl_masuk, r.tgl_keluar FROM pengunjung AS p JOIN reservasi AS r ON p.id_pengunjung = r.id_pengunjung JOIN kamar AS k ON k.id_kamar = r.id_kamar");
        //$query = $this->db->query("SELECT r.id_reservasi, p.nama, p.alamat, p.tlp, p.ktp, k.no_kamar, k.type, k.harga, r.tgl_masuk, r.tgl_keluar FROM pengunjung AS p, kamar AS k  WHERE p.id_pengunjung = $nama AND k.id_kamar = r.id_kamar");
        //$query = $this->db->get_where(['nama'=>$nama]);
        return $query->result();
    }

    public function datatabels() {
        $query = $this->db->order_by('id_user','DESC')->get('user');
        return $query->result();
    }
}



?>