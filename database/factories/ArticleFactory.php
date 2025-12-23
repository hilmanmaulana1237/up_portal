<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        // Indonesian sample titles and summaries
        $titles = [
            'Membangun Aplikasi Blog Sederhana dengan Laravel',
            'Tips Menulis Konten yang Menarik untuk Pembaca Lokal',
            'Mengoptimalkan Performa Laravel untuk Situs Blog',
            'Panduan Menjaga Keamanan Aplikasi Web Anda',
            'Cara Mengelola Komentar dan Spam pada Blog Anda',
                'Strategi SEO Dasar untuk Blog Pemula',
                'Panduan Praktis Deployment Laravel di Server',
                'Meningkatkan Keterlibatan Pembaca melalui Komentar',
                'Menggunakan Eloquent Relationships untuk Konten Terkait',
                'Mengatur Otentikasi dan Autorisasi pada Aplikasi Laravel',
            ];

        $excerpts = [
            'Panduan langkah demi langkah membangun blog dengan Laravel: mulai dari setup proyek, membuat model, migrasi, serta menampilkan daftar artikel dan detailnya.',
            'Panduan praktis menulis konten yang menarik: teknik penulisan, struktur artikel, dan cara menjangkau pembaca lokal dengan relevansi dan bahasa yang sesuai.',
            'Teknik optimasi performa untuk aplikasi Laravel: caching, query optimization, dan pemanfaatan eager loading untuk mengatasi N+1 query.',
            'Langkah-langkah esensial menjaga keamanan aplikasi web termasuk validasi input, proteksi CSRF, sanitasi data, dan pengaturan otorisasi.',
            'Cara efektif memoderasi komentar untuk menjaga kualitas diskusi, termasuk automation, manual review, dan penggunaan filter kata.',
            'Strategi SEO dasar untuk pemula: pemilihan kata kunci, pengaturan meta tag, struktur heading, serta peta situs dan optimasi kecepatan halaman.',
            'Panduan praktis deployment: persiapan environment, setup proses, konfigurasi manager proses, serta pemantauan pasca-deploy.',
            'Ide-ide meningkatkan keterlibatan pembaca melalui komentar, notifikasi, fitur reply, dan pengaturan moderasi yang sehat.',
            'Cara memanfaatkan relasi Eloquent untuk menampilkan konten terkait, termasuk contoh relasi hasMany, belongsTo dan eager loading.',
            'Panduan singkat mengatur otentikasi dan otorisasi pada Laravel menggunakan policy, gate, dan paket authentikasi seperti Fortify atau Breeze.',
        ];

        $bodies = [
            "Laravel memudahkan pengembang membangun aplikasi blog dengan arsitektur yang bersih dan modular. Di bagian awal, kita akan membahas instalasi proyek, struktur folder, serta cara membuat model, migrasi, dan factory untuk mengisi data uji. Selanjutnya, kita akan membangun controller dan resource routes untuk menampilkan daftar artikel dan halaman detail. Jangan lupa menyiapkan view dengan Blade, serta mengatur layout yang responsif agar tampilan blog rapi di perangkat mobile maupun desktop. Untuk bagian akhirnya, kita akan menambahkan fitur pencarian, pagination, dan seeding untuk mempercepat proses pengembangan.",

            "Menulis konten yang menarik dimulai dari pemahaman audiens dan tujuan artikel. Pilih topik yang relevan dan lakukan riset keyword ringan untuk mengetahui apa yang dicari pengguna. Buat outline sebelum menulis, susun paragraf dengan pembukaan yang menjelaskan masalah, bagian inti yang menawarkan solusi, dan penutup yang menyertakan call-to-action. Gunakan bahasa yang sederhana, tambahkan subjudul, bullet list, serta contoh kasus untuk membantu pembaca mengikutinya. Jangan lupa menyertakan gambar berkualitas dan metadata yang mendukung SEO.",

            "Optimasi performa adalah salah satu hal terpenting untuk menjaga pengalaman pengguna. Mulai dari menganalisa query dengan debug tools, memanfaatkan eager loading untuk relasi, mengaktifkan query caching, hingga caching page atau response untuk konten yang tidak sering berubah. Selain itu, gunakan indexing pada kolom yang sering dijadikan filter atau sort, dan pertimbangkan penggunaan job queue untuk proses berat seperti pengiriman email atau pembuatan thumbnail gambar. Monitoring dan profiling secara berkala membantu menemukan bottleneck dan meningkatkan kecepatan aplikasi secara berkelanjutan.",

            "Keamanan adalah prioritas utama dalam pengembangan web. Terapkan validasi input secara menyeluruh pada semua form dan endpoint API untuk mencegah data tidak valid masuk ke sistem. Gunakan mekanisme proteksi CSRF dan XSS untuk menghindari injeksi kode berbahaya. Terapkan enkripsi untuk data sensitif, batasi hak akses pengguna melalui sistem otorisasi (policies/gates), serta lakukan rate-limiting untuk mencegah serangan bruteforce. Selain itu, lakukan update dependency dan patch keamanan secara berkala agar tidak ada kerentanan yang mudah dieksploitasi.",

            "Komentar yang sehat dapat meningkatkan kualitas diskusi di blog. Untuk menjaga kualitas, gunakan kombinasi mod tools: filter kata kunci, verifikasi email, dan moderasi manual pada komentar baru. Gunakan paginasi atau lazy load agar komentar tidak memengaruhi performa halaman. Pertimbangkan juga fitur balas (threaded comments) dan notifikasi untuk pemilik komentar saat ada balasan. Jika mengalami spam berlebihan, aktifkan captcha atau integrasi layanan anti-spam yang populer.",

            "Dasar SEO mencakup pemilihan kata kunci yang tepat, pembuatan judul dan meta description yang menarik, serta struktur konten yang baik dengan heading (H1, H2, H3) untuk kejelasan topik. Optimasi gambar (size, alt tag), penggunaan canonical URL, dan peta situs (sitemap.xml) membantu mesin pencari memahami situs Anda lebih baik. Selain itu, tingkatkan kecepatan halaman karena faktor ini juga memengaruhi peringkat SEO. Lakukan audit konten secara berkala untuk memperbarui artikel yang masih relevan.",

            "Deployment memerlukan persiapan environment yang matang: periksa konfigurasi .env, sertakan key publik/private, dan gunakan tool seperti supervisor atau systemd untuk menjalankan proses queue. Terapkan langkah-langkah seperti menjalankan migrasi, meng-cache konfigurasi, dan melakukan optimization pada autoload. Untuk proses otomatis, pertimbangkan pipeline CI/CD yang menangani build, test, dan deploy ke server staging/production. Selalu lakukan backup sebelum deploy dan gunakan tools monitoring untuk mendeteksi masalah pasca deploy.",

            "Untuk meningkatkan keterlibatan pembaca, sediakan ruang bagi mereka untuk berkomentar dan berdiskusi. Gunakan tampilan komentar yang mudah dibaca dan terstruktur, serta kirimkan notifikasi saat ada tanggapan. Pertimbangkan juga gamification ringan, misalnya menampilkan jumlah komentarnya atau badge untuk kontributor aktif. Interaksi yang apik akan membuat pembaca kembali dan membagikan konten Anda.",

            "Eloquent relationships memudahkan pengembang untuk menghubungkan model seperti Artikel, Komentar, dan User. Gunakan hasMany dan belongsTo untuk relasi dasar, belongsToMany untuk relasi many-to-many, dan morph untuk relasi polymorphic jika diperlukan. Penting menggunakan eager loading (with) saat menampilkan relasi untuk menghindari N+1 queries yang berdampak negatif pada performa. Dengan desain relasi yang tepat, Anda bisa menampilkan rekomendasi artikel, daftar komentar, atau author profile dengan efisien.",

            "Autentikasi dan otorisasi adalah dasar keamanan aplikasi. Gunakan paket yang sesuai (Fortify, Breeze, atau Jetstream) untuk menghemat waktu integrasi login, registrasi, dan manajemen user. Terapkan policy dan gate untuk kontrol akses pada model tertentu, serta batasi fitur berdasarkan role pengguna (admin/editor). Selalu lakukan validasi sisi server, dan jika perlu, tambahkan two-factor authentication (2FA) untuk lapisan keamanan lebih lanjut.",
        ];

        // Pilih judul secara acak tanpa unique agar tidak terjadi OverflowException
        $title = fake()->randomElement($titles);
        $idx = array_search($title, $titles, true);
        $status = fake()->randomElement(['published', 'draft']);
        // Selalu tambahkan random suffix agar slug selalu unik
        $slugBase = Article::generateSlug($title);
        $slug = $slugBase . '-' . bin2hex(random_bytes(4));
        
        // Diverse cover images for each topic from Unsplash
        $coverImages = [
            // 0: Laravel/Blog Development
            'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&h=400&fit=crop',
            // 1: Writing/Content
            'https://images.unsplash.com/photo-1455390582262-044cdead277a?w=800&h=400&fit=crop',
            // 2: Performance/Speed
            'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&h=400&fit=crop',
            // 3: Security
            'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=800&h=400&fit=crop',
            // 4: Comments/Community
            'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=400&fit=crop',
            // 5: SEO
            'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=400&fit=crop',
            // 6: Deployment/Server
            'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=800&h=400&fit=crop',
            // 7: Engagement/Social
            'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=400&fit=crop',
            // 8: Database/Eloquent
            'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=800&h=400&fit=crop',
            // 9: Authentication
            'https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=800&h=400&fit=crop',
        ];
        
        return [
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $excerpts[$idx],
            'body' => $bodies[$idx] . "\n\n" . 'Artikel ini dibuat sebagai contoh konten berbahasa Indonesia untuk blog mini.',
            'cover_image' => $coverImages[$idx],
            'status' => $status,
            'published_at' => $status === 'published' ? now()->subDays(rand(0, 30)) : null,
            'user_id' => User::factory(),
        ];
    }
}
