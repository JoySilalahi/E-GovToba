<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 mb-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h3>
                        <p class="text-blue-100">Anda login sebagai <strong>User</strong></p>
                        <p class="text-sm text-blue-100 mt-1">Email: {{ $user->email }}</p>
                    </div>
                    <div class="hidden md:block">
                        <i class="fas fa-user-circle fa-5x opacity-20"></i>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Status Akun</p>
                            <p class="text-2xl font-semibold text-gray-700">Aktif</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <i class="fas fa-user-tag fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Role Anda</p>
                            <p class="text-2xl font-semibold text-gray-700 capitalize">{{ $user->role }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                            <i class="fas fa-calendar-alt fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Terdaftar Sejak</p>
                            <p class="text-xl font-semibold text-gray-700">{{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Navigasi -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <a href="{{ route('home') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-6 text-center">
                    <div class="text-blue-500 mb-4">
                        <i class="fas fa-home fa-3x"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Beranda</h3>
                    <p class="text-sm text-gray-500">Kembali ke halaman utama</p>
                </a>

                <a href="{{ route('district.villages') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-6 text-center">
                    <div class="text-green-500 mb-4">
                        <i class="fas fa-map-marked-alt fa-3x"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Daftar Desa</h3>
                    <p class="text-sm text-gray-500">Lihat semua desa</p>
                </a>

                <a href="{{ route('district.profile') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-6 text-center">
                    <div class="text-yellow-500 mb-4">
                        <i class="fas fa-info-circle fa-3x"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Profil Kabupaten</h3>
                    <p class="text-sm text-gray-500">Info Kabupaten Toba</p>
                </a>

                <a href="{{ route('profile.edit') }}" class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-6 text-center">
                    <div class="text-purple-500 mb-4">
                        <i class="fas fa-user-edit fa-3x"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Edit Profil</h3>
                    <p class="text-sm text-gray-500">Ubah data akun Anda</p>
                </a>
            </div>

            <!-- Informasi Akun -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">
                    <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                    Informasi Akun
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="border-l-4 border-blue-500 pl-4">
                        <p class="text-sm text-gray-500">Nama Lengkap</p>
                        <p class="text-lg font-semibold text-gray-700">{{ $user->name }}</p>
                    </div>
                    <div class="border-l-4 border-green-500 pl-4">
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="text-lg font-semibold text-gray-700">{{ $user->email }}</p>
                    </div>
                    <div class="border-l-4 border-yellow-500 pl-4">
                        <p class="text-sm text-gray-500">Role</p>
                        <p class="text-lg font-semibold text-gray-700 capitalize">{{ $user->role }}</p>
                    </div>
                    <div class="border-l-4 border-purple-500 pl-4">
                        <p class="text-sm text-gray-500">Status Email</p>
                        <p class="text-lg font-semibold text-gray-700">
                            @if($user->email_verified_at)
                                <span class="text-green-600"><i class="fas fa-check-circle"></i> Terverifikasi</span>
                            @else
                                <span class="text-red-600"><i class="fas fa-times-circle"></i> Belum Terverifikasi</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
