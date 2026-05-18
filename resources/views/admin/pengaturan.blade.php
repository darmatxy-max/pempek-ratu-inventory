@extends('admin.layouts.app')

@section('content')

<div class="bg-white rounded-3xl shadow-sm p-8">

    <h1 class="text-3xl font-bold text-gray-800 mb-2">
        Pengaturan Admin
    </h1>

    <p class="text-gray-500 mb-8">
        Pengaturan sistem admin Pempek Ratu
    </p>

    <div class="grid md:grid-cols-2 gap-6">

        <div class="border rounded-2xl p-6">
            <h2 class="font-bold text-lg mb-2">
                Mode Sistem
            </h2>

            <p class="text-gray-500 text-sm">
                Atur tampilan dan preferensi dashboard.
            </p>
        </div>

        <div class="border rounded-2xl p-6">
            <h2 class="font-bold text-lg mb-2">
                Keamanan
            </h2>

            <p class="text-gray-500 text-sm">
                Pengaturan password dan keamanan akun.
            </p>
        </div>

    </div>

</div>

@endsection