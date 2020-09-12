<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CoM Database</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>

        <script type="text/javascript">
            setTimeout(function() {window.location='dangers'}, 3000);
        </script>
    </head>
    <body class="antialiased">
        Successfully created danger <b>{{ $danger_name }}</b>. <br /> <br />

        Redirecting you to the home page in 3 seconds...
    </body>
</html>
