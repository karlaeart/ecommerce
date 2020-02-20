<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children', 'children.children')->parents()->ordered()->get();

        return CategoryResource::collection($categories);
    }
}
