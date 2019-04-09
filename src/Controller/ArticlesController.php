<?php

namespace Controller;


use Manager\Request;
use Model\Article;
use Model\Contractor;
use Repository\ArticlesMovesRepository;
use Repository\ArticlesRepository;
use Repository\ContractorsRepository;

class ArticlesController extends Controller
{
    public function indexAction()
    {
        $this->allAction();
    }

    public function allAction()
    {
        $repo = new ArticlesRepository();
        $articles = $repo->getAllArticles();

        $repoMoves = new ArticlesMovesRepository();

        //$categories = $repo->getCategories();
        $categories = [];
        $moves = [];
        foreach ($articles as $article)
        {
            $categories[$article['id']] = $repo->getCategoryById($article['category']);
            $count = 0;
            foreach ($repoMoves->getMoves($article['id']) as $move)
            {
                $count+=($move['amount']);
            }
            $moves[$article['id']] = $article['amount_start']+($count);
        }

        $this->render("Articles/all.php", ['articles'=>$articles, 'amount'=>$moves, 'category'=>$categories]);
    }

    public function addAction()
    {
        $repo = new ArticlesRepository();

        $repoContractors = new ContractorsRepository();

        if(isset($_POST['add']))
        {
            $article = new Article();

            if(isset($_POST['plus_contractor']))
            {
                $contractor = new Contractor();
                $contractor->setName($_POST['plus_name']);
                $contractor->setAddress($_POST['address']);
                $contractor->setPhone($_POST['phone']);
                $contractor->setAnnotation($_POST['annotation']);
                $repoContractors->addContractor($contractor);
                $article->setContractorId($repo->getLastId("contractors"));
            }
            else
            {
                $article->setContractorId($_POST['contractor']);
            }

            if(isset($_POST['plus_category']))
            {
                $repo->insertCategory($_POST['category_name']);
                $article->setCategory($repo->getLastId("categories"));
            }
            else
            {
                $article->setCategory($_POST['category']);
            }

            $article->setName($_POST['name']);
            $article->setMinimum($_POST['minimum']);
            $article->setStartAmount($_POST['amount']);
            $article->setUnit($_POST['unit']);
            $article->setType($_POST['type']);
            $repo->addArticle($article);
            header("Location: /Articles");
        }

        $this->render("Articles/add.php", ['contractors'=>$repoContractors->getAllContractors(), 'categories'=>$repo->getCategories()]);
    }

    public function editAction(Request $request)
    {
        $repo = new ArticlesRepository();

        $articleId = $request->request()[2];

        $repoContractors = new ContractorsRepository();

        $categories = $repo->getCategories();

        $article = $repo->getArticleById($articleId);

        if(isset($_POST['edit']))
        {
            $article = new Article();
            $article->setName($_POST['name']);
            $article->setCategory($_POST['category']);
            $article->setContractorId($_POST['order']);
            $article->setMinimum($_POST['minimum']);
            $article->setId($articleId);
            $article->setUnit($_POST['unit']);
            $repo->editArticle($article);
            $this->render("Articles/edit.php", ['contractors'=>$repoContractors->getAllContractors(), 'product'=>(array)$article, 'categories'=>$categories]);
        }
        else {

            $this->render("Articles/edit.php", ['contractors' => $repoContractors->getAllContractors(), 'product' => $article, 'categories'=>$categories]);
        }
    }

    public function deleteAction(Request $request)
    {
        $articleId = $request->request()[2];
        $repo = new ArticlesRepository();
        $repo->deleteArticle($articleId);
        header("Location: /Articles/");
    }



}