<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('Crud');
    }
	
	public function test_post()
	{
       
        $theCredential = $this->user_data;
        $this->response($theCredential, 200); // OK (200) being the HTTP response code
        
	}

    public function users_get()
    {

        $id = $this->get('id');


        if ($id === NULL)
        {
            $getUser = $this->Crud->readData('id,nama,username,role','user')->result();
            if ($getUser)
            {
                // Set the response and exit
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get user',
                    'data'=> $getUser
                ];
                $this->response($output, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'No users were found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        if($id){
            $where = [
                'id'=> $id
            ];
            $getUserById = $this->Crud->readData('id,nama,username,role','user',$where)->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get user',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed get User or id Not found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }

    public function users_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','user',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    "nama"      => $this->put('nama'),
                    "username"  => $this->put('username'),
                    "password"  => sha1($this->put('password')),
                    "role"      => $this->put('role')
                ];

                $updateData = $this->Crud->updateData('user',$data,$where);
                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success edit user',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed edit user',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed edit user or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }


    public function users_delete()
    {

        $id = (int) $this->get('id');

        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','user',$where)->num_rows();

            if($cekId > 0){
                
                $this->Crud->deleteData('user',$where);
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success delete user',
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete user or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }
    public function  barang_post(){
        $namabarang = $this->post('namabarang');
        $jumlah = $this->post('jumlah');
        $harga = $this->post('harga');
        $dataArray = [
            "namabarang"=>$namabarang,
            "jumlah"=>$jumlah,
            "harga"=>$harga
        ];

        $createUser = $this->Crud->createData('barang',$dataArray);
                
        if($createUser){
            $output = [
                'status' => 200,
                'error' => false,
                'message' => 'Success create barang',
                'data'=> $dataArray
            ];
            $this->set_response($output, REST_Controller::HTTP_OK); 
        }else{
            $output = [
                'status' => 400,
                'error' => false,
                'message' =>'Failed create barang',
                'data'=> []
            ];
            $this->set_response($output, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function barang_get()
    {

        $id = $this->get('id');


        if ($id === NULL)
        {
            $getUser = $this->Crud->readData('id,namabarang,jumlah,harga,','barang')->result();
            if ($getUser)
            {
                // Set the response and exit
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get barang',
                    'data'=> $getUser
                ];
                $this->response($output, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'No users were found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        if($id){
            $where = [
                'id'=> $id
            ];
            $getUserById = $this->Crud->readData('id,namabarang,jumlah,harga,','barang',$where)->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get barang',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed get barang or id Not found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }
    public function barang_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','barang',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    "namabarang"      => $this->put('namabarang'),
                    "jumlah"  => $this->put('jumlah'),
                    "harga"  => $this->put('harga'),
                ];

                $updateData = $this->Crud->updateData('barang',$data,$where);
                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success edit barang',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed edit barang',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete barang or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }
    public function barang_delete()
    {

        $id = (int) $this->get('id');

        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','barang',$where)->num_rows();

            if($cekId > 0){
                
                $this->Crud->deleteData('barang',$where);
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success delete barang',
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete barang or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }
}
