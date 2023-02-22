<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>BEM VINDO <?= $_COOKIE['login']?></h1>

    @if ($_COOKIE['nivelAcesso'] == 1)
        <div id="dashADM"></div>

    @endif

    @if ($_COOKIE['nivelAcesso'] == 2)

    @endif

    @if ($_COOKIE['nivelAcesso'] == 3)
        <div id="dashProfessor"></div>

    @endif

	@vite('resources/js/app.js')
</body>
</html>
