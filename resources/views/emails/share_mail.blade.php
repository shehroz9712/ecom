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
    <p><strong>Dear Hiring Manager,</strong></p>
    <p>I hope this email finds you well. I am {{ $user->name }} and am eager to apply for the required position at
        your esteemed organization. I am confident in my ability to contribute effectively to your team.</p>
    <p>I have attached my {{ $type }} for your review. In it, I elaborate on how my background and skills make
        me an excellent fit for your team.</p>
    <p><strong>Link:</strong></p>
    <p>Here is the link to my {{ $type }}</p>
    <p><a href="{{ $link }}">{{ $link }}</a></p>
    <p>Thank you for considering my application. I look forward to discussing how my background, skills, and enthusiasm
        can contribute to the continued success of your organization. Please get in touch via email address if you have
        any questions or need further information.</p>
    <p><strong>Best Regards,</strong></p>
    <p>{{ $user->name }}</p>
    <p>{{ $user->email }}</p>
</body>

</html>
