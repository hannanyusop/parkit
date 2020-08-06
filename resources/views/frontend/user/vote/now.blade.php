@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content">

        <div class="col-md-8 offset-md-2">
            <div class="card">
                <x-forms.post :action="route('frontend.user.vote.check', $campaign->code)">
                <div class="card-body">
                    <div class="text-center mb-3">

                        <h5 class="text-dark font-weight-bold">Attempt left(s) : {{ $left }}</h5>
                        <div class="col-md-6 offset-md-3">
                            <!-- small card -->
                            <div class="small-box bg-gradient-success">
                                <div class="inner">
                                    <h3 id="code"></h3>
                                    <p>CARD UNIQUE NUMBER</p>
                                </div>
                                <input id="uc" type="hidden" name="code" value="">
                                <div class="icon">
                                    <i class="fas fa-id-card-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    SHUFFLE COUNT : <b id="shuffle_count"></b>
                                </a>
                            </div>

                            <p class="font-weight-bold">Card Left(s): {{ $cards->count() }}</p>
                        </div>

                        <div class="center m-3">
                            @if($cards->count() == 0)
                                <h3 class="text-warning font-weight-bold">Ops! No card left.</h3>
                                <a href="{{ route('frontend.user.vote.index') }}" class="btn btn-info">Back</a>
                            @else
                                <a href="javascript:void(0)" id="shuffle" class="btn btn-warning">SHUFFLE CARD</a>
                                <button type="submit" class="btn btn-success">PICK CARD</button>
                            @endif
                            <br>
                                <a href="{{ route('frontend.user.vote.index') }}" class="btn btn-dark mt-2">BACK</a>
                        </div>
                    </div>
                </div>
                </x-forms.post>
            </div>
        </div>

    </section>
@endsection

@push('after-scripts')
    <script type="text/javascript">

        shuffle_count = 0;

        $(document).ready(function(){

            getCard();

            function getCard() {
                $.ajax({
                    url:"{{ route('frontend.user.vote.shuffle-card', $campaign->code) }}",
                    method:'GET',
                    // data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {

                        if(data.count == 0){
                            alert('No card left!')
                        }else{
                            code = data.code;
                            $('#code').html(code);
                            $("#uc").val(code);
                            count();
                        }
                    }
                })
            }


            $("#shuffle").on('click', function () {
                getCard();
            });

            function count() {
                shuffle_count++;
                $("#shuffle_count").text(shuffle_count);
            }
        });


    </script>

@endpush
