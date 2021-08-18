<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCourse;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Exceptions\RepositoryException;
use Illuminate\Container\Container as App;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class ApiResourceController extends Controller
{
    /**
     * @var App
     */
    protected $app;
    /**
     * @var Repository
     */
    protected $repository;
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var User
     */
    protected $user;
    /**
     * @var string
     */
    protected $permissionKey;

    /**
     * @param App $app
     * @throws BindingResolutionException
     * @throws RepositoryException
     */
    public function __construct(App $app, Request $request)
    {
        $this->app = $app;
        $this->request = $request;
        $this->user = $request->user();
        $this->makeRepository();
        $this->permissionKey = \Str::lower(class_basename($this->repository->model()));
    }

    /**
     * @return string
     */
    public abstract function repository(): string;

    /**
     * @throws RepositoryException
     * @throws BindingResolutionException
     */
    protected function makeRepository()
    {
        $repository = $this->app->make($this->repository());

        if (!$repository instanceof Repository)
            throw new RepositoryException("Class {$this->repository()} must be an instance of " . Repository::class);

        return $this->repository = $repository;
    }

    /**
     * @param $action
     * @return bool
     */
    protected function can($action): bool
    {
        return $this->user->can($this->permissionKey . '.' . $action);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->repository->filter($request->all())->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $res = $this->repository->create($request->all());

        return response()->json($res, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $result = $this->repository->find($id);
        return $result ? response()->json($result) : response()->json(['error' => 'Not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        return $this->repository->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return response()->json(null, 204);
    }


}
