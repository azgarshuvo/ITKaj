<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 09-Oct-17
 * Time: 2:18 PM
 */

namespace App\Http\Controllers\adminController;


use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller{


    public function getDashboard(){
        return view('admin.dashboard');
    }
}