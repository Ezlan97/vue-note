<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app" class="app">
        <notes-app :user="{{ Auth::user() }}"></notes-app>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>