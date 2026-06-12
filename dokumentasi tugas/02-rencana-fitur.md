# Rencana Fitur

> Dokumentasikan minimal **5 fitur utama** proyek Anda.
> Salin dan ulangi blok di bawah untuk setiap fitur tambahan.

---

## Fitur 1 — [Pencarian film by judul/genre]

**Role Penanggung Jawab:** `[Frontend | Backend]`

**Sumber Data:** `[Third-Party API — TMDB API]`

**Deskripsi & Ekspektasi:**
`[Fitur ini memungkinkan pengguna mencari film berdasarkan judul atau genre yang diinginkan. Pengguna dapat memasukkan kata kunci pada kolom pencarian atau memilih genre tertentu, kemudian sistem akan mengirimkan permintaan ke TMDB API untuk mengambil data film yang relevan. Hasil pencarian ditampilkan dalam bentuk daftar yang berisi poster, judul, tahun rilis, dan rating film.

Ekspektasi dari fitur ini adalah pengguna dapat menemukan film dengan cepat dan akurat melalui antarmuka yang responsif. Sistem diharapkan mampu menampilkan hasil pencarian secara real-time serta memberikan informasi yang sesuai dengan kata kunci atau genre yang dipilih.]`

---

## Fitur 2 — [Pencarian anime by judul/genre]

**Role Penanggung Jawab:** `[Frontend | Backend]`

**Sumber Data:** `[Third-Party API — Jikan API]`

**Deskripsi & Ekspektasi:**
`[Fitur ini digunakan untuk mencari anime berdasarkan judul maupun genre menggunakan data dari Jikan API. Pengguna dapat mengetik nama anime atau memilih kategori genre yang tersedia. Sistem kemudian menampilkan daftar anime yang sesuai lengkap dengan poster, skor, jumlah episode, dan status penayangan.

Ekspektasi implementasi fitur ini adalah mempermudah pengguna dalam menemukan anime yang ingin ditonton. Hasil pencarian harus ditampilkan dengan cepat dan memberikan informasi yang cukup untuk membantu pengguna memilih anime yang sesuai dengan preferensinya.]`

---

## Fitur 3 — [Simpan ke watchlist pribadi + status]

**Role Penanggung Jawab:** `[Frontend | Backend]`

**Sumber Data:** `[Internal System]`

**Deskripsi & Ekspektasi:**
`[Fitur watchlist memungkinkan pengguna menyimpan film atau anime ke daftar tontonan pribadi. Selain menyimpan, pengguna juga dapat memberikan status seperti "Belum Ditonton", "Sedang Ditonton", atau "Selesai Ditonton". Data watchlist disimpan pada sistem sehingga dapat diakses kembali saat pengguna masuk ke akun mereka.

Ekspektasi dari fitur ini adalah membantu pengguna mengelola daftar tontonan dengan lebih terstruktur. Sistem harus mampu menyimpan, memperbarui, dan menampilkan status tontonan secara akurat sehingga pengguna dapat memantau progres tontonan mereka dengan mudah.]`

---

## Fitur 4 — [Halaman detail film/anime (rating, cast, sinopsis)]

**Role Penanggung Jawab:** `[Frontend]`

**Sumber Data:** `[Third-Party API — TMDB + Jikan]`

**Deskripsi & Ekspektasi:**
`[Fitur ini menampilkan informasi lengkap mengenai film atau anime yang dipilih pengguna. Informasi yang ditampilkan meliputi judul, poster, rating, sinopsis, genre, pemeran (cast), tanggal rilis, dan informasi pendukung lainnya yang tersedia dari API. Pengguna dapat mengakses halaman detail dengan memilih salah satu item dari hasil pencarian.

Ekspektasi implementasi adalah menyediakan informasi yang lengkap dan mudah dipahami sehingga pengguna tidak perlu mencari informasi tambahan dari sumber lain. Tampilan halaman diharapkan menarik, responsif, dan mampu memuat data dengan baik.]`

---

## Fitur 5 — [Sistem review & rating versi sendiri]

**Role Penanggung Jawab:** `[Frontend | Backend]`

**Sumber Data:** `[Internal System]`

**Deskripsi & Ekspektasi:**
`[Fitur ini memungkinkan pengguna memberikan ulasan dan rating terhadap film atau anime yang telah ditonton. Pengguna dapat menulis komentar, memberikan nilai rating, serta melihat review yang diberikan oleh pengguna lain. Seluruh data review dan rating disimpan pada database aplikasi.

Ekspektasi dari fitur ini adalah menciptakan interaksi antar pengguna dan memberikan referensi tambahan sebelum menonton suatu film atau anime. Sistem harus mampu menyimpan review dengan aman, menampilkan rating rata-rata, serta memperbarui data secara otomatis ketika terdapat ulasan baru.]`

---

