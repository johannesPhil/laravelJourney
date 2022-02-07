<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function create(){

        $staffName = ['Emmanuelle Ortega', 'O\'neil Hampton', 'Apollos','Dominic'];
        $randomIndex = array_rand($staffName);

        return Staff::create(['name'=>$staffName[$randomIndex]]);
    }
}
