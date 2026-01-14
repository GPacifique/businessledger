<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Get hard-coded properties data
     */
    private function getProperties()
    {
        return [
            [
                'title' => 'Luxury Villa in Kigali Heights',
                'type' => 'Residential',
                'status' => 'For Sale',
                'location' => 'Kigali Heights, Kigali',
                'description' => 'Stunning 4-bedroom villa with panoramic city views, modern amenities, swimming pool, and spacious garden. Perfect for families seeking luxury living.',
                'price' => 'RWF 450,000,000',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => '450 m²',
                'features' => ['Swimming Pool', 'Garden', 'Garage', 'Security System', 'Modern Kitchen', 'City Views', 'Balcony', 'Terrace'],
            ],
            [
                'title' => 'Prime Commercial Land - Masaka',
                'type' => 'Land',
                'status' => 'For Sale',
                'location' => 'Masaka, Kigali',
                'description' => 'Strategic 800 sqm commercial plot in prime Masaka location. Ideal for office buildings, shopping centers, or mixed-use development.',
                'price' => 'RWF 280,000,000',
                'bedrooms' => null,
                'bathrooms' => null,
                'area' => '800 m²',
                'features' => ['Prime Location', 'Clean Title', 'Road Access', 'Utilities Available', 'Commercial Zoning', 'High Traffic Area'],
            ],
            [
                'title' => 'Modern Apartment - Gacuriro',
                'type' => 'Residential',
                'status' => 'For Rent',
                'location' => 'Gacuriro, Kigali',
                'description' => 'Fully furnished 2-bedroom apartment with modern kitchen, balcony, parking, and 24/7 security. Close to schools and shopping centers.',
                'price' => 'RWF 800,000/month',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => '120 m²',
                'features' => ['Fully Furnished', 'Parking', '24/7 Security', 'Modern Kitchen', 'Balcony', 'WiFi', 'Backup Generator'],
            ],
            [
                'title' => 'Agricultural Farm - Rwamagana',
                'type' => 'Farm',
                'status' => 'For Sale',
                'location' => 'Rwamagana, Eastern Province',
                'description' => '5-hectare fertile agricultural land with water access, perfect for crops or livestock. Includes small farmhouse and storage facilities.',
                'price' => 'RWF 95,000,000',
                'bedrooms' => null,
                'bathrooms' => null,
                'area' => '5 hectares',
                'features' => ['Water Access', 'Fertile Soil', 'Farmhouse', 'Storage Facility', 'Fenced', 'Road Access', 'Irrigation System'],
            ],
            [
                'title' => 'Downtown Office Space',
                'type' => 'Commercial',
                'status' => 'For Rent',
                'location' => 'CBD, Kigali',
                'description' => 'Premium 200 sqm office space in the heart of Kigali\'s business district. Includes parking, high-speed internet, and modern facilities.',
                'price' => 'RWF 3,500,000/month',
                'bedrooms' => null,
                'bathrooms' => 2,
                'area' => '200 m²',
                'features' => ['High-Speed Internet', 'Parking', 'Modern Facilities', 'Air Conditioning', '24/7 Access', 'Conference Room', 'Reception Area'],
            ],
            [
                'title' => 'Family Home - Nyarutarama',
                'type' => 'Residential',
                'status' => 'For Sale',
                'location' => 'Nyarutarama, Kigali',
                'description' => 'Beautiful 3-bedroom house in secure estate with garden, garage, and modern finishes. Quiet neighborhood with great amenities.',
                'price' => 'RWF 180,000,000',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => '280 m²',
                'features' => ['Secure Estate', 'Garden', 'Garage', 'Modern Finishes', 'Quiet Location', 'Solar Panels', 'Water Tank'],
            ],
            [
                'title' => 'Residential Plot - Kicukiro',
                'type' => 'Land',
                'status' => 'For Sale',
                'location' => 'Kicukiro, Kigali',
                'description' => '600 sqm residential plot with clean title, ready to build. Located in developing area with good infrastructure and road access.',
                'price' => 'RWF 45,000,000',
                'bedrooms' => null,
                'bathrooms' => null,
                'area' => '600 m²',
                'features' => ['Clean Title', 'Ready to Build', 'Road Access', 'Electricity Available', 'Water Access', 'Developing Area'],
            ],
            [
                'title' => 'Warehouse & Industrial Space',
                'type' => 'Commercial',
                'status' => 'For Rent',
                'location' => 'Masaka, Kigali',
                'description' => 'Large 500 sqm warehouse with high ceilings, loading dock, office space, and 24/7 security. Ideal for storage or light manufacturing.',
                'price' => 'RWF 2,800,000/month',
                'bedrooms' => null,
                'bathrooms' => 1,
                'area' => '500 m²',
                'features' => ['High Ceilings', 'Loading Dock', 'Office Space', '24/7 Security', 'Parking', 'Three-Phase Power', 'Fire Safety System'],
            ],
            [
                'title' => 'Coffee Plantation - Huye',
                'type' => 'Farm',
                'status' => 'For Sale',
                'location' => 'Huye, Southern Province',
                'description' => '10-hectare coffee plantation with established trees, processing facility, and workers\' housing. Excellent investment opportunity.',
                'price' => 'RWF 250,000,000',
                'bedrooms' => null,
                'bathrooms' => null,
                'area' => '10 hectares',
                'features' => ['Established Trees', 'Processing Facility', 'Workers Housing', 'Water Source', 'Storage Buildings', 'Equipment Included', 'Fertile Land'],
            ],
            [
                'title' => 'Studio Apartment - Remera',
                'type' => 'Residential',
                'status' => 'For Rent',
                'location' => 'Remera, Kigali',
                'description' => 'Cozy studio apartment perfect for young professionals. Furnished, with kitchenette, WiFi, and close to public transport.',
                'price' => 'RWF 350,000/month',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'area' => '45 m²',
                'features' => ['Furnished', 'WiFi', 'Kitchenette', 'Security', 'Close to Transport', 'Utilities Included'],
            ],
            [
                'title' => 'Shopping Center Plot',
                'type' => 'Commercial',
                'status' => 'For Sale',
                'location' => 'Nyabugogo, Kigali',
                'description' => '1,200 sqm commercial plot in high-traffic area. Perfect for retail development, shopping center, or commercial complex.',
                'price' => 'RWF 420,000,000',
                'bedrooms' => null,
                'bathrooms' => null,
                'area' => '1,200 m²',
                'features' => ['High Traffic Area', 'Commercial Zone', 'Clean Title', 'Corner Plot', 'Road Access', 'All Utilities', 'Prime Location'],
            ],
            [
                'title' => 'Lakeside Land - Rubavu',
                'type' => 'Land',
                'status' => 'For Sale',
                'location' => 'Rubavu, Western Province',
                'description' => '2,000 sqm lakeside plot with stunning Lake Kivu views. Perfect for resort, hotel, or luxury residence development.',
                'price' => 'RWF 380,000,000',
                'bedrooms' => null,
                'bathrooms' => null,
                'area' => '2,000 m²',
                'features' => ['Lake Views', 'Beach Access', 'Clean Title', 'Tourism Zone', 'Road Access', 'Utilities Available', 'Scenic Location'],
            ],
        ];
    }

    /**
     * Display a listing of all properties.
     */
    public function index()
    {
        $properties = $this->getProperties();

        return view('properties.index', compact('properties'));
    }

    /**
     * Display the specified property.
     */
    public function show($id)
    {
        $properties = $this->getProperties();
        $property = $properties[$id] ?? null;

        if (!$property) {
            abort(404);
        }

        return view('properties.show', compact('property', 'id'));
    }
}
