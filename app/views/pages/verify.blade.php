<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>{{ Lang::get('strings.verification_email_title') }}</h2>

        <div>
            {{ Lang::get('strings.verification_email') }}
            {{ URL::to('registo/verificar/' . $confirmation_code) }}.<br/>
        </div>

    </body>
</html>