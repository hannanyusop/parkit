<?php
namespace App\Import;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\StudentHasClass;
use App\Models\StudentHasParent;
use App\Models\StudentParent;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel{

    public function model(array $row){

        if(count($row) != 62){
            return  redirect()->route('admin.student.upload')->withErrors('Dokumen Excel tidak menepati syarat!');
        }

        $year = (session()->has('year'))? session('year') : date('Y');

        if(!is_null($row[0]) && is_numeric($row[0])){

            /*
                array:62 [▼
                  0 => "Bil"
                  1 => "ID Murid"
                  2 => "Nama"
                  3 => "No. KP"
                  4 => "No. Sijil Lahir"
                  5 => "Tarikh Lahir"
                  6 => "Tarikh Masuk Sekolah"
                  7 => "Tarikh Masuk Kelas"
                  8 => "Keterangan Tingkatan Tahun"
                  9 => "Nama Kelas"
                  10 => "Keterangan Aliran"
                  11 => "Keterangan Bidang"
                  12 => "Status DLP"
                  13 => "Jantina"
                  14 => "Kaum"
                  15 => "Agama"
                  16 => "Warganegara"
                  17 => "Negara Asal"
                  18 => "Yatim"
                  19 => "Asrama"
                  20 => "OKU"
                  21 => "Tarikh Daftar OKU"
                  22 => "No. OKU"
                  23 => "Jenis OKU"
                  24 => "Tahap OKU"
                  25 => "Tahap Pembelajaran"
                  26 => "Alat Bantuan 1"
                  27 => "Alat Bantuan 2"
                  28 => "Keterangan Program"
                  29 => "Jenis Lain"
                  30 => "Alamat Rumah"
                  31 => "No. KP Penjaga 1"
                  32 => "Nama Penjaga 1"
                  33 => "Hubungan"
                  34 => "Warganegara Penjaga 1"
                  35 => "Kaum Penjaga 1"
                  36 => "Agama Penjaga 1"
                  37 => "Pekerjaan Penjaga 1"
                  38 => "Kategori Kerja Penjaga 1"
                  39 => "No. Tel Bimbit Penjaga 1"
                  40 => "No. Tel Rumah Penjaga 1"
                  41 => "Pendapatan Penjaga 1"
                  42 => "Status Pendapatan Penjaga 1"
                  43 => "Nama Majikan Penjaga 1"
                  44 => "Tel. Pejabat Penjaga 1"
                  45 => "Alamat Majikan Penjaga 1"
                  46 => "Jumlah Tanggungan"
                  47 => "No. KP Penjaga 2"
                  48 => "Nama Penjaga 2"
                  49 => "Hubungan"
                  50 => "Warganegara Penjaga 2"
                  51 => "Kaum Penjaga 2"
                  52 => "Agama Penjaga 2"
                  53 => "Pekerjaan Penjaga 2"
                  54 => "Kategori Kerja Penjaga 2"
                  55 => "No. Tel Bimbit Penjaga 2"
                  56 => "No. Tel Rumah Penjaga 2"
                  57 => "Pendapatan Penjaga 2"
                  58 => "Status Pendapatan Penjaga 2"
                  59 => "Nama Majikan Penjaga 2"
                  60 => "Tel. Pejabat Penjaga 2"
                  61 => "Alamat Majikan Penjaga 2"
                ]
                */


            $myic = new \MyIC();

            $details = $myic->get($row[3],'Y-m-j');

            $student = Student::updateOrCreate(['no_ic' => $row[3]], [
                'name' => $row[2],
                'birth_certificate' => $row[4],
                'dob' => $details['dob'],
                'class_id' => 0,
                'status' => 1,
                'gender' => $details['gender'],
                'religion' => $row[15],
                'race' => $row[14],
                'nationality' => $row[16],
                'is_orphans' => (strtoupper($row[18]) == "YA")? 1 : 0,
                'is_hostel' => (strtoupper($row[19]) == "YA")? 1 : 0,
                'is_oku' => (strtoupper($row[20]) == "YA")? 1 : 0,
                'oku_register_date' => $row[21],
                'oku_no' => $row[22],
                'oku_type' => $row[23],
                'address' => $row[30],
                'image_url' => 'img/student/default.png',
            ]);

            preg_match_all('!\d+!', $row[9], $matches);
            $form = (isset($matches[0][0]))? $matches[0][0] : 0;

            $class = Classroom::updateOrCreate(['generate_name' => $row[9]], [
                'form' => (is_numeric($form))? $form : 0,
                'name' => $row[9],
                'user_id' => null,
                'is_active' => 1,
            ]);

            $studenthasClass = StudentHasClass::firstOrCreate(['student_id' => $student->id, 'class_id' => $class->id], [
                'student_id' => $student->id,
                'class_id' => $class->id,
                'year' => $year
            ]);

            $student->update(['class_id' => $class->id]);

            if($row[31] != ''){
                $parent = StudentParent::updateOrCreate(['no_ic' => $row[31]], [
                    'name' => $row[32],
                    'nationality' => $row[34],
                    'race' => $row[35],
                    'religion' => $row[36],
                    'job' => $row[37],
                    'income' => $row[41],
                    'income_status' => $row[42],
                    'phone_1' => $row[39],
                    'phone_2' => $row[40],
                    'employer_name' => $row[43],
                    'employer_phone' => $row[44],
                    'employer_address' => $row[45],
                ]);

                $studentHasParent = StudentHasParent::firstOrCreate(['student_id' => $student->id, 'parent_id' => $parent->id, 'is_first' => 1], [
                    'student_id' => $student->id,
                    'parent_id' => $parent->id,
                    'relation' => $row[33],
                    'is_first' => 1
                ]);
            }

            if($row[47] != ''){

                $parent2 = StudentParent::updateOrCreate(['no_ic' => $row[31]], [
                    'name' => $row[48],
                    'nationality' => $row[50],
                    'race' => $row[51],
                    'religion' => $row[52],
                    'job' => $row[53],
                    'income' => $row[57],
                    'income_status' => $row[58],
                    'phone_1' => $row[55],
                    'phone_2' => $row[56],
                    'employer_name' => $row[59],
                    'employer_phone' => $row[60],
                    'employer_address' => $row[61],
                ]);

                $studentHasParent = StudentHasParent::firstOrCreate(['student_id' => $student->id, 'parent_id' => $parent2->id, 'is_first' => 0], [
                    'student_id' => $student->id,
                    'parent_id' => $parent2->id,
                    'relation' => $row[49],
                    'is_first' => 1
                ]);
            }

            return $student;

        }

    }
}


