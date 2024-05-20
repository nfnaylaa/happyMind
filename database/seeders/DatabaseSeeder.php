<?php

namespace Database\Seeders;

use App\Models\Tips;
use App\Models\Kuesioner;
use Illuminate\Database\Seeder;
use App\Models\PertanyaanStresses;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(5)->create();

        // PertanyaanStresses::create([
        //     'question' =>'Persaingan nilai dengan teman saya cukup ketat'
        // ]);

        Tips::create([
            'tittle'=>"Menghadapi Stres Akademik dengan Meditasi: Teknik Relaksasi untuk Keseimbangan Mental dan Emosional",
            'slug'=>"teknik-relaksasi-untuk-keseimbangan-mental-dan-emosional",
            'excerpt'=>"Stres akademik dapat menjadi tantangan besar bagi mahasiswa. Namun, dengan menggunakan teknik relaksasi seperti meditasi, Anda dapat mengurangi stres dan menciptakan keseimbangan mental serta emosional yang lebih baik. Artikel ini akan membahas manfaat meditasi, langkah-langkah praktis untuk memulai meditasi, serta cara mengintegrasikannya dalam rutinitas harian.",
            "body"=>"<p>Stres akademik dapat menjadi tantangan besar bagi mahasiswa. Namun, dengan menggunakan teknik relaksasi seperti meditasi, Anda dapat mengurangi stres dan menciptakan keseimbangan mental serta emosional yang lebih baik. Artikel ini akan membahas manfaat meditasi, langkah-langkah praktis untuk memulai meditasi, serta cara mengintegrasikannya dalam rutinitas harian.</p>

            <p>Manfaat Meditasi: Meditasi telah terbukti menjadi alat yang ampuh untuk mengurangi stres dan meningkatkan konsentrasi. Dengan mengalihkan perhatian pada pernapasan dan merenungkan pikiran-pikiran yang muncul, meditasi membantu menciptakan keadaan pikiran yang lebih tenang. Selain itu, praktik meditasi secara teratur dapat meningkatkan kesejahteraan mental dan emosional secara keseluruhan.</p>
          
            <p>Langkah-langkah Praktis untuk Meditasi:</p>
            <ol>
              <li>Temukan tempat yang tenang: Cari tempat yang sepi dan nyaman di mana Anda dapat duduk atau berbaring dengan tegak.</li>
              <li>Pilih posisi duduk yang nyaman: Posisi lotus, setengah lotus, atau duduk di kursi dengan punggung lurus dapat digunakan.</li>
              <li>Fokus pada pernapasan: Mulailah dengan mengamati aliran napas secara alami. Rasakan napas masuk dan keluar tanpa mengubahnya.</li>
              <li>Mengatasi gangguan pikiran: Jika pikiran-pikiran muncul, perhatikan dan biarkan mereka pergi tanpa mengikuti atau menilai.</li>
              <li>Lama waktu meditasi: Mulailah dengan sesi meditasi yang singkat, seperti 5-10 menit, dan tingkatkan secara bertahap seiring waktu.</li>
            </ol>
          
            <p>Integrasi Meditasi dalam Rutinitas Harian: Agar meditasi efektif, penting untuk mengintegrasikannya ke dalam rutinitas harian. Berikut adalah beberapa tips:</p>
            <ul>
              <li>Jadwalkan waktu yang tetap: Tentukan waktu yang konsisten setiap hari untuk meditasi, misalnya di pagi hari sebelum memulai aktivitas atau di malam hari sebelum tidur.</li>
              <li>Gunakan pengingat: Atur pengingat di ponsel atau meja kerja untuk mengingatkan Anda melakukan sesi meditasi.</li>
              <li>Cari dukungan: Ajak teman atau keluarga untuk meditasi bersama, sehingga saling memberi dukungan dan menjaga akuntabilitas.</li>
              
                </ul>
                <p>Hasil yang Diharapkan: Dengan praktik meditasi yang konsisten, Anda dapat mengalami hasil yang positif dalam menghadapi stres akademik. Manfaatnya meliputi pengurangan stres, peningkatan fokus, konsentrasi, dan keadaan pikiran yang lebih tenang. Meditasi juga dapat membantu Anda mempertahankan kesejahteraan mental dan emosional yang seimbang.</p>
                <p>Meditasi adalah alat yang efektif untuk mengelola stres akademik. Dengan mengikuti langkah-langkah praktis yang disebutkan di atas dan mengintegrasikan meditasi ke dalam rutinitas harian, Anda dapat mencapai keseimbangan mental dan emosional yang lebih baik. Selamat mencoba!</p>",
        ]);
        Tips::create([
            'tittle'=>"Strategi Efektif untuk Mengatasi Stres Akademik dengan Mengatur Waktu",
            'slug'=>"mengatur-waktu",
            'excerpt'=>"Pendahuluan: Stres akademik seringkali disebabkan oleh tuntutan jadwal yang padat dan tugas yang menumpuk. Dalam menghadapi stres tersebut, mengatur waktu dengan baik dapat menjadi kunci sukses. Artikel ini akan membahas strategi efektif untuk mengatur waktu guna mengatasi stres akademik dan meningkatkan produktivitas.",
            "body"=>"<p>Pendahuluan: Stres akademik seringkali disebabkan oleh tuntutan jadwal yang padat dan tugas yang menumpuk. Dalam menghadapi stres tersebut, mengatur waktu dengan baik dapat menjadi kunci sukses. Artikel ini akan membahas strategi efektif untuk mengatur waktu guna mengatasi stres akademik dan meningkatkan produktivitas.</p>

            <ol>
              <li>Identifikasi Prioritas: Tentukan tugas-tugas yang paling penting dan perlakukan mereka sebagai prioritas utama. Fokuslah pada hal-hal yang benar-benar membutuhkan perhatian dan jangan terjebak dalam tugas-tugas yang tidak mendesak atau tidak memberikan kontribusi signifikan.</li>
              <li>Buat Rencana Harian atau Mingguan: Buatlah jadwal studi yang terperinci berdasarkan waktu yang tersedia. Pecahlah tugas-tugas besar menjadi langkah-langkah yang lebih kecil dan alokasikan waktu yang khusus untuk setiap tugas. Pastikan untuk menyisakan waktu istirahat yang cukup agar pikiran tetap segar.</li>
              <li>Manfaatkan Teknologi: Gunakan alat bantu seperti aplikasi pengelola waktu atau kalender digital untuk membantu mengatur jadwal studi Anda. Manfaatkan pemberitahuan dan pengingat untuk mengingatkan Anda tentang tugas-tugas yang harus diselesaikan.</li>
              <li>Prinsip 80/20: Prinsip 80/20 atau Prinsip Pareto menyatakan bahwa sekitar 80% hasil dapat dicapai dari 20% upaya yang diberikan. Identifikasi tugas-tugas yang paling berdampak dan fokuskan energi Anda pada mereka. Jangan khawatir tentang menyelesaikan semua hal, tetapi fokuslah pada hal-hal yang memberikan hasil terbaik.</li>
              <li>Kelola Gangguan dan Prokrastinasi: Identifikasi faktor-faktor yang mengganggu produktivitas Anda, seperti media sosial atau percakapan yang tidak perlu. Buat lingkungan yang bebas dari gangguan dan gunakan teknik seperti Pomodoro Technique (kerja selama 25 menit dan istirahat selama 5 menit) untuk meningkatkan fokus Anda.</li>
              <li>Istirahat dan Self-Care: Jangan lupakan pentingnya istirahat yang cukup dan self-care. Dalam mengatur waktu, sisihkan waktu untuk beristirahat, tidur yang cukup, dan melakukan kegiatan yang Anda nikmati untuk mengisi energi Anda.</li>

              </ol>
              <p>Mengatur waktu dengan baik adalah keterampilan yang penting dalam mengatasi stres akademik. Dengan menerapkan strategi-strategi yang disebutkan di atas, Anda dapat meningkatkan produktivitas, mengurangi stres, dan mencapai keseimbangan antara studi dan kehidupan pribadi. Selamat mencoba!</p>",
        ]);
        // Tips::create([
        //     'tittle'=>"Menghadapi Stres Akademik dengan Meditasi: Teknik Relaksasi untuk Keseimbangan Mental dan Emosional",
        //     'slug'=>"teknik-relaksasi-untuk-keseimbangan-mental-dan-emosional",
        //     'excerpt'=>"Stres akademik dapat menjadi tantangan besar bagi mahasiswa. Namun, dengan menggunakan teknik relaksasi seperti meditasi, Anda dapat mengurangi stres dan menciptakan keseimbangan mental serta emosional yang lebih baik. Artikel ini akan membahas manfaat meditasi, langkah-langkah praktis untuk memulai meditasi, serta cara mengintegrasikannya dalam rutinitas harian.",
        //     "body"=>""
        // ]);
        // Tips::create([
        //     'tittle'=>"Menghadapi Stres Akademik dengan Meditasi: Teknik Relaksasi untuk Keseimbangan Mental dan Emosional",
        //     'slug'=>"teknik-relaksasi-untuk-keseimbangan-mental-dan-emosional",
        //     'excerpt'=>"Stres akademik dapat menjadi tantangan besar bagi mahasiswa. Namun, dengan menggunakan teknik relaksasi seperti meditasi, Anda dapat mengurangi stres dan menciptakan keseimbangan mental serta emosional yang lebih baik. Artikel ini akan membahas manfaat meditasi, langkah-langkah praktis untuk memulai meditasi, serta cara mengintegrasikannya dalam rutinitas harian.",
        //     "body"=>""
        // ]);
        // Tips::create([
        //     'tittle'=>"Menghadapi Stres Akademik dengan Meditasi: Teknik Relaksasi untuk Keseimbangan Mental dan Emosional",
        //     'slug'=>"teknik-relaksasi-untuk-keseimbangan-mental-dan-emosional",
        //     'excerpt'=>"Stres akademik dapat menjadi tantangan besar bagi mahasiswa. Namun, dengan menggunakan teknik relaksasi seperti meditasi, Anda dapat mengurangi stres dan menciptakan keseimbangan mental serta emosional yang lebih baik. Artikel ini akan membahas manfaat meditasi, langkah-langkah praktis untuk memulai meditasi, serta cara mengintegrasikannya dalam rutinitas harian.",
        //     "body"=>""
        // ]);

        $questions = [
            'Persaingan nilai dengan teman saya cukup ketat',
            'Dosen saya mengkritisi performa akademik saya',
            'Dosen saya memiliki ekspektasi yang tidak realistis terhadap saya',
            'Ekspektasi orang tua yang tidak realistis membuat saya tertekan',
            'Alokasi waktu untuk kelas dan tugas akademik belum tepat bagi saya',
            'Beban kurikulum terlalu berat bagi saya',
            'Saya yakin bahwa tugas yang diberikan terlalu banyak',
            'Saya tidak mampu mengejar ketertinggalan dalam tugas-tugas saya',
            'Saya tidak mempunyai cukup waktu untuk bersantai setelah mengerjakan tugas',
            'Saya merasa pertanyaan yang diberikan ketika ujian seringkali sulit',
            'Saya merasa waktu yang diberikan untuk menyelesaikan ujian terlalu singkat',
            'Masa-masa ujian membuat saya tertekan',
            'Saya takut bahwa saya tidak akan menjadi mahasiswa yang sukses',
            'Saya tidak yakin karir saya akan sukses di masa depan',
            'Saya tidak dapat membuat keputusan akademik dengan mudah',
            'Saya takut gagal pada mata kuliah yang saya ambil',
            'Saya merasa kelemahan karakter yang saya miliki adalah merasa khawatir berlebih terhadap ujian',
            'Meskipun saya lulus pada ujian, saya khawatir tidak akan mendapatkan pekerjaan di masa depan',
        ];

        foreach ($questions as $question) {
            Kuesioner::create([
                'questions' => $question
            ]);
        }
     }
}
