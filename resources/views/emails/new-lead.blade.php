{{-- resources/views/emails/new-lead.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>New Estimate Request</title>
</head>
<body>
    <h1>New Estimate Request Received!</h1>
    <p>A new lead has been submitted through the website.</p>
    <hr>
    <ul>
        <li><strong>Name:</strong> {{ $lead->client_full_name }}</li>
        <li><strong>Email:</strong> {{ $lead->client_email }}</li>
        <li><strong>Phone:</strong> {{ $lead->client_phone }}</li>
        <li><strong>Service Type:</strong> {{ $lead->service_type }}</li>
        <li><strong>Urgency:</strong> {{ $lead->urgency_level }}</li>
        <li><strong>Address:</strong> {{ $lead->service_address }}</li>
    </ul>
    <hr>
    <h3>Description:</h3>
    <p>{{ $lead->job_description }}</p>
    <hr>
    <p>You can view the full details in your admin panel.</p>
</body>
</html>
