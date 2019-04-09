<?php

namespace Controller;


use Manager\Request;
use Model\Product;
use Repository\ArticlesRepository;
use Repository\ProductsRepository;

class ProductsController extends Controller
{
    public function indexAction()
    {
        $products = new ProductsRepository();

        $this->render("Products/all.php", ['products'=>$products->getAll()]);
    }

    public function addAction()
    {
        $repoArticles = new ArticlesRepository();

        $repo = new ProductsRepository();

        if(isset($_POST['add']))
        {
            $uploadPath = __DIR__."/../../resources/files/";
            $product = new Product();
            $product->setName($_POST['name']);
            $product->setAnnotation($_POST['annotation']);
            $product->setAmount($_POST['amount']);
            $repo->insert($product);
            $lastId = $repo->lastInsert();


            foreach ($_POST['article'] as $article)
            {
                $repo->insertArticles($article['id_product'], $article['amount'], $lastId);
            }
            if(isset($_FILES['file'])) {
                foreach ($this->reArrayFiles($_FILES['file']) as $file) {
                    if (is_uploaded_file($file['tmp_name'])) {
                        move_uploaded_file($file['tmp_name'],
                            $uploadPath . $file['name']);
                        $repo->insertFiles($file['name'], $lastId);
                    }
                }
            }
            header("Location: /Products");
        }

        $this->render("Products/add.php", ['articles'=>$repoArticles->getAllArticles()]);
    }


    public function deleteAction(Request $request)
    {
        $repo = new ProductsRepository();

        $repo->delete($request->request()[2]);

        header("Location: /Products");
    }

    public function editAction(Request $request)
    {
        $repo = new ProductsRepository();

        $productId = $request->request()[2];
        $product = [];

        $repoArticles = new ArticlesRepository();
        $articlesToProject = $repo->selectArticlesToProduct($productId);

        $articles = $repoArticles->getAllArticles();

        $files = $repo->getFiles($productId);

        $articlesIds = [];
        foreach ($articlesToProject as $value)
        {
            $articlesIds[] = $value['id'];
        }

        if(isset($_POST['edit']))
        {
            $product = new Product();
            $product->setId($productId);
            $product->setAnnotation($_POST['annotation']);
            $product->setName($_POST['name']);
            $repo->updateProduct($product);
            foreach ($_POST['article'] as $key => $value)
            {
                if(in_array($key, $articlesIds)) {
                    $repo->updateArticles($value['id_product'], $value['amount'], $key);
                }
                else {
                    if(preg_match("/^new/m", $key))
                        $repo->insertArticles($value['id_product'], $value['amount'], $productId);
                }
            }
            if(isset($_POST['to_remove'])){
                foreach ($_POST['to_remove'] as $remove)
                {
                    $repo->deleteArticles($remove);
                }
            }


            header("Location: /Products/edit/".$productId);

        }
        else
        {
            $product = $repo->getById($productId);
        }

        $this->render("Products/edit.php", ['product'=>$product, 'articles'=>$articles, 'articles_product'=>$repo->selectArticlesToProduct($productId), 'files'=>$files]);
    }
}