<!DOCTYPE html>
<html>

<head>
    <title>Check Coupon - AI Pro Resume</title>
</head>

<body>
    <center>
        <div style="width: 200px; height: 100px">
            <img style="width: 100%" src="https://aiproresume.com/static/media/logo_resume.95d8170360850b4b51ee.png" alt="AIProresume Logo" srcset="">
        </div>
    </center>

    <div style="width:fit-content; margin:auto">
    <h1>Dear Admin, AI Pro Resume,</h1>
    <h3>You're Coupons is less than 10 please check coupons module from admin panel side.</h3>

    <table width="100%" align="center">
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Remaining Uses</th>
        </tr>
        @foreach($coupons as $coupon)
        <tr>
            <td align="center">{{ $coupon->name }}</td>
            <td align="center">{{ $coupon->code }}</td>
            <td align="center">{{ $coupon->remaining_uses }}</td>
        </tr>
        @endforeach
    </table>    
    
    </div>
</body>

</html>
