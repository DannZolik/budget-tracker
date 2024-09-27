@extends('layouts.landing-page-layout')

@section('content')
<div class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div
            class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="">
                </a>
                <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                    </div>
                    <div class="py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                            in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



<!-- Main Hero Section -->
<section class="py-12 px-4 md:px-12 lg:px-24 bg-gradient-to-r from-green-600 to-green-800">
    <div class="flex flex-col md:flex-row items-center">
      <!-- Left Column: Text and Button -->
      <div class="md:w-1/2 text-left">
        <h2 class="text-3xl font-bold mb-4 text-white">Manage your finances with ease using CoinKeeper</h2>
        <p class="text-lg mb-6 text-white">A simple app for tracking spending and earning</p>
        <button class="bg-green-500 text-white py-2 px-6 rounded-lg font-bold hover:bg-green-400 transition duration-300">Log In</button>
      </div>

      <!-- Right Column: Image -->
      <div class="mt-8 md:mt-0 md:w-1/2 flex justify-center">
        <img src="https://via.placeholder.com/200" alt="Wallet Image" class="rounded-lg shadow-md">
      </div>
    </div>
  </section>


  <!-- About Us -->
  <section class="py-12 px-6 md:px-24">
    <h3 class="text-2xl font-bold text-center mb-4">About Us</h3>
    <p class="text-lg text-center max-w-3xl mx-auto">We are a passionate startup from Latvia dedicated to helping people take control of their finances. At <span class="font-semibold">CoinKeeper</span>, our mission is to provide simple and effective tools that make managing money easier for everyone.</p>
  </section>

<!-- Benefits Section 1 -->
<section class="py-12 bg-gray-800 px-6 md:px-24">
    <h3 class="text-2xl font-bold text-center text-white mb-8 uppercase">Benefits</h3>

    <!-- First Benefit (Default: Image on the left, Text on the right) -->
    <div class="flex flex-col md:flex-row items-start space-x-0 md:space-x-4">
      <img src="https://via.placeholder.com/100" alt="Savings Image" class="w-20 h-20 rounded-lg mb-4 md:mb-0">
      <div>
        <h4 class="font-bold text-xl mb-2 text-white uppercase">Visual Insights</h4>
        <p class="text-white">View your spending habits through easy-to-read charts and graphs, making financial planning simple and intuitive.</p>
      </div>
    </div>
  </section>

  <!-- Benefits Section 2 -->
  <section class="py-12 bg-gray-800 px-6 md:px-24">
    <!-- Second Benefit (Swapped: Image on the right, Text on the left) -->
    <div class="flex flex-col md:flex-row-reverse items-start space-x-0 md:space-x-reverse md:space-x-4">
      <img src="https://via.placeholder.com/100" alt="Secure Data" class="w-20 h-20 rounded-lg mb-4 md:mb-0">
      <div>
        <h4 class="font-bold text-xl mb-2 text-white uppercase">Secure Data Protection</h4>
        <p class="text-white">Your financial information is safe with our top-level encryption and privacy measures, ensuring secure access to your data at all times.</p>
      </div>
    </div>
  </section>



  <!-- Contact Us -->
  <section class="py-12 px-6 md:px-24 text-center">
    <h3 class="text-2xl font-bold mb-4">Contact Us</h3>
    <p class="text-lg mb-4">Have questions or need assistance? Our team is here to help! Feel free to reach out to us at <a href="mailto:support@dannzolik.com" class="text-green-400 hover:underline">support@dannzolik.com</a>, and we'll get back to you as soon as possible.</p>
    <p class="text-sm text-gray-500">Whether it's feedback, support, or suggestions, we're always happy to hear from you!</p>
  </section>

  
@endsection