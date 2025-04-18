<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequest;
use App\Http\Requests\TestimonialsFilterRequest;
use App\Models\Testimonial;

class TestimonialController extends BaseController
{
    use AuthorizesRequests;

    protected $testimonialRepository;

    public function __construct(TestimonialRepositoryInterface $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    public function index(TestimonialsFilterRequest $request)
    {
        $this->authorize('viewAny', Testimonial::class);
        $data = $this->testimonialRepository->getAll(
            $request->page,
            $request->limit,
            $request->search ?? [],
            $request->where ?? [],
            $request->order ?? 'created_at',
            $request->direction ?? 'DESC'
        );
        return $this->respondSuccess($data, "Testimonial records retrieved successfully.");
    }

    public function store(TestimonialRequest $request)
    {
        $this->authorize('create', Testimonial::class);
        $data = $this->testimonialRepository->create($request->all());
        return $this->respondSuccess($data, "Testimonial created successfully.");
    }

    public function show($id)
    {
        $testimonial = $this->testimonialRepository->findById($id);
        if (!$testimonial) {
            return $this->respondNotFound([], false, "Testimonial record not found.");
        }
        $this->authorize('view', $testimonial);
        return $this->respondSuccess($testimonial, "Testimonial details retrieved.");
    }

    public function update(TestimonialRequest $request, $id)
    {
        $testimonial = $this->testimonialRepository->findById($id);
        if (!$testimonial) {
            return $this->respondNotFound([], false, "Testimonial record not found.");
        }
        $this->authorize('update', $testimonial); // Policy Check
        $testimonial = $this->testimonialRepository->update($id, $request->all());
        return $this->respondSuccess($testimonial, "Testimonial updated successfully.");
    }

    public function destroy($id)
    {
        $testimonial = $this->testimonialRepository->findById($id);
        if (!$testimonial) {
            return $this->respondNotFound([], false, "Testimonial record not found.");
        }
        $this->authorize('delete', $testimonial);
        $this->testimonialRepository->delete($id);
        return $this->respondSuccess([], "Testimonial deleted successfully.");
    }
}
