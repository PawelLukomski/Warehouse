<?php

namespace Controller;

use Manager\Request;
use Repository\ArticlesRepository;
use Repository\OrdersRepository;

class ListController extends Controller
{
    public function indexAction()
    {
        $repo = new OrdersRepository();
        $repoArticles = new ArticlesRepository();
        $orders = $repo->getList();

        $articlesN = [];
        foreach ($repo->getList() as $list)
        {
            $articlesN[$list['id_article']] = $repoArticles->getArticleById($list['id_article']);
        }

        $this->render("List/all.php", ['articles'=>$articlesN, 'orders'=>$orders]);
    }

    public function acceptAction(Request $request)
    {
        $orderId = $request->request()[2];

        $repo = new OrdersRepository();
        $repo->editStatus(2, $orderId);

        header("Location: /List");
    }

    public function editAction(Request $request)
    {
        $orderId = $request->request()[2];
        $amount = $request->request()[3];

        $repo = new OrdersRepository();

        $repo->editStatus(1, $orderId, $amount);
        header("Location: /List");
    }
}