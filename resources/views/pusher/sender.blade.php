<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Chat</title>
    <link href="../../css/app.css" rel="stylesheet">
</head>
<body>
    <div id="messages"></div>
    <form method="post" action="/sender" id="message_form">
        @csrf
        <input type="text" name = "text" id="message_input">
        <input type="submit">
    </form>
    <script src="../../js/app.js"></script>
</body>
</html>