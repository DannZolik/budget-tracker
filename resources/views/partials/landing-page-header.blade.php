<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoinKeeper</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

<!-- Header -->
<header class="flex justify-between items-center px-6 py-4 bg-gray-800">
    <!-- Logo -->
    <h1 class="text-xl font-bold">CoinKeeper</h1>

    <!-- Centered Navigation Links -->
    <nav class="flex space-x-6 mx-auto">
      <a href="#" class="hover:text-green-500">About</a>
      <a href="#" class="hover:text-green-500">Contact</a>
      <a href="#" class="hover:text-green-500">Benefits</a>
    </nav>

    <!-- Profile on the Right -->
    <a href="#" class="hover:text-green-500 flex items-center">
      <span>Profile</span>
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 ml-2" viewBox="0 0 16 16">
        <path d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM1 14s1-1.5 7-1.5S15 14 15 14H1z"/>
      </svg>
    </a>
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

  <!-- Footer -->
  <footer class="py-6 bg-gray-800 text-center">
    <nav class="space-x-6">
      <a href="#" class="text-sm hover:text-green-400">About</a>
      <a href="#" class="text-sm hover:text-green-400">Contact</a>
      <a href="#" class="text-sm hover:text-green-400">Benefits</a>
      <a href="#" class="text-sm hover:text-green-400">Profile</a>
    </nav>
    <p class="text-xs text-gray-500 mt-4">&copy; 2020 CoinKeeper, Inc. All rights reserved.</p>
  </footer>

</body>
</html>
