<!doctype html>
<html lang="pt-BR" id="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado - {{ $user->name }}</title>

    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }

        @page {
            margin-top: 0.3em;
            margin-bottom: 0.3em;
            margin-left: 0.1em;
            margin-right: 0.1em;
        }

        body {
            background-image: url("https://s3-sa-east-1.amazonaws.com/multipla-uploads/helpers/certificado-ead.png");
            background-position: center center;
            background-repeat: no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            padding-top: 21.6rem;
        }

        .content-name {
            width: 100%;
            height: 75px;
            border: solid 0px #CCCCCC;
            margin: 0px 0px 35px 0px;
            text-align: center;
            font-size: 1.3rem;
            color: #96338a;
            text-transform: uppercase;
        }

        .content-text {
            width: 100%;
            height: 100px;
            border: solid 0px #CCCCCC;
            margin: 0px 0px 155px 0px;
            text-align: center;
            font-size: 1.5rem;
            color: #373737;
        }

        .content-verification {
            max-width: 1500px;
            height: 100px;
            border: solid 0px #CCCCCC;
            margin: 0px auto;
            text-align: center;
            font-size: 1.0rem;
            color: #96338a;
        }

    </style>


</head>
<body>


<div class="content-name">
    <h1>{{ $user->name }} {{ $user->last_name }}</h1>
</div>

<div class="content-text">
    <p>
        Concluiu com êxito o {{ $course->name }}<br/>
        em {{ \Carbon\Carbon::parse($course->final_date)->format('d/m/y') }} com carga horária
        de {{ $course->workload }} horas.
    </p>
</div>



<div class="content-verification">
    <p></p>
</div>


</body>
</html>