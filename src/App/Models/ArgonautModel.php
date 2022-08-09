<?php

namespace App\Models;

use Library\Core\AbstractModel;

class ArgonautModel extends AbstractModel
{
    private int $id;
    private string $firstname;
    private string $adjective;

    public static function createArgonautFromMysqlData(array $data) : ArgonautModel {
        $argonaut = new ArgonautModel();
        $argonaut->setId($data[0]['ID']);
        $argonaut->setFirstName($data[0]['Firstname']);
        $argonaut->setAdjective($data[0]['Adjective']);

        return $argonaut;
    }

    // SETTERS 

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setFirstName(string $firstname) {
        $this->firstname = $firstname;
    }

    public function setAdjective(string $adjective) {
        $this->adjective = $adjective;
    }

    // GETTERS

    public function getId() : int {
        return $this->id;
    }

    public function getFirstName() : string {
        return $this->firstname;
    }

    public function getAdjective() : string {
        return $this->adjective;
    }

}