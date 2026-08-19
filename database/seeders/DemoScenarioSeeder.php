<?php

namespace Database\Seeders;

use App\Models\Connection;
use App\Models\Event;
use App\Models\ImpactLog;
use App\Models\Message;
use App\Models\Need;
use App\Models\Participation;
use App\Models\Session;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoScenarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $raka = User::factory()->create(['name' => 'Raka Pratama', 'email' => 'raka@sambung.test', 'age' => 17, 'location' => 'Jakarta Selatan', 'latitude' => -6.2614920, 'longitude' => 106.8106000]);
        $buSari = User::factory()->create(['name' => 'Sari Wulandari', 'email' => 'sari@sambung.test', 'age' => 43, 'location' => 'Depok', 'latitude' => -6.4024840, 'longitude' => 106.7942410]);
        $pakBudi = User::factory()->create(['name' => 'Budi Santoso', 'email' => 'budi@sambung.test', 'age' => 67, 'location' => 'Tangerang Selatan', 'latitude' => -6.2881270, 'longitude' => 106.7179720]);
        $organizer = User::factory()->organizer()->create(['name' => 'Dewi Lestari', 'email' => 'dewi.organizer@sambung.test', 'age' => 31, 'location' => 'Jakarta Selatan', 'latitude' => -6.2547200, 'longitude' => 106.8225900]);
        User::factory()->admin()->create(['name' => 'Arif Nugroho', 'email' => 'arif.admin@sambung.test', 'age' => 35, 'location' => 'Jakarta Selatan', 'latitude' => -6.2382690, 'longitude' => 106.8216470]);
        $andi = User::factory()->create(['name' => 'Andi Kurniawan', 'email' => 'andi@sambung.test', 'age' => 25, 'location' => 'Bandung', 'latitude' => -6.9174640, 'longitude' => 107.6191230]);
        $maya = User::factory()->create(['name' => 'Maya Putri', 'email' => 'maya@sambung.test', 'age' => 29, 'location' => 'Depok', 'latitude' => -6.3941200, 'longitude' => 106.8222700]);
        $dimas = User::factory()->create(['name' => 'Dimas Saputra', 'email' => 'dimas@sambung.test', 'age' => 22, 'location' => 'Tangerang Selatan', 'latitude' => -6.3016350, 'longitude' => 106.6529500]);

        $this->createSkills($raka, ['Digital Payment', 'Smartphone', 'Programming']);
        $this->createSkills($buSari, ['Fasilitasi Komunitas', 'Memasak', 'Menjahit']);
        $this->createSkills($pakBudi, ['Pertanian Organik', 'Budaya Lokal', 'Pengalaman Komunitas']);
        $this->createSkills($organizer, ['Manajemen Acara', 'Pengelolaan Sampah']);
        $this->createSkills($andi, ['Desain Poster', 'Fotografi']);
        $this->createSkills($maya, ['Literasi Digital', 'Public Speaking']);

        $digitalPaymentNeed = Need::factory()->completed()->create(['user_id' => $pakBudi->id, 'title' => 'Ingin belajar pembayaran digital', 'description' => 'Saya ingin bisa menggunakan pembayaran QRIS untuk menerima pembayaran hasil panen dan berbelanja dengan aman.', 'category' => 'Teknologi']);
        $smartphoneNeed = Need::factory()->matched()->create(['user_id' => $buSari->id, 'title' => 'Butuh pendampingan menggunakan smartphone', 'description' => 'Saya ingin lebih lancar memakai aplikasi pesan dan kamera untuk kegiatan komunitas.', 'category' => 'Teknologi']);
        $gardenNeed = Need::factory()->open()->create(['user_id' => $raka->id, 'title' => 'Mencari mentor kebun organik', 'description' => 'Saya ingin belajar menanam sayur di lahan sempit bersama warga yang berpengalaman.', 'category' => 'Lingkungan']);
        Need::factory()->open()->create(['user_id' => $organizer->id, 'title' => 'Butuh desain poster kegiatan warga', 'description' => 'Kami membutuhkan poster sederhana untuk mengajak warga mengikuti kegiatan bank sampah.', 'category' => 'Kreatif']);
        Need::factory()->matched()->create(['user_id' => $maya->id, 'title' => 'Belajar promosi usaha rumahan', 'description' => 'Saya ingin memahami cara membuat promosi digital untuk produk makanan rumahan.', 'category' => 'Usaha']);
        $cancelledNeed = Need::factory()->cancelled()->create(['user_id' => $dimas->id, 'title' => 'Pendampingan membuat CV', 'description' => 'Saya sempat mencari pendampingan untuk membuat CV, tetapi jadwal saya berubah.', 'category' => 'Pendidikan']);

        $digitalPaymentConnection = Connection::factory()->completed()->create(['need_id' => $digitalPaymentNeed->id, 'mentor_id' => $raka->id, 'mentee_id' => $pakBudi->id]);
        $completedSession = Session::factory()->completed()->create(['connection_id' => $digitalPaymentConnection->id, 'scheduled_at' => now()->subDays(7), 'duration_minutes' => 90, 'location' => 'Rumah Pak Budi', 'notes' => 'Pak Budi berhasil mencoba pembayaran QRIS dan menyimpan kontak bantuan.', 'completed_at' => now()->subDays(7)->addMinutes(90)]);
        $smartphoneConnection = Connection::factory()->connected()->create(['need_id' => $smartphoneNeed->id, 'mentor_id' => $raka->id, 'mentee_id' => $buSari->id]);
        Session::factory()->scheduled()->create(['connection_id' => $smartphoneConnection->id, 'scheduled_at' => now()->addDays(2), 'duration_minutes' => 60, 'location' => 'Balai Warga RW 05', 'notes' => 'Latihan menggunakan kamera dan aplikasi pesan.']);
        Connection::factory()->pending()->create(['need_id' => $gardenNeed->id, 'mentor_id' => $pakBudi->id, 'mentee_id' => $raka->id]);
        $cancelledConnection = Connection::factory()->cancelled()->create(['need_id' => $cancelledNeed->id, 'mentor_id' => $maya->id, 'mentee_id' => $dimas->id]);
        Session::factory()->cancelled()->create(['connection_id' => $cancelledConnection->id, 'scheduled_at' => now()->subDay(), 'duration_minutes' => 60, 'location' => 'Rumah Belajar Sambung', 'notes' => 'Sesi dibatalkan karena jadwal peserta berubah.']);

        $bankSampah = Event::factory()->completed()->create(['organizer_id' => $organizer->id, 'title' => 'Bank Sampah RW 05', 'description' => 'Kegiatan memilah sampah rumah tangga, menimbang setoran, dan belajar daur ulang bersama warga.', 'category' => 'Lingkungan', 'location' => 'Balai Warga RW 05', 'latitude' => -6.2605120, 'longitude' => 106.8073220, 'event_date' => now()->subDays(5), 'max_participants' => 40]);
        $kelasUmkm = Event::factory()->open()->create(['organizer_id' => $organizer->id, 'title' => 'Kelas Digital UMKM', 'description' => 'Belajar membuat katalog sederhana dan menerima pembayaran digital untuk usaha warga.', 'category' => 'Teknologi', 'location' => 'Aula Kelurahan', 'latitude' => -6.2553300, 'longitude' => 106.8159000, 'event_date' => now()->addDays(10), 'max_participants' => 30]);
        Event::factory()->completed()->create(['organizer_id' => $organizer->id, 'title' => 'Festival Budaya Kampung', 'description' => 'Warga berbagi cerita, kuliner, dan permainan tradisional untuk mempererat kebersamaan.', 'category' => 'Budaya', 'location' => 'Lapangan Kampung', 'latitude' => -6.2489200, 'longitude' => 106.8197100, 'event_date' => now()->subDays(12), 'max_participants' => 80]);
        Event::factory()->open()->create(['organizer_id' => $organizer->id, 'title' => 'Pelatihan Kebun Organik', 'description' => 'Praktik membuat kompos dan menanam sayur untuk kebun rumah.', 'category' => 'Lingkungan', 'location' => 'Kebun Komunitas', 'latitude' => -6.2710400, 'longitude' => 106.7994200, 'event_date' => now()->addDays(18), 'max_participants' => 25]);
        Event::factory()->draft()->create(['organizer_id' => $organizer->id, 'title' => 'Klinik CV untuk Pemuda', 'description' => 'Rancangan kegiatan untuk membantu pemuda menyusun CV dan portofolio.', 'category' => 'Pendidikan', 'location' => 'Rumah Belajar Sambung', 'latitude' => -6.2648100, 'longitude' => 106.8131100, 'event_date' => now()->addDays(25), 'max_participants' => 20]);
        Event::factory()->cancelled()->create(['organizer_id' => $organizer->id, 'title' => 'Pasar Tukar Barang', 'description' => 'Kegiatan tukar barang layak pakai yang dijadwalkan ulang karena cuaca.', 'category' => 'Lingkungan', 'location' => 'Taman Komunitas', 'latitude' => -6.2591000, 'longitude' => 106.8028000, 'event_date' => now()->addDays(4), 'max_participants' => 35]);

        $rakaBankSampahParticipation = Participation::factory()->attended()->create(['event_id' => $bankSampah->id, 'user_id' => $raka->id, 'joined_at' => now()->subDays(12), 'completed_at' => now()->subDays(5)]);
        $buSariBankSampahParticipation = Participation::factory()->attended()->create(['event_id' => $bankSampah->id, 'user_id' => $buSari->id, 'joined_at' => now()->subDays(11), 'completed_at' => now()->subDays(5)]);
        $pakBudiBankSampahParticipation = Participation::factory()->attended()->create(['event_id' => $bankSampah->id, 'user_id' => $pakBudi->id, 'joined_at' => now()->subDays(9), 'completed_at' => now()->subDays(5)]);
        Participation::factory()->joined()->create(['event_id' => $kelasUmkm->id, 'user_id' => $raka->id, 'joined_at' => now()->subDay()]);
        Participation::factory()->joined()->create(['event_id' => $kelasUmkm->id, 'user_id' => $maya->id, 'joined_at' => now()->subDays(2)]);
        Participation::factory()->joined()->create(['event_id' => $kelasUmkm->id, 'user_id' => $andi->id, 'joined_at' => now()->subDays(3)]);

        Message::factory()->forMentoring($digitalPaymentConnection, $raka)->create(['content' => 'Selamat sore, Pak Budi. Besok saya bantu praktik pembayaran QRIS, ya.', 'created_at' => now()->subDays(8)]);
        Message::factory()->forMentoring($digitalPaymentConnection, $pakBudi)->create(['content' => 'Terima kasih, Raka. Saya sudah menyiapkan ponsel dan catatan.', 'created_at' => now()->subDays(8)->addMinutes(10)]);
        Message::factory()->forEvent($bankSampah, $organizer)->create(['content' => 'Terima kasih sudah hadir. Sampah yang terkumpul hari ini akan kami timbang bersama.', 'created_at' => now()->subDays(5)->addHours(2)]);
        Message::factory()->forEvent($bankSampah, $raka)->create(['content' => 'Senang bisa ikut. Saya jadi tahu cara memilah sampah organik dan anorganik.', 'created_at' => now()->subDays(5)->addHours(3)]);

        ImpactLog::factory()->forSession($completedSession)->create(['description' => 'Mengajarkan pembayaran digital kepada Pak Budi']);
        ImpactLog::factory()->forParticipation($rakaBankSampahParticipation)->create(['description' => 'Mengikuti kegiatan bank sampah']);
        ImpactLog::factory()->forParticipation($buSariBankSampahParticipation)->create(['description' => 'Mendukung kegiatan bank sampah bersama warga']);
        ImpactLog::factory()->forParticipation($pakBudiBankSampahParticipation)->create(['description' => 'Berpartisipasi dalam kegiatan bank sampah']);
    }

    /**
     * @param  array<int, string>  $skills
     */
    private function createSkills(User $user, array $skills): void
    {
        foreach ($skills as $skill) {
            Skill::factory()->create(['user_id' => $user->id, 'name' => $skill]);
        }
    }
}
