<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal Orang Tua - SMK INFOKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-red-50 to-gray-100 flex items-center justify-center">
    <div class="w-full max-w-md px-6">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-red-600 px-8 py-8 text-center">
                <i class="fa fa-users text-white text-4xl mb-3"></i>
                <h1 class="text-white font-bold text-xl">Portal Orang Tua</h1>
                <p class="text-red-200 text-sm mt-1">SMK INFOKOM Kota Bogor</p>
            </div>
            <div class="px-8 py-8">
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 mb-4 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif
                <p class="text-sm text-gray-600 mb-5 bg-red-50 rounded-lg p-3 border border-red-100">
                    <i class="fa fa-info-circle text-red-500 mr-1"></i>
                    Login menggunakan email dan password yang diberikan oleh pihak sekolah.
                </p>
                <form method="POST" action="{{ route('portal.ortu.login.post') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-red-500"
                            placeholder="ortu@smkinfokom.sch.id">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-red-500"
                            placeholder="••••••••">
                    </div>
                    <button type="submit" class="w-full bg-red-600 text-white rounded-lg py-3 font-semibold hover:bg-red-700 transition">
                        <i class="fa fa-sign-in-alt mr-2"></i> Masuk ke Portal
                    </button>
                </form>
                <div class="mt-6 text-center text-sm text-gray-500">
                    <p>Akun demo: <strong>ortu@smkinfokom.sch.id</strong> / <strong>ortu123</strong></p>
                    <a href="{{ route('home') }}" class="block mt-3 text-gray-400 hover:text-gray-600">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali ke Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
