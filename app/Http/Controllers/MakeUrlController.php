<?php

namespace App\Http\Controllers;

use App\Models\MakeUrl;
use Illuminate\Http\Request;

class MakeUrlController extends Controller
{

    public function index()
    {
        return view('makeurl.index');
    }

    public function show(MakeUrl $makeurl)
    {
        echo route('makeurl.show', ['makeurl' => $makeurl]);
        // return view('makeurl.show');
    }
}
