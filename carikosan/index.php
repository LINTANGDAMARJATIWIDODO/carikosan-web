<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Kosan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
            /* Light gray background */
        }

        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <?php
    // Data kosan contoh
    // Dalam aplikasi nyata, data ini akan diambil dari database.
    $kosan_list = [
        [
            'id' => 1,
            'name' => 'Kosan Nyaman Cilandak',
            'location' => 'Cilandak, Jakarta Selatan',
            'price' => '1.500.000',
            'image' => 'kosan4.jpg', // Gambar kamar modern
            'features' => ['AC', 'WiFi', 'Kamar Mandi Dalam'],
            'description' => 'Kosan modern dengan fasilitas lengkap di pusat Cilandak. Dekat dengan area perkantoran dan pusat perbelanjaan. Lingkungan tenang dan aman.',
            'rating' => 4.3, // Updated rating to match image
            'reviews_count' => 15034, // Updated count to match image
            'gallery' => [
                'https://placehold.co/800x600/FF5757/FFFFFF?text=Kamar+Utama',
                'https://placehold.co/400x300/FF5757/FFFFFF?text=Kamar+Mandi',
                'https://placehold.co/400x300/FF5757/FFFFFF?text=Dapur+Bersama',
                'https://placehold.co/400x300/FF5757/FFFFFF?text=Area+Umum',
                'https://placehold.co/400x300/FF5757/FFFFFF?text=Lobi',
                'https://placehold.co/400x300/FF5757/FFFFFF?text=Eksterior',
            ],
            'reviews' => [
                ['user' => 'Sidikbangun Nurfajar', 'rating' => 1, 'comment' => 'ada kecoa'], // Example review from image
                ['user' => 'Ani Susanti', 'rating' => 5, 'comment' => 'Kosan sangat bersih dan nyaman, fasilitas lengkap. Dekat kemana-mana. Recommended!'],
                ['user' => 'Budi Santoso', 'rating' => 4, 'comment' => 'Harga sesuai dengan fasilitas. Hanya saja kadang parkir agak penuh.'],
            ]
        ],
        [
            'id' => 2,
            'name' => 'Kosan Strategis Depok',
            'location' => 'Beji, Depok',
            'price' => '1.200.000',
            'image' => 'kosan1.jpg', // Gambar kamar minimalis
            'features' => ['WiFi', 'Dapur Bersama'],
            'description' => 'Kosan minimalis di lokasi strategis dekat kampus UI dan stasiun KRL. Cocok untuk mahasiswa dan pekerja. Lingkungan ramai dan banyak pilihan kuliner.',
            'rating' => 4.2,
            'reviews_count' => 85,
            'gallery' => [
                'https://placehold.co/800x600/5757FF/FFFFFF?text=Kamar+Utama+Depok',
                'https://placehold.co/400x300/5757FF/FFFFFF?text=Dapur+Depok',
                'https://placehold.co/400x300/5757FF/FFFFFF?text=Teras+Depok',
            ],
            'reviews' => [
                ['user' => 'Citra Dewi', 'rating' => 4, 'comment' => 'Kosan lumayan, wifi kencang. Agak bising karena dekat jalan raya.'],
                ['user' => 'Dika Pratama', 'rating' => 5, 'comment' => 'Sangat dekat dengan kampus, cocok buat saya yang sering pulang malam.'],
            ]
        ],
        [
            'id' => 3,
            'name' => 'Kosan Elite Bandung',
            'location' => 'Dago, Bandung',
            'price' => '2.000.000',
            'image' => 'kosan2.jpg', // Gambar kamar mewah
            'features' => ['AC', 'TV', 'Parkir Luas'],
            'description' => 'Kosan mewah dengan desain modern di kawasan elit Dago, Bandung. Dekat dengan factory outlet dan tempat wisata. Cocok untuk eksekutif muda.',
            'rating' => 4.8,
            'reviews_count' => 210,
            'gallery' => [
                'https://placehold.co/800x600/57FF57/FFFFFF?text=Kamar+Utama+Bandung',
                'https://placehold.co/400x300/57FF57/FFFFFF?text=Ruang+Tamu+Bandung',
                'https://placehold.co/400x300/57FF57/FFFFFF?text=Kolam+Renang+Bandung',
            ],
            'reviews' => [
                ['user' => 'Eka Putri', 'rating' => 5, 'comment' => 'Kosan terbaik yang pernah saya tempati di Bandung. Fasilitas bintang lima!'],
                ['user' => 'Fajar Nugraha', 'rating' => 5, 'comment' => 'Nyaman sekali, parkir luas, dan lokasi strategis.'],
            ]
        ],
        [
            'id' => 4,
            'name' => 'Kosan Murah Surabaya',
            'location' => 'Manyar, Surabaya',
            'price' => '900.000',
            'image' => 'kosan3.jpg', // Gambar kamar sederhana
            'features' => ['Kamar Mandi Luar', 'Kasur'],
            'description' => 'Kosan ekonomis di area Manyar, Surabaya. Cocok untuk budget terbatas. Dekat dengan pasar tradisional dan akses transportasi umum.',
            'rating' => 3.9,
            'reviews_count' => 60,
            'gallery' => [
                'https://placehold.co/800x600/FF5757/FFFFFF?text=Kamar+Utama+Sby',
                'https://placehold.co/400x300/FF5757/FFFFFF?text=Kamar+Mandi+Luar',
            ],
            'reviews' => [
                ['user' => 'Gita Lestari', 'rating' => 3, 'comment' => 'Sesuai harga, tapi kamar mandi di luar agak kurang nyaman.'],
                ['user' => 'Hadi Wibowo', 'rating' => 4, 'comment' => 'Murah dan cukup bersih. Pemilik ramah.'],
            ]
        ],
    ];
    ?>

    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto px-4 flex flex-col sm:flex-row justify-between items-center">
            <a href="#" class="text-red-600 text-3xl font-bold rounded-md py-1 px-2 mb-4 sm:mb-0">
                cari<span class="text-gray-800">kosan</span>
            </a>
            <nav class="w-full sm:w-auto">
                <ul class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-6 items-center">
                    <li><a href="#" class="text-gray-700 hover:text-red-600 font-medium">Beranda</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-red-600 font-medium">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-red-600 font-medium">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="bg-red-600 py-12 md:py-16 text-white relative overflow-hidden">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4">Temukan Kosan Impianmu Sekarang!</h1>
            <p class="text-base md:text-lg lg:text-xl mb-6 md:mb-8">Pilihan kosan terbaik di berbagai kota, sesuai
                kebutuhanmu.</p>

            <div class="bg-white p-4 md:p-6 rounded-xl shadow-lg max-w-3xl mx-auto">
                <form action="#" method="GET" class="flex flex-col md:flex-row gap-3 md:gap-4">
                    <div class="flex-1">
                        <label for="location" class="sr-only">Lokasi</label>
                        <input type="text" id="location" name="location" placeholder="Cari lokasi kosan..."
                            class="w-full p-2 md:p-3 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 text-gray-800 shadow-sm text-sm md:text-base"
                            value="Jakarta Selatan">
                    </div>
                    <div class="flex-1">
                        <label for="price_range" class="sr-only">Rentang Harga</label>
                        <select id="price_range" name="price_range"
                            class="w-full p-2 md:p-3 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 text-gray-800 shadow-sm text-sm md:text-base">
                            <option value="">Rentang Harga</option>
                            <option value="<1jt"> &lt; Rp 1.000.000</option>
                            <option value="1jt-2jt">Rp 1.000.000 - Rp 2.000.000</option>
                            <option value=">2jt"> &gt; Rp 2.000.000</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 md:py-3 px-4 md:px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 text-base md:text-lg">
                        Cari Kosan
                    </button>
                </form>
            </div>
        </div>
    </section>

    <main class="container mx-auto px-4 py-8 md:py-12 flex-grow">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 md:mb-8 text-center">Pilihan Kosan Terbaik Untukmu
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
            <?php foreach ($kosan_list as $kosan): ?>
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl">
                    <img src="<?php echo htmlspecialchars($kosan['image']); ?>"
                        alt="Gambar Kosan <?php echo htmlspecialchars($kosan['name']); ?>"
                        class="w-full h-48 object-cover object-center rounded-t-xl"
                        onerror="this.onerror=null;this.src='https://placehold.co/400x300/FF5757/FFFFFF?text=Gambar+Tidak+Tersedia';">
                    <div class="p-4 md:p-5">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-1 md:mb-2">
                            <?php echo htmlspecialchars($kosan['name']); ?>
                        </h3>
                        <p class="text-gray-600 text-xs md:text-sm mb-2 md:mb-3"><i class="fas fa-map-marker-alt mr-1"></i>
                            <?php echo htmlspecialchars($kosan['location']); ?></p>
                        <div class="flex items-baseline mb-3 md:mb-4">
                            <span class="text-xl md:text-2xl font-bold text-red-600">Rp
                                <?php echo htmlspecialchars($kosan['price']); ?></span>
                            <span class="text-gray-500 ml-1 md:ml-2 text-sm">/ bulan</span>
                        </div>
                        <div class="flex flex-wrap gap-1 md:gap-2 text-sm mb-3 md:mb-4">
                            <?php foreach ($kosan['features'] as $feature): ?>
                                <span class="bg-gray-200 text-gray-700 px-2 py-0.5 rounded-full text-xs font-medium">
                                    <?php echo htmlspecialchars($feature); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                        <a href="detail.php?id=<?php echo htmlspecialchars($kosan['id']); ?>"
                            class="block w-full bg-red-600 hover:bg-red-700 text-white text-center font-semibold py-2 md:py-3 rounded-lg transition duration-300 ease-in-out shadow-md text-sm md:text-base">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-6 md:py-8 mt-8 md:mt-12">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm md:text-base">&copy; <?php echo date("Y"); ?> KosanCari. Semua Hak Dilindungi.</p>
            <div
                class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4 mt-4 text-sm md:text-base">
                <a href="#" class="text-gray-400 hover:text-white">Kebijakan Privasi</a>
                <a href="#" class="text-gray-400 hover:text-white">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

</body>

</html>