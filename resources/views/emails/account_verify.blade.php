<!DOCTYPE html>
<html>

<head>
    <title>Welcome - AI Pro Resume</title>
</head>

<body>
    <center>
        <div style="width: 200px; height: 100px">
            <img style="width: 100%" src="https://aiproresume.com/static/media/logo_resume.95d8170360850b4b51ee.png"
                alt="AIProresume Logo">
        </div>
    </center>

    <div style="width: fit-content; margin: auto;">
        <p>
            <strong>Dear {{ $data['to_name'] }},</strong><br><br>
            Thank you for choosing AI Pro Resume. To verify your email, please click the button below:<br><br>

            <a href="{{ $data['verification_url'] }}" 
               style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                Verify Email
            </a>

            <br><br>
                If the button does not work, you can also copy and paste this link into your browser:<br><br>
            <br><br>
            
            <strong>{{ $data['verification_url'] }}</strong><br><br>

            Thank you for trusting AI Pro Resume.<br><br>
            Best regards,<br>
            <strong>The AI Pro Resume Team</strong>
        </p>
    </div>
</body>

</html>
