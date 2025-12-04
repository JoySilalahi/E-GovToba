# Sistem Manajemen Agenda Kabupaten

## 📋 Overview
Sistem manajemen agenda yang memungkinkan admin untuk menambah, edit, dan hapus agenda kegiatan Kabupaten Toba dengan integrasi kalender interaktif.

## 🎯 Fitur Utama

### 1. **Kalender Interaktif**
- Kalender otomatis menampilkan bulan dan tahun saat ini
- Tanggal hari ini ditandai dengan highlight biru
- Tanggal yang memiliki agenda ditandai dengan dot indicator
- **Klik tanggal di kalender** → otomatis membuka form tambah agenda dengan tanggal sudah terisi

### 2. **Tambah Agenda**
**Cara 1: Klik Tanggal di Kalender**
- Klik tanggal yang diinginkan di kalender
- Modal "Tambah Agenda Baru" otomatis terbuka
- Field tanggal sudah terisi dengan tanggal yang diklik
- Lengkapi form dan simpan

**Cara 2: Manual dengan Tombol**
- Klik tombol "Tambah Agenda" di header section
- Pilih tanggal manual dengan date picker
- Lengkapi form dan simpan

**Field Form:**
- **Judul Agenda** * (wajib)
- **Deskripsi** (opsional)
- **Tanggal Agenda** * (wajib)
- **Kategori** (opsional) - contoh: Rapat, Dialog Publik, Acara
- **Waktu Mulai** (opsional) - format HH:mm
- **Waktu Selesai** (opsional) - format HH:mm
- **Lokasi** (opsional)
- **Peserta/Undangan** (opsional)

### 3. **Edit Agenda**
- Klik icon edit (pensil) pada agenda yang ingin diubah
- Modal edit agenda terbuka dengan data sudah terisi
- Update data yang diperlukan
- Klik "Update Agenda"

### 4. **Hapus Agenda**
- Klik icon hapus (tempat sampah) pada agenda
- Konfirmasi penghapusan
- Agenda dihapus dan kalender otomatis ter-update

### 5. **Tampilan Agenda**
**Di Admin Dashboard:**
- List agenda ditampilkan di sebelah kanan kalender
- Menampilkan semua informasi: kategori, judul, tanggal, waktu, lokasi, peserta
- Urutan berdasarkan tanggal event (ascending)

**Informasi yang Ditampilkan:**
- Badge kategori (warna berbeda untuk setiap kategori)
- Judul agenda (bold, besar)
- 📅 Tanggal event (format: 8 Juni 2025)
- 🕐 Waktu (format: 09:00 - 12:00 WIB)
- 📍 Lokasi
- 👥 Peserta/Undangan

## 🗄️ Database Schema

### Tabel: `district_agendas`
```sql
- id (bigint, primary key)
- district_id (bigint, foreign key ke districts)
- title (varchar 255) - judul agenda
- description (text) - deskripsi agenda
- event_date (date) - tanggal agenda
- time_start (time) - waktu mulai
- time_end (time) - waktu selesai
- location (varchar 255) - lokasi acara
- category (varchar 100) - kategori agenda
- participants (varchar 255) - peserta/undangan
- created_by (bigint, foreign key ke users)
- created_at (timestamp)
- updated_at (timestamp)
```

## 🔧 Technical Implementation

### Routes (admin.php)
```php
Route::post('/information/agendas', 'InformationController@storeAgenda')
    ->name('information.agendas.store');
    
Route::put('/information/agendas/{id}', 'InformationController@updateAgenda')
    ->name('information.agendas.update');
    
Route::delete('/information/agendas/{id}', 'InformationController@deleteAgenda')
    ->name('information.agendas.delete');
```

### Controller Methods

#### storeAgenda()
```php
- Validasi: title, event_date (required)
- Validasi: time format HH:i untuk time_start dan time_end
- Auto-assign district_id dan created_by
- Clear cache setelah create
- Return dengan success message
```

#### updateAgenda()
```php
- Validasi sama seperti store
- Find agenda by ID
- Update semua field
- Clear cache
- Return dengan success message
```

#### deleteAgenda()
```php
- Find agenda by ID
- Delete record
- Clear cache
- Return dengan success message
```

### Model: DistrictAgenda
```php
protected $fillable = [
    'district_id', 'title', 'description', 'event_date',
    'time_start', 'time_end', 'location', 'category',
    'participants', 'created_by'
];

protected $casts = [
    'event_date' => 'date'
];

// Relations
public function district() // belongsTo District
public function creator() // belongsTo User
```

### JavaScript Features

#### 1. Calendar Click Handler
```javascript
document.querySelectorAll('.calendar-day').forEach(day => {
    day.addEventListener('click', function() {
        const dateStr = this.dataset.date;
        if (dateStr) {
            // Set tanggal di form
            document.getElementById('add_event_date').value = dateStr;
            // Buka modal
            new bootstrap.Modal(document.getElementById('addAgendaModal')).show();
        }
    });
});
```

#### 2. Edit Function
```javascript
function editAgenda(id, title, description, eventDate, timeStart, timeEnd, 
                   location, category, participants) {
    // Set form action URL
    document.getElementById('editAgendaForm').action = `/admin/information/agendas/${id}`;
    
    // Populate form fields
    document.getElementById('edit_agenda_title').value = title;
    document.getElementById('edit_agenda_description').value = description || '';
    document.getElementById('edit_event_date').value = eventDate;
    // ... dst
    
    // Show modal
    new bootstrap.Modal(document.getElementById('editAgendaModal')).show();
}
```

## 🎨 UI/UX Features

