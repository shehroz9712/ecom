<!DOCTYPE html>
<html>

<head>
    <title>Welcome - Resumebuilder</title>
</head>

<body>
    <center>
        <div style="width: 200px; height: 100px">
            <img style="width: 100%" src="https://aiproresume.com/static/media/logo_resume.95d8170360850b4b51ee.png"
                alt="AIProresume Logo" srcset="">
        </div>
    </center>

    <p>Dear <strong>{{ $name }},</strong></p>
    <p>This is to inform you that your <strong>{{ $package_name }}</strong> package is about to expire on
        <strong>{{ \Carbon\Carbon::parse($expiry_date)->format('d M, Y') }}.</strong>
    </p>
    <p>Kindly upgrade your package to take benefit of advanced features of <strong>Aiproresume</strong>. You may use <strong>{{ $coupon_code }}</strong> coupon code to get 5% OFF on your next order.</p>
    <br>
    <p>Regards,</p>
    <p><a href="https://aiproresume.com/">Aiproresume</a></p>
</body>

</html>
