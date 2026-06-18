@extends('layouts.landing')

@section('title', config('app.name', 'FinTrack') . ' - Smart Finance Management SaaS')

@section('content')

<!-- NAVBAR -->

<!-- NAVBAR -->
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="w-20 h-20 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold">
                    <img
                    src="{{ asset('images/logo.png') }}"
                    alt="FinTrack"
                    class="rounded-3xl w-full">
                </div>

                <div>
                    <span class="text-xl font-bold text-gray-900">
                        {{ config('app.name', 'FinTrack') }}
                    </span>
                    <p class="text-sm text-gray-500 -mt-1">
                        Smart Finance Management
                    </p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">

                <a href="#features"
                   class="text-gray-600 hover:text-indigo-600 font-medium transition">
                    Features
                </a>

                <a href="#pricing"
                   class="text-gray-600 hover:text-indigo-600 font-medium transition">
                    Pricing
                </a>

                <a href="#faq"
                   class="text-gray-600 hover:text-indigo-600 font-medium transition">
                    FAQ
                </a>

                <a href="#contact"
                   class="text-gray-600 hover:text-indigo-600 font-medium transition">
                    Contact
                </a>

            </div>

            <!-- Auth Buttons -->
            <div class="flex items-center gap-3">

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-indigo-700 transition">
                        Dashboard
                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="text-gray-700 font-medium hover:text-indigo-600 transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-indigo-700 transition">
                        Start Free Trial
                    </a>

                @endauth

            </div>

        </div>
    </div>
</nav>

<!-- HERO -->

<section class="py-24 bg-gradient-to-br from-indigo-50 via-white to-blue-50">
    <div class="max-w-7xl mx-auto px-6">

```
    <div class="grid lg:grid-cols-2 gap-16 items-center">

        <div>
            <span class="inline-block bg-indigo-100 text-indigo-700 px-5 py-2 rounded-full text-sm font-semibold">
                Cloud Finance Management
            </span>

            <h1 class="text-5xl lg:text-6xl font-bold mt-6 leading-tight text-gray-900">
                Track Income,
                Expenses & Profit
                <span class="text-indigo-600">
                    In Real Time
                </span>
            </h1>

            <p class="mt-6 text-xl text-gray-600">
                FinTrack helps businesses manage accounting, expenses,
                invoices, payroll, banking, budgeting, and financial
                reporting from one secure cloud platform.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('register') }}"
                   class="bg-indigo-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-indigo-700 text-center">
                    Start Free Trial
                </a>

                <a href="#features"
                   class="border border-gray-300 text-indigo-600 px-8 py-4 rounded-lg font-semibold hover:bg-white text-center">
                    Explore Features
                </a>
            </div>

            <div class="grid grid-cols-3 gap-8 mt-12">

                <div>
                    <h3 class="text-3xl font-bold text-indigo-600">99.9%</h3>
                    <p class="text-gray-600">Uptime</p>
                </div>

                <div>
                    <h3 class="text-3xl font-bold text-indigo-600">24/7</h3>
                    <p class="text-gray-600">Cloud Access</p>
                </div>

                <div>
                    <h3 class="text-3xl font-bold text-indigo-600">Secure</h3>
                    <p class="text-gray-600">Data</p>
                </div>

            </div>
        </div>

        <div>
            <div class="bg-white rounded-3xl shadow-2xl p-6">
                <img
                    src="{{ asset('images/dashboard-preview.png') }}"
                    alt="FinTrack Dashboard"
                    class="rounded-2xl w-full">
            </div>
        </div>

    </div>

</div>
```

</section>

<!-- FEATURES -->

<section id="features" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

```
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900">
            Everything Your Finance Team Needs
        </h2>

        <p class="text-gray-600 mt-4">
            Powerful tools for complete financial control.
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
            <h3 class="font-bold text-2xl text-gray-900 mb-3">
                Income Tracking
            </h3>
            <p class="text-gray-600">
                Track revenue across all business operations.
            </p>
        </div>

        <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
            <h3 class="font-bold text-2xl text-gray-900 mb-3">
                Expense Management
            </h3>
            <p class="text-gray-600">
                Monitor and categorize company spending.
            </p>
        </div>

        <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
            <h3 class="font-bold text-2xl text-gray-900 mb-3">
                Payroll Management
            </h3>
            <p class="text-gray-600">
                Manage employee salaries and payments.
            </p>
        </div>

        <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
            <h3 class="font-bold text-2xl text-gray-900 mb-3">
                Invoice Generator
            </h3>
            <p class="text-gray-600">
                Generate professional invoices instantly.
            </p>
        </div>

        <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
            <h3 class="font-bold text-2xl text-gray-900 mb-3">
                Budget Planning
            </h3>
            <p class="text-gray-600">
                Plan and monitor financial goals.
            </p>
        </div>

        <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
            <h3 class="font-bold text-2xl text-gray-900 mb-3">
                Financial Reports
            </h3>
            <p class="text-gray-600">
                Generate profit & loss, balance sheet, and cash flow reports.
            </p>
        </div>

    </div>

</div>
```

</section>

<!-- FAQ -->

<section id="faq" class="py-24 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6">

