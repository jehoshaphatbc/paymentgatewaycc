<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NameAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authorizationHeader = $request->header('Authorization');

        $expectedToken = base64_encode('Yehosafat Bezaleel C');

        if ($authorizationHeader !== "Bearer {$expectedToken}") {
            return response()->json([
                'status' => 401,
                'error' => 'Unauthorized',
                'message' => 'Access denied. Invalid or missing authorization token.',
                'hint' => 'Ensure you include a valid Authorization header with a Bearer token encoded in Base64.',
                'timestamp' => now()->toDateTimeString(),
            ], 401);
        }

        return $next($request);
    }
}
