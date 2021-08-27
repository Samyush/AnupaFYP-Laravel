<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return $this->sendResponse($tables->toArray(), 'Tables retrieved successfully.');

    }


    public function show($id)
    {
        $singleTable = Table::find($id);

        if (is_null($singleTable)) {
            return $this->sendError('Table not found.');
        }


        return $this->sendResponse($singleTable->toArray(), 'Table retrieved successfully.');
    }


}
