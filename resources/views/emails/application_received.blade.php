<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        h3 {
            margin-top: 30px;
            margin-bottom: 10px;
        }
        p {
            margin-bottom: 5px;
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Resume Builder - Job Application Received</h1>
    <p>A user has applied for <strong>{{ $job }}</strong>.</p>

    <h3>Details:</h3>
    <p><strong>Description: </strong>{{ $details }}</p>
    <p><strong>First Name: </strong>{{ $first_name }}</p>
    <p><strong>Last Name: </strong>{{ $last_name }}</p>
    <p><strong>Email: </strong>{{ $email }}</p>
    <p><strong>Phone: </strong>{{ $phone }}</p>

    @if ($portfolio_link)
        <p><strong>Portfolio: </strong><a href="{{ $portfolio_link }}">{{ $portfolio_link }}</a></p>
    @endif

    @if ($degree)
        <p><strong>Degree: </strong>{{ $degree }}</p>
    @endif

    @if ($major)
        <p><strong>Major: </strong>{{ $major }}</p>
    @endif

    <p><strong>Resume: </strong><a href="{{ asset('files/' . $resume) }}" download>Download Resume</a></p>
</body>
</html>
