@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Campaign Result</h3>
                </div>
                <!-- /.card-header -->


                <div class="card-body">
                    <div class=" mb-3">
                        <div class="">
                            <h1 class="text-center">Result</h1>

                            <div class="ml-5">
                                <p>Participant Name:<b class="ml-2">NUR ALISYA BINTI TS. AHMAD ZAIDI</b> </p>
                                <p>NRIC / Unique ID : <b class="ml-2 text-info">960516-13-3434</b></p>
                                <p>Campaign Name:<b class="ml-2">UNDIAN PARKING SMKAL 2020</b> </p>
                                <p>Draw Date:<b class="ml-2">1:02 AM 02/08/2020</b></p>
                                <p>Card Unique Number:<b class="ml-2">FIU8GYUS0LA</b></p>
                                <p>Result :</p>
                                <h3 class="text-success font-weight-bold">PARKING LOT 12</h3>
                            </div>
                            <hr>
                        </div>

                        <div class="center m-3">
                            <div class="btn btn-info">Print</div>
                            <a href="{{ route('frontend.user.vote.index') }}" class="btn btn-success">BACK TO CAMPAIGN LIST</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
