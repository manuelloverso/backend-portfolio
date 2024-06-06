<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->orderByDesc('id')->get();
        //return Project::all();
        return response()->json([
            "success" => true,
            "response" => $projects,
        ]);
    }

    public function show($id)
    {
        $project = Project::with('technologies', 'type')->where('id', $id)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'response' => $project,
            ]);
        } else {
            //handle 404 error
            return response()->json([
                'success' => false,
                'response' => '404 - Nothing found',
            ]);
        }
    }
}
