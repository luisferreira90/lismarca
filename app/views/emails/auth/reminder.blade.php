<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{Lang::get('strings.password_reset_title')}}</h2>

		<div>
			{{Lang::get('strings.password_reset_email_part_one')}} {{ URL::to('password/reset', array($token)) }}.<br/>
			{{Lang::get('strings.password_reset_email_part_two')}} {{ Config::get('auth.reminder.expire', 60) }} {{Lang::get('strings.minutes')}}.
		</div>
	</body>
</html>
