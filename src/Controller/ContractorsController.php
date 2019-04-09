<?php

namespace Controller;


use Manager\Request;
use Model\Article;
use Model\Contractor;
use Repository\ContractorsRepository;

class ContractorsController extends Controller
{
    public function indexAction()
    {
        $this->allAction();
    }

    public function allAction()
    {
        $repo = new ContractorsRepository();
        $contractors = $repo->getAllContractors();
        $this->render("Contractors/all.php", ['contractors'=>$contractors]);
    }

    public function addAction()
    {
        $repo = new ContractorsRepository();

        if(isset($_POST['add']))
        {
            $contractor = new Contractor();
            $contractor->setName($_POST['name']);
            $contractor->setAddress($_POST['address']);
            $contractor->setPhone($_POST['phone']);
            $contractor->setAnnotation($_POST['annotation']);
            $repo->addContractor($contractor);
            header("Location: /Contractors");
        }

        $this->render("Contractors/add.php", []);
    }

    public function editAction(Request $request)
    {
        $repo = new ContractorsRepository();

        $contractorId = $request->request()[2];

        $contractor = $repo->getContractorById($contractorId);

        if(isset($_POST['edit']))
        {
            $contractor = new Contractor();
            $contractor->setName($_POST['name']);
            $contractor->setAddress($_POST['address']);
            $contractor->setPhone($_POST['phone']);
            $contractor->setId($contractorId);
            $contractor->setAnnotation($_POST['annotation']);
            $repo->editContractor($contractor);
            $this->render("Contractors/edit.php", ['order'=>(array)$contractor]);
        }
        else {

            $this->render("Contractors/edit.php", ['order' => $contractor]);
        }
    }

    public function deleteAction(Request $request)
    {
        $contractorId = $request->request()[2];
        $repo = new ContractorsRepository();
        $repo->deleteContractor($contractorId);
        header("Location: /Contractors/");
    }



}