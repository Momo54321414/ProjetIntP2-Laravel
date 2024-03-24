<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HandleRequestResponses
{
    use HttpResponses;

    protected function handleErrorResponseRedirectWEB_API($message, $statusCode, $redirectRoute = null)
    {
        if (request()->is('api/*')) {
            return $this->errorResponse($message, $statusCode);
        } else {
            if ($redirectRoute) {
                return redirect()->route($redirectRoute)->with('errors', $message);
            } else {
                return redirect()->back()->with('errors', $message);
            }
        }
    }

    protected function handleSuccessResponseRedirectWEB_API($data, $message, $statusCode, $statusType, $redirectRoute = null)
    {
        if (request()->is('api/*')) {
            return $this->successResponse($data, $message, $statusCode);
        } else {
            if ($redirectRoute) {
                return redirect()->route($redirectRoute)->with($statusType, $message);
            } else {
                return redirect()->back()->with($statusType, $message);
            }
        }
    }
    protected function handleErrorResponseRedirectWEB($message, $redirectRoute = null)
    {
        if ($redirectRoute) {
            return redirect()->route($redirectRoute)->with('errors', $message);
        } else {
            return redirect()->back()->with('errors', $message);
        }
    }

    protected function handleSuccessRedirectResponseWEB($statusType, $message, $redirectRoute = null)
    {
        if ($redirectRoute) {
            return redirect()->route($redirectRoute)->with($statusType, $message);
        } else {
            return redirect()->back()->with('success', $message);
        }
    }

    protected function handleErrorResponseAPI($message, $statusCode)
    {
        return $this->errorResponse($message, $statusCode);
    }

    protected function handleSuccessResponseAPI($data, $message, $statusCode)
    {
        return $this->successResponse($data, $message, $statusCode);
    }

    protected function handleSuccessResponseViewWEB_API($view, $data = [],$showStatus = false, $message = null, $statusCode = 200)
    {
        if (request()->is('api/*')) {
            return $this->successResponse($data, $message, $statusCode);
        } else {
            return $this->webViewResponse($view, $data, $showStatus, $message);
        }
    }

    protected function webViewResponse($view, $data = [], $showStatus = false, $message = null)
    {
        if ($showStatus) {
            return view($view, $data)->with('status', $message);
        }
        return view($view, $data);
    }
}
