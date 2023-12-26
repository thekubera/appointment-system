<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Appointment</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
	<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
		<thead>
			<tr>
				<th scope="col" class="px-6 py-6">S.N</th>
				<th scope="col" class="px-6 py-3">Activity Name</th>
				<th scope="col" class="px-6 py-3">Activity Type</th>
				<th scope="col" class="px-6 py-3">Officer Name</th>
				<th scope="col" class="px-6 py-3">Visitor Name</th>
				<th scope="col" class="px-6 py-3">Activity Status</th>
				<th scope="col" class="px-6 py-3">Activity Date</th>
				<th scope="col" class="px-6 py-3">Start Time</th>
				<th scope="col" class="px-6 py-3">End Time</th>

			</tr>
		</thead>

		<tbody id="activity_data">
			@php
	    		$counter = 1;
			@endphp

			@foreach($data as $value) 
				<tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
					<td class="px-6 py-4">{{ $counter }}</td>
					<td class="px-6 py-4">{{ $value->aname }}</td>
					<td class="px-6 py-4">{{ $value->atype }}</td>
					<td class="px-6 py-4">{{ $value->oname }}</td>
					<td class="px-6 py-4">{{ $value->vname }}</td>
					<td class="px-6 py-4">{{ $value->astatus }}</td>
					<td class="px-6 py-4">{{ $value->adate }}</td>		
					<td class="px-6 py-4"> {{ date("h:i: A", strtotime($value->startTime)) }} </td>
					<td class="px-6 py-4"> {{ date("h:i: A", strtotime($value->endTime)) }} </td>
				</tr>
				@php
	    			$counter++;
				@endphp
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>