<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Object_;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */
    public function index(Request $request)
    {
        $sort = $request->get("sortBy");
        $order = $request->get("order");
        $page = $request->get("pageNumber");
        $pageSize = $request->get("pageSize");

        $columns = Schema::getColumnListing('projects'); // users table


        if ($sort=== NULL or !in_array($sort,$columns)){
            $sort = "title";
        }

        if ($order === NULL){
            $order = 'asc';
        }

        if ($page === NULL){
            $page = 1;
        }

        if ($pageSize === NULL){
            $pageSize = 10;
        }

        $count = Project::count();

        $projects = DB::table('projects')
            ->orderBy( $sort, $order)
            ->limit($pageSize)
            ->offset($pageSize * ($page - 1))
            ->get();

        $response = [
            "pageNumber" => $page,
            "pageSize" => $pageSize,
            "order" => $order,
            "sortBy" => $sort,
            "totalRows" => $count,
            "projects" => $projects
        ];

        return($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']

        ]);

        Project::create(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     *
     * @OA\SecurityScheme(
     *    securityScheme="bearerAuth",
     *   type="http",
     *       scheme="bearer",
     *       bearerFormat="JWT",
     *   )
     *
     * @OA\Get(
     *      path="/api/projects/{id}",
     *      operationId="getProjectById",
     *      tags={"Projects"},
     *      summary="Get project information",
     *      description="Returns project data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Project id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     *      security={{"bearerAuth": {}}},
     * )
     */

    public function show(Project $project)
    {
        return($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update(request()->all());
        redirect('\projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
    }
}
