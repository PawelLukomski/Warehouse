<?php

namespace Repository;


use Model\Contractor;

class ContractorsRepository extends Repository
{
    public function getAllContractors($limit = null)
    {
        if($limit == null)
        {
            $select = $this->sql()->prepare("select * from contractors order by id desc");
            $select->execute();
            return $select->fetchAll();
        }
        else
        {
            $select = $this->sql()->prepare("select * from contractors order by id desc limit :limit");
            $select->bindValue(":limit", $limit);
            $select->execute();
            return $select->fetchAll();
        }
    }

    public function addContractor(Contractor $contractor)
    {
        $insert = $this->sql()->prepare("insert into contractors (name, address, phone, annotation) values (:name, :address, :phone, :annotation)");
        $insert->bindValue(":name", $contractor->getName());
        $insert->bindValue(":address", $contractor->getAddress());
        $insert->bindValue(":phone", $contractor->getPhone());
        $insert->bindValue(":annotation", $contractor->getAnnotation());
        $insert->execute();
    }

    public function editContractor(Contractor $contractor)
    {
        $insert = $this->sql()->prepare("update contractors set name = :name, address = :address, phone = :phone, annotation = :annotation where id = :id");
        $insert->bindValue(":name", $contractor->getName());
        $insert->bindValue(":address", $contractor->getAddress());
        $insert->bindValue(":id", $contractor->getId());
        $insert->bindValue(":phone", $contractor->getPhone());
        $insert->bindValue(":annotation", $contractor->getAnnotation());
        $insert->execute();
    }

    public function getContractorById($id)
    {
        $select = $this->sql()->prepare("select * from contractors where id = :id order by id desc");
        $select->bindValue(":id", $id);
        $select->execute();
        return $select->fetch();
    }

    public function deleteContractor($id)
    {
        $delete = $this->sql()->prepare("delete from contractors where id = :id");
        $delete->bindValue(":id", $id);
        $delete->execute();
    }
}