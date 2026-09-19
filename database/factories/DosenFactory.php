<?php
#
#namespace Database\Factories;
#
#use Illuminate\Database\Eloquent\Factories\Factory;
#
#class DosenFactory extends Factory
#{
#    public function definition(): array
#    {
#        return [
#            'nip' => $this->faker->unique()->numerify('##################'),
#            'nama' => fake('id_ID')->name(),
#            'no_telp' => '08' . $this->faker->unique()->numerify('##########'),
#            'email' => $this->faker->unique()->safeEmail(),
#        ];
#    }
#}

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    private static int $index = 0;

    private static array $data = [
        [
            'nip' => '198501152010011001',
            'nama' => 'Ir. Ahmad Fauzan, M.Kom.',
            'no_telp' => '081234560001',
            'email' => 'ahmad.fauzan@kampus.ac.id',
        ],
        [
            'nip' => '198602202011012002',
            'nama' => 'Dr. Ir. Muhammad Rizky Pratama, M.T.',
            'no_telp' => '081234560002',
            'email' => 'muhammad.rizky@kampus.ac.id',
        ],
        [
            'nip' => '198703102012031003',
            'nama' => 'Dimas Aditya Nugraha, S.Kom., M.Kom.',
            'no_telp' => '081234560003',
            'email' => 'dimas.aditya@kampus.ac.id',
        ],
        [
            'nip' => '198804252013041004',
            'nama' => 'Dr. Siti Nurhaliza, S.Kom., M.Kom.',
            'no_telp' => '081234560004',
            'email' => 'siti.nurhaliza@kampus.ac.id',
        ],
        [
            'nip' => '198905182014051005',
            'nama' => 'Rafi Maulana, S.Kom., M.T.',
            'no_telp' => '081234560005',
            'email' => 'rafi.maulana@kampus.ac.id',
        ],

        [
            'nip' => '198506122010061006',
            'nama' => 'Ir. Irwan Syahputra, M.T.',
            'no_telp' => '081234560006',
            'email' => 'irwan.syahputra@kampus.ac.id',
        ],
        [
            'nip' => '198607182011071007',
            'nama' => 'Dr. Ir. Ahmad Zulkarnain, M.T.',
            'no_telp' => '081234560007',
            'email' => 'ahmad.zulkarnain@kampus.ac.id',
        ],
        [
            'nip' => '198708232012081008',
            'nama' => 'Rina Marlina, S.T., M.Eng.',
            'no_telp' => '081234560008',
            'email' => 'rina.marlina@kampus.ac.id',
        ],
        [
            'nip' => '198809142013091009',
            'nama' => 'Dr. Muhammad Ilham, S.T., M.T.',
            'no_telp' => '081234560009',
            'email' => 'muhammad.ilham@kampus.ac.id',
        ],
        [
            'nip' => '198910052014101010',
            'nama' => 'Yoga Pratama, S.T., M.T.',
            'no_telp' => '081234560010',
            'email' => 'yoga.pratama@kampus.ac.id',
        ],

        [
            'nip' => '198502102010021011',
            'nama' => 'Ir. Fajar Hidayat, M.T.',
            'no_telp' => '081234560011',
            'email' => 'fajar.hidayat@kampus.ac.id',
        ],
        [
            'nip' => '198603152011031012',
            'nama' => 'Budi Santoso, S.T., M.T.',
            'no_telp' => '081234560012',
            'email' => 'budi.santoso@kampus.ac.id',
        ],
        [
            'nip' => '198704202012041013',
            'nama' => 'Dr. Ir. Andi Setiawan, M.T.',
            'no_telp' => '081234560013',
            'email' => 'andi.setiawan@kampus.ac.id',
        ],
        [
            'nip' => '198805122013051014',
            'nama' => 'Nurul Aisyah, S.T., M.T.',
            'no_telp' => '081234560014',
            'email' => 'nurul.aisyah@kampus.ac.id',
        ],
        [
            'nip' => '198906252014061015',
            'nama' => 'Dr. Muhammad Arif Rahman, S.T., M.T.',
            'no_telp' => '081234560015',
            'email' => 'arif.rahman@kampus.ac.id',
        ],

        [
            'nip' => '198503182010031016',
            'nama' => 'Ir. Eko Prasetyo, M.T.',
            'no_telp' => '081234560016',
            'email' => 'eko.prasetyo@kampus.ac.id',
        ],
        [
            'nip' => '198604222011041017',
            'nama' => 'Hendra Wijaya, S.T., M.T.',
            'no_telp' => '081234560017',
            'email' => 'hendra.wijaya@kampus.ac.id',
        ],
        [
            'nip' => '198705142012051018',
            'nama' => 'Dr. Agus Setiawan, S.T., M.T.',
            'no_telp' => '081234560018',
            'email' => 'agus.setiawan@kampus.ac.id',
        ],
        [
            'nip' => '198806302013061019',
            'nama' => 'Rian Kurniawan, S.T., M.Eng.',
            'no_telp' => '081234560019',
            'email' => 'rian.kurniawan@kampus.ac.id',
        ],
        [
            'nip' => '198907082014071020',
            'nama' => 'Dr. Ir. Dewi Lestari, M.T.',
            'no_telp' => '081234560020',
            'email' => 'dewi.lestari@kampus.ac.id',
        ],

        [
            'nip' => '198508122010081021',
            'nama' => 'Ir. Andi Firmansyah, M.T.',
            'no_telp' => '081234560021',
            'email' => 'andi.firmansyah@kampus.ac.id',
        ],
        [
            'nip' => '198609252011091022',
            'nama' => 'Dr. Rina Oktaviani, S.T., M.T.',
            'no_telp' => '081234560022',
            'email' => 'rina.oktaviani@kampus.ac.id',
        ],
        [
            'nip' => '198710182012101023',
            'nama' => 'Muhammad Fikri, S.T., M.Eng.',
            'no_telp' => '081234560023',
            'email' => 'muhammad.fikri@kampus.ac.id',
        ],
        [
            'nip' => '198811102013111024',
            'nama' => 'Dr. Nuraini Putri, S.T., M.T.',
            'no_telp' => '081234560024',
            'email' => 'nuraini.putri@kampus.ac.id',
        ],
        [
            'nip' => '198912202014121025',
            'nama' => 'Ir. Bagus Ramadhan, M.T.',
            'no_telp' => '081234560025',
            'email' => 'bagus.ramadhan@kampus.ac.id',
        ],

        [
            'nip' => '198601152011011026',
            'nama' => 'Dr. Ir. Agung Pratama, M.T.',
            'no_telp' => '081234560026',
            'email' => 'agung.pratama@kampus.ac.id',
        ],
        [
            'nip' => '198702252012021027',
            'nama' => 'Maya Sari, S.T., M.T.',
            'no_telp' => '081234560027',
            'email' => 'maya.sari@kampus.ac.id',
        ],
        [
            'nip' => '198803182013031028',
            'nama' => 'Dr. Rizky Maulana, S.T., M.T.',
            'no_telp' => '081234560028',
            'email' => 'rizky.maulana@kampus.ac.id',
        ],
        [
            'nip' => '198904122014041029',
            'nama' => 'Ir. Putri Maharani, M.T.',
            'no_telp' => '081234560029',
            'email' => 'putri.maharani@kampus.ac.id',
        ],
        [
            'nip' => '198605202010051030',
            'nama' => 'Andika Saputra, S.T., M.Eng.',
            'no_telp' => '081234560030',
            'email' => 'andika.saputra@kampus.ac.id',
        ],

        [
            'nip' => '198706152011061031',
            'nama' => 'Dr. Nadia Permatasari, S.T., M.T.',
            'no_telp' => '081234560031',
            'email' => 'nadia.permatasari@kampus.ac.id',
        ],
        [
            'nip' => '198807182012071032',
            'nama' => 'Ir. Fahmi Akbar, M.T.',
            'no_telp' => '081234560032',
            'email' => 'fahmi.akbar@kampus.ac.id',
        ],
        [
            'nip' => '198908252013081033',
            'nama' => 'Salsabila Putri, S.T., M.T.',
            'no_telp' => '081234560033',
            'email' => 'salsabila.putri@kampus.ac.id',
        ],
        [
            'nip' => '198604102011091034',
            'nama' => 'Dr. Ir. Hafiz Ramadhan, M.T.',
            'no_telp' => '081234560034',
            'email' => 'hafiz.ramadhan@kampus.ac.id',
        ],
        [
            'nip' => '198705222012101035',
            'nama' => 'Lilis Handayani, S.T., M.T.',
            'no_telp' => '081234560035',
            'email' => 'lilis.handayani@kampus.ac.id',
        ],

        [
            'nip' => '198806142013111036',
            'nama' => 'Dr. Fikri Hidayat, S.T., M.T.',
            'no_telp' => '081234560036',
            'email' => 'fikri.hidayat@kampus.ac.id',
        ],
        [
            'nip' => '198607122011121037',
            'nama' => 'Ir. Bayu Kurniawan, M.T.',
            'no_telp' => '081234560037',
            'email' => 'bayu.kurniawan@kampus.ac.id',
        ],
        [
            'nip' => '198809252013021038',
            'nama' => 'Dr. Dedi Irawan, S.T., M.T.',
            'no_telp' => '081234560038',
            'email' => 'dedi.irawan@kampus.ac.id',
        ],
        [
            'nip' => '198610152014031039',
            'nama' => 'Rendra Wijaya, S.T., M.Eng.',
            'no_telp' => '081234560039',
            'email' => 'rendra.wijaya@kampus.ac.id',
        ],
        [
            'nip' => '198711202015041040',
            'nama' => 'Dr. Ir. Muhammad Farhan Hakim, M.T.',
            'no_telp' => '081234560040',
            'email' => 'farhan.hakim@kampus.ac.id',
        ],
    ];

    public function definition(): array
    {
        $dosen = self::$data[self::$index % count(self::$data)];

        self::$index++;

        return $dosen;
    }
}