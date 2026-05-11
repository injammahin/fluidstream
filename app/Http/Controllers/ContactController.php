<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        if ($request->filled('website')) {
            return back()->with('success', 'Thank you. Your message has been submitted successfully.');
        }

        $isTechnicalReview = $request->input('inquiry_type') === 'Technical Review Request';

        $rules = [
            'first_name' => ['required', 'string', 'max:150'],
            'last_name' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['nullable', 'string', 'max:80'],
            'company' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:150'],
            'country' => ['nullable', 'string', 'max:150'],
            'inquiry_type' => ['required', 'string', 'max:150'],
            'message' => ['nullable', 'string', 'max:10000'],
            'terms_acknowledgement' => ['accepted'],
        ];

        if ($isTechnicalReview) {
            $rules = array_merge($rules, [
                'application' => ['nullable', 'string', 'max:180'],

                'suctionPressure' => ['nullable', 'numeric'],
                'suctionPressureUnit' => ['nullable', 'string', 'max:30'],

                'dischargePressure' => ['nullable', 'numeric'],
                'dischargePressureUnit' => ['nullable', 'string', 'max:30'],

                'gasRate' => ['nullable', 'numeric'],
                'gasRateUnit' => ['nullable', 'string', 'max:30'],

                'liquidRate' => ['nullable', 'numeric'],
                'liquidRateUnit' => ['nullable', 'string', 'max:30'],

                'h2sContent' => ['nullable', 'numeric'],
                'h2sUnit' => ['nullable', 'string', 'max:30'],

                'solidsPresent' => ['nullable', 'string', 'max:20'],
                'temperature' => ['nullable', 'string', 'max:255'],
                'equipment' => ['nullable', 'string', 'max:500'],
                'notes' => ['nullable', 'string', 'max:10000'],
            ]);
        } else {
            $rules['message'] = ['required', 'string', 'max:10000'];
        }

        $request->validate($rules, [
            'first_name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'inquiry_type.required' => 'Please select an inquiry type.',
            'message.required' => 'Please enter your message.',
            'terms_acknowledgement.accepted' => 'Please acknowledge the Terms of Use, Privacy Policy, and technical disclaimer before submitting.',
        ]);

        $payload = $this->buildPayload($request, $isTechnicalReview);

        $recipientEmail = config('mail.contact_recipient') ?: env('CONTACT_FORM_RECIPIENT', config('mail.from.address'));

        try {
            Mail::send('emails.contact-submission', [
                'payload' => $payload,
            ], function ($message) use ($payload, $recipientEmail) {
                $subjectPrefix = $payload['is_technical_review']
                    ? 'Technical Review Request'
                    : 'Website Contact Inquiry';

                $subjectName = $payload['contact']['company']
                    ?: $payload['contact']['name'];

                $message->to($recipientEmail)
                    ->replyTo($payload['contact']['email'], $payload['contact']['name'])
                    ->subject($subjectPrefix . ' - ' . $subjectName);
            });

            return back()->with('success', 'Thank you. Your message has been submitted successfully.');
        } catch (\Throwable $exception) {
            Log::error('Contact form email failed', [
                'error' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Message could not be sent right now. Please check mail configuration and try again.',
                ]);
        }
    }

    private function buildPayload(Request $request, bool $isTechnicalReview): array
    {
        $fullName = trim($request->input('first_name', '') . ' ' . $request->input('last_name', ''));

        return [
            'is_technical_review' => $isTechnicalReview,
            'submitted_at' => now()->format('F d, Y h:i A'),
            'source_url' => url()->previous(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),

            'contact' => [
                'name' => $fullName,
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'company' => $request->input('company'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
            ],

            'inquiry' => [
                'type' => $request->input('inquiry_type'),
                'message' => $request->input('message'),
            ],

            'technical' => [
                'application_type' => $request->input('application'),
                'suction_pressure' => $this->withUnit(
                    $request->input('suctionPressure'),
                    $request->input('suctionPressureUnit')
                ),
                'discharge_pressure' => $this->withUnit(
                    $request->input('dischargePressure'),
                    $request->input('dischargePressureUnit')
                ),
                'gas_rate' => $this->withUnit(
                    $request->input('gasRate'),
                    $request->input('gasRateUnit')
                ),
                'liquid_rate' => $this->withUnit(
                    $request->input('liquidRate'),
                    $request->input('liquidRateUnit')
                ),
                'h2s_content' => $this->withUnit(
                    $request->input('h2sContent'),
                    $request->input('h2sUnit')
                ),
                'sand_or_solids' => $request->input('solidsPresent') === 'Yes' ? 'Yes' : 'No',
                'temperature' => $request->input('temperature'),
                'equipment' => $request->input('equipment'),
                'notes' => $request->input('notes'),
            ],

            'acknowledgement' => [
                'accepted' => $request->boolean('terms_acknowledgement') ? 'Accepted' : 'Not Accepted',
                'statement' => 'User acknowledged Fluidstream Terms of Use, Privacy Policy, and technical disclaimer.',
            ],
        ];
    }

    private function withUnit($value, $unit): string
    {
        if ($value === null || $value === '') {
            return 'Not provided';
        }

        return trim($value . ' ' . ($unit ?: ''));
    }
}