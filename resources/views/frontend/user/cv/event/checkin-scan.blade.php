@extends('frontend.user.layouts.app')

@section('title', 'Beta QR Scan Check-in')
{{--@push('after-style')--}}

    <link rel="stylesheet" href=" {{ asset('plugin/html_qr/css/reset.css') }}">
    <link rel="stylesheet" href=" {{ asset('plugin/html_qr/css/styles.css') }}">
    <script src="{{ asset('plugin/html_qr/js/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin/html_qr/js/webcam.min.js') }}"></script>



    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/grid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/version.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/detector.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/formatinf.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/errorlevel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/bitmat.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/datablock.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/bmparser.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/datamask.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/rsdecoder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/gf256poly.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/gf256.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/decoder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/qrcode.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/findpat.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/alignpat.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/html_qr/js/qr/databr.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            Webcam.attach('#example');

            $('#snap').click(function () {
                take_snapshot();
            });

            $('#flip').click(function () {

            });

            qrcode.callback = showInfo;

        });

        function take_snapshot() {
            Webcam.snap(function (dataUrl) {
                qrCodeDecoder(dataUrl);
            });
        }

        // decode the img
        function qrCodeDecoder(dataUrl) {
            qrcode.decode(dataUrl);
        }

        // show info from qr code
        function showInfo(data) {

            if(data == "error decoding QR Code"){
                $("#qrContent p").text("QR Not Found/Invalid");
            }else{

                if(data.search("checkin")){

                    window.location=data;
                }else{
                    $("#qrContent p").text("Invalid Url");
                }
            }
        }

    </script>
{{--@endpush--}}

@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body text-center">

                <div class="pageWrapper">
                    <div class="m-2 boxWrapper">
                        <div id="example"></div>
                    </div>
                    <div class="boxWrapper auto m-2">
                        <div id="hiddenImg"></div>
                        <div id="qrContent"><p></p></div>
                    </div>


                    <div class="row">
                        <a id="snap" class="btn btn-dark text-white ml-3"><i class="fa fa-camera mr-2"></i> Capture</a>
                        <a id="flip" class="btn btn-dark text-white"><i class="fa fa-sync-alt mr-2"></i> Change Camera</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

