<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Administrator extends REST_Controller {

   public function __construct(){
       parent::__construct();
        $this->load->model('Admin_model');
   }

    public function index_get()
    {
        /*$data=array(
            'title'=>'Data User',
            'user'=>$this->admin_model->datatabels()
        );
        $this->load->view('template/header',$data);
        $this->load->view('administrator/index',$data);
        $this->load->view('template/footer');*/

        $id = $this->get('id');

        if ($id === null) {
            $Administrator = $this->Admin_model->datatabels();
        }else {
            $Administrator = $this->Admin_model->datatabels($id);
        }
        
        if ($Administrator) {
            $this->response([
                'status' => TRUE,
                'data' => $Administrator
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id tidak ditemukan !'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete() {
        
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => FALSE,
                'message' => 'id tidak di isi !'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->Admin_model->hapusUser($id) > 0) {
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'dihapus.'
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'id tidak ditemukan !'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post() {

        //$username = $this->post('username');

        /*$data1=[
            "nama"=> $this->post('nama'),
            "alamat"=> $this->post('alamat'),
            "tlp"=> $this->post('tlp'),
            "ktp"=> $this->post('ktp')
	   	];*/
		$data2=[
			"nama"=> $this->post('nama'),
            "username"=> $this->post('username'),
            "password"=> $this->post('password'),
            "tlp"=> $this->post('tlp'),
            "level"=> $this->post('level'),
			"status"=> $this->post('status')
		];
        
        
        //if($this->Admin_model->cekUser($username) > 0) {
            if ($this->Admin_model->tambahUser($data2) > 0) {
                //if ($this->Admin_model->tambahPengunjung($data1) > 0 ) {
                    $this->response([
                        'status' => TRUE,
                        'message' => 'Data berhasil dibuat.'
                    ], REST_Controller::HTTP_CREATED);
                //}
            }else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Data gagal dibuat !'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        /*} else {
            $this->response([
                'status' => FALSE,
                'message' => 'Username telah digunakan !'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }*/
        
    }

    public function index_put() {

        //$username = htmlspecialchars($this->put('username'));
        $id = $this->put('id');

		$data=[
			"nama"=> $this->put('nama'),
            "username"=> $this->put('username'),
            "password"=> $this->put('password'),
            "tlp"=> $this->put('tlp'),
            "level"=> $this->put('level'),
			"status"=> $this->put('status')
        ];

        //if($this->Admin_model->cekUser($username) > 0) {
            if ($this->Admin_model->ubahUser($data, $id) > 0) {
                    $this->response([
                        'status' => TRUE,
                        'message' => 'Data berhasil di update.'
                    ], REST_Controller::HTTP_CREATED);
            }else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Data gagal di update !'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        /*} else {
            $this->response([
                'status' => FALSE,
                'message' => 'Username telah digunakan !'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }*/
    }

}


?>