### Kalender Dinamis
- Generate kalender berdasarkan bulan/tahun saat ini
- Hitung first day of week untuk alignment
- Loop dari 1 sampai daysInMonth
- Check setiap tanggal apakah ada agenda → tampilkan dot
- Check apakah tanggal = hari ini → highlight biru

### Agenda Cards
```css
.agenda-item {
    background: white;
    padding: 1.2rem;
    border-radius: 8px;
    border-left: 4px solid #4CAF50;
    margin-bottom: 1rem;
}

.agenda-category {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.75rem;
}
```

### Visual Indicators
- 🔵 Hari ini = background biru (#e3f2fd)
- 🟢 Ada agenda = green dot
- 🎨 Kategori = colorful badge
- ✏️ Edit icon = pensil abu-abu
- 🗑️ Delete icon = tempat sampah merah

## 📝 User Flow

### Menambah Agenda via Kalender
1. User membuka halaman Admin → Informasi Kabupaten
2. Scroll ke section "Agenda Pemkot"
3. Lihat kalender bulan ini
4. **Klik tanggal** yang diinginkan (misal: 15 Desember)
5. Modal "Tambah Agenda Baru" muncul
6. Field "Tanggal Agenda" sudah terisi: 2025-12-15
7. Isi field lain: judul, kategori, waktu, lokasi, peserta
8. Klik "Simpan Agenda"
9. Modal close, page refresh
10. Agenda baru muncul di list
11. Kalender menampilkan dot pada tanggal 15

### Menambah Agenda Manual
1. User klik tombol "Tambah Agenda" di header
2. Modal muncul dengan field kosong
3. Pilih tanggal manual dengan date picker
4. Isi semua field yang dibutuhkan
5. Simpan → agenda tersimpan

### Mengedit Agenda
1. Cari agenda di list
2. Klik icon edit (pensil)
3. Modal edit muncul dengan data terisi
4. Ubah field yang diperlukan
5. Klik "Update Agenda"
6. Changes saved & page refresh

### Menghapus Agenda
1. Cari agenda di list
2. Klik icon hapus (tempat sampah)
3. Konfirmasi popup: "Yakin ingin menghapus agenda ini?"
4. OK → agenda terhapus
5. List ter-update, dot hilang dari kalender jika tidak ada agenda lain di tanggal tersebut

## 🚀 Future Enhancements

### Fase 2 (Optional)
1. **Navigasi Kalender**
   - Tombol prev/next month
   - Dropdown pilih bulan & tahun
   - Jump to specific date

2. **Filter & Search**
   - Filter by kategori
   - Search by judul
   - Filter by date range

3. **Ekspor Data**
   - Export agenda to PDF
   - Export to Excel/CSV
   - Print friendly view

4. **Notifikasi**
   - Email reminder H-1
   - WhatsApp notification
   - Desktop notification

5. **Recurring Events**
   - Set agenda berulang (harian, mingguan, bulanan)
   - Auto-generate recurring agendas

6. **Color Coding**
   - Custom color per kategori
   - Visual legend

7. **Attachment**
   - Upload file pendukung (PDF, DOC)
   - Link to external resources

### Fase 3 (Advanced)
1. **Public View**
   - Tampilkan agenda di halaman publik
   - Public calendar widget
   - iCal feed untuk sync ke Google Calendar

2** Multi-user Features**
   - Assign agenda ke specific user
   - RSVP/konfirmasi kehadiran
   - Comment/notes per agenda

3. **Dashboard Widget**
   - Mini calendar di dashboard utama
   - Upcoming agendas widget
   - Statistics: total agenda per bulan

## 📊 Statistics & Reports

### Data yang Bisa Ditracking
- Total agenda per bulan
- Total agenda per kategori
- Most busy month
- Attendance rate (jika ada RSVP)
- Location usage frequency

## ✅ Validasi & Error Handling

### Validasi Input
- Title: required, max 255 char
- Event date: required, valid date format
- Time: optional, format HH:i (00:00 - 23:59)
- All text fields: sanitized untuk prevent XSS

### Error Messages
- "Judul agenda wajib diisi"
- "Tanggal tidak valid"
- "Format waktu salah (gunakan HH:MM)"
- "Gagal menyimpan agenda. Silakan coba lagi"

### Success Messages
- "Agenda berhasil ditambahkan!"
- "Agenda berhasil diperbarui!"
- "Agenda berhasil dihapus!"

## 🔒 Security

### Authorization
- Hanya admin yang bisa CRUD agenda
- Middleware: auth + admin
- CSRF token di semua form
- Validasi district_id untuk mencegah cross-district manipulation

### Data Sanitization
- Input escaped untuk prevent SQL injection
- XSS protection di output
- File upload validation (untuk future attachment feature)

## 🎯 Best Practices Implemented

1. **RESTful Routes** - Menggunakan convention POST/PUT/DELETE
2. **Cache Management** - Auto clear cache setelah perubahan data
3. **Responsive Design** - Calendar & list responsive di mobile
4. **User Feedback** - Toast/alert untuk setiap action
5. **Accessibility** - Proper labels, keyboard navigation
6. **Code Organization** - Separation of concerns (Model, View, Controller)
7. **Reusable Components** - Modal forms, calendar widget
8. **Progressive Enhancement** - Works without JS, better with JS

---

## 📱 Mobile Optimization

- Calendar grid responsive (stacked di mobile)
- Touch-friendly buttons (min 44px)
- Modal scroll di small screens
- Date picker native di mobile devices

## 🎨 Design Consistency

- Menggunakan color scheme yang sama dengan dashboard
- Font: Inter family
- Icons: Font Awesome 6
- Spacing: 8px grid system
- Border radius: 6-8px untuk konsistensi

---

**Dibuat oleh:** Admin E-Gov Toba  
**Tanggal:** 4 Desember 2025  
**Versi:** 1.0
