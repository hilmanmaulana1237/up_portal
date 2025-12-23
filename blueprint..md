Tugas: Buat dan lengkapi aplikasi "Blog Mini" menggunakan Laravel 12. Project sudah MEMILIKI TEMPLATE FRONTEND & ADMIN (Blade + Tailwind). Tugas kamu adalah MENYESUAIKAN BACKEND + LOGIKA FITUR dengan template yang sudah ada, BUKAN membuat tampilan dari nol.

Spesifikasi teknis wajib:

-   Laravel 12, PHP >= 8.2, MySQL.
-   Autentikasi admin: gunakan Laravel autentikasi yang sudah ada pada aplikasi ini.
-   Hanya user dengan role='admin' yang bisa mengakses /admin/\*.
-   Gunakan template Blade yang sudah tersedia, sesuaikan section, variable, dan looping datanya.

=====================================================
DATABASE & MODEL
=====================================================

1. users:

-   Gunakan default dari Breeze.
-   Tambahkan kolom: role (string, default 'admin' untuk seeder).

2. articles:

-   id
-   title (string)
-   slug (string, unique)
-   excerpt (text, nullable)
-   body (longText)
-   cover_image (string, nullable)
-   status (enum: 'draft', 'published')
-   published_at (timestamp, nullable)
-   user_id (foreign key ke users sebagai author)
-   timestamps

3. comments:

-   id
-   article_id (foreign key)
-   name (string)
-   email (string)
-   body (text)
-   approved (boolean, default false)
-   parent_id (nullable, untuk nested comment)
-   timestamps

4. likes:

-   id
-   article_id (foreign key)
-   visitor_token (string)
-   timestamps
-   Kombinasi article_id + visitor_token harus unique.

=====================================================
FITUR WAJIB
=====================================================

✅ PUBLIC:

-   Homepage:
    -   Tampilkan artikel dengan status='published'
    -   Urutkan terbaru berdasarkan published_at DESC
    -   Pagination 6 item per halaman
    -   Tampilkan cover + excerpt + read more
-   Detail Artikel:
    -   Tampilkan full body artikel
    -   Form komentar: name, email, body
    -   Komentar yang dikirim default approved=false
    -   Hanya komentar approved yang ditampilkan
    -   Tombol LIKE:
        -   Like berbasis SESSION/VISITOR_TOKEN
        -   Tidak boleh double-like dari browser yang sama
-   Search artikel berdasarkan title

✅ ADMIN (/admin):

-   CRUD Artikel:
    -   Create, Edit, Delete
    -   Upload cover image ke storage/app/public
    -   Auto-generate slug dari title + auto-unique
-   Manajemen Komentar:
    -   List semua komentar
    -   Approve komentar
    -   Delete komentar
-   Dashboard Statistik:
    -   Total artikel
    -   Total komentar
    -   Total like

✅ API (Opsional):

-   GET /api/articles (list published dalam JSON)

=====================================================
IMPLEMENTATION RULES
=====================================================

-   Gunakan:
    -   Controller terpisah: PublicArticleController & Admin/ArticleController
    -   FormRequest:
        -   StoreArticleRequest
        -   UpdateArticleRequest
        -   StoreCommentRequest
    -   Policy:
        -   ArticlePolicy → hanya admin/author yang boleh edit & delete artikel
-   Validasi server-side WAJIB
-   Slug:
    -   Gunakan Str::slug()
    -   Jika duplikat, tambahkan -1, -2, dst.
-   Like:
    -   Gunakan session token atau visitor_token
    -   Satu visitor hanya bisa 1 like per artikel
-   Image Upload:
    -   Simpan di storage/app/public
    -   Jalankan php artisan storage:link

=====================================================
SEEDER & TESTING
=====================================================

-   Seeder WAJIB:

    -   1 Admin:
        -   Email: admin@example.com
        -   Password: password
        -   role: admin
    -   5 artikel published
    -   2 artikel draft
    -   10 komentar (campur approved & belum)
    -   Beberapa like dummy

-   Feature Tests:
    1. Admin CRUD artikel
    2. User public kirim komentar
    3. Like tidak bisa double dari session yang sama

=====================================================
DELIVERABLE YANG HARUS DIHASILKAN
=====================================================

Karena template SUDAH ADA, maka output yang WAJIB kamu berikan adalah:

✅ 1. Struktur folder project
✅ 2. Semua file utama dalam bentuk KODE LENGKAP:

-   Migration users, articles, comments, likes
-   Model: User, Article, Comment, Like
-   Controllers:
    -   PublicArticleController
    -   Admin/ArticleController
    -   CommentController
    -   LikeController
-   Form Requests
-   Policy
-   Web routes & API routes
-   Seeder lengkap
    ✅ 3. Contoh penyesuaian Blade template:
-   Homepage → looping artikel
-   Detail artikel → komentar & like
-   Admin dashboard → statistik
-   Admin artikel → CRUD view binding
    ✅ 4. README.md:
-   Cara install
-   Setup env
-   Migrate & Seed
-   Storage link
-   Login admin
-   Cara testing fitur

=====================================================
ACCEPTANCE CRITERIA
=====================================================

-   Project bisa langsung dijalankan dengan:
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate --seed
    php artisan storage:link
    php artisan serve

-   Admin login menggunakan:
    admin@example.com | password

-   Artikel tampil di homepage
-   Komentar masuk tapi tidak tampil sebelum di-approve
-   Like hanya bertambah 1x per browser
-   Semua admin feature berjalan sesuai template

=====================================================
OUTPUT FORMAT YANG KAMU BERIKAN
=====================================================

Jika tidak bisa membuat repo Git:
✔ Berikan SEMUA FILE dalam bentuk kode siap copy-paste:

-   Migration
-   Model
-   Controller
-   Blade binding contoh
-   Seeder
-   Policy
-   Routes
-   README.md

Fokus utama kamu adalah:
✅ Backend logic
✅ Database
✅ Keamanan akses admin
✅ Integrasi backend ke TEMPLATE yang sudah tersedia
