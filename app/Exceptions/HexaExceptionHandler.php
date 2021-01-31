<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Hexa\Shared\Domain\{ DomainError, Utils, Exception\ExceptionsCodeMapping };

class HexaExceptionHandler extends ExceptionHandler
{
    private $exceptionHandler;

    protected $dontReport = [];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function __construct(Container $container, ExceptionsCodeMapping $exceptionHandler)
    {
        $this->exceptionHandler = $exceptionHandler;
        parent::__construct($container);
    }

    public function render($request, Throwable $exception)
    {
        $err = $exception instanceof DomainError;

        if ( $err || $exception instanceof BaseException ) {
            $statusCode = $err
                ? (int) $this->exceptionHandler->getStatusCodeFor(get_class($exception))
                : (int) $exception->statusCode();

            $res = [
                'status' => $statusCode,
                'code' => $this->exceptionCodeFor($exception),
                'message' => $exception->getMessage(),
                'detail' => '@todo',
            ];

            if (App::environment('local')) {
                $res['exception'] = (string) $exception;
                $res['line']   = $exception->getLine();
                $res['file']   = $exception->getFile();
            }

            $response['error'] = $res;

            return response()->json($response, $statusCode);
        }


        return parent::render($request, $exception);
    }

    private function exceptionCodeFor(Throwable $error)
    {
        $domainErrorClass = DomainError::class;

        return
            $error instanceof $domainErrorClass ?
                $error->errorCode() :
                Utils::toSnakeCase(class_basename($error));
    }
}
