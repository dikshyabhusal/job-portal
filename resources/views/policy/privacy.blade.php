@extends('layout.app')

@section('title', 'Privacy Policy')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 mt-10 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Privacy Policy</h1>

    <p class="text-gray-700 mb-4">
        At OurPlatform, we are committed to protecting your personal information and your right to privacy. This Privacy Policy outlines how we collect, use, disclose, and safeguard your information when you visit our platform and use our services.
    </p>

    <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">1. Information We Collect</h2>
    <ul class="list-disc ml-6 text-gray-700 mb-4">
        <li><strong>Personal Data:</strong> Name, email address, gender, skills, company information, and any information you provide during registration.</li>
        <li><strong>Usage Data:</strong> Pages visited, actions taken, device and browser information.</li>
        <li><strong>Files:</strong> Resume uploads, profile photos, or other documents shared through your profile.</li>
    </ul>

    <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">2. How We Use Your Information</h2>
    <ul class="list-disc ml-6 text-gray-700 mb-4">
        <li>To personalize your experience and deliver relevant content.</li>
        <li>To improve our platform and services based on user feedback.</li>
        <li>To communicate with you via email regarding updates or support.</li>
        <li>To protect, investigate, and deter unauthorized or illegal activity.</li>
    </ul>

    <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">3. Sharing of Information</h2>
    <p class="text-gray-700 mb-4">
        We do not sell or trade your personal data to third parties. We may share limited data with trusted partners who assist in operating our platform or serving our users, under confidentiality agreements.
    </p>

    <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">4. Data Retention</h2>
    <p class="text-gray-700 mb-4">
        We retain your personal data only as long as your account remains active or as needed to fulfill the purposes outlined in this policy. You may request deletion at any time.
    </p>

    <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">5. Your Rights</h2>
    <ul class="list-disc ml-6 text-gray-700 mb-4">
        <li>Access or update your personal data via your profile settings.</li>
        <li>Request deletion of your data from our servers.</li>
        <li>Withdraw consent for data processing where applicable.</li>
    </ul>

    <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">6. Security Measures</h2>
    <p class="text-gray-700 mb-4">
        We implement industry-standard encryption and access controls to safeguard your personal information. However, no system is 100% secure, and we encourage you to take care with sensitive data.
    </p>

    <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">7. Changes to This Policy</h2>
    <p class="text-gray-700 mb-4">
        We may update this Privacy Policy periodically. If significant changes are made, we will notify you through the platform or via email.
    </p>

    <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-2">8. Contact Us</h2>
    <p class="text-gray-700 mb-4">
        If you have questions or concerns regarding this Privacy Policy, feel free to contact us at <a href="mailto:support@example.com" class="text-blue-600 underline">support@example.com</a>.
    </p>

    <div class="text-center mt-8">
        <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold">
            Back to Dashboard
        </a>
    </div>
</div>
@endsection
