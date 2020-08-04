@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Campaign List</h3>
                </div>
                <!-- /.card-header -->


                <div class="card-body">
                    <div class=" mb-3">
                        <div class="">
                            <h1 class="text-center">Rules & Regulation</h1>

                            <li> Public notice of intended election.—The public notice of an intended election referred to in section 31
                            shall be in Form 1 and shall, subject to any directions of the Election Commission, be published in such manner
                                as the returning officer thinks fit.</li>
                            <li> Nomination paper.—Every nomination paper presented under sub-section (1) of section 33 shall be
                            completed in such one of the Forms 2A to 2E as may be appropriate:
                            Provided that a failure to complete or defect in completing, the declaration as to symbols in a nomination
                            paper in Form 2A or Form 2B shall not be deemed to be a defect of a substantial character within the meaning of subsection (4) of section 36.
                                2</li>
                            <li>[4A. Form of affidavit to be filed at the time of delivering nomination paper.—The candidate or his
                            proposer, as the case may be, shall, at the time of delivering to the returning officer the nomination paper under subsection (1) of section 33 of the Act, also deliver to him an affidavit sworn by the candidate before a Magistrate of the
                            first class or a Notary in Form 26.]
                            </li>

                            <div class="m-3">
                                By clicking 'AGREE' button you agree to this <b>Campaign Rules & Regulation</b>.
                            </div>
                        </div>

                        <div class="center m-3">
                            <a href="{{ route('frontend.user.vote.now', "SMKALPARK2020") }}" class="btn btn-block btn-success">PROCEED</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
