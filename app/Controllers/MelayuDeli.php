<?php
namespace App\Controllers;

use CodeIgniter\Config\Services;
use CodeIgniter\RESTful\ResourceController;

class MelayuDeli extends ResourceController{

    protected $format       = 'json';
    protected $modelName    = 'App\Models\MelayuDeli_model';

    public function index(){
        $data = $this->model->findAll();
        $response = [
            'status' => 200,
            'error' => false,
            'data' => $data,
        ];
        return $this->respond($response, 200);
    }

    public function show($kata = null){
        $data = $this->model->getData($kata);

        if ($data) {
            $response = [
                'status' => 200,
                'error' => false,
                'data' => $data,
            ];
            return $this->respond($response, 200);
        } else {
            $error_message = ['message' => 'Not found'];
            $response = [
                'status' => 404,
                'error' => true,
                'data' => $error_message,
            ];
            return $this->respond($response, 404);
        }
    }
    
    public function create(){

        $validation = Services::validation();

        // Data input
        $kata = $this->request->getPost('kata');
        $arti = $this->request->getPost('arti');

        $data = [
            'kata' => $kata,
            'arti' => $arti
        ];

        // Jika validasi gagal
        if ($validation->run($data, 'melayu_deli') == false) {
            $error_message = ['message' => 'The request was not completed'];
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $error_message,
            ];
            return $this->respond($response, 500);
        } else {
            $save = $this->model->insertData($data);
            // Jika berhasil menginputkan data ke database
            if ($save) {
                $message = ['message' => 'Created data successful'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $message,
                ];
                return $this->respond($response, 200);
            }
        }

    }

}

?>