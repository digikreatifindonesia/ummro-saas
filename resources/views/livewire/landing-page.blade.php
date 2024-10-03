<div>
    <!-- Header -->
    <header class="flex justify-between items-center p-6 bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div class="text-2xl font-bold text-teal-500">{{ $website_title ?? "Title" }}</div>

            <nav class="hidden md:flex space-x-6 justify-center flex-1">
                <a href="#home" class="text-gray-600 hover:text-green-600">Home</a>
                <a href="#about-us" class="text-gray-600 hover:text-green-600">About Us</a>
                <a href="#why-us" class="text-gray-600 hover:text-green-600">Why Us</a>
                <a href="#packages" class="text-gray-600 hover:text-green-600">Packages</a>
                <a href="#contact" class="text-gray-600 hover:text-green-600">Contact</a>
            </nav>

            <div class="flex items-center space-x-6">
                <!-- Dropdown untuk negara -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="text-gray-600 bg-white hover:bg-gray-100 px-3 py-2 rounded-md focus:outline-none">
                        Country
                    </button>
                    <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border">
                        @foreach(App\Models\Country::all() as $country)
                            <a href="{{ url('/'.$country->country_code.'/'.$language_code) }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">
                                {{ $country->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Dropdown untuk bahasa -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="text-gray-600 bg-white hover:bg-gray-100 px-3 py-2 rounded-md focus:outline-none">
                        Language
                    </button>
                    <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border">
                        <a href="{{ url('/'.$country_code.'/en') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">English</a>
                        <a href="{{ url('/'.$country_code.'/id') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Bahasa Indonesia</a>
                        <a href="{{ url('/'.$country_code.'/ar') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Arabic</a>
                    </div>
                </div>

                <a href="#" class="border border-teal-500 text-teal-500 px-4 py-2 rounded-lg hover:bg-teal-500 hover:text-white transition">Sign In</a>
            </div>
        </div>
    </header>




    <!-- Jumbotron -->
    <section class="bg-white py-20 min-h-screen">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <!-- Text Section -->
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-5xl font-bold leading-tight">
                    <span class="text-teal-500">Platform</span> Layanan<br>Travel Umroh<br>
                    <span class="text-yellow-500">No. 1</span> di {{ $countries->name ?? "" }}
                </h1>
                <p class="text-gray-700 my-6">{{ $description ?? "" }}</p>
                <a href="#" class="bg-teal-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-teal-600 transition">
                    Daftar Sekarang
                </a>
            </div>

            <!-- Image Section -->
            <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                <img src="{{ asset('storage/assset/orang.png') }}" alt="Umrah Travel" class="w-80">
            </div>
        </div>
    </section>



    <!-- About -->
    <section id="about-us" class="py-20 bg-white min-h-screen">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">About Us</h2>
            <p class="text-lg text-gray-700">We are a travel agency specializing in Umrah services, offering the best packages for a memorable journey.</p>
        </div>
    </section>


    <!-- resources/views/livewire/why-us-section.blade.php -->
    <section id="why-us" class="bg-gray-100 min-h-screen py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6 text-teal-500">Why Choose Us</h2>
            <p class="text-gray-600 mb-8">Here are some reasons why our Umrah services stand out from the rest.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- First Feature -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <img src="{{ asset('images/trust.png') }}" alt="Trust" class="w-16 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Trusted Service</h3>
                    <p class="text-gray-600">We are a trusted Umrah service provider with years of experience.</p>
                </div>

                <!-- Second Feature -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <img src="{{ asset('images/affordable.png') }}" alt="Affordable" class="w-16 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Affordable Packages</h3>
                    <p class="text-gray-600">Our Umrah packages are tailored to be affordable and offer great value.</p>
                </div>

                <!-- Third Feature -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <img src="{{ asset('images/support.png') }}" alt="Support" class="w-16 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                    <p class="text-gray-600">We offer 24/7 customer support to assist you at every step of your journey.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="packages" class="py-12 bg-gray-100 min-h-screen">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Our Subscription Packages</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($subscriptionPackages as $package)
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="text-center mb-4">
                            <h5 class="text-xl font-semibold">{{ $package->name }}</h5>
                        </div>
                        <div class="mb-6">
                            <p class="text-gray-600 mb-4">{{ $package->description }}</p>
                            <p class="text-gray-800"><strong>Durasi:</strong> {{ $package->duration }} hari</p>
                            <p class="text-gray-800"><strong>Harga:</strong>
                                @foreach ($package->prices as $price)
                                    <span class="text-teal-500 font-semibold">{{ $countries->currency_code}} {{ $price->price }}</span>
                                @endforeach

                            </p>
                        </div>
                        <div class="mb-6">
                            <p class="text-gray-800 font-bold text-center">Fitur-fitur:</p>
                            <div class="text-center">
                                @foreach($package->features as $feature)
                                    <div class="text-gray-600 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-teal-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ $feature->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="text-center">
                            <a href="#" class="px-4 py-2 bg-teal-500 text-white font-bold rounded-lg hover:bg-teal-600 transition duration-300">Berlangganan Sekarang</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>





    <!-- Contact Us -->
    <section id="contact" class="py-20 bg-gradient-to-r from-teal-50 via-white to-teal-50 min-h-screen flex items-center">
        <div class="container mx-auto flex flex-wrap items-center">
            <!-- Left Side: Image -->
{{--            <div class="w-full md:w-1/2 mb-10 md:mb-0">--}}
{{--                <img src="https://via.placeholder.com/600x400" alt="Contact Us Image" class="rounded-lg shadow-lg w-full">--}}
{{--            </div>--}}
            <!-- Right Side: Contact Form -->
            <div class="w-full md:w-1/2">
                <h2 class="text-4xl font-extrabold mb-8 text-gray-800">Get in Touch</h2>
                <p class="text-gray-600 mb-8">
                    We would love to hear from you! Please fill out the form and we’ll get back to you as soon as possible.
                </p>
                <form class="bg-white p-8 rounded-lg shadow-lg max-w-md ml-auto">
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-teal-500"></i> Name
                        </label>
                        <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-400 focus:outline-none" placeholder="Your Name">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-envelope mr-2 text-teal-500"></i> Email
                        </label>
                        <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-400 focus:outline-none" placeholder="Your Email">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-comment-dots mr-2 text-teal-500"></i> Message
                        </label>
                        <textarea id="message" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-400 focus:outline-none" rows="4" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-teal-500 text-white py-3 rounded-lg shadow-md hover:bg-teal-600 transition-transform transform hover:scale-105">
                        <i class="fas fa-paper-plane mr-2"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-teal-500 text-white p-8">
        <div class="container mx-auto flex justify-between items-start">
            <!-- About Section -->
            <div class="w-1/3">
                <h3 class="text-lg font-semibold mb-4">About Us</h3>
                <p>Ummro adalah platform SaaS yang memudahkan pengelolaan travel umroh dan haji dengan fitur lengkap dan keamanan terbaik.</p>
            </div>

            <!-- Menu Section -->
            <div class="w-1/3 text-center">
                <h3 class="text-lg font-semibold mb-4">Menu</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">Services</a></li>
                    <li><a href="#" class="hover:underline">Pricing</a></li>
                    <li><a href="#" class="hover:underline">Contact</a></li>
                </ul>
            </div>

            <!-- Download Section -->
            <div class="w-1/3 text-right">
                <h3 class="text-lg font-semibold mb-4">Download App</h3>
                <div class="space-y-4">
                    <a href="#" class="block">
                        <img src="{{ asset('storage/assset/appstore.png') }}" alt="Download on the App Store" class="w-32 inline-block">
                    </a>
                    <a href="#" class="block">
                        <img src="{{ asset('storage/assset/playstore.png') }}" alt="Get it on Google Play" class="w-32 inline-block">
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="border-t border-gray-400 mt-8 pt-4 text-center">
            <p>&copy; 2024 Ummro. All Rights Reserved.</p>
        </div>
    </footer>

</div>
