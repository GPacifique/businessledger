<?php

/**
 * Landing Page Configuration
 *
 * Customize this file to personalize the landing page for different companies.
 * Simply update the values below and the entire landing page will reflect the changes.
 */

return [
    'company' => [
        'name' => env('COMPANY_NAME', 'Murenzi Properties'),
        'tagline' => env('COMPANY_TAGLINE', 'Premium Real Estate & Property Management'),
        'description' => env('COMPANY_DESCRIPTION', 'Your trusted partner in land, houses, farms, and premium property investments'),
        'phone' => env('COMPANY_PHONE', '+250 786 163 963'),
        'email' => env('COMPANY_EMAIL', 'info@murenziproperties.rw'),
        'location' => env('COMPANY_LOCATION', 'Kigali, Rwanda'),
        'business_hours' => env('COMPANY_HOURS', 'Monday - Saturday: 8:00 AM - 6:00 PM'),
        'whatsapp' => env('COMPANY_WHATSAPP', '+250786163963'),
    ],

    'colors' => [
        'primary' => 'emerald',      // emerald, blue, purple, red, orange, cyan, yellow, pink
        'accent' => 'teal',          // complementary color
    ],

    'hero' => [
        'badge' => 'Premium Real Estate Solutions',
        'main_heading' => 'Find Your Perfect <span class="text-gradient">Property</span>',
        'subheading' => 'Discover exceptional real estate opportunities - from luxurious houses and productive farms to prime commercial lands. Your investment starts here.',
        'cta_primary_text' => 'Browse Properties',
        'cta_secondary_text' => 'Schedule a Tour',
        'stats' => [
            ['value' => '500+', 'label' => 'Properties'],
            ['value' => '1000+', 'label' => 'Happy Clients'],
            ['value' => '15+', 'label' => 'Years Experience'],
        ],
    ],

    'features' => [
        [
            'icon_bg' => 'bg-green-500',
            'title' => 'Prime Land Investments',
            'description' => 'Strategically located land parcels perfect for development or investment',
        ],
        [
            'icon_bg' => 'bg-red-500',
            'title' => 'Luxury Homes',
            'description' => 'Modern houses with premium finishes and stunning architecture',
        ],
        [
            'icon_bg' => 'bg-blue-500',
            'title' => 'Farm Investments',
            'description' => 'Productive farmland and agricultural investment opportunities',
        ],
        [
            'icon_bg' => 'bg-purple-500',
            'title' => 'Guest House Hospitality',
            'description' => 'Comfortable accommodation and hospitality services for your needs',
        ],
    ],

    'about' => [
        'badge' => 'Why Partner With Us',
        'heading' => 'Your Trusted Real Estate <span class="text-primary">Partner</span>',
        'subheading' => 'With over 15 years of experience in real estate investments, we have helped thousands of clients find their perfect property and achieve their investment goals.',
        'benefits' => [
            [
                'icon' => 'shield',
                'title' => 'Verified Properties',
                'description' => 'All our properties are legally verified with complete documentation and transparency.',
            ],
            [
                'icon' => 'currency',
                'title' => 'Best Value & Financing',
                'description' => 'Competitive pricing with flexible payment plans and mortgage assistance options.',
            ],
            [
                'icon' => 'lightning',
                'title' => 'Expert Support',
                'description' => 'Dedicated agents and property managers available to guide you through every step.',
            ],
        ],
        'cta_text' => 'Explore Our Properties',
    ],

    'services' => [
        'badge' => 'Our Services',
        'heading' => 'Complete Real Estate <span class="text-primary">Solutions</span>',
        'subheading' => 'From residential properties to commercial lands and hospitality ventures.',
        'items' => [
            [
                'title' => 'Residential Houses',
                'description' => 'Beautifully designed homes with modern amenities in prime neighborhoods',
                'icon_color' => 'emerald',
            ],
            [
                'title' => 'Land Sales',
                'description' => 'Prime commercial and residential land parcels with complete legal documentation',
                'icon_color' => 'red',
            ],
            [
                'title' => 'Farm Properties',
                'description' => 'Productive agricultural lands with irrigation systems and infrastructure',
                'icon_color' => 'orange',
            ],
            [
                'title' => 'Gym Facilities',
                'description' => 'Modern fitness center with professional trainers and premium equipment',
                'icon_color' => 'blue',
            ],
            [
                'title' => 'Guest House',
                'description' => 'Comfortable hospitality accommodations for short and long-term stays',
                'icon_color' => 'purple',
            ],
            [
                'title' => 'Property Management',
                'description' => 'Full property management services including maintenance and tenant relations',
                'icon_color' => 'cyan',
            ],
        ],
    ],

    'process' => [
        'badge' => 'How To Get Started',
        'heading' => 'Find Your Property in <span class="text-accent">3 Steps</span>',
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
        'subheading' => 'See what our clients have to say about their property investments with Murenzi Properties.',
        'items' => [
            [
                'quote' => 'Found my dream home through Murenzi Properties! The process was smooth and transparent. Highly recommend!',
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
        'subheading' => 'Join hundreds of satisfied clients who have found their perfect investment with Murenzi Properties.',
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
