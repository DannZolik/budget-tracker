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
                app. Keep track of your earnings and expenses, set personal budgets, and monitor your financial goals all in
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
            finances. At CoinKeeper, our mission is to provide simple and effective tools that make managing money easier
            for everyone.
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

            <img src="{{ asset('landing-images/3.jpg') }}" alt="" id="image-4"
                class="w-56 h-56 md:w-96 md:h-96 rounded-lg order-1 lg:order-2">
        </div>

        <!-- Frequently Asked Questions Section -->
        <section id="faq" class="pt-4 mb-20">
            <h2 class="text-3xl font-bold text-center text-white mb-8">Frequently Asked Questions</h2>
            <div class="max-w-4xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="mb-4">
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">What is coinKeeper?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">cCoinKeeper is a comprehensive platform designed to help you manage, track,
                            and
                            optimize your cryptocurrency investments effortlessly. With real-time data, portfolio analytics,
                            and secure storage solutions, coinKeeper is your all-in-one crypto companion.</p>
                    </div>
                </div>
                <!-- FAQ Item 2 -->
                <div class="mb-4">
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How do I sign up for coinKeeper?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">Signing up is easy! Click on the 'Log In' button at the top right corner of
                            the page, then select 'Create an Account'. Fill in your details, and you'll be managing your
                            crypto portfolio in no time.</p>
                    </div>
                </div>
                <!-- FAQ Item 3 -->
                <div class="mb-4">
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">Is my data secure with coinKeeper?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">Absolutely! We prioritize your security by implementing advanced encryption
                            protocols and secure authentication methods. Your data is stored securely and is never shared
                            with third parties without your consent.</p>
                    </div>
                </div>
                <!-- FAQ Item 4 -->
                <div class="mb-4">
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How can I create an Earning/Expense? </span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">
                        <ol>
                            <li>1. Navigate to the Earning or Expense page. </li>
                            <li>2. Click the button to create a new entry. </li>
                            <li>3. You will be redirected to a new page where you can input the following details: Name,
                                Category, Amount, Description. </li>
                            <li>4. After filling in all the necessary fields, click the "Create" button. </li>
                            <li> 5. You will then be redirected back to the main page.</li>
                        </ol>
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 5 -->
                <div class="mb-4">
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How can I delete an Earning/Expense?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">
                        <ol>
                            <li>1. Navigate to the Earning or Expense page. </li>
                            <li>2. Select any entries you would like to delete by clicking on the checkbox on the left of
                                them. </li>
                            <li>3. Click on the bulk actions button. </li>
                            <li>4. Click the "Delete selected" button. </li>
                            <li>5. You will then be shown a confirmation menu, click the "Confirm" button.</li>
                        </ol>
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 6 -->
                <div class="mb-4">
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How can I edit an Earning/Expense?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">
                        <ol>
                            <li>1. Navigate to the Earning or Expense page. </li>
                            <li>2. Click on the "Edit" button on the right side of the entry.</li>
                            <li>3. You will be redirected to a new page where you can change the following details: Name,
                                Category, Amount, Description. </li>
                            <li>4. After making changes click the "Save changes" button. </li>
                            <li>5. You will then be redirected back to the main page.</li>
                        </ol>
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 7 -->
                <div class="mb-4">
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How do I view and sort Reports?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">
                            Firstly, navigate to the Earning or Expense reports page.
                            <br>
                            You can view summaries of expenses and earnings
                            in a table format with columns for "From" (start date), "To" (end date), and "Amount" (total
                            sum). <br>
                            Click any column header to sort entries in ascending or descending order.
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 8 -->
                <div class="mb-4">
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How do I filter Reports?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">
                            To filter data by date: <br>
                            1. Click the funnel icon under "Export Data" in the top right. <br>
                            2. Choose a date range by selecting dates in one or both fields.</p>
                    </div>
                </div>
                <!-- FAQ Item 9 -->
                <div class="mb-4">
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How do I export my Reports?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">
                            Users can export summary data to Microsoft Excel in .csv or .xlsx format. To export:

                            1. Follow the filtering instructions if needed. <br>
                            2. Click "Export Data" in the top right. <br>
                            3. Select which tables to export and click "Export." <br>
                            4. Wait for the export to complete, indicated by a number on the bell icon.
                            Click it to download the file in the desired format. </p>
                    </div>
                </div>
                <!-- FAQ Item 9 -->
                <div>
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How do I contact customer support?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">Our support team is here to help! You can reach us through the 'Contact Us'
                            section on our website or by emailing support@coinkeeper.com.</p>
                    </div>
                </div>
                <!-- FAQ Item 10 -->
                <div>
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How do I create an Expense/Earning Category?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">Go to the Earning or Expense Category page, click "Create," fill in the
                            details, and submit.</p>
                    </div>
                </div>
                <!-- FAQ Item 11 -->
                <div>
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How can I edit an Expense/Earning Category?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">Click "Edit" on the Category page, update the details, and save your changes.
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 12 -->
                <div>
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How do I delete an Expense/Earning Category?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">Select the category, click "Delete," confirm, and it will be removed from the
                            list.</p>
                    </div>
                </div>
                <!-- FAQ Item 13 -->
                <div>
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How do I create an Earning/Expense entry using a
                            category?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">Select a category, enter the details for the new entry, and click "Create."
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 14 -->
                <div>
                    <button
                        class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                        <span class="text-lg font-semibold text-white">How do I register a new account?</span>
                        <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                        <p class="text-white">Click "Login" on the landing page, then select "Register," fill in your
                            details, and click "Register."
                        </p>
                    </div>
                    <!-- FAQ Item 15 -->
                    <div>
                        <button
                            class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                            <span class="text-lg font-semibold text-white">How do I log in to my account?</span>
                            <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                            <p class="text-white">On the landing page, click "Login," enter your email and password, then
                                click "Log In."
                            </p>
                        </div>
                        <!-- FAQ Item 16 -->
                        <div>
                            <button
                                class="w-full text-left flex justify-between items-center p-4 bg-[#0F141A] shadow rounded focus:outline-none">
                                <span class="text-lg font-semibold text-white">How do I edit my user profile or change my
                                    password?</span>
                                <svg class="h-5 w-5 text-white transition-transform duration-200 transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="faq-content hidden p-4 bg-[#0F141A] shadow rounded mt-1">
                                <p class="text-white">From the dashboard, go to "User Profile," update your information,
                                    and click "Save Changes"; to change your password, enter your old and new passwords.
                                </p>
                            </div>
                        </div>
        </section>

        <div class="text-white text-center mb-20 pt-4" id="contact-us">
            <h3 class="text-3xl font-bold mb-4">Contact Us</h3>
            <p class="mx-4 lg:mx-24 text-lg">
                Have questions or need assistance? Our team is here to help! Feel free to reach out to us at
                <strong>support@dannzolik.com</strong>, and we'll get back to you as soon as possible. Whether it's feedback
                or
                suggestions, we're always happy to hear from you! Our dedicated support team is available to
                answer your questions, resolve any issues, and make your experience with CoinKeeper as smooth and rewarding
                as
                possible.
                Don't hesitate to connect with us – we value your input and are here to make a difference in your financial
                journey.
            </p>
        </div>


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
