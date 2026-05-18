<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Admin Login
</title>

@vite('resources/css/app.css')

</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">

<div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md">

<div class="text-center mb-8">

<h1 class="text-4xl font-black text-orange-500">
Pempek Ratu
</h1>

<p class="text-gray-500 mt-2">
Admin Panel Login
</p>

</div>

@if(session('error'))

<div class="bg-red-100 text-red-600 p-3 rounded-xl mb-5">

{{ session('error') }}

</div>

@endif

<form action="/admin/login"
method="POST"
class="space-y-5">

@csrf

<div>

<label class="block mb-2 font-semibold">
Username
</label>

<input type="text"
name="username"
class="w-full border p-4 rounded-2xl focus:ring-2 focus:ring-orange-500 outline-none">

</div>

<div>

<label class="block mb-2 font-semibold">
Password
</label>

<input type="password"
name="password"
class="w-full border p-4 rounded-2xl focus:ring-2 focus:ring-orange-500 outline-none">

</div>

<button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl font-bold transition">

Login Admin

</button>

</form>

</div>

</div>

</body>
</html>