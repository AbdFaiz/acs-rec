<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Apakah anda pernah melamar di group/perusahaan/bekerja di perusahaan ini sebelumnya? Sebagai apa?',
                'type' => 'textarea',
                'is_required' => true,
                'order' => 1
            ],
            [
                'question' => 'Apakah anda terikat kontrak dengan perusahaan tempat kerja saat ini?',
                'type' => 'select',
                'options' => json_encode(['Ya', 'Tidak']),
                'is_required' => true,
                'order' => 2
            ],
            [
                'question' => 'Apakah anda keberatan bila kami minta referensi pada perusahaan tempat anda pernah bekerja?',
                'type' => 'select',
                'options' => json_encode(['Ya', 'Tidak']),
                'is_required' => true,
                'order' => 3
            ],
            [
                'question' => 'Apakah anda punya pekerjaan sampingan atau part time? Sebagai dan berapa gaji/penghasilannya?',
                'type' => 'textarea',
                'is_required' => false,
                'order' => 4
            ],
            [
                'question' => 'Apakah anda mempunyai teman/saudara yang bekerja di group/perusahaan ini? Siapa dan hubungan?',
                'type' => 'textarea',
                'is_required' => false,
                'order' => 5
            ],
            [
                'question' => 'Apakah anda pernah menderita sakit keras/kronis/kecelakaan berat/operasi? Jelaskan?',
                'type' => 'textarea',
                'is_required' => false,
                'order' => 6
            ],
            [
                'question' => 'Apakah anda memiliki utang yang belum dilunasi? Berapa besarnya dan sudah berapa lama tidak terbayarkan?',
                'type' => 'textarea',
                'is_required' => false,
                'order' => 7
            ],
            [
                'question' => 'Apakah anda terdaftar/aktif organisasi lembaga swadaya masyarakat (LSM)? Nama dan sebagai apa?',
                'type' => 'textarea',
                'is_required' => false,
                'order' => 8
            ],
            [
                'question' => 'Apakah anda pernah berurusan dengan polisi karena tindak kejahatan?',
                'type' => 'select',
                'options' => json_encode(['Ya', 'Tidak']),
                'is_required' => true,
                'order' => 9
            ],
            [
                'question' => 'Apakah anda pernah terlibat narkoba?',
                'type' => 'select',
                'options' => json_encode(['Ya', 'Tidak']),
                'is_required' => true,
                'order' => 10
            ],
            [
                'question' => 'Apakah anda memiliki tato? Dimana?',
                'type' => 'textarea',
                'is_required' => false,
                'order' => 11
            ],
            [
                'question' => 'Apakah anda memiliki tindik? Dimana?',
                'type' => 'textarea',
                'is_required' => false,
                'order' => 12
            ],
            [
                'question' => 'Sebutkan minimal 3 (tiga) apakah yang anda rasakan sebagai kelebihan anda?',
                'type' => 'textarea',
                'is_required' => true,
                'order' => 13
            ],
            [
                'question' => 'Sebutkan minimal 3 (tiga) apakah yang anda rasakan sebagai kelemahan anda?',
                'type' => 'textarea',
                'is_required' => true,
                'order' => 14
            ],
            [
                'question' => 'Jika diterima, bersediakah anda bertugas keluar kota?',
                'type' => 'select',
                'options' => json_encode(['Ya', 'Tidak', 'Tergantung kondisi']),
                'is_required' => true,
                'order' => 15
            ],
            [
                'question' => 'Jika diterima, bersediakah anda ditempatkan diluar kota? Sebutkan nama kota dan daerahnya?',
                'type' => 'textarea',
                'is_required' => false,
                'order' => 16
            ],
            [
                'question' => 'Jika diterima, bersediakah anda bekerja lembur di luar hari/jam kerja yang sudah ditentukan?',
                'type' => 'select',
                'options' => json_encode(['Ya', 'Tidak', 'Tergantung kondisi']),
                'is_required' => true,
                'order' => 17
            ],
            [
                'question' => 'Jika diterima, berapa gaji/penghasilan yang anda harapkan dan fasilitas apa saja?',
                'type' => 'textarea',
                'is_required' => true,
                'order' => 18
            ],
            [
                'question' => 'Jika diterima, kapan anda dapat mulai bekerja?',
                'type' => 'text',
                'is_required' => true,
                'order' => 19
            ],
            [
                'question' => 'Apabila dikemudian hari anda ingin berhenti bekerja di Perusahaan ini, bersediakah anda memberitahukan secara tertulis sekurang-kurangnya 1 (satu) bulan?',
                'type' => 'select',
                'options' => json_encode(['Ya', 'Tidak']),
                'is_required' => true,
                'order' => 20
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
