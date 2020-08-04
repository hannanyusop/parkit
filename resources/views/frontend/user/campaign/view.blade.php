@extends('frontend.user.layouts.app')

@section('title', 'My Campaign List')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="mt-2 float-right">
                        <a href="#" class="btn btn-info btn-sm">Edit Campaign Details Details</a>
                        <a href="{{ route('frontend.user.campaign.card.index', 'campaign_id') }}" class="btn btn-warning btn-sm">Manage Card</a>
                        <a href="{{ route('frontend.user.campaign.participant.invite-search', ['campaign_id']) }}" class="btn btn-success btn-sm">Add Participant</a>
                    </div>

                    <h3>Campaign Details</h3><br>


                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>32/45</h3>
                                    <p>Total Card Used</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-person-booth"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>12/45</h3>

                                    <p>Prize Won</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-award"></i>
                                </div>
                            </div>
                        </div>

                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>12/31</h3>

                                    <p>Take Part/Registered</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>4</h3>

                                    <p>Active Applicant</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ml-5">
                        <p>Campaign Name:<b class="ml-2">UNDIAN PARKING SMKAL 2020</b> </p>
                        <p>Campaign Date:<b class="ml-2">11:00 AM 01/08/2020 - 11:59 PM 03/08/2020</b></p>
                        <p>Status: <b class="ml-2"><span class="badge bg-success">Running</span></b></p>
                        <p>Target Participation :<b class="ml-2"><small class="text-info"><i class="fa fa-user"></i> 34 </small></b></p>
                        <p>Actual (Take Part / Registered) : <b class="ml-2">12/31</b></p>
                        <p>Total Registered Card :<b class="ml-2">45</b></p>


                    </div>
                    <hr>
                    <h3 class="mt-5">Participant List</h3><br>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Name</th>
                                <th>NRIC / Unique ID</th>
                                <th>Status</th>
                                <th>Attempt(s)</th>
                                <th>UC Number</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>HALIM BIN ROSLAN</td>
                                <td>740312-05-3221</td>
                                <td><span class="badge bg-gradient-success">Completed</span></td>
                                <td>2/5</td>
                                <td>PARKING LOT 17 <br><small class="font-weight-bold">HDJAELW21L</small></td>
                                <td>
                                    <a href="{{ route('frontend.user.campaign.participant.change-attempt', ['campaign_id', 'participant_id']) }}" class="btn btn-success btn-xs">Change Attempt Value</a>
                                    <a href="{{ route('frontend.user.campaign.participant.dismiss', ['campaign_id', 'participant_id']) }}" onclick="return confirm('Are you sure want to remove this participant?')"  class="btn btn-warning btn-xs">Dismiss</a>
                                    <a href="{{ route('frontend.user.campaign.participant.vote-reset', ['campaign_id', 'participant_id']) }}" onclick="return confirm('Are you sure want to reset this participant\'s vote?')" class="btn btn-danger btn-xs">Reset Vote</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SAFINAH BINTI ALI</td>
                                <td>680312-12-5466</td>
                                <td><span class="badge bg-gradient-dark">Not Yet</span></td>
                                <td>0/1</td>
                                <td></td>
                                <td>
                                    <button class="btn btn-warning btn-xs">Dismiss</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>ZULFAKAR BIN MOIN</td>
                                <td>880312-12-5865</td>
                                <td><span class="badge bg-gradient-dark">Not Yet</span></td>
                                <td>0/1</td>
                                <td></td>
                                <td>
                                    <button class="btn btn-warning btn-xs">Dismiss</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                    <h3 class="mt-5">Applicant List</h3><br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Name</th>
                            <th>NRIC / Unique ID</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>ZABDA BIN KULIK</td>
                            <td>740312-05-3221</td>
                            <td>
                                <a href="#" class="btn btn-success btn-xs">Approve</a>
                                <a href="#" class="btn btn-danger btn-xs">Decline</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>RAJJA TUA</td>
                            <td>890411-12-8592</td>
                            <td>
                                <a href="#" class="btn btn-success btn-xs">Approve</a>
                                <a href="#" class="btn btn-danger btn-xs">Decline</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>AMINAH BINTI KURUS</td>
                            <td>760312-01-4234</td>
                            <td>
                                <a href="#" class="btn btn-success btn-xs">Approve</a>
                                <a href="#" class="btn btn-danger btn-xs">Decline</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection
