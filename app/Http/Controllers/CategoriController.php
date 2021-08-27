<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Categori;
use Illuminate\Http\Request;

class CategoriController extends BaseController
{
    public function index()
    {
        $categories = Categori::with('food')->get();
        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully.');

    }


    public function show($id)
    {
        $singleCategory = Categori::find($id);

        if (is_null($singleCategory)) {
            return $this->sendError('Table not found.');
        }


        return $this->sendResponse($singleCategory->toArray(), 'Category retrieved successfully.');
    }
}
