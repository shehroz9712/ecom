<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\SliderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\SliderFilterRequest;
use App\Models\Slider;

class SliderController extends BaseController
{
    use AuthorizesRequests;

    protected $sliderRepository;

    public function __construct(SliderRepositoryInterface $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index(SliderFilterRequest $request)
    {
        $this->authorize('viewAny', Slider::class);
        $data = $this->sliderRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "Slider Active records retrieved successfully.");
    }

    public function getAll(SliderFilterRequest $request)
    {
        $data = $this->sliderRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Slider All records retrieved successfully.");
    }

    public function store(SliderRequest $request)
    {
        $this->authorize('create', Slider::class);
        $data = $this->sliderRepository->create($request->all());
        return $this->respondSuccess($data, "Slider created successfully.");
    }


    public function update(SliderRequest $request, $id)
    {
        $slider = $this->sliderRepository->findById($id);
        $this->authorize('update', $slider);
        $data = $this->sliderRepository->update($request->all(), $id);
        return $this->respondSuccess($data, "Slider updated successfully.");
    }
    public function show($id)
    {
        $slider = $this->sliderRepository->findById($id);
        $this->authorize('view', $slider);
        return $this->respondSuccess($slider, "Slider details retrieved.");
    }

    public function destroy($id)
    {
        $slider = $this->sliderRepository->findById($id);
        $this->authorize('delete', $slider);
        $this->sliderRepository->delete($id);
        return $this->respondSuccess($slider, "Slider deleted successfully.");
    }
}
