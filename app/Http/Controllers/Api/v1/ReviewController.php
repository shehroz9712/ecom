<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\ReviewFilterRequest;
use App\Models\Review;

class ReviewController extends BaseController
{
    use AuthorizesRequests;

    protected $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function index(ReviewFilterRequest $request)
    {
        $this->authorize('viewAny', Review::class);
        $data = $this->reviewRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "Review Active records retrieved successfully.");
    }

    public function getAll(ReviewFilterRequest $request)
    {
        $data = $this->reviewRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Review All records retrieved successfully.");
    }

    public function store(ReviewRequest $request)
    {
        $this->authorize('create', Review::class);
        $data = $this->reviewRepository->create($request->all());
        return $this->respondSuccess($data, "Review created successfully.");
    }


    public function update(ReviewRequest $request, $id)
    {
        $review = $this->reviewRepository->findById($id);
        $this->authorize('update', $review);
        $data = $this->reviewRepository->update($request->all(), $id);
        return $this->respondSuccess($data, "Review updated successfully.");
    }
    public function show($id)
    {
        $review = $this->reviewRepository->findById($id);
        $this->authorize('view', $review);
        return $this->respondSuccess($review, "Review details retrieved.");
    }

    public function destroy($id)
    {
        $review = $this->reviewRepository->findById($id);
        $this->authorize('delete', $review);
        $this->reviewRepository->delete($id);
        return $this->respondSuccess($review, "Review deleted successfully.");
    }
}
