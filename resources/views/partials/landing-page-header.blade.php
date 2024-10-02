<header class="w-full">

  <nav class="mx-auto flex items-center justify-between py-4 px-4 md:px-8" aria-label="Global">
      <!-- Logo and Mobile Menu Button -->
      <div class="flex flex-1 items-center justify-between">
          <a href="/">
              <h3 class="text-white text-2xl font-bold">coinKeeper</h3>
          </a>
          <!-- Mobile menu button -->
          <div class="md:hidden">
              <button id="mobile-menu-button" class="text-white focus:outline-none">
                  <!-- Hamburger icon -->
                  <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path id="mobile-menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
              </button>
          </div>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-4 lg:space-x-8 text-white">
          <a href="#about-us" class="text-md font-semibold duration-300 hover:text-[#15803D]">About Us</a>
          <a href="#benefits" class="text-md font-semibold duration-300 hover:text-[#15803D]">Benefits</a>
           <a href="#faq" class="text-md font-semibold duration-300 hover:text-[#15803D]">FAQ</a>
          <a href="#contact-us" class="text-md font-semibold duration-300 hover:text-[#15803D]">Contact Us</a>
      </div>

      <!-- Login Button (Desktop) -->
      <div class="hidden md:flex flex-1 justify-end">
          <a href="/app/login" class="text-md font-semibold">
              <div class="flex items-center text-white duration-300 hover:text-[#15803D]">
                  <x-tabler-user-circle class="me-1 h-6 w-6"/> Log In
              </div>
          </a>
      </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden px-4 pb-4">
      <div class="flex flex-col space-y-4 text-white">
          <a href="#about-us" class="text-md font-semibold duration-300 hover:text-[#15803D]">About Us</a>
          <a href="#benefits" class="text-md font-semibold duration-300 hover:text-[#15803D]">Benefits</a>
          <a href="#contact-us" class="text-md font-semibold duration-300 hover:text-[#15803D]">Contact Us</a>
          <!-- Added Frequently Asked Questions Link -->
          <a href="#faq" class="text-md font-semibold duration-300 hover:text-[#15803D]">Frequently Asked Questions</a>
          <a href="/app/login" class="text-md font-semibold">
              <div class="flex items-center text-white duration-300 hover:text-[#15803D]">
                  <x-tabler-user-circle class="me-1 h-6 w-6"/> Log In
              </div>
          </a>
      </div>
  </div>

</header>

<!-- Add this script at the bottom of your body or in a separate JS file -->
<script>
  const menuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');

  menuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
  });
</script>
