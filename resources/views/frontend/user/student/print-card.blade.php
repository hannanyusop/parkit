<!DOCTYPE html>
<html>
<head>

    <title>KAD PELAJAR {{ $student->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <style>
        *{
            box-sizing: border-box;

        }
        .container{
            position: absolute;
            /*left: 25%;*/
            /*top:20%;*/
        }
        .card{
            height: 4.955in;
            width: 3.155in;
            padding: 1.3rem 0 1.3rem 0;
            box-shadow: 0 0 5px #b4b4b4;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            border-radius: 30px;
            background-image: url('{{ asset('img/card/front.png') }}');

        }
        .front{
        }
        .back{
            background-image: url('{{ asset('img/card/back.png') }}');
        }
        .companyname{
            color: #000000;
            position: absolute;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 1.29rem;
            margin-top: .5rem;
            top: 17%;
            left: 15%;
            text-align: center;


        }
        .company-img{
            position: absolute;
            left: 43%;

            top: 4.3%;
            margin-bottom: 5px;
            width: 50px;
        }
        .companyname-back{
            color: #ffffff;
            position: absolute;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 1.00rem;
            margin-top:1.3rem;
            top: 3%;
            left: 10%;

        }
        .names{
            height: 7.2in;
            /*width: 4.375in;*/
            top: 45%;
            position: relative;
        }
        .profile-name{
            top: 50%;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 1.0rem;
            /*margin-top: 0.5rem;*/
            color: #000000;
            text-align: center;
        }
        .profile-username{
            top: 78%;
            font-weight: 300;
            text-transform: lowercase;
            font-size: 0.9rem;
            margin-top: .5rem;
            text-align: center;
            color: #000000;
        }
        .squre-qr{
            position: absolute;
            align-items: center;
            top: 32%;
            left: 27%;
            height: 50px;
            width: 50px;
            box-shadow: 0 0 100px #b4b4b4;
        }
        .dt{
            top: 20%;
            position: absolute;
            font-weight: 400;
            font-size: 0.8rem;
            margin-top: .5rem;
            color: #000000;
            left: 4%;
        }
        .dt1{
            top: 26%;
            position: absolute;
            font-weight: 400;
            font-size: 0.8rem;
            /*margin-top: .5rem;*/
            color: #000000;
            left: 4%;
        }
        .dt2{
            top: 35%;
            position: absolute;
            text-align: justify;
            text-justify: inter-word;
            font-weight: 400;
            font-size: 0.8rem;
            margin: .5rem;
            color: #000000;
        }

        .dt3{
            top: 50%;
            position: absolute;
            font-weight: 400;
            font-size: 0.8rem;
            color: #000000;
            left: 4%;
        }

        .sign{
            width: 70px;
        }

        .cop{
            float: right;
            width: 150px;
            position: absolute;
            left: 70%;
            z-index: 1;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card front">
                <div class="text-xenter">
                    <div class="pp">
                        <img class="company-img" src="{{ asset('img/card/logo.png') }}" alt="" >
                        <h4 class="companyname">SMK AGAMA LIMBANG</h4>
                        <div class="squre-qr text-center">
                            {{ getKehadiranStudent($student->no_ic) }}
                        </div>
                    </div>
                    <div class="names">
                        <h2 class="profile-name">{{ $student->name }}</h2>
                        <h4 class="profile-username">{{ $student->no_ic }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card back">
                <div class="pp">
                    <h4 class="companyname-back">SMK AGAMA LIMBANG</h4>
                </div>
                <div class="details">
                    <h4 class="dt"><b>NAMA : </b>{{ $student->name }}</h4>
                    <h4 class="dt1"><b>NO K/P  : </b>{{ $student->no_ic }}</h4>
                    <h4 class="dt2">Kad ini adalah pengesahan diri pelajar bahawa pemegang kad ini adalah pelajar Sekolah Menengah Kebangsaan Agama Limbang</h4>

                    <div class="dt3">
                        Disahkan oleh,<br>
                        <img src="{{ asset('img/card/sign-pengetua.png') }}" class="sign">
                        <img src="{{ asset('img/card/cop-rasmi.png') }}" class="cop">

                        <br>
                        (HAJI ZAINI BIN HASBOLLAH)<br>
                        Pengetua SMK Agama Limbang,<br>
                        98700 Limbang<br>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
