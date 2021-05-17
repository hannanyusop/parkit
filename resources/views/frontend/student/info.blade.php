
@extends('frontend.user.layouts.app-no-side-bar')

@section('title', 'Scan E-Kehadiran Murid')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ $student->avatar }}" class="rounded-circle avatar-lg img-thumbnail w-25" alt="profile-image">

                    <h4 class="mb-0 mt-2">{{ $student->name }}</h4>
                    <p class="text-muted font-14">{{ $student->no_ic }}</p>

                    <div class="text-left mt-3">
                        <p class="text-muted mb-2 font-13">
                            <strong>Kelas :</strong>
                            <span class="ml-2">{{ $student->currentClass->classroom->generate_name ?? "" }}</span>
                        </p>
                        <p class="text-muted mb-2 font-13"><strong>Alamat :</strong></p>
                        <p class="text-muted font-13 mb-3">
                            {{ $student->address }}
                        </p>

                        <h6 class="font-13 text-uppercase">Maklumat Ibubapa/Penjaga</h6>
                    @foreach($student->parents as $key => $parent)
                            <hr>
                            <p class="text-muted mb-2 font-13">
                                <strong>Nama :</strong>
                                <span class="ml-2">{{ $parent->parent->name }}</span>
                            </p>
                            <p class="text-muted mb-2 font-13">
                                <strong>No. Tel : </strong>
                                <span class="ml-2">{{ $parent->parent->phone_1 }}</span>
                            </p>
                            <p class="text-muted mb-2 font-13">
                                <strong>Hubungan : </strong>
                                <span class="ml-2">{{ $parent->relation }}</span>
                            </p>
                        @endforeach
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div>
@endsection



