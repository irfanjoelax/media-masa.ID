// Daftar hari dalam bahasa Inggris
const daysOfWeek = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

// Daftar bulan dalam bahasa Inggris
const monthsOfYear = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

// Mendapatkan tanggal saat ini
const currentDate = new Date();

// Mendapatkan hari dari tanggal saat ini (0 untuk Minggu, 1 untuk Senin, dst.)
const dayOfWeek = currentDate.getDay();

// Mendapatkan tanggal dari tanggal saat ini
const dayOfMonth = currentDate.getDate();

// Mendapatkan bulan dari tanggal saat ini
const month = currentDate.getMonth();

// Mendapatkan tahun dari tanggal saat ini
const year = currentDate.getFullYear();

// Membuat teks untuk menampilkan tanggal dan hari
const formattedDate = `${daysOfWeek[dayOfWeek]}, ${dayOfMonth} ${monthsOfYear[month]} ${year}`;

// Menampilkan hasilnya
const dateElements = document.querySelectorAll(".dateDisplay");

// Mengisi teks di dalam semua elemen dengan class "dateDisplay"
dateElements.forEach(element => {
    element.textContent = formattedDate;
});
