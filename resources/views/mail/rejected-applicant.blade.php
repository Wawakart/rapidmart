
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Rejection</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 500px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .footer {
        text-align: center;
        margin-top: 30px;
    }
</style>
</head>
<body>
<div class="container">

    <div class="message">
        <p>Dear {{ $applicantName }},</p>
        <p>We regret to inform you that after careful consideration, we have decided not to move forward with your application for the {{ $positionName }} at Rapidmart.</p>
        <p>We received a large number of applications, and while we appreciate the time and effort you put into your application, we have selected candidates whose qualifications more closely match the needs of the role.</p>
        <p>We want to thank you for your interest in joining our team and wish you all the best in your job search.</p>
        <p>Sincerely, HR Department</p>
    </div>
    <div class="footer">
        <p>This is an automated message. Please do not reply to this email.</p>
    </div>
</div>
</body>
</html>
