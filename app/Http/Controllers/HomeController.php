<?php

namespace App\Http\Controllers;

use App\Models\Document;

use App\Http\Controllers\HomeController;


class HomeController extends Controller
{

   

    public function datatable()
    {
        $documents = Document::all();
        return view('documents.datatable', compact('documents'));
    }

   

}