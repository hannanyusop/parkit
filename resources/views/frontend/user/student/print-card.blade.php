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
            height: 6.375in;
            width: 4.375in;
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
            font-size: 2.09rem;
            margin-top: .5rem;
            top: 20%;
            left: 10%;


        }
        .company-img{
            position: absolute;
            left: 38%;

            top: 4.3%;
            margin-bottom: 5px;
            width: 90px;
        }
        .companyname-back{
            color: #ffffff;
            position: absolute;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 1.50rem;
            margin-top:1.3rem;
            top: 4.3%;
            left: 10%;

        }
        .names{
            height: 6.375in;
            width: 4.375in;
            top: 66%;
            position: relative;
        }
        .profile-name{
            top: 70%;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 1.3rem;
            margin-top: 1rem;
            color: #000000;
            text-align: center;
            margin-left: 20px;


        }
        .profile-username{
            top: 78%;
            font-weight: 300;
            text-transform: lowercase;
            font-size: 1.3rem;
            margin-top: .5rem;
            text-align: center;
            margin-left: 20px;
            color: #000000;
        }
        .squre-qr{
            position: absolute;
            align-items: center;
            top: 40%;
            left: 30%;
            height: 100px;
            width: 100px;
            box-shadow: 0 0 100px #b4b4b4;
        }
        .dt{
            top: 30%;
            position: absolute;
            font-weight: 400;
            font-size: 1.0rem;
            margin-top: .5rem;
            color: #000000;
            left: 4%;
        }
        .dt1{
            top: 36%;
            position: absolute;
            font-weight: 400;
            font-size: 1.0rem;
            /*margin-top: .5rem;*/
            color: #000000;
            left: 4%;
        }
        .dt2{
            top: 49%;
            position: absolute;
            font-weight: 400;
            font-size: 1.0rem;
            margin-top: .5rem;
            color: #000000;
            left: 4%;
        }

        .dt3{
            top: 70%;
            position: absolute;
            font-weight: 400;
            font-size: 0.9rem;
            color: #000000;
            left: 4%;
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
                    <h4 class="dt2">Kad ini adalah pengesahan diri pelajar bahawa pemegang kad ini adalah pelajar Sekolah Menengah Kebangsaan Limbang</h4>

                    <div class="dt3">
                        Disahkan oleh,<br>

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
