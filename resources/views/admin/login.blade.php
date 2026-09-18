<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMK INFOKOM Kota Bogor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-900 flex items-center justify-center">
    <div class="w-full max-w-md px-6">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="bg-red-700 px-8 py-8 text-center">
                <i class="fa fa-shield-halved text-white text-4xl mb-3"></i>
                <h1 class="text-white font-bold text-xl">Portal Admin</h1>
                <p class="text-red-200 text-sm mt-1">SMK INFOKOM Kota Bogor</p>
            </div>
            <div class="px-8 py-8">
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 mb-4 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                            placeholder="admin@smkinfokom.sch.id">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                            placeholder="••••••••">
                    </div>
                    <button type="submit" class="w-full bg-red-700 text-white rounded-lg py-3 font-semibold hover:bg-red-800 transition">
                        <i class="fa fa-sign-in-alt mr-2"></i> Masuk sebagai Admin
                    </button>
                </form>
                <div class="mt-4 p-3 bg-red-50 rounded-lg text-center text-xs text-red-800 border border-red-100">
                    Akun Demo Admin: <code>admin@smkinfokom.sch.id</code> / <code>admin123</code>
                </div>
                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-gray-700">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali ke Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
