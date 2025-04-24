@extends('layout.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 p-6">

    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row w-full max-w-5xl">

        <!-- Image side -->
        <div class="hidden md:block md:w-1/2 bg-cover bg-center"
             style="background-image: url('https://images.unsplash.com/photo-1603791440384-56cd371ee9a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
        </div>

        <!-- Help Section -->
        <div class="w-full md:w-1/2 p-8">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Help - Frequently Asked Questions</h2>

            <div class="space-y-4">

                <!-- FAQ Item -->
                <div class="bg-gray-50 p-4 rounded-lg shadow hover:shadow-md transition">
                    <button onclick="toggleFAQ('faq1')" 
                            class="w-full text-left text-blue-600 text-lg font-medium hover:text-blue-800 flex items-center justify-between focus:outline-none">
                        What is the purpose of this platform?
                        <span id="icon-faq1" class="transition transform">+</span>
                    </button>
                    <div id="faq1" class="hidden mt-2 text-gray-600 text-sm leading-relaxed">
                        This platform connects job seekers with employers for a variety of job roles across different industries.
                    </div>
                </div>

                <!-- FAQ Item -->
                <div class="bg-gray-50 p-4 rounded-lg shadow hover:shadow-md transition">
                    <button onclick="toggleFAQ('faq2')" 
                            class="w-full text-left text-blue-600 text-lg font-medium hover:text-blue-800 flex items-center justify-between focus:outline-none">
                        How do I reset my password?
                        <span id="icon-faq2" class="transition transform">+</span>
                    </button>
                    <div id="faq2" class="hidden mt-2 text-gray-600 text-sm leading-relaxed">
                        If you forget your password, click the 'Forgot Password?' link on the login page, and you'll receive an email to reset your password.
                    </div>
                </div>
                <!-- FAQ Item -->
                <div class="bg-gray-50 p-4 rounded-lg shadow hover:shadow-md transition">
                    <button onclick="toggleFAQ('faq3')" 
                            class="w-full text-left text-blue-600 text-lg font-medium hover:text-blue-800 flex items-center justify-between focus:outline-none">
                        Can I update my profile after registration?
                        <span id="icon-faq3" class="transition transform">+</span>
                    </button>
                    <div id="faq3" class="hidden mt-2 text-gray-600 text-sm leading-relaxed">
                        Yes, you can update your profile at any time after logging in by visiting the "Profile" section in your dashboard.
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function toggleFAQ(id) {
        const faqContent = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);

        faqContent.classList.toggle('hidden');

        // Rotate plus to minus
        if (!faqContent.classList.contains('hidden')) {
            icon.textContent = '−';
        } else {
            icon.textContent = '+';
        }
    }
</script>
@endsection
