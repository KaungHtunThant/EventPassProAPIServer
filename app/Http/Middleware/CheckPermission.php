<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = Auth::user();

        if(!$user->can($permission)){
            $user->Logs()->createMany($items = [
                [
                    'user_id' => $user->id,
                    'descriptions' => $permission,
                    'http_code' => '403',
                    'action_status' => 'Fail',
                    'bookmark' => 0,
                    'remark' => '',
                ]
            ]);

            return response('Unauthorized action.', 403);
        }

        return $next($request);
    }
}
