<?php

/**
 * Landing Page Configuration
 *
 * Customize this file to personalize the landing page for different companies.
 * Simply update the values below and the entire landing page will reflect the changes.
 */

return [
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

    'colors' => [
        'primary' => 'emerald',      // emerald, blue, purple, red, orange, cyan, yellow, pink
        'accent' => 'teal',          // complementary color
    ],

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

    'features' => [
        [
            'icon_bg' => 'bg-green-500',
            'title' => 'Income management',
            'description' => 'Efficiently track and manage your income streams',
        ],
        [
            'icon_bg' => 'bg-red-500',
            'title' => 'Expense tracking',
            'description' => 'Monitor and control your business expenses effectively',
        ],
        [
            'icon_bg' => 'bg-blue-500',
            'title' => 'Financial reporting',
            'description' => 'Generate comprehensive reports for informed decision-making',
        ],
        [
            'icon_bg' => 'bg-purple-500',
            'title' => 'Payment Reminders',
            'description' => 'Stay on top of your financial obligations with timely payment notifications',
        ],
    ],

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

    'properties' => [
        'badge' => 'Our Properties',
        'heading' => 'Featured <span class="text-primary">Properties</span>',
        'subheading' => 'Discover our carefully selected properties for investment and living.',
        'items' => [
            [
                'title' => 'Luxury Villa in Nyarutarama',
                'type' => 'Residential',
                'location' => 'Nyarutarama, Kigali',
                'price' => 'RWF 250,000,000',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'area' => '450 sqm',
                'description' => 'Stunning modern villa with panoramic views, swimming pool, and landscaped garden. Perfect for families seeking luxury living.',
                'features' => ['Swimming Pool', 'Garden', 'Garage', 'Security System', '24/7 Water'],
                'image' => 'images/properties/villa1.jpg',
                'status' => 'Available',
            ],
            [
                'title' => 'Commercial Plot in Kimihurura',
                'type' => 'Land',
                'location' => 'Kimihurura, Kigali',
                'price' => 'RWF 180,000,000',
                'bedrooms' => null,
                'bathrooms' => null,
                'area' => '800 sqm',
                'description' => 'Prime commercial land in strategic location. Ideal for office building or retail development.',
                'features' => ['Road Access', 'Electricity', 'Water Connection', 'Title Deed'],
                'image' => 'images/properties/land1.jpg',
                'status' => 'Available',
            ],
            [
                'title' => 'Modern Apartment in Kacyiru',
                'type' => 'Residential',
                'location' => 'Kacyiru, Kigali',
                'price' => 'RWF 85,000,000',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => '150 sqm',
                'description' => 'Contemporary apartment in secure compound with gym and parking. Great for professionals.',
                'features' => ['Parking', 'Gym Access', 'Security', 'Balcony', 'Fitted Kitchen'],
                'image' => 'images/properties/apartment1.jpg',
                'status' => 'Available',
            ],
            [
                'title' => 'Agricultural Farm in Bugesera',
                'type' => 'Farm',
                'location' => 'Bugesera District',
                'price' => 'RWF 120,000,000',
                'bedrooms' => null,
                'bathrooms' => null,
                'area' => '5 Hectares',
                'description' => 'Productive farmland with irrigation system, storage facilities, and farmhouse. Currently cultivating vegetables.',
                'features' => ['Irrigation System', 'Storage', 'Farmhouse', 'Water Source', 'Access Road'],
                'image' => 'images/properties/farm1.jpg',
                'status' => 'Available',
            ],
            [
                'title' => 'Guest House in Remera',
                'type' => 'Commercial',
                'location' => 'Remera, Kigali',
                'price' => 'RWF 350,000,000',
                'bedrooms' => 12,
                'bathrooms' => 12,
                'area' => '600 sqm',
                'description' => 'Fully operational guest house with restaurant. Excellent income generating property near airport.',
                'features' => ['12 Rooms', 'Restaurant', 'Parking', 'Reception', 'Conference Room'],
                'image' => 'images/properties/guesthouse1.jpg',
                'status' => 'Available',
            ],
            [
                'title' => 'Residential Plot in Kibagabaga',
                'type' => 'Land',
                'location' => 'Kibagabaga, Kigali',
                'price' => 'RWF 45,000,000',
                'bedrooms' => null,
                'bathrooms' => null,
                'area' => '400 sqm',
                'description' => 'Well-located residential plot in quiet neighborhood. Ready for construction with all utilities available.',
                'features' => ['Utilities Available', 'Quiet Area', 'Near Schools', 'Title Deed'],
                'image' => 'images/properties/land2.jpg',
                'status' => 'Available',
            ],
        ],
    ],

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

    'contact' => [
        'badge' => 'Get In Touch',
        'heading' => 'Ready to Invest? <span class="text-primary">Contact Us</span>',
        'subheading' => 'Our expert agents are ready to help you find your perfect property. Call, email, or visit us today.',
        'form_heading' => 'Request More Information',
    ],
];
