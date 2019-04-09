<?php

namespace Controller;

use Manager\Request;
use Model\Contractor;
use Repository\ArticlesMovesRepository;
use Repository\ArticlesRepository;
use Repository\ContractorsRepository;
use Repository\OrdersProductionRepository;
use Repository\ProductsRepository;

class OrdersProductionController extends Controller
{
    public function indexAction()
    {
        $repo = new OrdersProductionRepository();
        $repoProducts = new ProductsRepository();


        $articles = [];

        $orders = $repo->getAll();

        foreach ($orders as $order)
        {
            $articles[$order['id_product']] = $repoProducts->getById($order['id_product']);
        }

        $this->render("Orders/Production/all.php", ['orders'=>$orders, 'articles'=>$articles]);
    }

    public function editAction(Request $request)
    {
        $orderId = $request->request()[2];

        if(!isset($request->request()[3])) {

            $repo = new OrdersProductionRepository();

                $repo->editStatus(2, $orderId);
                header("Location: /OrdersProduction");
        }
        else
        {
            $repo = new OrdersProductionRepository();

                $repo->editStatus(1, $orderId, $request->request()[3]);
                header("Location: /OrdersProduction");

        }

    }

    public function detailsAction(Request $request)
    {
        $orderId = $request->request()[2];

        $repo = new OrdersProductionRepository();

        $repoArtiles = new ArticlesRepository();

        $movesRepo = new ArticlesMovesRepository();

        $moves = [];


        $order = $repo->getOrderById($orderId);

        $repoProducts = new ProductsRepository();

        $product = $repoProducts->getById($order['id_product']);

        $articles = $repoProducts->selectArticlesToProduct($order['id_product']);
        $articlesAll = [];

        $amounts = [];
        foreach ($articles as $article)
        {
            $articlesAll[$article['id_article']] = $repoArtiles->getArticleById($article['id_article']);
            $amounts[$article['id_article']] = $article['amount'];
            $count = 0;
            foreach ($movesRepo->getMoves($article['id_article']) as $move)
            {
                $count+=($move['amount']);
            }
            $moves[$article['id_article']] = $repoArtiles->getArticleById($article['id_article'])['amount_start']+($count);
        }


        $this->render("Orders/Production/details.php", ['order'=>$order, 'articles'=>$articlesAll, 'amount'=>$moves, 'product'=>$product, 'amounts'=>$amounts]);


    }

    public function addAction()
    {
        $repoProducts = new ProductsRepository();

        $repo = new OrdersProductionRepository();

        if(isset($_POST['add']))
        {
            $repo->insertOrder($_POST['id_product'], $_POST['amount']);
            header("Location: /OrdersProduction");
        }

        $this->render("Orders/Production/add.php", ['products'=>$repoProducts->getAll()]);
    }

}