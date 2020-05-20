<?php
namespace App\Models;

use CodeIgniter\Model;

class MelayuDeli_model extends Model{

    protected $table = 'melayu_deli';

    public function getData($kata = false){
        if ($kata == false) {
            return $this->findAll();
        } else {
            $users = $this->where('status', 'active')
                   ->orderBy('last_login', 'asc')
                   ->findAll();
                   
            //return $this->getWhere(['kata' => $kata])->getRowArray();
        }
    }

}

?>