<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Submitted</title>
</head>
<body>
    <center>
        <div style="width: 200px; height: 100px">
            <img style="width: 100%" src="https://aiproresume.com/static/media/logo_resume.95d8170360850b4b51ee.png" alt="AIProresume Logo" srcset="">
        </div>
    </center>

    {{-- Header --}}
    <h1>Dear, {{ $user->name }}</h1>
    <p>Your ordered service has been delievered, below is the detailed information:</p>
    <br>
    <p>Service: <strong>{{ $service }}</strong></p>
    <p>File Link: <strong><a href="{{ url('delivered_files/' . $file_name) }}">Click Here</a></strong></p>
</body>
</html>
