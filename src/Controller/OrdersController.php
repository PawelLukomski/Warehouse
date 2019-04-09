<?php

namespace Controller;


use Manager\Request;
use Repository\ArticlesMovesRepository;
use Repository\ArticlesRepository;
use Repository\ContractorsRepository;
use Repository\OrdersRepository;

class OrdersController extends Controller
{
    public function indexAction()
    {

        $repo = new OrdersRepository();

        $articlesRepo = new ArticlesRepository();
        $articlesAll = $articlesRepo->getAllArticles();
        $articles = [];

        $repoMoves = new ArticlesMovesRepository();
        $repoContractor = new ContractorsRepository();
        $contractor = [];
        $moves = [];
        foreach ($articlesAll as $article)
        {
            $count = 0;
            foreach ($repoMoves->getMoves($article['id']) as $move)
            {
                $count+=($move['amount']);
            }
            $moves[$article['id']] = $article['amount_start']+($count);
            $contractor[$article['id']] = $repoContractor->getContractorById($article['contractor_id']);
        }



        $orders = $repo->getAllOrders();

        foreach ($orders as $order)
        {
            $articles[$order['id_article']] = $articlesRepo->getArticleById($order['id_article']);
        }

        $this->render("Orders/all.php", ['orders'=>$orders, 'articles'=>$articles, 'amount'=>$moves, 'order'=>$contractor]);
    }
    public function editAction(Request $request)
    {
        $orderId = $request->request()[2];

        $repo = new OrdersRepository();

        $order = $repo->getOrderById($orderId);

        if(isset($_POST['status']))
        {
            $repo->editStatus($_POST['status'], $orderId);
            header("Location: /Orders");
        }

        $this->render("Orders/edit.php", ['order'=>$order]);
    }
    public function orderAction(Request $request)
    {
        $repo = new OrdersRepository();
        $orderId = $request->request()[2];
        $howMuch = $request->request()[3];
        $repo->editStatus(1, $orderId, $howMuch);
        header("Location: /Orders");

    }

    public function addAction()
    {
        $repo = new OrdersRepository();
        $repoArticles = new ArticlesRepository();

        if(isset($_POST['add']))
        {
            $repo->insertOrder($_POST['id_article'], $_POST['amount']);
            header("Location: /Orders/");
        }

        $this->render("Orders/add.php", ['articles'=>$repoArticles->getAllArticles()]);

    }
}