```
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900">
            Frequently Asked Questions
        </h2>
    </div>

    <div class="space-y-6">

        <div class="bg-white p-6 rounded-xl shadow-sm">
            <h3 class="font-semibold text-lg">
                Is there a free trial?
            </h3>
            <p class="text-gray-600 mt-2">
                Yes. Every new account starts with a free trial.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm">
            <h3 class="font-semibold text-lg">
                Can I manage multiple businesses?
            </h3>
            <p class="text-gray-600 mt-2">
                Yes. Professional and Enterprise plans support multiple companies.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm">
            <h3 class="font-semibold text-lg">
                Is my financial data secure?
            </h3>
            <p class="text-gray-600 mt-2">
                Your data is encrypted and securely stored in the cloud.
            </p>
        </div>

    </div>

</div>
```

</section>

<!-- PRICING -->

<section id="pricing" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

```
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900">
            Simple & Transparent Pricing
        </h2>

        <p class="text-gray-600 mt-4">
            Choose the perfect plan for your business.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">

        <div class="bg-gray-50 rounded-2xl p-8 border">
            <h3 class="text-2xl font-bold">Starter</h3>
            <p class="text-gray-500 mt-2">For small businesses</p>

            <div class="mt-6">
                <span class="text-5xl font-bold">$9</span>
                <span class="text-gray-500">/month</span>
            </div>

            <ul class="mt-8 space-y-3 text-gray-600">
                <li>✓ Income Tracking</li>
                <li>✓ Expense Management</li>
                <li>✓ Basic Reports</li>
                <li>✓ Single Business</li>
            </ul>

            <a href="{{ route('register') }}"
               class="block text-center mt-8 bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700">
                Start Free Trial
            </a>
        </div>

        <div class="bg-indigo-600 text-white rounded-2xl p-8 shadow-xl relative">

            <span class="absolute top-4 right-4 bg-white text-indigo-600 px-3 py-1 rounded-full text-xs font-semibold">
                Popular
            </span>

            <h3 class="text-2xl font-bold">Professional</h3>

            <p class="text-indigo-100 mt-2">
                For growing companies
            </p>

            <div class="mt-6">
                <span class="text-5xl font-bold">$29</span>
                <span>/month</span>
            </div>

            <ul class="mt-8 space-y-3">
                <li>✓ Unlimited Transactions</li>
                <li>✓ Payroll Management</li>
                <li>✓ Invoice Generator</li>
                <li>✓ Advanced Reports</li>
                <li>✓ Multi-Company Support</li>
            </ul>

            <a href="{{ route('register') }}"
               class="block text-center mt-8 bg-white text-indigo-600 py-3 rounded-lg font-semibold">
                Get Started
            </a>

        </div>

        <div class="bg-gray-50 rounded-2xl p-8 border">
            <h3 class="text-2xl font-bold">Enterprise</h3>
            <p class="text-gray-500 mt-2">For large organizations</p>

            <div class="mt-6">
                <span class="text-5xl font-bold">$99</span>
                <span class="text-gray-500">/month</span>
            </div>

            <ul class="mt-8 space-y-3 text-gray-600">
                <li>✓ Everything in Pro</li>
                <li>✓ API Access</li>
                <li>✓ Priority Support</li>
                <li>✓ Dedicated Manager</li>
                <li>✓ Custom Integrations</li>
            </ul>

            <a href="{{ route('register') }}"
               class="block text-center mt-8 bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700">
                Contact Sales
            </a>
        </div>

    </div>

</div>
```

</section>

<!-- CTA -->

<section class="py-24 bg-indigo-600 text-white">
    <div class="max-w-4xl mx-auto text-center px-6">

```
    <h2 class="text-5xl font-bold">
        Ready to Take Control of Your Finances?
    </h2>

    <p class="mt-6 text-xl text-indigo-100">
        Join businesses using FinTrack to manage income, expenses,
        payroll, budgets, and financial reporting.
    </p>

    <a href="{{ route('register') }}"
       class="inline-block mt-10 bg-white text-indigo-600 px-10 py-4 rounded-xl font-semibold hover:bg-gray-100">
        Start Your Free Trial
    </a>

</div>
```

</section>

<!-- FOOTER -->

<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-16">

```
    <div class="grid md:grid-cols-4 gap-10">

        <div>
            <h3 class="text-2xl font-bold text-white">
                {{ config('app.name', 'FinTrack') }}
            </h3>

            <p class="mt-4 text-gray-400">
                Smart cloud-based finance management software for modern businesses.
            </p>
        </div>

        <div>
            <h4 class="text-white font-semibold mb-4">Product</h4>
            <ul class="space-y-2">
                <li><a href="#features" class="hover:text-white">Features</a></li>
                <li><a href="#pricing" class="hover:text-white">Pricing</a></li>
                <li><a href="#faq" class="hover:text-white">FAQ</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-semibold mb-4">Company</h4>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-white">About Us</a></li>
                <li><a href="#" class="hover:text-white">Contact</a></li>
                <li><a href="#" class="hover:text-white">Support</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-semibold mb-4">Legal</h4>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                <li><a href="#" class="hover:text-white">Terms of Service</a></li>
                <li><a href="#" class="hover:text-white">Security</a></li>
            </ul>
        </div>

    </div>

    <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
        © {{ date('Y') }} {{ config('app.name', 'FinTrack') }}. All Rights Reserved.
    </div>

</div>
```

</footer>

@endsection
