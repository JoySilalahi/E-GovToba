

<?php $__env->startSection('content'); ?>
<div class="bg-blue-50 min-h-screen flex flex-col">
    <div class="bg-blue-900 py-6 px-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold">Desa Meat</h1>
                <span class="text-lg font-semibold">900</span>
            </div>
            <div class="flex gap-4">
                <a href="#" class="text-white">Beranda</a>
                <a href="#" class="text-white">Detail Kabupaten</a>
                <a href="#" class="text-white">Daftar Desa</a>
            </div>
        </div>
        <div class="mt-4">
            <img src="/images/desa-meat.jpg" alt="Desa Meat" class="w-full h-48 object-cover rounded-lg">
        </div>
    </div>
    <div class="container mx-auto py-8 flex flex-col gap-8">
        <div class="flex gap-8">
            <div class="flex-1">
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-bold mb-2">Visi & Misi</h2>
                    <p class="mb-2"><strong>Visi:</strong> Mewujudkan Desa Meat yang Mandiri, Sejahtera, dan Berbudaya berdasarkan nilai-nilai kearifan lokal.</p>
                    <p><strong>Misi:</strong> Meningkatkan kualitas sumber daya manusia, mengoptimalkan potensi desa, memperkuat tata kelola pemerintahan desa, dan melestarikan budaya lokal.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-bold mb-2">Pengumuman</h2>
                    <div class="space-y-2">
                        <div class="bg-blue-100 border-l-4 border-blue-500 p-4 rounded">
                            <strong>Program Bantuan Layanan E-GovToba</strong>
                            <p>Pendaftaran dibuka hingga 10 Desember 2025.</p>
                        </div>
                        <div class="bg-blue-100 border-l-4 border-blue-500 p-4 rounded">
                            <strong>Pengumuman Vaksin Berkelanjutan</strong>
                            <p>Vaksinasi warga desa tahap 2 dimulai 15 Desember 2025.</p>
                        </div>
                        <div class="bg-blue-100 border-l-4 border-blue-500 p-4 rounded">
                            <strong>Pelatihan Digitalisasi</strong>
                            <p>Pelatihan digitalisasi desa akan dilaksanakan pada Januari 2026.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold mb-2">Transparansi Anggaran Desa</h2>
                    <p>Dokumen laporan realisasi anggaran Desa Meat tersedia untuk diunduh.</p>
                    <div class="mt-2">
                        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">Laporan APBD 2025</a>
                    </div>
                </div>
            </div>
            <div class="w-80 flex-shrink-0">
                <div class="bg-white rounded-lg shadow p-6 mb-6 flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-200 rounded-full mb-4 flex items-center justify-center">
                        <span class="text-gray-400 text-6xl">👤</span>
                    </div>
                    <div class="text-center">
                        <div class="font-bold">Joni, Kepala Desa</div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-bold mb-2">Kontak</h3>
                    <ul class="text-sm space-y-1">
                        <li>Email: meatdesa@email.com</li>
                        <li>Telepon: 0812-3456-7890</li>
                        <li>Alamat: Jl. Raya Meat No. 1</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-blue-900 text-white py-6 mt-auto">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="mb-2 md:mb-0">&copy; 2025 Desa Meat. All rights reserved.</div>
            <div class="flex gap-4">
                <a href="#" class="text-white">Kebijakan Privasi</a>
                <a href="#" class="text-white">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\E-GovToba\resources\views/desa-meat.blade.php ENDPATH**/ ?>