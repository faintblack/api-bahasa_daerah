<?php
namespace App\Controllers;

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

}

?>