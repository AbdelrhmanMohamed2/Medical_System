<?php

namespace App\Exceptions;

use Throwable;
use App\Traits\ApiTrait;
use Carbon\Exceptions\Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    use ApiTrait;
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof ModelNotFoundException) {
                return $this->apiResponse(message: 'Model Not Found', code: 404);
            } elseif ($exception instanceof MethodNotAllowedHttpException) {
                return $this->apiResponse(message: 'Method Not supported', code: 405);
            } elseif ($exception instanceof NotFoundHttpException) {
                return $this->apiResponse(message: 'Page Not found', code: 405);
            } elseif ($exception instanceof ValidationException) {
                return $this->apiResponse(message: 'The given data was invalid.', code: 422, errors: $exception->errors());
            } elseif ($exception instanceof AuthenticationException) {
                return $this->apiResponse(message: 'Unauthenticated.', code: 401);
            } elseif ($exception instanceof AuthorizationException) {
                return $this->apiResponse(message: 'You are not authorized to perform this action.', code: 403);
            }
        }

        return parent::render($request, $exception);
    }
}
