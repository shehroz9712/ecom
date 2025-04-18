<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Api\v1\BaseController;
use App\Http\Requests\BlogFilterRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends BaseController
{
    use AuthorizesRequests;

    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index(BlogFilterRequest $request)
    {
        $this->authorize('viewAny', Blog::class);
       
        $data = $this->blogRepository->getAll($request->all());
        return $this->respondSuccess($data, "Blog records retrieved successfully.");
    }

    public function store(BlogRequest $request)
    {
        $this->authorize('create', Blog::class);
        $data = $this->blogRepository->create($request->all());
        return $this->respondSuccess($data, "Blog created successfully.");
    }

    public function show($id)
    {
        $blog = $this->blogRepository->findById($id);
        if (!$blog) {
            return $this->respondNotFound([], false, "Blog record not found.");
        }
        $this->authorize('view', $blog);

        return $this->respondSuccess($blog, "Blog details retrieved.");
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = $this->blogRepository->findById($id);
        if (!$blog) {
            return $this->respondNotFound([], false, "Blog record not found.");
        }
        $this->authorize('update', $blog); // Policy Check
        $blog = $this->blogRepository->update($id, $request->all());
        return $this->respondSuccess($blog, "Certification updated successfully.");
    }

    public function destroy($id)
    {
        $blog = $this->blogRepository->findById($id);
        if(!$blog){
            return $this->respondNotFound([], false, "Blog record not found.");
        }
        $this->authorize('delete', $blog);
        $this->blogRepository->delete($id);
        return $this->respondSuccess([], "Blog deleted successfully.");
    }
}
