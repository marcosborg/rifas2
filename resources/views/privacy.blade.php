<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Causas.net | Política de privacidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <img src="/assets/logo.png" alt="causas.net" width="150">
        <div class="mt-4">
            <a href="/terms" class="btn btn-primary btn-sm">Termos e condições de utilização</a>
            <a href="/privacy" class="btn btn-success btn-sm">Política de privacidade</a>
        </div>
        <div class="mt-5">
            <h4 class="mb-4">Política de privacidade</h4>
            {!! $privacy->page_text !!}
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>