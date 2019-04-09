<?php

namespace Repository;


class OrdersRepository extends Repository
{
    public function insertOrder($articleId, $amount = null)
    {
        if($amount == null)
        {
            $insert = $this->sql()->prepare("insert into orders (status, id_article, amount) values (0, :id, 0)");
            $insert->bindValue(":id", $articleId);
            $insert->execute();
        }
        else{
            $insert = $this->sql()->prepare("insert into orders (status, id_article, amount) values (1, :id, :amount)");
            $insert->bindValue(":id", $articleId);
            $insert->bindValue(":amount", $amount);
            $insert->execute();
        }
    }

    public function getList()
    {
        $select = $this->sql()->prepare("select * from orders where status = 1 and id_article in (select id from articles where type = 1)");
        $select->execute();
        return $select->fetchAll();
    }

    public function countByStatus($status)
    {
        $select = $this->sql()->prepare("SELECT count(*) from orders where status = :status");
        $select->bindValue(":status", $status);
        $select->execute();
        return $select->fetchColumn();
    }

    public function getAllOrders($limit = null)
    {
        if($limit == null)
        {
            $select = $this->sql()->prepare("select * from orders order by status asc");
            $select->execute();
            return $select->fetchAll();
        }
        else
        {
            $select = $this->sql()->prepare("select * from orders order by status asc limit :limit");
            $select->bindValue(":limit", $limit);
            $select->execute();
            return $select->fetchAll();
        }
    }

    public function getOrderById($id)
    {
        $select = $this->sql()->prepare("select * from orders where id = :id order by id desc");
        $select->bindValue(":id", $id);
        $select->execute();
        return $select->fetch();
    }

    public function editStatus($status, $id, $how = null)
    {
        if($how == null) {
            $insert = $this->sql()->prepare("update orders set status = :status where id = :id");
            $insert->bindValue(":status", $status);
            $insert->bindValue(":id", $id);
            $insert->execute();
        }
        else
        {
            $insert = $this->sql()->prepare("update orders set status = :status, amount = :how where id = :id");
            $insert->bindValue(":how", $how);
            $insert->bindValue(":status", $status);
            $insert->bindValue(":id", $id);
            $insert->execute();
        }
    }
    public function checkArticle($id)
    {
        $select = $this->sql()->prepare("select * from orders where id_article = :id");
        $select->bindValue(":id", $id);
        $select->execute();
        if($row = $select->fetch())
            return true;
        else
            return false;
    }
    public function updateByArticle($status, $articleId)
    {
        $insert = $this->sql()->prepare("update orders set status = :status where id_article = :id");
        $insert->bindValue(":status", $status);
        $insert->bindValue(":id", $articleId);
        $insert->execute();
    }
    public function deleteOrder($id)
    {
        $delete = $this->sql()->prepare("delete from orders where id_article = :id");
        $delete->bindValue(":id", $id);
        $delete->execute();
    }


}