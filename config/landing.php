<?php

return [
<<<<<<< HEAD
    'company' => [
        'name' => env('COMPANY_NAME', 'BFTS BY SHARP TECH LEARNERS'),
        'tagline' => env('COMPANY_TAGLINE', 'Business finances tracking system'),
        'description' => env('COMPANY_DESCRIPTION', 'Your trusted partner in managing business finances with ease and efficiency.'),
        'phone' => env('COMPANY_PHONE', '+250 729 347 391'),
        'email' => env('COMPANY_EMAIL', 'info@bfts.sharptechlearners.com'),
        'location' => env('COMPANY_LOCATION', 'Kigali, Rwanda'),
        'business_hours' => env('COMPANY_HOURS', 'Monday - Saturday: 8:00 AM - 6:00 PM'),
        'whatsapp' => env('COMPANY_WHATSAPP', '+250729347391'),
    ],
=======
>>>>>>> c8b632c30de81a504d80a640af39cd472bf6fccd

'company' => [
    'name' => env('COMPANY_NAME', 'FinTrack Finance Manager'),
    'tagline' => env('COMPANY_TAGLINE', 'Smart Business Finance Tracking System'),
    'description' => env('COMPANY_DESCRIPTION',
    'Manage your income, expenses, sales and business performance in one simple platform.'),
    'phone' => env('COMPANY_PHONE', '+250 786 163 963'),
    'email' => env('COMPANY_EMAIL', 'info@sharptechlearners.com'),
    'location' => env('COMPANY_LOCATION', 'Kigali, Rwanda'),
],

<<<<<<< HEAD
    'hero' => [
        'badge' => 'track your business finances with ease',
        'main_heading' => 'join our <span class="text-gradient">Platform</span>',
        'subheading' => 'Streamline your financial management and gain valuable insights into your business performance.',
        'cta_primary_text' => 'Get Started',
        'cta_secondary_text' => 'Learn More',
        'stats' => [
            ['value' => '500+', 'label' => 'Active Users'],
            ['value' => '1000+', 'label' => 'Transactions Tracked'],
            ['value' => '15+', 'label' => 'Years of Experience'],
        ],
    ],
=======
>>>>>>> c8b632c30de81a504d80a640af39cd472bf6fccd

'colors' => [
    'primary' => 'emerald',
    'accent' => 'blue',
],


'hero' => [

    'badge' => 'Smart Finance Management',

    'main_heading' =>
    'Control Your Money With A <span class="text-gradient">
    Powerful Finance Tracking System</span>',

    'subheading' =>
    'Track income, expenses, sales and profits easily.
    Make better business decisions using real-time financial reports.',


    'cta_primary_text' => 'Start Managing Finances',

    'cta_secondary_text' => 'Request Demo',


    'stats'=>[
        [
<<<<<<< HEAD
            'icon_bg' => 'bg-green-500',
            'title' => 'Income management',
            'description' => 'Efficiently track and manage your income streams',
=======
        'value'=>'1000+',
        'label'=>'Businesses Managed'
>>>>>>> c8b632c30de81a504d80a640af39cd472bf6fccd
        ],

        [
<<<<<<< HEAD
            'icon_bg' => 'bg-red-500',
            'title' => 'Expense tracking',
            'description' => 'Monitor and control your business expenses effectively',
=======
        'value'=>'50000+',
        'label'=>'Transactions Recorded'
>>>>>>> c8b632c30de81a504d80a640af39cd472bf6fccd
        ],

        [
<<<<<<< HEAD
            'icon_bg' => 'bg-blue-500',
            'title' => 'Financial reporting',
            'description' => 'Generate comprehensive reports for informed decision-making',
        ],
        [
            'icon_bg' => 'bg-purple-500',
            'title' => 'Payment Reminders',
            'description' => 'Stay on top of your financial obligations with timely payment notifications',
=======
        'value'=>'99%',
        'label'=>'Data Accuracy'
>>>>>>> c8b632c30de81a504d80a640af39cd472bf6fccd
        ],
    ],
],

<<<<<<< HEAD
    'about' => [
        'badge' => 'reports and insights',
        'heading' => 'Your Trusted Financial <span class="text-primary">Partner</span>',
        'subheading' => 'With over 15 years of experience in financial management, we have helped thousands of clients streamline their accounting processes and achieve their financial goals.',
        'benefits' => [
            [
                'icon' => 'money',
                'title' => 'Transparent Transactions',
                'description' => 'Data-driven insights into your financial activities.',
            ],
            [
                'icon' => 'currency',
                'title' => 'Real-Time Tracking',
                'description' => 'Monitor your financial status as it happens.',
            ],
            [
                'icon' => 'lightning',
                'title' => 'Automated Reminders',
                'description' => 'Stay on top of your financial obligations with timely payment notifications.',
            ],
        ],
        'cta_text' => 'Explore Our Properties',
    ],

    'services' => [
        'badge' => 'Our Services',
        'heading' => 'Complete Financial <span class="text-primary">Solutions</span>',
        'subheading' => 'From income management to expense tracking and financial reporting.',
        'items' => [
            [
                'title' => 'daily reports',
                'description' => 'Comprehensive daily financial summaries for informed decision-making',
                'icon_color' => 'emerald',
            ],
            [
                'title' => 'weekly reports',
                'description' => 'Comprehensive weekly financial summaries for informed decision-making',
                'icon_color' => 'red',
            ],
            [
                'title' => 'monthly reports',
                'description' => 'Comprehensive monthly financial summaries for informed decision-making',
                'icon_color' => 'orange',
            ],
            [
                'title' => 'Yearly reports',
                'description' => 'Comprehensive yearly financial summaries for informed decision-making',
                'icon_color' => 'blue',
            ],
            [
                'title' => 'Payment Reminders',
                'description' => 'Stay on top of your financial obligations with timely payment notifications',
                'icon_color' => 'purple',
            ],
            [
                'title' => 'sales reports',
                'description' => 'categorized sales reports for tracking performance and trends',
                'icon_color' => 'cyan',
            ],
        ],
    ],

    'process' => [
        'badge' => 'How To Get Started',
        'heading' => 'register <span class="text-accent">3 Steps</span>',
        'subheading' => 'Our streamlined process makes finding and securing your dream property simple and transparent.',
        'steps' => [
            [
                'number' => '1',
                'title' => 'Browse Properties',
                'description' => 'Explore our extensive portfolio of properties from residential to commercial and farms.',
            ],
            [
                'number' => '2',
                'title' => 'Schedule a Tour',
                'description' => 'Contact our agents to arrange a viewing at your convenience. Virtual tours also available.',
            ],
            [
                'number' => '3',
                'title' => 'Finalize & Move In',
                'description' => 'Complete legal documentation and financing arrangements. Ready to enjoy your property!',
            ],
        ],
        'highlights' => [
            ['title' => 'Legal Verification', 'description' => 'All properties verified with complete documentation'],
            ['title' => 'Financing Available', 'description' => 'Flexible payment plans and mortgage assistance'],
            ['title' => 'Professional Support', 'description' => 'Dedicated agents to guide you every step'],
            ['title' => 'After-Sale Service', 'description' => 'Ongoing property management and support'],
        ],
    ],

    'testimonials' => [
        'badge' => 'Client Testimonials',
        'heading' => 'Trusted by <span class="text-primary">Satisfied Clients</span>',
        'subheading' => 'See what our clients have to say about their experience with BFTS BY SHARP TECH LEARNERS .',
        'items' => [
            [
                'quote' => 'Found my dream home through BFTS BY SHARP TECH LEARNERS ! The process was smooth and transparent. Highly recommend!',
                'author' => 'Jean Muigai',
                'role' => 'Homeowner',
                'company' => 'Kigali Resident',
                'rating' => 5,
            ],
            [
                'quote' => 'Invested in their farm property and it\'s been incredibly productive. Excellent support throughout!',
                'author' => 'Joseph Kamau',
                'role' => 'Farm Owner',
                'company' => 'Agricultural Investor',
                'rating' => 5,
            ],
            [
                'quote' => 'The gym facility is world-class! Best investment decision I made for my health and business.',
                'author' => 'Sarah Mutua',
                'role' => 'Fitness Enthusiast',
                'company' => 'Regular Member',
                'rating' => 5,
            ],
            [
                'quote' => 'Rented at their guest house and felt at home. Professional management and excellent amenities!',
                'author' => 'David Kipchoge',
                'role' => 'Guest',
                'company' => 'Frequent Visitor',
                'rating' => 5,
            ],
            [
                'quote' => 'Best land investment in Kigali! The agents guided me through everything perfectly.',
                'author' => 'Maria Okonkwo',
                'role' => 'Investor',
                'company' => 'Property Developer',
                'rating' => 5,
            ],
            [
                'quote' => 'Outstanding property management services. My investment is in safe hands!',
                'author' => 'Ahmed Hassan',
                'role' => 'Property Owner',
                'company' => 'Real Estate Investor',
                'rating' => 5,
            ],
        ],
    ],
=======


'features'=>[

>>>>>>> c8b632c30de81a504d80a640af39cd472bf6fccd

[
'title'=>'Income Tracking',

'description'=>
'Record and monitor every source of income from your business.',
],



[
'title'=>'Expense Management',

'description'=>
'Know where your money goes and control unnecessary spending.',
],



[
'title'=>'Sales Reports',

'description'=>
'Analyze daily, weekly and monthly sales performance.',
],



[
'title'=>'Profit Calculation',

'description'=>
'Automatically calculate profit and business growth.',
],


],




'services'=>[

'heading'=>
'Complete Financial Management Solutions',


'items'=>[


[
'title'=>'Business Dashboard',

'description'=>
'View your financial performance from one simple dashboard.'
],


[
'title'=>'Invoices & Payments',

'description'=>
'Create invoices and track customer payments easily.'
],


[
'title'=>'Stock Management',

'description'=>
'Monitor products, quantities and sales movement.'
],


[
'title'=>'Financial Reports',

'description'=>
'Generate professional reports for better decisions.'
],


[
'title'=>'Expense Monitoring',

'description'=>
'Track every expense and improve financial control.'
],


[
'title'=>'Data Security',

'description'=>
'Keep your business information safe and protected.'
],


]

],




'process'=>[


'heading'=>
'Start Managing Your Business In 3 Steps',


'steps'=>[


[
'number'=>'1',
'title'=>'Create Account',
'description'=>
'Register your business and setup your finance dashboard.'
],



[
'number'=>'2',
'title'=>'Add Transactions',
'description'=>
'Enter sales, income and expenses.'
],



[
'number'=>'3',
'title'=>'View Reports',
'description'=>
'Understand your business performance and grow.'
],


]

],




'testimonials'=>[

'heading'=>
'Trusted By Business Owners',


'items'=>[


[
'quote'=>
'FinTrack helped me understand my daily profit and control expenses.',
'author'=>'Business Owner',
],


[
'quote'=>
'I can now track my sales and stock without using notebooks.',
'author'=>'Shop Manager',
],


]

],



'cta'=>[


'heading'=>
'Ready To Take Control Of Your Business Finances?',


'subheading'=>
'Join businesses using technology to manage money smarter.',


'cta_text'=>
'Create Your Account',


],


<<<<<<< HEAD
    'cta' => [
        'heading' => 'Ready to Find Your Property?',
        'subheading' => 'Join hundreds of satisfied clients who have found their perfect investment with BFTS BY SHARP TECH LEARNERS.',
        'cta_text' => 'Get Started Today',
        'benefits' => [
            'Free Property Consultation',
            'Flexible Payment Plans',
            'Transparent Pricing',
        ],
    ],
=======
>>>>>>> c8b632c30de81a504d80a640af39cd472bf6fccd

];


?>