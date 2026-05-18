@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Profil Admin
        </h1>

        <p class="text-gray-500 mt-2">
            Kelola informasi akun administrator.
        </p>

    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">

        {{-- TOP --}}
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-8 py-10">

            <div class="flex items-center gap-6">

                <img
                    src="{{ asset('images/admin.png') }}"
                    onerror="this.src='https://ui-avatars.com/api/?name=Admin&background=f97316&color=fff'"
                    class="w-28 h-28 rounded-3xl border-4 border-white object-cover shadow-xl"
                >

                <div class="text-white">

                    <h2 class="text-3xl font-bold">
                        Admin
                    </h2>

                    <p class="text-orange-100 mt-1">
                        Super Administrator
                    </p>

                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="p-8">

            <form>

                {{-- NAMA --}}
                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        value="Admin"
                        class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                    >

                </div>

                {{-- EMAIL --}}
                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        value="admin@pempekratu.com"
                        class="w-full rounded-2xl border border-gray-300 px-5 py-4 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                    >

                </div>

                {{-- ROLE --}}
                <div class="mb-8">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Role
                    </label>

                    <input
                        type="text"
                        value="Super Admin"
                        disabled
                        class="w-full rounded-2xl border border-gray-300 bg-gray-100 px-5 py-4 text-gray-500"
                    >

                </div>

                {{-- BUTTON --}}
                <div class="flex items-center gap-4">

                    <button
                        type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-semibold transition shadow-lg"
                    >
                        Simpan Perubahan
                    </button>

                    <button
                        type="reset"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-8 py-4 rounded-2xl font-semibold transition"
                    >
                        Reset
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection