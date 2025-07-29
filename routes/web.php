<?php

use App\Models\Company;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $companies = Company::with('owner', 'contact', 'products')->get();
    
    return view('welcome', compact('companies'));
});

Route::get('/company/{id}', function ($id){
    $company = Company::with('owner', 'contact')->findOrFail($id);

    return view('company', compact('company'));
});


Route::get('/products', function () {
    $products = Product::with('company.owner', 'company.contact')->paginate(10);

    $formattedData = $products->map(function ($product) {
        return [ 
        "name" => [
                'en' => $product->name,
                'fr' => $product->name_fr,
            ],
            'description' => [
                'en' => $product->description,
                'fr' => $product->description_fr,
            ],
            'gtin' => $product->gtin,
            'brand' => $product->brand_name,
            'countryOfOrigin' => $product->country_origin,
            'weight' => [
                'gross' => $product->gross_weight,
                'net' => $product->net_content,
                'unit' => $product->weight_unit
            ],
            'company' => $product->company ? [
                'companyName' => $product->company->name, // Check if company exists before accessing
                'companyAddress' => $product->company->address ?? 'Not available', // Use null coalescing operator for missing fields
                'companyTelephone' => $product->company->telephone ?? 'Not available', // Use null coalescing operator for missing fields
                'companyEmail' => $product->company->email_address ?? 'Not available', // Use null coalescing operator for missing fields
            ] : null,  
            'owner' => $product->company->owner ? [
                'name' => $product->company->owner->name,
                'mobileNumber' => $product->company->owner->mobile_number,
                'email' => $product->company->owner->email_address,
            ] : null,
            'contact' => $product->company->contact? [
                'name' => $product->company->contact->name,
                'mobileNumber' => $product->company->contact->mobile_number,
                'email' => $product->company->contact->email_address,
            ] : null,
        ];
    });

    return response()->json([
        'data' => $formattedData,
        'pagination' => [
            'current_page' => $products->currentPage(),
            'total_pages' => $products->lastPage(),
            'per_page' => $products->perPage(),
            'next_page_url' => $products->nextPageUrl(),
            'prev_page_url' => $products->previousPageUrl(),
        ],
    ]);
});