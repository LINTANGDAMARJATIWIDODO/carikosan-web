<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kosan</title>
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

        /* Styles for the Lightbox Modal */
        .lightbox-modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1000;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
            align-items: center;
            justify-content: center;
        }

        .lightbox-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            /* Ensure the image fits within the bounds */
        }

        .lightbox-close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .lightbox-close:hover,
        .lightbox-close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* Styles for the Success Modal */
        .success-modal {
            display: none;
            position: fixed;
            z-index: 1001;
            /* Higher than lightbox */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            /* Slightly lighter overlay */
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .success-modal.show {
            opacity: 1;
            visibility: visible;
        }

        .success-modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 90%;
            transform: translateY(-20px);
            /* Initial slight upward transform */
            transition: transform 0.3s ease-in-out;
        }

        .success-modal.show .success-modal-content {
            transform: translateY(0);
            /* Animate to original position */
        }

        .success-modal-content h3 {
            font-size: 1.75rem;
            /* text-3xl */
            font-weight: 700;
            /* font-bold */
            color: #10B981;
            /* green-500 */
            margin-bottom: 1rem;
        }

        .success-modal-content p {
            font-size: 1rem;
            /* text-base */
            color: #4B5563;
            /* gray-700 */
            margin-bottom: 1.5rem;
        }

        .success-modal-content button {
            background-color: #EF4444;
            /* red-600 */
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.2s ease-in-out;
        }

        .success-modal-content button:hover {
            background-color: #DC2626;
            /* red-700 */
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <?php
    // Data kosan contoh (sama seperti di index.php)
    // Dalam aplikasi nyata, data ini akan diambil dari database berdasarkan ID.
    $kosan_list = [
        [
            'id' => 1,
            'name' => 'Kosan Nyaman Cilandak',
            'location' => 'Cilandak, Jakarta Selatan',
            'price' => '1.500.000',
            'image' => 'gambar_depan.jpg', // Placeholder for main image
            'features' => ['AC', 'WiFi', 'Kamar Mandi Dalam', 'Dapur Bersama', 'Lemari Pakaian', 'Meja Belajar'],
            'description' => 'Kosan modern dengan fasilitas lengkap di pusat Cilandak. Dekat dengan area perkantoran dan pusat perbelanjaan. Lingkungan tenang dan aman. Cocok untuk mahasiswa dan karyawan. Tersedia layanan kebersihan kamar mingguan.',
            'rating' => 4.3, // Updated rating to match image
            'reviews_count' => 15034, // Updated count to match image
            'gallery' => [
                'gambar_depan.jpg', // Make sure these paths are correct
                'kosan4.jpg',
            ],
            'reviews' => [
                ['user' => 'Sidikbangun Nurfajar', 'rating' => 1, 'comment' => 'ada kecoa'], // Example review from image
                ['user' => 'Ani Susanti', 'rating' => 5, 'comment' => 'Kosan sangat bersih dan nyaman, fasilitas lengkap. Dekat kemana-mana. Recommended!'],
                ['user' => 'Budi Santoso', 'rating' => 4, 'comment' => 'Harga sesuai dengan fasilitas. Hanya saja kadang parkir agak penuh.'],
                ['user' => 'Dina Amalia', 'rating' => 5, 'comment' => 'Sangat nyaman dan strategis. Pemiliknya juga ramah.'],
                ['user' => 'Fajarudin', 'rating' => 3, 'comment' => 'Agak bising di malam hari, tapi fasilitas cukup lengkap.'],
            ]
        ],
        [
            'id' => 2,
            'name' => 'Kosan Strategis Depok',
            'location' => 'Beji, Depok',
            'price' => '1.200.000',
            'image' => 'https://images.app.goo.gl/X3DXpXdNwwmgxmgC7',
            'features' => ['WiFi', 'Dapur Bersama', 'Kamar Mandi Luar', 'Parkir Motor'],
            'description' => 'Kosan minimalis di lokasi strategis dekat kampus UI dan stasiun KRL. Cocok untuk mahasiswa dan pekerja. Lingkungan ramai dan banyak pilihan kuliner. Tersedia laundry kiloan di sekitar kosan.',
            'rating' => 4.2,
            'reviews_count' => 85,
            'gallery' => [
                'gambardepan2.jpg',
                'kosan1.jpg',
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
            'image' => 'https://placehold.co/400x300/57FF57/FFFFFF?text=Kamar+Mewah',
            'features' => ['AC', 'TV', 'Parkir Luas', 'Air Panas', 'Kolam Renang'],
            'description' => 'Kosan mewah dengan desain modern di kawasan elit Dago, Bandung. Dekat dengan factory outlet dan tempat wisata. Cocok untuk eksekutif muda yang mencari kenyamanan dan gaya hidup modern. Keamanan 24 jam.',
            'rating' => 4.8,
            'reviews_count' => 210,
            'gallery' => [
                'gambardepan3.jpg',
                'kosan2.jpg',
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
            'image' => 'https://placehold.co/400x300/FF5757/FFFFFF?text=Kamar+Sederhana',
            'features' => ['Kamar Mandi Luar', 'Kasur', 'Kipas Angin'],
            'description' => 'Kosan ekonomis di area Manyar, Surabaya. Cocok untuk budget terbatas. Dekat dengan pasar tradisional dan akses transportasi umum. Lingkungan perumahan yang tenang.',
            'rating' => 3.9,
            'reviews_count' => 60,
            'gallery' => [
                'gambardepan4.jpg',
                'kosan4.jpg',
            ],
            'reviews' => [
                ['user' => 'Gita Lestari', 'rating' => 3, 'comment' => 'Sesuai harga, tapi kamar mandi di luar agak kurang nyaman.'],
                ['user' => 'Hadi Wibowo', 'rating' => 4, 'comment' => 'Murah dan cukup bersih. Pemilik ramah.'],
            ]
        ],
    ];

    $kosan_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $current_kosan = null;
    foreach ($kosan_list as $kosan) {
        if ($kosan['id'] === $kosan_id) {
            $current_kosan = $kosan;
            break;
        }
    }

    // Redirect or show error if kosan not found
    if (!$current_kosan) {
        // In a real application, you might redirect to a 404 page or home page
        echo '<div class="text-center py-20 text-xl text-gray-700">Kosan tidak ditemukan.</div>';
        exit;
    }
    ?>

    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto px-4 flex flex-col sm:flex-row justify-between items-center">
            <a href="index.php" class="text-red-600 text-3xl font-bold rounded-md py-1 px-2 mb-4 sm:mb-0">
                cari<span class="text-gray-800">kosan</span>
            </a>
            <nav class="w-full sm:w-auto">
                <ul class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-6 items-center">
                    <li><a href="index.php" class="text-gray-700 hover:text-red-600 font-medium">Beranda</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-red-600 font-medium">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-red-600 font-medium">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-6 sm:py-8 flex-grow">
        <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 lg:p-8">
            <div class="mb-4 sm:mb-6">
                <a href="index.php" class="text-red-600 hover:underline flex items-center text-sm sm:text-base">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Kembali ke Daftar Kosan
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                <div class="lg:col-span-2 order-2 lg:order-1">
                    <div class="mb-6">
                        <img id="mainImage" src="<?php echo htmlspecialchars($current_kosan['gallery'][0]); ?>"
                            alt="Gambar Utama Kosan <?php echo htmlspecialchars($current_kosan['name']); ?>"
                            class="w-full h-64 sm:h-80 lg:h-96 object-cover object-center rounded-xl shadow-md cursor-pointer">
                        <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-2 sm:gap-3 mt-4">
                            <?php foreach ($current_kosan['gallery'] as $index => $img_url): ?>
                                <img src="<?php echo htmlspecialchars($img_url); ?>"
                                    alt="Thumbnail <?php echo $index + 1; ?>"
                                    class="gallery-thumbnail w-full h-20 sm:h-24 object-cover object-center rounded-lg cursor-pointer hover:opacity-80 transition-opacity duration-200"
                                    data-full-src="<?php echo htmlspecialchars($img_url); ?>">
                            <?php endforeach; ?>
                            <button id="viewAllPhotos"
                                class="w-full h-20 sm:h-24 bg-gray-100 text-gray-700 rounded-lg flex items-center justify-center text-xs sm:text-sm font-medium hover:bg-gray-200 transition-colors duration-200">
                                Lihat semua foto >
                            </button>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">
                            <?php echo htmlspecialchars($current_kosan['name']); ?>
                        </h1>
                        <p class="text-gray-600 text-base sm:text-lg mb-3"><i class="fas fa-map-marker-alt mr-2"></i>
                            <?php echo htmlspecialchars($current_kosan['location']); ?></p>
                        <div class="flex items-center text-gray-700 text-sm sm:text-base">
                            <span
                                class="text-lg sm:text-xl font-bold text-green-600 mr-2"><?php echo number_format($current_kosan['rating'], 1); ?>/5</span>
                            <span class="text-base sm:text-lg font-medium text-gray-700">Baik</span>
                            <span class="ml-2 sm:ml-3 text-gray-500">(Dinilai oleh
                                <?php echo number_format($current_kosan['reviews_count']); ?> Tamu)</span>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-4 sm:p-6 mb-6 shadow-sm">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Penilaian dan Ulasan</h2>
                        <div class="flex items-center mb-4">
                            <span
                                class="text-3xl sm:text-4xl font-bold text-green-600 mr-3"><?php echo number_format($current_kosan['rating'], 1); ?>/5</span>
                            <div>
                                <p class="text-base sm:text-lg font-medium text-gray-700">Baik</p>
                                <p class="text-gray-500 text-sm sm:text-base">
                                    <?php echo number_format($current_kosan['reviews_count']); ?>
                                    Ulasan
                                </p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <?php foreach ($current_kosan['reviews'] as $review): ?>
                                <div class="border-b border-gray-200 pb-4 last:border-b-0">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-200 text-blue-800 rounded-full flex items-center justify-center font-bold text-base sm:text-lg mr-3">
                                            <?php echo strtoupper(substr($review['user'], 0, 1)); ?>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm sm:text-base">
                                                <?php echo htmlspecialchars($review['user']); ?>
                                            </p>
                                            <div class="text-xs sm:text-sm text-gray-600">
                                                Rating: <?php echo htmlspecialchars($review['rating']); ?>/5
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-700 text-xs sm:text-sm pl-11 sm:pl-12">
                                        <?php echo htmlspecialchars($review['comment']); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button
                            class="mt-6 w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 sm:py-3 rounded-lg transition duration-300 ease-in-out text-sm sm:text-base">
                            Lihat Semua Ulasan
                        </button>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Deskripsi Kosan</h2>
                        <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                            <?php echo nl2br(htmlspecialchars($current_kosan['description'])); ?>
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Fasilitas</h2>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4">
                            <?php foreach ($current_kosan['features'] as $feature): ?>
                                <div class="flex items-center text-gray-700 text-sm sm:text-base">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-500 mr-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span><?php echo htmlspecialchars($feature); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 order-1 lg:order-2">
                    <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 sticky lg:top-8 border border-gray-200">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-4">Pesan Sekarang</h3>

                        <div class="flex items-baseline mb-4">
                            <span class="text-2xl sm:text-3xl font-bold text-red-600 mr-2">Rp
                                <?php echo htmlspecialchars($current_kosan['price']); ?></span>
                            <span class="text-gray-500 text-sm sm:text-base">/ bulan</span>
                        </div>

                        <div class="space-y-3 sm:space-y-4 mb-6">
                            <div>
                                <label for="check_in"
                                    class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Check-in</label>
                                <input type="date" id="check_in" name="check_in" value="<?php echo date('Y-m-d'); ?>"
                                    class="w-full p-2 sm:p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-gray-800 text-sm sm:text-base">
                            </div>
                            <div>
                                <label for="check_out"
                                    class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Check-out</label>
                                <input type="date" id="check_out" name="check_out"
                                    value="<?php echo date('Y-m-d', strtotime('+1 month')); ?>"
                                    class="w-full p-2 sm:p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-gray-800 text-sm sm:text-base">
                            </div>
                            <div class="grid grid-cols-2 gap-3 sm:gap-4">
                                <div>
                                    <label for="num_rooms"
                                        class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Jumlah
                                        Kamar</label>
                                    <select id="num_rooms" name="num_rooms"
                                        class="w-full p-2 sm:p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-gray-800 text-sm sm:text-base">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="num_guests"
                                        class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Tamu</label>
                                    <select id="num_guests" name="num_guests"
                                        class="w-full p-2 sm:p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-gray-800 text-sm sm:text-base">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="room_type"
                                    class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Tipe
                                    Kamar</label>
                                <select id="room_type" name="room_type"
                                    class="w-full p-2 sm:p-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-gray-800 text-sm sm:text-base">
                                    <option value="RedDoorz Room">RedDoorz Room</option>
                                    <option value="Standard Room">Standard Room</option>
                                    <option value="Deluxe Room">Deluxe Room</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-between items-center text-gray-700 mb-3 text-sm sm:text-base">
                            <span>Anda menghemat Ekstra Rp55.575 dengan RedClub</span>
                            <span class="text-green-600 font-semibold">4.3/5</span>
                        </div>
                        <div class="flex justify-between items-center text-gray-700 mb-3 text-sm sm:text-base">
                            <span>Menghemat sebesar</span>
                            <span class="font-semibold">Rp 55.575</span>
                        </div>
                        <div class="flex justify-between items-center text-lg sm:text-xl font-bold text-gray-900 mb-6">
                            <span>Total harga</span>
                            <span>Rp <?php echo htmlspecialchars($current_kosan['price']); ?></span>
                        </div>

                        <button id="bookNowButton"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 sm:py-3 rounded-lg transition duration-300 ease-in-out shadow-md text-base sm:text-lg">
                            PESAN SEKARANG
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="lightboxModal" class="lightbox-modal">
        <span class="lightbox-close">&times;</span>
        <img class="lightbox-content" id="lightboxImage">
    </div>

    <div id="successModal" class="success-modal">
        <div class="success-modal-content">
            <h3 class="text-green-500">Pesanan Berhasil!</h3>
            <p>Kosan Anda telah berhasil dipesan. Silakan cek email Anda untuk detail lebih lanjut.</p>
            <button id="closeSuccessModal"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg">Tutup</button>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-6 sm:py-8 mt-8 sm:mt-12">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm sm:text-base">&copy; <?php echo date("Y"); ?> KosanCari. Semua Hak Dilindungi.</p>
            <div
                class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4 mt-4 text-sm sm:text-base">
                <a href="#" class="text-gray-400 hover:text-white">Kebijakan Privasi</a>
                <a href="#" class="text-gray-400 hover:text-white">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lightbox functionality
            const lightboxModal = document.getElementById('lightboxModal');
            const lightboxImage = document.getElementById('lightboxImage');
            const closeLightboxBtn = document.querySelector('.lightbox-close');
            const mainImage = document.getElementById('mainImage');
            const galleryThumbnails = document.querySelectorAll('.gallery-thumbnail');
            const viewAllPhotosBtn = document.getElementById('viewAllPhotos');

            function openLightbox(src) {
                lightboxModal.style.display = 'flex';
                lightboxImage.src = src;
                document.body.style.overflow = 'hidden';
            }

            function closeLightbox() {
                lightboxModal.style.display = 'none';
                document.body.style.overflow = '';
            }

            if (mainImage) {
                mainImage.addEventListener('click', function () {
                    openLightbox(this.src);
                });
            }

            galleryThumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function () {
                    openLightbox(this.dataset.fullSrc || this.src);
                });
            });

            if (viewAllPhotosBtn) {
                viewAllPhotosBtn.addEventListener('click', function () {
                    if (galleryThumbnails.length > 0) {
                        openLightbox(galleryThumbnails[0].dataset.fullSrc || galleryThumbnails[0].src);
                    } else if (mainImage) {
                        openLightbox(mainImage.src);
                    }
                });
            }

            if (closeLightboxBtn) {
                closeLightboxBtn.addEventListener('click', closeLightbox);
            }

            lightboxModal.addEventListener('click', function (e) {
                if (e.target === lightboxModal) {
                    closeLightbox();
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === "Escape" && lightboxModal.style.display === 'flex') {
                    closeLightbox();
                }
            });

            // Booking Success Modal functionality
            const bookNowButton = document.getElementById('bookNowButton');
            const successModal = document.getElementById('successModal');
            const closeSuccessModalBtn = document.getElementById('closeSuccessModal');

            function openSuccessModal() {
                successModal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }

            function closeSuccessModal() {
                successModal.classList.remove('show');
                document.body.style.overflow = '';
            }

            if (bookNowButton) {
                bookNowButton.addEventListener('click', function () {
                    openSuccessModal();
                });
            }

            if (closeSuccessModalBtn) {
                closeSuccessModalBtn.addEventListener('click', closeSuccessModal);
            }

            successModal.addEventListener('click', function (e) {
                if (e.target === successModal) {
                    closeSuccessModal();
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === "Escape" && successModal.classList.contains('show')) {
                    closeSuccessModal();
                }
            });
        });
    </script>
</body>

</html>