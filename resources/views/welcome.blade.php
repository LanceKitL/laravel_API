<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COMPANIES</title>
</head>
<body>
        <h1>Companies Table</h1>
        <table border="1">
            <thead>
                <th>Company Name</th>
                <th>Company Address</th>
                <th>Company Telephone</th>
                <th>Company Email</th>
                <th>Owner Name</th>
                <th>Owner Number</th>
                <th>Owner Email</th>
                <th>Contact Name</th>
                <th>Contact Number</th>
                <th>Contact Email</th>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td><a href="/company/{{ $company->id }}">{{$company->name}}</a></td>
                    <td>{{$company->address}}</td>
                    <td>{{$company->telephone}}</td>
                    <td>{{$company->email_address}}</td>
                    <td>{{$company->owner->name}}</td>
                    <td>{{$company->owner->mobile_number}}</td>
                    <td>{{$company->owner->email_address}}</td>
                    <td>{{$company->contact->name}}</td>
                    <td>{{$company->contact->mobile_number}}</td>
                    <td>{{$company->contact->email_address}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        


</body>
</html>