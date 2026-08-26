<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Turnstile implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secret = config('services.turnstile.secret');

        // If secret is not set or in testing environment / using dummy test keys, skip remote HTTP call
        if (empty($secret) || app()->environment('testing') || $secret === '1x0000000000000000000000000000000AA') {
            return;
        }

        if (empty($value)) {
            $fail('Please complete the Cloudflare security verification.');
            return;
        }

        try {
            $response = Http::asForm()->timeout(5)->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => $secret,
                'response' => $value,
                'remoteip' => request()->ip(),
            ]);

            if (!$response->successful() || !$response->json('success')) {
                $fail('Security verification failed. Please try again.');
            }
        } catch (\Throwable $e) {
            // If Cloudflare API is unreachable during testing/offline, don't hard block unless strictly needed
            if (!app()->environment('production')) {
                return;
            }
            $fail('Unable to verify security challenge at this time. Please retry.');
        }
    }
}
