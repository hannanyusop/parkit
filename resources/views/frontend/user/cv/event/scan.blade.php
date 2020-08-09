

@extends('frontend.user.layouts.app')

@section('title', 'Dashboard')
<style>
    hr {
        margin-top: 32px;
    }
    input[type="file"] {
        display: block;
        margin-bottom: 16px;
    }
    div {
        margin-bottom: 16px;
    }
    #flash-toggle {
        display: none;
    }
</style>

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h1>QR Check-in(BETA)</h1>
                        <div>
                            <b>Device has camera: </b>
                            <span id="cam-has-camera"></span>
                            <br>
                            <b>Device has flash: </b>
                            <span id="cam-has-flash"></span>
                            <br>
                            <div class="">
                                <video id="qr-video" width="400px"></video>
                            </div>
                            <br>
                            <label>
                                <input id="show-scan-region" type="checkbox">
                                Show scan region
                            </label>
                        </div>
                        <div>
                            <button id="flash-toggle">📸 Flash: <span id="flash-state">off</span></button>
                        </div>
                        <div>
                            <select id="inversion-mode-select">
                                <option value="original">Scan original (dark QR code on bright background)</option>
                                <option value="invert">Scan with inverted colors (bright QR code on dark background)</option>
                                <option value="both">Scan both</option>
                            </select>
                            <br>
                        </div>
                        <b>Detected QR code: </b>
                        <span id="cam-qr-result">None</span>
                        <br>
                        <b>Last detected at: </b>
                        <span id="cam-qr-result-timestamp"></span>
                        <br>
                        <button class="btn btn-success" id="start-button">Start</button>
                        <button class="btn btn-danger" id="stop-button">Stop</button>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="module">
        import QrScanner from "{{ asset('plugin/qr/qr-scanner.min.js') }}";
        QrScanner.WORKER_PATH = "{{ asset('plugin/qr/qr-scanner-worker.min.js') }}";

        const video = document.getElementById('qr-video');
        const camHasCamera = document.getElementById('cam-has-camera');
        const camHasFlash = document.getElementById('cam-has-flash');
        const flashToggle = document.getElementById('flash-toggle');
        const flashState = document.getElementById('flash-state');
        const camQrResult = document.getElementById('cam-qr-result');
        const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
        const fileSelector = document.getElementById('file-selector');
        const fileQrResult = document.getElementById('file-qr-result');

        function setResult(label, result) {


            var sc = result.search('{{ route('frontend.user.cv.event.index') }}');

            if(sc > -1){
                scanner.stop();
                window.location=result;
            }


            label.textContent = result;
            camQrResultTimestamp.textContent = new Date().toString();
            label.style.color = 'teal';
            clearTimeout(label.highlightTimeout);
            label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
        }

        // ####### Web Cam Scanning #######

        QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);

        const scanner = new QrScanner(video, result => setResult(camQrResult, result), error => {
            camQrResult.textContent = error;
            camQrResult.style.color = 'inherit';
        });
        scanner.start().then(() => {
            scanner.hasFlash().then(hasFlash => {
                camHasFlash.textContent = hasFlash;
                if (hasFlash) {
                    flashToggle.style.display = 'inline-block';
                    flashToggle.addEventListener('click', () => {
                        scanner.toggleFlash().then(() => flashState.textContent = scanner.isFlashOn() ? 'on' : 'off');
                    });
                }
            });
        });

        // for debugging
        window.scanner = scanner;

        document.getElementById('show-scan-region').addEventListener('change', (e) => {
            const input = e.target;
            const label = input.parentNode;
            label.parentNode.insertBefore(scanner.$canvas, label.nextSibling);
            scanner.$canvas.style.display = input.checked ? 'block' : 'none';
        });

        document.getElementById('inversion-mode-select').addEventListener('change', event => {
            scanner.setInversionMode(event.target.value);
        });

        document.getElementById('start-button').addEventListener('click', () => {
            scanner.start();
        });

        document.getElementById('stop-button').addEventListener('click', () => {
            scanner.stop();
        });


    </script>

@endsection

