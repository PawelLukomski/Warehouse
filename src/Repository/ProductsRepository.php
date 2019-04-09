<?php

namespace Repository;


use Model\Product;

class ProductsRepository extends Repository
{
    CONST TABLE = "products";

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

    public function updateProduct(Product $product)
    {
        $update = $this->sql()->prepare("update products set name = :name, annotation = :annotation where id = :id");
        $update->bindValue(":name", $product->getName());
        $update->bindValue(":annotation", $product->getAnnotation());
        $update->bindValue(":id", $product->getId());
        $update->execute();
    }

    public function getFiles($id)
    {
        $select = $this->sql()->prepare("select * from products_files where id_product = :id");
        $select->bindValue(":id", $id);
        $select->execute();
        return $select->fetchAll();
    }

    public function getById($id)
    {
        $select = $this->sql()->prepare("select * from products where id = :id");
        $select->bindValue(":id", $id);
        $select->execute();
        return $select->fetch();
    }

    public function insert(Product $product)
    {
        $insert = $this->sql()->prepare("insert into products (name, amount, last_inner_date, annotation) values (:name, :amount, :date, :annotation)");
        $insert->bindValue(":name", $product->getName());
        $insert->bindValue(":date", date("Y-m-d H:i:s"));
        $insert->bindValue(":amount", $product->getAmount());
        $insert->bindValue(":annotation", $product->getAnnotation());
        $insert->execute();
    }

    public function delete($id)
    {
        $delete = $this->sql()->prepare("delete from products where id = :id");
        $delete->bindValue(":id", $id);
        $delete->execute();
    }

    public function selectArticlesToProduct($id)
    {
        $select = $this->sql()->prepare("select * from articles_products where id_product = :id");
        $select->bindValue(":id", $id);
        $select->execute();
        return $select->fetchAll();

    }

    public function lastInsert()
    {
        $select = $this->sql()->prepare("select * from products order by id desc");
        $select->execute();
        $return = $select->fetchAll()[0];
        $returnOne = $return[0];
        return $returnOne;
    }

    public function insertArticles($article, $amount, $product)
    {
        $insert = $this->sql()->prepare("insert into articles_products (id_article, id_product, amount) values (:article, :product, :amount)");
        $insert->bindValue(":article", $article);
        $insert->bindValue(":amount", $amount);
        $insert->bindValue(":product", $product);
        $insert->execute();
    }
    public function updateArticles($article, $amount, $id)
    {
        $insert = $this->sql()->prepare("update articles_products set id_article = :article, amount = :amount where id = :id");
        $insert->bindValue(":article", $article);
        $insert->bindValue(":id", $id);
        $insert->bindValue(":amount", $amount);
        $insert->execute();
    }
    public function deleteArticles($id)
    {
        $delete = $this->sql()->prepare("delete from articles_products where id = :id");
        $delete->bindValue(":id", $id);
        $delete->execute();
    }

    public function insertFiles($article, $product)
    {
        $insert = $this->sql()->prepare("insert into products_files (file, id_product) values (:article, :product)");
        $insert->bindValue(":article", $article);
        $insert->bindValue(":product", $product);
        $insert->execute();
    }

    /*
    public function editStatus($model)
    {
        $insert = $this->sql()->prepare("update ".self::TABLE." set status = :status where id = :id");
        $insert->bindValue(":status", $status);
        $insert->bindValue(":id", $id);
        $insert->execute();
    }
    */
}