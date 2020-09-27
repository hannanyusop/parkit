@extends('backend.layouts.app')

@section('title', 'Keterangan Pelajar')

<?php
$breadcrumbs = [
    'Dashboard' => route('admin.dashboard'),
    'Senarai Pelajar' => route('admin.student.index'),
    $student->no_ic => ""
];
?>


@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ asset('img/student.png') }}" class="rounded-circle avatar-lg img-thumbnail w-25" alt="profile-image">

                    <h4 class="mb-0 mt-2">{{ $student->name }}</h4>
                    <p class="text-muted font-14">{{ $student->no_ic }}</p>

                    <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

                    <div class="text-left mt-3">
                        <p class="text-muted mb-2 font-13">
                            <strong>Kelas :</strong>
                            <span class="ml-2">{{ $student->currentClass->classroom->generate_name }}</span>
                        </p>
                        <p class="text-muted mb-2 font-13"><strong>Alamat :</strong></p>
                        <p class="text-muted font-13 mb-3">
                            {{ $student->address }}
                        </p>

                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                Maklumat Ibubapa/Pengjaga
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                Maklumat Tambahan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                Lain-lain
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="aboutme">

                            <div class="timeline-alt pb-0">
                                @foreach($student->parents as $key => $parent)
                                    <hr>
                                    <div class="timeline-item">
                                        <i class="mdi mdi-circle bg-primary-lighten text-primary timeline-icon"></i>
                                        <div class="timeline-item-info">
                                            <h5 class="mt-0 mb-1">{{ $parent->parent->name }}</h5>
                                            <p class="font-14">{{ ($parent->relation == null || $parent->relation == '')? "Penjaga" : $parent->relation }}</p>
                                            <div class="text-left mt-3">
                                                <p class="text-muted mb-2 font-13">
                                                    <strong>No. K/P :</strong>
                                                    <span class="ml-2">{{ $parent->parent->no_ic }}</span>
                                                </p>
                                                <p class="text-muted mb-2 font-13">
                                                    <strong>Bangsa :</strong>
                                                    <span class="ml-2">{{ $parent->parent->race }}</span>
                                                </p>
                                                <p class="text-muted mb-2 font-13">
                                                    <strong>No. Tel :</strong>
                                                    <span class="ml-2">{{ $parent->parent->phone_1 }}</span>
                                                </p>
                                                <p class="text-muted mb-2 font-13">
                                                    <strong>Warganegara :</strong>
                                                    <span class="ml-2">{{ $parent->parent->nationality }}</span>
                                                </p>
                                                <p class="text-muted mb-2 font-13">
                                                    <strong>Pekerjaan :</strong>
                                                    <span class="ml-2">{{ $parent->parent->job }}</span>
                                                </p>
                                                <p class="text-muted mb-2 font-13">
                                                    <strong>Gaji :</strong>
                                                    <span class="ml-2">RM {{ $parent->parent->income }}</span>
                                                </p>
                                                <p class="text-muted mb-2 font-13">
                                                    <strong>Nama Majikan :</strong>
                                                    <span class="ml-2">{{ $parent->parent->employer_name }}</span>
                                                </p>
                                                <p class="text-muted mb-2 font-13">
                                                    <strong>No. Tel. Majikan :</strong>
                                                    <span class="ml-2">{{ $parent->parent->employer_phone }}</span>
                                                </p>
                                                <p class="text-muted mb-2 font-13"><strong>Alamat Majikan :</strong></p>
                                                <p class="text-muted font-13 mb-3">{{ $parent->parent->employer_address }}</p>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- end tab-pane -->
                        <!-- end about me section content -->

                        <div class="tab-pane show active" id="timeline">

                            <div class="table-responsive">
                                <table class="table table-striped font-weight-bold">
                                    <tr>
                                        <td>Nama Penuh :</td>
                                        <td>{{ $student->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. K/P :</td>
                                        <td>{{ $student->no_ic }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Sijil Lahir :</td>
                                        <td>{{ $student->birth_certificate }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status :</td>
                                        <td>{{ studentStatus($student->status) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jantina :</td>
                                        <td>{{ getGender($student->gender) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Agama :</td>
                                        <td>{{ $student->religion }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kaum :</td>
                                        <td>{{ $student->race }}</td>
                                    </tr>
                                    <tr>
                                        <td>Warganegara :</td>
                                        <td>{{ $student->nationality }}</td>
                                    </tr>
                                    <tr>
                                        <td>Anak Yatim :</td>
                                        <td>{{ ($student->is_orphans == 1)? "YA" : "TIDAK"  }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pelajar Asrama :</td>
                                        <td>{{ ($student->is_hostel == 1)? "YA" : "TIDAK"  }}</td>
                                    </tr>
                                    <tr>
                                        <td>OKU :</td>
                                        <td>{{ ($student->is_hostel == 1)? "YA" : "TIDAK"  }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kecacatan :</td>
                                        <td>{{ $student->oku_type }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- end timeline content-->

                        <div class="tab-pane" id="settings">

                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection


