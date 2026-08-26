<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AntiBotHoneypot
{
    /**
     * Inspect POST submissions for bot indicators (honeypot field filled or unnatural submission timing).
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('post')) {
            // Honeypot field trap: automated bots blindly fill all text inputs
            if ($request->filled('website_url_hp') || $request->filled('extra_bot_field')) {
                // Silently drop bot submissions
                return redirect()->back()->with('success', 'Thank you for your submission.');
            }

            // Timestamp check: if form is submitted in under 1 second after generation
            if ($request->has('form_load_time_hp')) {
                $loadTime = (int) $request->input('form_load_time_hp');
                $elapsed = time() - $loadTime;
                if ($elapsed < 1 && $loadTime > 0) {
                    return redirect()->back()->with('success', 'Thank you for your submission.');
                }
            }
        }

        return $next($request);
    }
}
