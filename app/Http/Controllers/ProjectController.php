<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show(Project $project)
    {
        // dd($project);
        // return 'show';
        echo route('project.show', ['project' => $project]);
    }
}
