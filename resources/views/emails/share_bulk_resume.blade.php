<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <div style="width: 200px; height: 100px">
            <img style="width: 100%" src="https://aiproresume.com/static/media/logo_resume.95d8170360850b4b51ee.png"
                alt="AIProresume Logo" srcset="">
        </div>
    </center>
    <p>Dear Manager,</p>
    <p>Please find attached the updated resume for candidates interested in the position. Kindly review the provided
        links for additional details.</p>
    <p>Best regards,</p>
    <p>AIProresume</p>
    @foreach ($links as $link)
        <p><a href="{{ $link }}">{{ $link }}</a></p>
    @endforeach
</body>

</html>
