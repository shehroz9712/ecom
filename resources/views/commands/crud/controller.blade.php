<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\{{name}}RepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\{{name}}Request;
use App\Http\Requests\{{name}}FilterRequest;
use App\Models\{{name}};

class {{name}}Controller extends BaseController
{
    use AuthorizesRequests;

    protected ${{varName}}Repository;

    public function __construct({{name}}RepositoryInterface ${{varName}}Repository)
    {
        $this->{{varName}}Repository = ${{varName}}Repository;
    }

    public function index({{name}}FilterRequest $request)
    {
        $this->authorize('viewAny', {{name}}::class);
        $data = $this->{{varName}}Repository->getActiveAll($request->page);
        return $this->respondSuccess($data, "{{name}} Active records retrieved successfully.");
    }

    public function getAll({{name}}FilterRequest $request)
    {
        $data = $this->{{varName}}Repository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "{{name}} All records retrieved successfully.");
    }

    public function store({{name}}Request $request)
    {
        $this->authorize('create', {{name}}::class);
        $data = $this->{{varName}}Repository->create($request->all());
        return $this->respondSuccess($data, "{{name}} created successfully.");
    }


    public function update({{name}}Request $request, $id)
    {
        ${{varName}} = $this->{{varName}}Repository->findById($id);
        $this->authorize('update', ${{varName}});
        $data = $this->{{varName}}Repository->update($request->all(), $id);
        return $this->respondSuccess($data, "{{name}} updated successfully.");
    }
    public function show($id)
    {
        ${{varName}} = $this->{{varName}}Repository->findById($id);
        $this->authorize('view', ${{varName}});
        return $this->respondSuccess(${{varName}}, "{{name}} details retrieved.");
    }

    public function destroy($id)
    {
        ${{varName}} = $this->{{varName}}Repository->findById($id);
        $this->authorize('delete', ${{varName}});
        $this->{{varName}}Repository->delete($id);
        return $this->respondSuccess(${{varName}}, "{{name}} deleted successfully.");
    }
}
