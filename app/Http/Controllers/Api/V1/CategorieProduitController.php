<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CategorieProductInterface;

class CategorieProduitController extends Controller
{
    public function createAction(Request $request, CategorieProductInterface $categorieProductInterface)
    {
        return $categorieProductInterface->create($request);
    }

    public function updateAction(Request $request, CategorieProductInterface $categorieProductInterface)
    {
        return $categorieProductInterface->update($request);
    }

    public function deleteAction($id, CategorieProductInterface $categorieProductInterface)
    {
        return $categorieProductInterface->delete($id);
    }

    public function viewAction($id, CategorieProductInterface $categorieProductInterface)
    {
        return $categorieProductInterface->view($id);
    }

    public function listAction(CategorieProductInterface $categorieProductInterface)
    {
        return $categorieProductInterface->list();
    }
}
