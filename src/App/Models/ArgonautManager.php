<?php

namespace App\Models;

use Library\Core\AbstractModel;
use App\Models\ArgonautModel;


class ArgonautManager extends AbstractModel {

    public function createArgonaut(ArgonautModel $argonaut): void
    {
        $this->db->execute('INSERT INTO Argonautes (Firstname, Adjective) VALUES (:firstname, :adjective)', [
            'firstname' => $argonaut->getFirstName(),
            'adjective' => $argonaut->getAdjective()
        ]);
        
    }
    
    public function findAllArgonauts(): ?Array
    {
        $query = $this->db->getResults('SELECT * FROM Argonautes ORDER BY Firstname', [
        ]);
        
        if (empty($query)) {
            return null;
        }
        
        return $query;
    }

    public function deleteArgonaut($id) : void 
    {
        $this->db->execute('DELETE FROM Argonautes WHERE ID = :id', [
            'id' => $id
        ]);
    }
}