<?php

namespace Repository;


class ArticlesMovesRepository extends Repository
{
    public function updateMove($articleId, $amount)
    {
        $insert = $this->sql()->prepare("insert into articles_moves set id_article = :product, amount = :amount, datetime = :date");
        $insert->bindValue(":product", $articleId);
        $insert->bindValue(":amount", $amount);
        $insert->bindValue(":date", date("Y-m-d H:i:s"));
        $insert->execute();
    }

    public function getMoves($articleId)
    {
        $select = $this->sql()->prepare("select * from articles_moves where id_article = :id");
        $select->bindValue(":id", $articleId);
        $select->execute();
        return $select->fetchAll();
    }
}