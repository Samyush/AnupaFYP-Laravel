<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function index() {
        $blogs = Blog::all();
        return $this->sendResponse(
            $blogs,
            'blogs retrieved successfully'
        );
    }
}
