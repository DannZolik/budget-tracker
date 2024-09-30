@extends('layouts.landing-page-layout')

@section('content')
    <!-- First Blurred Image -->
    <img src="{{ asset('landing-images/green_circle.png') }}" alt="" id="image-1"
        class="h-96 w-96 absolute -top-48 -left-20 lg:left-32">

    <div class="flex flex-col lg:flex-row mb-20 mt-4 items-center justify-between gap-12">
        <img src="{{ asset('landing-images/1.jpg') }}" alt=""
            class="order-1 lg:order-2 w-56 h-56 md:w-96 md:h-96 rounded-lg mt-8 lg:mt-0 mx-auto lg:mx-0">

        <div class="order-2 lg:order-1 text-center lg:text-left">
            <p class="text-white text-xl mb-4">
                Take control of your finances effortlessly with <strong>CoinKeeper</strong> – the ultimate money tracking
                app. Keep track of your income and expenses, set personal budgets, and monitor your financial goals all in
                one place. With intuitive charts and insights, CoinKeeper helps you visualize your spending habits and make
                informed financial decisions.
            </p>

            <a href="/app/login"
                class="inline-block px-6 py-2 duration-300 text-white bg-[#15803D] hover:bg-white hover:text-[#0F141A] font-semibold rounded-lg transition">
                Log In
            </a>
        </div>
    </div>

    <div class="text-white text-center mb-20 pt-4" id="about-us">
        <h3 class="text-3xl font-bold mb-4">About Us</h3>
        <p class="mx-4 lg:mx-24 text-lg">
            We are a passionate startup from Latvia dedicated to helping people take control of their
            finances. At CoinKeeper, our mission is to provide simple and effective tools that make managing money easier for everyone.
            We believe that financial clarity empowers people to achieve their goals, and we’re here to make that journey
            smoother for you. Whether you’re saving for a big dream, managing daily expenses, or planning for the future,
            CoinKeeper is designed to support every step of your financial journey, making it less stressful and more
            rewarding.
        </p>
    </div>

    <!-- Second Blurred Image -->
    <img src="{{ asset('landing-images/green_circle.png') }}" alt="" id="image-2" class="h-96 w-96 absolute">

    <div class="text-white pt-4 mb-20" id="benefits">
        <h3 class="text-3xl font-bold mb-12 text-center">Benefits</h3>

        <div class="flex flex-col lg:flex-row items-center justify-between gap-12 mb-12">
            <img src="{{ asset('landing-images/2.jpg') }}" alt="" class="w-56 h-56 md:w-96 md:h-96 rounded-lg">

            <p class="text-white text-xl mb-4 text-center lg:text-right">
                <strong>Visual Insights:</strong> View your spending habits through easy-to-read charts and graphs, making
                financial planning simple and intuitive. With CoinKeeper, you get a clear picture of where your money is
                going, helping you identify patterns and areas for improvement.
            </p>
        </div>

        <!-- Third Blurred Image -->
        <img src="{{ asset('landing-images/green_circle.png') }}" alt="" id="image-3" class="h-96 w-96 absolute">

        <div class="flex items-center gap-12 flex-col lg:flex-row justify-between mb-24">
            <p class="text-white text-xl mb-4 order-2 lg:order-1 text-center lg:text-left">
                <strong>Secure Data Protection:</strong> Your financial information is safe with our top-level encryption
                and privacy measures, ensuring secure access to your data at all times. With features
                like two-factor authentication, you can rest easy knowing that your personal and financial details are
                safeguarded. Your trust is our priority, and we work to ensure that your information stays protected.
            </p>

            <img src="{{ asset('landing-images/3.jpg') }}" alt="" id="image-4" class="w-56 h-56 md:w-96 md:h-96 rounded-lg order-1 lg:order-2">
        </div>

<!-- Frequently Asked Questions Section -->
<section id="faq" class="pt-4">
    <h2 class="text-3xl font-bold text-center text-white mb-8">Frequently Asked Questions</h2>
    <div class="max-w-4xl mx-auto">
        <!-- FAQ Item 1 -->
        <div class="mb-4">
            <button class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                <span class="text-lg font-semibold text-white">What is coinKeeper?</span>
                <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                <p class="text-white">coinKeeper is a comprehensive platform designed to help you manage, track, and optimize your cryptocurrency investments effortlessly. With real-time data, portfolio analytics, and secure storage solutions, coinKeeper is your all-in-one crypto companion.</p>
            </div>
        </div>
        <!-- FAQ Item 2 -->
        <div class="mb-4">
            <button class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                <span class="text-lg font-semibold text-white">How do I sign up for coinKeeper?</span>
                <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                <p class="text-white">Signing up is easy! Click on the 'Log In' button at the top right corner of the page, then select 'Create an Account'. Fill in your details, and you'll be managing your crypto portfolio in no time.</p>
            </div>
        </div>
        <!-- FAQ Item 3 -->
        <div class="mb-4">
            <button class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                <span class="text-lg font-semibold text-white">Is my data secure with coinKeeper?</span>
                <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                <p class="text-white">Absolutely! We prioritize your security by implementing advanced encryption protocols and secure authentication methods. Your data is stored securely and is never shared with third parties without your consent.</p>
            </div>
        </div>
        <!-- FAQ Item 4 -->
        <div class="mb-4">
            <button class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                <span class="text-lg font-semibold text-white">Can I track multiple cryptocurrencies?</span>
                <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                <p class="text-white">Yes, coinKeeper supports a wide range of cryptocurrencies. You can add multiple assets to your portfolio and monitor their performance in real-time.</p>
            </div>
        </div>
        <!-- FAQ Item 5 -->
        <div>
            <button class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                <span class="text-lg font-semibold text-white">How do I contact customer support?</span>
                <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                <p class="text-white">Our support team is here to help! You can reach us through the 'Contact Us' section on our website or by emailing support@coinkeeper.com.</p>
            </div>
        </div>
    </div>
</section>



    <script>
        // FAQ Accordion Functionality
const faqButtons = document.querySelectorAll('#faq button');

faqButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
        const content = btn.nextElementSibling;
        const icon = btn.querySelector('svg');

        // Toggle the content
        content.classList.toggle('hidden');

        // Rotate the icon
        icon.classList.toggle('rotate-180');
    });
});

    </script>

@endsection
