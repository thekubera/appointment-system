<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Appointment System</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="height: 100vh; width: 100vw; display: flex; flex-direction: column;justify-content: center; align-items: center;">
	<h2 class="text-2xl mb-6">Appointment System</h2>
	<div class="my-16">
		<a class="m-4 text-lg font-bold bg-blue-400 text-white p-10 rounded" href="{{route('officer_index')}}">Officer</a>
			<a class="m-4 text-lg font-bold bg-yellow-400 text-white p-10 rounded" href="{{route('visitor_index')}}">Visitor</a>
			<a class="m-4 text-lg font-bold bg-green-400 text-white p-10 rounded" href="{{route('activity_index')}}">Activity</a>
	</div>
</body>
</html>