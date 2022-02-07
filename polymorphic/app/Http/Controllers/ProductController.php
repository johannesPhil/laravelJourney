<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function create(){

        $products = ['Digital Marketing', 'Laravel Mastery', 'JavaScript - Good Parts','Intro to Flex box'];
        $randomIndex = array_rand($products);

        return Product::create(['name'=>$products[$randomIndex]]);
    }
}
