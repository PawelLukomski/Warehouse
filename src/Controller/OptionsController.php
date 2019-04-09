<?php

namespace Controller;


use Repository\ArticlesMovesRepository;
use Repository\ArticlesRepository;
use Repository\OrdersRepository;

class OptionsController extends Controller
{
    public function indexAction()
    {
        $articlesRepo = new ArticlesRepository();
        $articles = $articlesRepo->getAllArticles();

        $repoMoves = new ArticlesMovesRepository();

        $repoOrders = new OrdersRepository();




        if(isset($_POST['move']))
        {
            $repo = new ArticlesMovesRepository();
            if($_POST['option'] == "in")
                $repo->updateMove($_POST['id_article'], $_POST['amount']);
            else
                $repo->updateMove($_POST['id_article'], -$_POST['amount']);

            $moves = [];
            foreach ($articles as $article)
            {
                $count = 0;
                foreach ($repoMoves->getMoves($article['id']) as $move)
                {
                    $count+=($move['amount']);
                }
                if($moves[$article['id']] = $article['amount_start']+($count) <= $article['minimum'] && !$repoOrders->checkArticle($article['id']))
                {
                    $repoOrders->insertOrder($article['id']);
                }
                if($moves[$article['id']] = $article['amount_start']+($count) >= $article['minimum'] && $repoOrders->checkArticle($article['id']))
                {
                    $repoOrders->updateByArticle(2, $article['id']);
                }
            }
            header("Location: /Options");
        }


        $this->render("/Articles/options.php", ['articles'=>$articles]);
    }
}