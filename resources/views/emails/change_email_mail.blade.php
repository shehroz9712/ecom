<!DOCTYPE html>
<html>

<head>
    <title>Welcome - AI Pro Resume</title>
</head>

<body>
    <div style="width:fit-content; margin:auto">
        <p>
            <strong>Dear {{ $user->name }},</strong><br><br>
            Thank you for choosing AI Pro Resume. To change your email, please use the following verification
            code:<br><br>
            <strong>Verification Code: {{ $verifyCode }}</strong><br><br>
            Enter this code on the AI Pro Resume platform to confirm your email address and gain access to our premium
            features.<br>
            Thank you for trusting AI Pro Resume.<br><br>
            Best regards,<br>
            <strong>The AI Pro Resume Team</strong>
        </p>
    </div>
</body>

</html>
