<?php
namespace App\Models;

use CodeIgniter\Model;

class MelayuDeli_model extends Model{

    protected $table = 'melayu_deli';
    protected $allowedFields = ['kata', 'arti'];
    
    public function getData($kata = false){
        if ($kata == false) {
            return $this->findAll();
        } else {
            $users = $this->like('kata', $kata)
                   ->orderBy('kata', 'asc')
                   ->findAll();
            return $users;
            //return $this->getWhere(['kata' => $kata])->getRowArray();
        }
    }

    public function insertData($data){
        return $this->insert($data);
    }

}

?>