<?php

namespace Repository;


class OrdersProductionRepository extends Repository
{
    CONST TABLE = "orders_production";

    public function getAll($limit = null)
    {
        if($limit === null) {
            $select = $this->sql()->prepare("select * from ".self::TABLE);
            $select->execute();
            return $select->fetchAll();
        }
        else
        {
            $select = $this->sql()->prepare("select * from ".self::TABLE." limit :limit");
            $select->bindValue(":limit", $limit);
            $select->execute();
            return $select->fetchAll();
        }
    }

    public function editStatus($status, $id, $amount = null)
    {
        if($amount === null) {
            $insert = $this->sql()->prepare("update " . self::TABLE . " set status = :status where id = :id");
            $insert->bindValue(":status", $status);
            $insert->bindValue(":id", $id);
            $insert->execute();
        }
        else
        {
            $insert = $this->sql()->prepare("update " . self::TABLE . " set status = :status, amount = :amount where id = :id");
            $insert->bindValue(":status", $status);
            $insert->bindValue(":amount", $amount);
            $insert->bindValue(":id", $id);
            $insert->execute();
        }
    }

    public function getOrderById($id)
    {
        $select = $this->sql()->prepare("select * from ".self::TABLE." where id = :id");
        $select->bindValue(":id", $id);
        $select->execute();
        return $select->fetch();
    }

    public function insertOrder($product, $amount)
    {
        $insert = $this->sql()->prepare("insert into orders_production set id_product = :product, amount = :amount, status = 1");
        $insert->bindValue(":product", $product);
        $insert->bindValue(":amount", $amount);
        $insert->execute();
    }
}