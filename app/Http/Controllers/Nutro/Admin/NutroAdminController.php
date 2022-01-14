<?php

namespace App\Http\Controllers\Nutro\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NutroAdminController extends Controller
{
    public function index()
    {
        return response()->view('nutro.admin.index');
    }
}
