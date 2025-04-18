<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\MediaRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\MediaRequest;
use App\Models\Media;

class MediaController extends BaseController
{
    use AuthorizesRequests;

    protected $mediaRepository;

    public function __construct(MediaRepositoryInterface $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Media::class);
        $data = $this->mediaRepository->getAll($request->all());
        return $this->respondSuccess($data, "Media records retrieved successfully.");
    }

    public function store(MediaRequest $request)
    {
        $this->authorize('create', Media::class);
        if ($request->hasFile('name') || $request->name !== '') {
            
            $media = $this->mediaRepository->store($request->all());
            return $this->respondSuccess($media, "Media created successfully.");
        }
        return $this->respondWithError(['error' => 'Unauthorized access.']);
    }

    public function update(MediaRequest $request, $id)
    {
        $data = $this->mediaRepository->update($id, $request->all());
        if (!$data) {
            return $this->respondWithError(['error' => 'Media not found or invalid file.']);
        }
        return $this->respondSuccess($data, "Media updated successfully.");
    }

    public function show($id)
    {
        $media = $this->mediaRepository->findById($id);
        $this->authorize('view', $media);
        return $this->respondSuccess($media, "Media details retrieved.");
    }

    public function destroy($id)
    {
        $media = $this->mediaRepository->findById($id);
        $this->authorize('delete', $media);
        $this->mediaRepository->delete($id);
        return $this->respondSuccess([], "Media deleted successfully.");
    }
}