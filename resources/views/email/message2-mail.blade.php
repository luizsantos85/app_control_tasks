<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        header {
            margin: 0 auto;
            width: 100%;
            text-align: center;
        }

        img {
            width: 50px;
            height: 50px;
        }

        main {
            margin: 0 auto;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>

    <header>
        <img src="{{asset('img/logo.png')}}" alt="">
        <h1>Mensagem de email pela VIEW</h1>

    </header>
    <main>
        <div>
            <h2>Corpo da mensagem</h2>


            <button>Botão 2</button>

            Obrigado,<br>
            {{ config('app.name') }}
        </div>
    </main>


</body>

</html>