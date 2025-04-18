<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body>
    <center>
        <div style="width: 200px; height: 100px">
            <img style="width: 100%" src="https://aiproresume.com/static/media/logo_resume.95d8170360850b4b51ee.png"
                alt="AIProresume Logo" srcset="">
        </div>
    </center>

    <div style="width:fit-content; margin:auto">
        <p><strong>Dear {{ $data['to_name'] }},</strong></p>
        <p>We received a request to reset you AI Pro Resume account password. To proceed with the reset, please use the
            following verification code:</p>
        <p><strong>Verification Code: {{ $data['verify_code'] }}</strong></p>
        <p>Enter this verfication code to verify and reset your account password. Your security is important to us at AI
            Pro Resume.</p>
        <p>If you have any questions or need further assistance, please do not hesitate to contact our support team at
            <strong>info@aiproresume.com.</strong>
        <p>
        <p>Thank you for using AI Pro Resume.</p>
        <p><strong>Best regards,</strong></p>
        <p>AI Pro Resume Team
        <p>
    </div>
</body>

</html>
