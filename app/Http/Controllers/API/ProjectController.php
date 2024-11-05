<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(5);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Funziona',
            'data' => [
                'projects' => $projects
            ],
        ]);
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        if ($project) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Funziona',
                'data' => [
                    'project' => $project
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Progetto non Trovato!'
            ]);
        }
    }
}