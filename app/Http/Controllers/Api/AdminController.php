<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $tables = DB::select('SHOW TABLES');

        return response()->json([
            'tables' => $tables,
        ]);
    }

    public function showTable($table){
        $tableContent = DB::table($table)->get();

        return response()->json([
            'status' => true,
            'data' => $tableContent,
        ]);
    }
}
