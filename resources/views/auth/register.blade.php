<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex w-full max-w-4xl">
        <!-- Image side -->
        <div class="hidden md:block w-1/2 bg-cover bg-center"
             style="background-image: url('https://images.unsplash.com/photo-1603791440384-56cd371ee9a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
        </div>

        <!-- Form side -->
        <div class="w-full md:w-1/2 p-8">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Create an Account</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                    <ul class="text-sm list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('custom.register') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Name</label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" name="email" required
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-gray-700 font-semibold">Select Role</label>
                    <select name="role" id="role" class="w-full px-4 py-2 mt-2 border rounded-md">
                        <option value="job_seeker">Job Seeker</option>
                        <option value="employer">Employer</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Gender</label>
                    <select name="gender" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Job Seeker Fields -->
                <div id="jobSeekerFields">
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1">Skills (Optional)</label>
                        <input type="text" name="skills" placeholder="E.g. Laravel, React, Python"
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold mb-1">Desired Industry (Optional)</label>
                        <select name="desired_industry" id="desired_industry"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Select Industry</option>
                        </select>
                    </div>
                </div>

                <!-- Employer Fields -->
                <div id="employerFields" class="hidden">
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1">Company Name</label>
                        <input type="text" name="company_name"
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1">Company Industry Type</label>
                        <select name="company_industry" id="company_industry"
                                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Select Industry</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold mb-1">Company Contact Number</label>
                        <input type="text" name="company_contact"
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-green-600 transition duration-300 font-semibold">
                    Register
                </button>

                <p class="mt-4 text-sm text-center text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        const industries = [
            "Account / Finance", "Advertising Agency", "Agriculture/Dairy/Poultry", "Airlines", "Architecture/Interior Designing",
            "Auto/Auto Ancillary", "Automobile", "Aviation/Aerospace", "Banking", "BPO/ITES", "Brewery/Distillery", "Broadcasting",
            "Broking/Financial service", "Chemicals/Petro Chemicals/Plastic/Rubbers", "Cleaning/Facility Management",
            "Construction Ancillary", "Construction Equipment", "Construction/Engineering",
            "Consulting Firms- Strategy/Management/Legal/Audit", "Consumers Durable", "Cooperatives/Finance Companies",
            "Courier/Transportation/Freight", "Distrubution-Retail/Wholesale", "Education Consultancy/Immigration",
            "Education/Teaching/Training", "Electricals/Switchgears", "Embassy/Foreign Consulate/Diplomatic Mission",
            "Event Management", "Fertilizers/Pesticides", "FMCG/Consumer Goods", "Food Processing", "Food/Beverage",
            "Gems & Jewellery", "Goverment", "Handicraft", "Heat Ventilation Air Conditioning", "Holding Company / Parent Company",
            "Hotels/Resorts/Restaurants", "Housing/Apartments", "Hydropower/Renewable Energy",
            "Industrial Products/Heavy Machinery", "Insurance", "Internet/Ecommerce", "Investment", "ISP",
            "IT-Hardware & Networking", "IT-Software/Software Services", "KPO / Research /Analytics", "Leather", "Legal",
            "Manpower/Overseas/Foreign Employment", "Media/Dotcom/Entertainment", "Medical Devices / Equipments",
            "Medical/Healthcare/Hospital", "Mining", "Network", "NGO/INGO/Social Services", "Office Equipment/Automation",
            "Oil and Gas/Power/Infrastructure/Energy", "Other", "Paper", "Pharmaceutical", "Production/Manufacturing",
            "Publication", "Publishing/Press/Designing/Printing", "Real Estate/Property", "Recruitment/Staffing",
            "Remittance/Money Transfer", "Research Center", "Security Services", "Security/Law Enforcement",
            "Semiconductors/Electronics", "Services", "Shipping/Marine", "Software Service", "Telecommunication",
            "Textiles/Garments/Accessories", "Trading/Export/Import", "Travel/Tourism", "Tyres",
            "Water Treatment / Waste Management", "Wellness / Fitness / Sports / Beauty"
        ];

        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            const employerFields = document.getElementById('employerFields');
            const jobSeekerFields = document.getElementById('jobSeekerFields');
            const desiredIndustry = document.getElementById('desired_industry');
            const companyIndustry = document.getElementById('company_industry');

            function populateIndustryOptions(selectElement) {
                selectElement.innerHTML = '<option value="">Select Industry</option>';
                industries.forEach(ind => {
                    const option = document.createElement('option');
                    option.value = ind;
                    option.textContent = ind;
                    selectElement.appendChild(option);
                });
            }

            function toggleFields() {
                if (roleSelect.value === 'employer') {
                    employerFields.classList.remove('hidden');
                    jobSeekerFields.classList.add('hidden');
                } else {
                    employerFields.classList.add('hidden');
                    jobSeekerFields.classList.remove('hidden');
                }
            }

            populateIndustryOptions(desiredIndustry);
            populateIndustryOptions(companyIndustry);
            toggleFields();

            roleSelect.addEventListener('change', toggleFields);
        });
    </script>

</body>
</html>
