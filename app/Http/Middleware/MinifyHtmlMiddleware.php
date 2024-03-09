<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MinifyHtmlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response->headers->get('content-type') === 'text/html') {
            $content = $this->minifyHTML($response->getContent());
            $response->setContent($content);
        }

        return $response;
    }

    public function minifyHTML($htmlString)
    {
        $replace = [
            '<!--(.*?)-->' => '', // remove comments
            "/<\?php/" => '<?php ',
            "/\n([\S])/" => '$1',
            "/\r/" => '', // remove carriage return
            "/\n/" => '', // remove new lines
            "/\t/" => '', // remove tab
            "/\s+/" => ' ', // remove spaces
        ];

        return preg_replace(array_keys($replace), array_values($replace), $htmlString);
    }

}
