<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        return $this->sendResponse($foods->toArray(), 'Foods retrieved successfully.');
    }


    public function show($id)
    {
        $food = Food::find($id);
        return $this->sendResponse($food->toArray(), 'Food retrieved successfully.');
    }
}
