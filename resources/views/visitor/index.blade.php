<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<title>Visitor-> Home page</title>
</head>
<body data-page-id="visitor" class="h-screen w-screen">

	<button 
		class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto mr-auto mt-10" type="button" data-modal-toggle="add_visitor">
		Add Visitor
	</button>

<div id="add_visitor" tabindex="-1" aria-hidden="true" 
	class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
		<div 
			class="relative p-4 w-full max-w-md h-full md:h-auto">
			<div 
				class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				<button type="button" 
					class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add_visitor">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</button>
			<div class="py-6 px-6 lg:px-8">
				<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Visitor</h3>
			<form class="space-y-6" action="{{ route('visitor_insert') }}" method="POST" id="add_visitor_form">
				
				@csrf
				<div>
					<label for="vname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
					<input type="text" name="name" id="vname" 
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Your name">
					<small name="name" class="bottom-0 left-0 hidden"></small>
					</div>
				<div>
					<label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mobile No</label>
					<input type="text" name="mobile" id="mobile" placeholder="Your mobile no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
					<small name="mobile" class="bottom-0 left-0 hidden"></small>
				</div>

				<div>
					<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
					<input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
					<small name="email" class="bottom-0 left-0 hidden"></small>
				</div>


				<div>
					<label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Status</label>
					<select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
						<option value="Active">Active</option>
						<option value="Inactive">Inactive</option>
					</select>
					<small name="status" class="bottom-0 left-0 hidden"></small>
				</div>

				<button type="submit" 
				class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>

			</form>
			</div>
		</div>
		</div>
	</div>

	<div id="update_visitor" tabindex="-1" aria-hidden="true" 
	class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
		<div 
			class="relative p-4 w-full max-w-md h-full md:h-auto">
			<div 
				class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				<button type="button" 
					class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="update_visitor">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</button>
			<div class="py-6 px-6 lg:px-8">
				<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Visitor</h3>
			<form class="space-y-6" action="#" method="POST" id="update_visitor_form">
				
				@csrf
				<div>
					<label for="uvname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
					<input type="text" name="name" id="uvname" 
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Your name">
					<small name="name" class="bottom-0 left-0 hidden"></small>
					</div>
				<div>
					<label for="umobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mobile No</label>
					<input type="text" name="mobile" id="umobile" placeholder="Your mobile no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
					<small name="mobile" class="bottom-0 left-0 hidden"></small>
				</div>

				<div>
					<label for="uemail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
					<input type="text" name="email" id="uemail" placeholder="Your email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
					<small name="email" class="bottom-0 left-0 hidden"></small>
				</div>

				<button type="submit" 
				class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>

			</form>
			</div>
		</div>
		</div>
	</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
	<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
		<thead>
			<tr>
				<th scope="col" class="px-6 py-3">S.N</th>
				<th scope="col" class="px-6 py-3">Visitor Name</th>
				<th scope="col" class="px-6 py-3">Mobile Number</th>
				<th scope="col" class="px-6 py-3">Email</th>
				<th scope="col" class="px-6 py-3">Status</th>
				<th scope="col" class="px-6 py-3">Action</th>
			</tr>
		</thead>

		<tbody>
			@php
	    		$counter = 1;
			@endphp

			@foreach($data as $value) 
				<tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
					<td class="px-6 py-4">{{ $counter }}</td>
					<td class="px-6 py-4">{{ $value->vname }}</td>
					<td class="px-6 py-4">{{ $value->mobile_no }}</td>
					<td class="px-6 py-4"> {{ $value->email }} </td>

					<td class="px-6 py-4"> 
						<form action="#" method="POST" class="toggle_status">
							@csrf
							<button
								class="
								toggler
								@php
									echo ($value->vstatus == 'Active')?"m-2 p-2 bg-green-500 text-white rounded":"m-2 p-2 bg-red-500 text-white rounded";
								@endphp
								"
								data-id="{{$value->id}}" data-status="{{$value->vstatus}}"
							>
								{{$value->vstatus}}
							</button>
						</form>

					 </td>
					
					<td>
						<button class="m-2 p-2 bg-blue-500 text-white rounded update_visitor_btn" type="button" data-modal-toggle="update_visitor" data-id="{{ $value->id }}"
						data-token={{ csrf_token() }}
						>
						UPDATE
					</button>
						<a class="m-2 p-2 bg-yellow-400 text-white rounded view_appointment_btn" href="/viewVisitorAppointment?id={{ $value->id }} && _token={{ csrf_token() }}">Appointments</a>
					</td>
				</tr>
				@php
	    			$counter++;
				@endphp
			@endforeach
		</tbody>
	</table>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/flowbite.js') }}"></script>
</body>
</html>