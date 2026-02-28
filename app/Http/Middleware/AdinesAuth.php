<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdinesAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $header = $request->header('Authorization');

        if (!$header || !str_starts_with($header, 'Basic ')) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401, [
                'WWW-Authenticate' => 'Basic realm="Adines API"'
            ]);
        }

        $encoded = substr($header, 6);
        $decoded = base64_decode($encoded);

        [$username, $password] = explode(':', $decoded, 2);

        // 👇 Заменить на свои значения
        $validUser = config('adines.username');
        $validPass = config('adines.password');

        if ($username !== $validUser || $password !== $validPass) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        return $next($request);
    }
}
