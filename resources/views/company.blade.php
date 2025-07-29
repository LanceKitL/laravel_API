<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company</title>
</head>
<body>
     <h1>Company: {{ $company->name }}</h1>
    <p><strong>Address:</strong> {{ $company->address }}</p>
    <p><strong>Telephone:</strong> {{ $company->telephone }}</p>
    <p><strong>Email:</strong> {{ $company->email_address }}</p>

    <h2>Owner Information</h2>
    <p><strong>Name:</strong> {{ $company->owner->name }}</p>
    <p><strong>Phone:</strong> {{ $company->owner->mobile_number }}</p>
    <p><strong>Email:</strong> {{ $company->owner->email_address }}</p>

    <h2>Contact Information</h2>
    <p><strong>Name:</strong> {{ $company->contact->name }}</p>
    <p><strong>Phone:</strong> {{ $company->contact->mobile_number }}</p>
    <p><strong>Email:</strong> {{ $company->contact->email_address }}</p>


     <h2>Products</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product GTIN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($company->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->gtin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <a href="/">Back to Companies List</a>
</body>
</html>