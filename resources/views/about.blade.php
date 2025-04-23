@extends('layout.app')

@section('content')
<div class="bg-gray-50 text-gray-800 py-16">

    <div class="max-w-6xl mx-auto px-6">
        <h1 class="text-5xl font-bold text-center text-blue-600 mb-12">About Us</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div>
                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d" alt="Teamwork" class="rounded-2xl shadow-lg">
            </div>
            <div class="space-y-6 text-lg leading-relaxed">
                <p>
                    Welcome to <span class="font-semibold text-blue-500">Job Portal</span>, your one-stop destination for discovering exciting career opportunities. 
                    We aim to bridge the gap between talented job seekers and dynamic companies looking for skilled professionals.
                </p>

                <p>
                    We believe every individual deserves a career they’re passionate about. Whether you're a fresh graduate or an experienced professional, we’re here to support your journey.
                </p>

                <p>
                    Our platform is designed to be simple, fast, and user-friendly — making it easy for job seekers to apply, and employers to connect with the best talent.
                </p>
            </div>
        </div>

        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                <img src="https://img.icons8.com/ios-filled/100/4f46e5/goal.png" class="w-16 mx-auto mb-4" alt="Mission Icon">
                <h3 class="text-2xl font-semibold mb-2">Our Mission</h3>
                <p>Empowering job seekers by connecting them to the right opportunities with ease and transparency.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                <img src="https://img.icons8.com/ios-filled/100/4f46e5/teamwork.png" class="w-16 mx-auto mb-4" alt="Vision Icon">
                <h3 class="text-2xl font-semibold mb-2">Our Vision</h3>
                <p>To be Nepal’s leading career platform where dreams meet opportunities.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                <img src="https://img.icons8.com/ios-filled/100/4f46e5/handshake.png" class="w-16 mx-auto mb-4" alt="Value Icon">
                <h3 class="text-2xl font-semibold mb-2">Our Values</h3>
                <p>We value integrity, innovation, and inclusivity in everything we do.</p>
            </div>
        </div>
    </div>

</div>
@endsection
