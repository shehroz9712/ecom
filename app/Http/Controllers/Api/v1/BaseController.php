<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    protected int $statusCode = 200;

    public function __construct() {}

    public function respond($data = [], array $errors = [], bool $status, string $message, array $headers = []): JsonResponse
    {
        if (!$this->getStatusCode()) {
            $this->setStatusCode(500);
        }


        $responseArray = [
            'statusCode' => $this->getStatusCode(),
            'response' => [
                'data' => $data
            ],
            'message' => $message,
            'status' => $status,
            'errors' => $errors
        ];

        if (empty($data)) {
            unset($responseArray['response']);
        }
        if (empty($errors)) {
            unset($responseArray['errors']);
        }

        return response()->json(
            $responseArray,
            $this->getStatusCode(),
            $headers
        );
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): self
    {
        if ($statusCode < 100 || $statusCode > 599) {
            throw new \InvalidArgumentException("Invalid HTTP status code: $statusCode");
        }
        $this->statusCode = $statusCode;
        return $this;
    }
    public function respondSuccess($data = [], string $message = 'Success!'): JsonResponse
    {
        return $this->setStatusCode(200)->respond($data, [], true, $message);
    }

    public function respondWithError(array $errors = [], bool $status = false, string $message = ''): JsonResponse
    {
        return $this->respond([], $errors, $status, $message);
    }
    public function respondObjectCreated(array $errors = [], bool $status = false, string $message = 'Object Created!'): JsonResponse
    {
        return $this->setStatusCode(201)->respondWithError($errors, $status, $message);
    }

    public function respondNoContent(array $errors = [], bool $status = false, string $message = 'No Content!'): JsonResponse
    {
        return $this->setStatusCode(204)->respondWithError($errors, $status, $message);
    }

    public function respondPartialContent(array $errors = [], bool $status = false, string $message = 'Partial Content!'): JsonResponse
    {
        return $this->setStatusCode(206)->respondWithError($errors, $status, $message);
    }

    public function respondBadRequest(array $errors = [], bool $status = false, string $message = 'Bad Request!'): JsonResponse
    {
        return $this->setStatusCode(400)->respondWithError($errors, $status, $message);
    }

    public function respondUnauthorized(array $errors = [], bool $status = false, string $message = 'Unauthorized!'): JsonResponse
    {
        return $this->setStatusCode(401)->respondWithError($errors, $status, $message);
    }

    public function respondForbidden(array $errors = [], bool $status = false, string $message = 'Forbidden!'): JsonResponse
    {
        return $this->setStatusCode(403)->respondWithError($errors, $status, $message);
    }

    public function respondNotFound(array $errors = [], bool $status = false, string $message = 'Records Not Found!'): JsonResponse
    {
        return $this->setStatusCode(404)->respondWithError($errors, $status, $message);
    }

    public function respondMethodNotAllowed(array $errors = [], bool $status = false, string $message = 'Method Not Allowed!'): JsonResponse
    {
        return $this->setStatusCode(405)->respondWithError($errors, $status, $message);
    }

    public function respondMethodAlreadyExists(array $errors = [], bool $status = false, string $message = 'Method Already Exists!'): JsonResponse
    {
        return $this->setStatusCode(409)->respondWithError($errors, $status, $message);
    }

    public function respondUnprocessableEntity(array $errors = [], bool $status = false, string $message = 'Unprocessable Entity!'): JsonResponse
    {
        return $this->setStatusCode(422)->respondWithError($errors, $status, $message);
    }

    public function respondTooManyAttempts(array $errors = [], bool $status = false, string $message = 'Too many requests, please slow down!'): JsonResponse
    {
        return $this->setStatusCode(429)->respondWithError($errors, $status, $message);
    }

    public function respondInternalError(array $errors = [], bool $status = false, string $message = 'Internal Error!'): JsonResponse
    {
        return $this->setStatusCode(500)->respondWithError($errors, $status, $message);
    }

    public function respondServiceUnavailable(string $message = 'Service Unavailable!'): JsonResponse
    {
        return $this->setStatusCode(503)->respondWithError([], false, $message);
    }

    public function respondToManyAttempt(array $errors = [], bool $status = false, string $message = 'Too Many Requests!'): JsonResponse
    {
        return $this->setStatusCode(429)->respondWithError($errors, $status, $message);
    }

    protected function responseValidation(array $request, array $validationRules): \Illuminate\Validation\Validator
    {
        return Validator::make($request, $validationRules);
    }

    /**
     * Generate user API token
     *
     * @param User $user
     * @param string $methodNameCreatedFor
     * @return string
     */
    protected function createUserToken(User $user, string $methodNameCreatedFor): string
    {
        return $user->createToken($methodNameCreatedFor)->accessToken;
    }
}
