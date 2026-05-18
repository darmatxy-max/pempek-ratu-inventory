<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pempek Ratu</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-50 text-gray-800 antialiased">

@include('layouts.navbar')
@if(session('success'))

<div class="fixed top-5 right-5 bg-green-500 text-white px-6 py-4 rounded-2xl shadow-xl z-50">
    {{ session('success') }}
</div>

@endif

@if(session('error'))

<div class="fixed top-5 right-5 bg-red-500 text-white px-6 py-4 rounded-2xl shadow-xl z-50">
    {{ session('error') }}
</div>

@endif

@if(session('success'))

<div class="max-w-7xl mx-auto mt-5">

    <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">

        {{ session('success') }}

    </div>

</div>

@endif

@if(session('error'))

<div class="max-w-7xl mx-auto mt-5">

    <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl">

        {{ session('error') }}

    </div>

</div>
@if(session('success'))

<div id="toast-success"
     class="fixed top-5 right-5 bg-green-500 text-white px-6 py-4 rounded-2xl shadow-2xl z-50">

    {{ session('success') }}

</div>

<script>
setTimeout(() => {
    document.getElementById('toast-success').remove();
}, 3000);
</script>

@endif

@endif

<main>

@yield('content')

</main>

@include('layouts.footer')

</body>

</html>