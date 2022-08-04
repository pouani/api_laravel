<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ProductInterface;

class ProductController extends Controller
{
    public function createAction(Request $request, ProductInterface $productInterface)
    {
        return $productInterface->create($request);
    }

    public function updateAction(Request $request, ProductInterface $productInterface)
    {
        return $productInterface->update($request);
    }

    public function deleteAction($id, ProductInterface $productInterface)
    {
        return $productInterface->delete($id);
    }

    public function viewAction($id, ProductInterface $productInterface)
    {
        return $productInterface->view($id);
    }

    public function listAction(ProductInterface $productInterface)
    {
        return $productInterface->list();
    }

}
