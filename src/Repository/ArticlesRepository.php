<?php

namespace Repository;


use Model\Article;

class ArticlesRepository extends Repository
{
    public function getAllArticles($limit = null)
    {
        if($limit == null)
        {
            $select = $this->sql()->prepare("select * from articles order by id desc");
            $select->execute();
            return $select->fetchAll();
        }
        else
        {
            $select = $this->sql()->prepare("select * from articles order by id desc limit :limit");
            $select->bindValue(":limit", $limit);
            $select->execute();
            return $select->fetchAll();
        }
    }

    public function addArticle(Article $article)
    {
        $insert = $this->sql()->prepare("insert into articles (name, amount_start, added_date, contractor_id, unit, minimum, category, type) values (:name, :amount_start, :date, :order, :unit, :minimum, :category, :type)");
        $insert->bindValue(":name", $article->getName());
        $insert->bindValue(":amount_start", $article->getStartAmount());
        $insert->bindValue(":date", $article->getAddDate());
        $insert->bindValue(":order", $article->getContractorId());
        $insert->bindValue(":unit", $article->getUnit());
        $insert->bindValue(":type", $article->getType());
        $insert->bindValue(":minimum", $article->getMinimum());
        $insert->bindValue(":category", $article->getCategory());
        $insert->execute();
    }

    public function editArticle(Article $article)
    {
        $insert = $this->sql()->prepare("update articles set name = :name, amount_start = :amount_start, added_date = :date, contractor_id = :order, unit = :unit, minimum = :minimum, category = :category where id = :id");
        $insert->bindValue(":name", $article->getName());
        $insert->bindValue(":amount_start", $article->getStartAmount());
        $insert->bindValue(":date", $article->getAddDate());
        $insert->bindValue(":order", $article->getContractorId());
        $insert->bindValue(":unit", $article->getUnit());
        $insert->bindValue(":minimum", $article->getMinimum());
        $insert->bindValue(":id", $article->getId());
        $insert->bindValue(":category", $article->getCategory());
        $insert->execute();
    }

    public function getArticleById($id)
    {
        $select = $this->sql()->prepare("select * from articles where id = :id order by id desc");
        $select->bindValue(":id", $id);
        $select->execute();
        return $select->fetch();
    }

    public function getLastId($from)
    {
        $select = $this->sql()->prepare("SELECT * FROM ".$from." order by id desc limit 1");
        $select->execute();
        return $select->fetch()['id'];
    }

    public function insertCategory($name)
    {
        $insert = $this->sql()->prepare("insert into categories set name = :name");
        $insert->bindValue(":name", $name);
        $insert->execute();
    }

    public function deleteArticle($id)
    {
        $delete = $this->sql()->prepare("delete from articles where id = :id");
        $delete->bindValue(":id", $id);
        $delete->execute();
    }

    public function getCategories()
    {
        $select = $this->sql()->prepare("select * from categories");
        $select->execute();
        return $select->fetchAll();
    }

    public function getCategoryById($id)
    {
        $select = $this->sql()->prepare("select * from categories where id = :id");
        $select->bindValue(":id", $id);
        $select->execute();
        return $select->fetch();
    }
}