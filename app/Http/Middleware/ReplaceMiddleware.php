<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplaceMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        print($request);
        $response= $next($request);

        $content= $response->getContent();
        $content=str_replace('Gediminas', 'G*****', $content);
        $response->setContent($content);

        return $response;
    }
}
