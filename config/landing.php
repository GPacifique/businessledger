<?php

return [

'company' => [
    'name' => env('COMPANY_NAME', 'FinTrack Finance Manager'),
    'tagline' => env('COMPANY_TAGLINE', 'Smart Business Finance Tracking System'),
    'description' => env('COMPANY_DESCRIPTION',
    'Manage your income, expenses, sales and business performance in one simple platform.'),
    'phone' => env('COMPANY_PHONE', '+250 786 163 963'),
    'email' => env('COMPANY_EMAIL', 'info@sharptechlearners.com'),
    'location' => env('COMPANY_LOCATION', 'Kigali, Rwanda'),
],


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
        'value'=>'1000+',
        'label'=>'Businesses Managed'
        ],

        [
        'value'=>'50000+',
        'label'=>'Transactions Recorded'
        ],

        [
        'value'=>'99%',
        'label'=>'Data Accuracy'
        ],
    ],
],



'features'=>[


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



];


?>