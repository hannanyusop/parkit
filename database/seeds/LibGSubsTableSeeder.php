<?php

use Illuminate\Database\Seeder;

class LibGSubsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lib_g_subs')->delete();
        
        \DB::table('lib_g_subs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'g_parent_id' => 1,
                'code' => '010',
                'name' => 'BIBLIOGAFI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'g_parent_id' => 1,
                'code' => '020',
                'name' => 'SAINS PERPUSTAKAAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'g_parent_id' => 1,
                'code' => '030',
                'name' => 'ENSIKLOPEDIA AM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'g_parent_id' => 1,
                'code' => '040',
                'name' => 'BELUM DITENTUKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'g_parent_id' => 1,
                'code' => '050',
                'name' => 'TERBITAN BERKALA AM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'g_parent_id' => 1,
                'code' => '060',
                'name' => 'PERTUBUHAN AM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'g_parent_id' => 1,
                'code' => '070',
                'name' => 'KEWARTAWANAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'g_parent_id' => 1,
                'code' => '080',
                'name' => 'KOLEKSI KARYA AM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'g_parent_id' => 1,
                'code' => '090',
                'name' => 'MANUSKRIP DAN BUKU NADIR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'g_parent_id' => 2,
                'code' => '110',
                'name' => 'WUJUDIAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'g_parent_id' => 2,
                'code' => '120',
                'name' => 'ILMU SEBAB TUJUAN MANUSIA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'g_parent_id' => 2,
                'code' => '130',
                'name' => 'PSIKOLOGI BIASA DAN GHAIB',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'g_parent_id' => 2,
                'code' => '140',
                'name' => 'PENDAPAT FALSAFAH TERTENTU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'g_parent_id' => 2,
                'code' => '150',
                'name' => 'PSIKOLOGI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'g_parent_id' => 2,
                'code' => '160',
                'name' => 'ILMU MANTIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'g_parent_id' => 2,
                'code' => '170',
            'name' => 'ETIKA (AKHLAK)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'g_parent_id' => 2,
                'code' => '180',
                'name' => 'FASAFAH TIMUR',
                'created_at' => '2020-09-14 18:24:28',
                'updated_at' => '2020-09-14 18:24:28',
            ),
            17 => 
            array (
                'id' => 18,
                'g_parent_id' => 2,
                'code' => '190',
                'name' => 'FALSAFAH BARAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'g_parent_id' => 3,
                'code' => '210',
                'name' => 'AGAMA KETUHANAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'g_parent_id' => 3,
                'code' => '220',
            'name' => 'KITAB INJIL (AGAMA KRISTIAN)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'g_parent_id' => 3,
                'code' => '230',
                'name' => 'ASAS AJARAN KRISTIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'g_parent_id' => 3,
                'code' => '240',
                'name' => 'MORAL DAN IBADAT KRISTIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'g_parent_id' => 3,
                'code' => '250',
                'name' => 'TEOLOGI MISYEN DAN CATATAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'g_parent_id' => 3,
                'code' => '260',
                'name' => 'ASPEK SOSIAL DAN HAL EHWAL ISLAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'g_parent_id' => 3,
                'code' => '270',
                'name' => 'SEJARAH DAN GEOGRAFI GEREJA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'g_parent_id' => 3,
                'code' => '280',
                'name' => 'MAZHAB DAN PUAS KRISTIAN',
                'created_at' => '2020-09-14 18:29:10',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'g_parent_id' => 3,
                'code' => '290',
                'name' => 'AGAMA-AGAMA LAIN DAN PERBANDIGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'g_parent_id' => 4,
                'code' => '310',
                'name' => 'PERANGKAAN, STATISTIL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'g_parent_id' => 4,
                'code' => '320',
                'name' => 'SAINS POLITIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'g_parent_id' => 4,
                'code' => '330',
                'name' => 'EKONOMI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'g_parent_id' => 4,
                'code' => '340',
                'name' => 'UNDANG-UNDANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'g_parent_id' => 4,
                'code' => '350',
                'name' => 'PENTADBIRAN AWAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'g_parent_id' => 4,
                'code' => '360',
                'name' => 'PERKHIDAMATAN SOSIAL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'g_parent_id' => 4,
                'code' => '370',
                'name' => 'PENDIDIKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'g_parent_id' => 4,
                'code' => '380',
                'name' => 'PERDAGANGAN DAN ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'g_parent_id' => 4,
                'code' => '390',
                'name' => 'ADAT RESAM DAN BUDAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'g_parent_id' => 5,
                'code' => '410',
                'name' => 'LINGUISTIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'g_parent_id' => 5,
                'code' => '420',
                'name' => 'BAHASA INGGERIS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'g_parent_id' => 5,
                'code' => '430',
                'name' => 'BAHASA JERMAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'g_parent_id' => 5,
                'code' => '440',
                'name' => 'BAHASA PERANCIS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'g_parent_id' => 5,
                'code' => '450',
                'name' => 'BAHASA ITALI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'g_parent_id' => 5,
                'code' => '460',
                'name' => 'BAHASA PROTUGIS, SEPANYOL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'g_parent_id' => 5,
                'code' => '470',
                'name' => 'BAHASA LATIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'g_parent_id' => 5,
                'code' => '480',
                'name' => 'BAHASA GREEK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'g_parent_id' => 5,
                'code' => '490',
                'name' => 'BAHASA LAIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'g_parent_id' => 6,
                'code' => '510',
                'name' => 'MATEMATIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'g_parent_id' => 6,
                'code' => '520',
                'name' => 'ASTRONOMI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'g_parent_id' => 6,
                'code' => '530',
                'name' => 'FIZIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'g_parent_id' => 6,
                'code' => '540',
                'name' => 'KIMIA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'g_parent_id' => 6,
                'code' => '550',
                'name' => 'SAINS BUMI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'g_parent_id' => 6,
                'code' => '560',
                'name' => 'KAJI FOSIL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'g_parent_id' => 6,
                'code' => '570',
                'name' => 'SAINS HAYAT',
                'created_at' => '2020-09-14 18:38:39',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'g_parent_id' => 6,
                'code' => '580',
                'name' => 'SAINS TUMBUHAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'g_parent_id' => 6,
                'code' => '590',
                'name' => 'SAINS HAIWAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'g_parent_id' => 7,
                'code' => '610',
                'name' => 'PERUBATAN',
                'created_at' => '2020-09-14 18:40:08',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'g_parent_id' => 7,
                'code' => '620',
                'name' => 'KEJURUTERAAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'g_parent_id' => 7,
                'code' => '630',
                'name' => 'PERTANIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'g_parent_id' => 7,
                'code' => '640',
                'name' => 'SAINS RUMAHTANGGA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'g_parent_id' => 7,
                'code' => '650',
                'name' => 'PERKHIDMATAN PENGURUSAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'g_parent_id' => 7,
                'code' => '660',
                'name' => 'TEKNOLOGI KIMIA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'g_parent_id' => 7,
                'code' => '670',
                'name' => 'HASIL PERUSAHAAN KIMIA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'g_parent_id' => 7,
                'code' => '680',
                'name' => 'HASIL KILANG LAIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'g_parent_id' => 7,
                'code' => '690',
                'name' => 'BANGUNAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'g_parent_id' => 8,
                'code' => '710',
                'name' => 'SENI TAMAN DAN BUDAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'g_parent_id' => 8,
                'code' => '720',
                'name' => 'SENIBINA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'g_parent_id' => 8,
                'code' => '730',
                'name' => 'ARCA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'g_parent_id' => 8,
                'code' => '740',
                'name' => 'LUKISAN DAN SENI HIBURAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'g_parent_id' => 8,
                'code' => '750',
                'name' => 'MENCAT DAN KEPENDIRIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'g_parent_id' => 8,
                'code' => '760',
                'name' => 'SENI GRAFIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'g_parent_id' => 8,
                'code' => '770',
                'name' => 'SENIFOTO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'g_parent_id' => 8,
                'code' => '780',
                'name' => 'MUZIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'g_parent_id' => 8,
                'code' => '790',
                'name' => 'SENI HIBURAN & LAKONAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'g_parent_id' => 9,
                'code' => '810',
                'name' => 'SASTERA AMERIKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'g_parent_id' => 9,
                'code' => '820',
                'name' => 'SASTERA INGGERIS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 76,
                'g_parent_id' => 9,
                'code' => '830',
                'name' => 'SASTERA JERMAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 77,
                'g_parent_id' => 9,
                'code' => '840',
                'name' => 'SASTERA PRANCIS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 78,
                'g_parent_id' => 9,
                'code' => '850',
                'name' => 'SASTERA ITALI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 79,
                'g_parent_id' => 10,
                'code' => '910',
                'name' => 'GEOGRAFI DAN LAWATAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 80,
                'g_parent_id' => 10,
                'code' => '920',
                'name' => 'BIOGRAFI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 81,
                'g_parent_id' => 10,
                'code' => '930',
                'name' => 'SEJARAH AM DUNIA PURBA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 82,
                'g_parent_id' => 10,
                'code' => '940',
                'name' => 'EROPAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 83,
                'g_parent_id' => 10,
                'code' => '950',
                'name' => 'ASIA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 84,
                'g_parent_id' => 10,
                'code' => '960',
                'name' => 'AFRICA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 85,
                'g_parent_id' => 10,
                'code' => '970',
                'name' => 'AMERIKA UTARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 86,
                'g_parent_id' => 10,
                'code' => '980',
                'name' => 'AMERIKA SELATAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 87,
                'g_parent_id' => 10,
                'code' => '990',
                'name' => 'BAAHAGIAN DUNIA LAIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}