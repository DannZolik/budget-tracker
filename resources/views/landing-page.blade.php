@extends('layouts.landing-page-layout')

@section('content')
    <img src="{{ asset('landing-images/green_circle.png') }}" alt="" class="h-96 w-96 absolute -top-48 left-32"
        style="filter: blur(120px); z-index: -5;">

    <div class="grid gap-16 mb-20 mt-28 lg:grid-cols-2 lg:items-center">
        <img src="{{ asset('landing-images/1.jpg') }}" alt=""
            class="order-1 lg:order-2 w-96 h-96 rounded-lg mt-8 lg:mt-0">

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
        <p class="mx-24 text-lg">We are a passionate startup from Latvia dedicated to helping people take control of their
            finances. At
            CoinKeeper, our mission is to provide simple and effective tools that make managing money easier for everyone.
            We believe that financial clarity empowers people to achieve their goals, and we’re here to make that journey
            smoother for you. Whether you’re saving for a big dream, managing daily expenses, or planning for the future,
            CoinKeeper is designed to support every step of your financial journey, making it less stressful and more
            rewarding.</p>
    </div>

    <img src="{{ asset('landing-images/green_circle.png') }}" alt="" class="h-96 w-96 absolute"
        style="filter: blur(120px); z-index: -5; top: 84vh; left: -16vw;">

    <div class="text-white pt-4 mb-20" id="benefits">
        <h3 class="text-3xl font-bold mb-12 text-center">Benefits</h3>

        <div class="flex items-center gap-16 mb-12">
            <img src="{{ asset('landing-images/2.jpg') }}" alt="" class="w-96 h-96 rounded-lg">

            <p class="text-white text-xl mb-4">
                <strong>Visual Insights:</strong> View your spending habits through easy-to-read charts and graphs, making
                financial planning simple and intuitive. With CoinKeeper, you get a clear picture of where your money is
                going, helping you identify patterns and areas for improvement.
            </p>
        </div>

        <img src="{{ asset('landing-images/green_circle.png') }}" alt="" class="h-96 w-96 absolute"
            style="filter: blur(120px); z-index: -5; top: 140vh; right: -20vw;">

        <div class="flex items-center gap-16">
            <p class="text-white text-xl mb-4">
                <strong>Secure Data Protection:</strong> Your financial information is safe with our top-level encryption
                and privacy measures, ensuring secure access to your data at all times. With features
                like two-factor
                authentication, you can rest easy knowing that your personal and financial details are
                safeguarded. Your trust is our priority, and we work to ensure that your information stays protected.
            </p>

            <img src="{{ asset('landing-images/3.jpg') }}" alt="" class="w-96 h-96 rounded-lg">
        </div>

        <img src="{{ asset('landing-images/green_circle.png') }}" alt="" class="h-96 w-96 absolute"
            style="filter: blur(120px); z-index: -5; top: 228vh; left: -20vw;">
    </div>

    <div class="text-white text-center mb-20 pt-4" id="contact-us">
        <h3 class="text-3xl font-bold mb-4">Contact Us</h3>
        <p class="mx-24 text-lg">Have questions or need assistance? Our team is here to help! Feel free to reach out to us
            at
            <strong>support@dannzolik.com</strong>, and we'll get back to you as soon as possible. Whether it's feedback or
            suggestions, we're always happy to hear from you! Our dedicated support team is available to
            answer your questions, resolve any issues, and make your experience with CoinKeeper as smooth and rewarding as
            possible.
            Don't hesitate to connect with us – we value your input and are here to make a difference in your financial
            journey.
        </p>
    </div>
@endsection
