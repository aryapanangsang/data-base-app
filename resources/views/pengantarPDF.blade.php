<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengantar PDF</title>
    <style>
        * {
            padding: 0;
        }

        body {
            font-family: "Times New Roman", Times, serif;
        }

        @page {
            margin: 20px 25px;
        }

        .container {
            width: 100%;
            height: 90%;
            margin: 0 auto;
            padding: 10px 5px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }

        .logo img {
            width: 600px;
            margin-bottom: -15px;
        }

        .title {
            flex-grow: 1;
            margin: 0 20px;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="header">
            <div class="logo">
                <img src="img/kop.jpg" alt="Logo">
            </div>
            <div class="title">
                <h1>SURAT PENGANTAR</h1>
            </div>
        </div>
        <div class="main">
            <div class="salam">
                <table>
                    <tr>
                        <td class="label">Perihal</td>
                        <td class="sparator">:</td>
                        <td>Medical Check Up LPK-PBI</td>
                    </tr>
                    <br>
                    <tr>
                        <td class="label">Kepada Yth.</td>
                        <td class="sparator">
                            :
                        </td>
                    </tr>
                </table>
                <span>
                    Departemen Medical Check Up <br> <strong>Klinik Westerindo Cikarang
                    </strong> <br>Jl. Jababeka
                    Raya,
                    Pasirgombong,
                    Kec. Cikarang Utara <br>
                    Kabupaten Bekasi, Jawa Barat 17530
                </span>
                <br>
                <br>
                <span>
                    Bersama dengan ini kami lampirkan data calon Peserta Magang kami yang akan dilakukan Medikal Check
                    Up (MCU) di Klinik Westerindo Cikarang :
                </span>
            </div>

            <div class="table table-responsive content" style="width: 85% ; margin: 10px auto ;">
                <table border="" cellspacing="0" cellpadding="0" style="border-color: black ;">
                    <thead>
                        <tr style="text-align: center; border: 2px solid black">
                            <th style="padding: 5px 8px; border:2px solid black">NO</th>
                            <th style="padding: 5px 55px ; border:2px solid black">NAMA</th>
                            <th style="padding: 5px 35px ; border:2px solid black">L/P</th>
                            <th style="padding: 5px 30px ; border:2px solid black">TEMPAT, TANGGAL LAHIR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($applicants as $applicant)
                            <tr style="border: 2px solid black">
                                <td style="text-align: center; border:2px solid black">{{ $no++ }}</td>
                                <td style="padding: 5px ; border:2px solid black">{{ $applicant->appplicant_name }}</td>
                                <td style="padding: 5px; text-align: center; border:2px solid black">
                                    {{ $applicant->gender }}</td>
                                <td style="padding: 5px ; border:2px solid black">
                                    {{ $applicant->birth_of . ', ' . \Carbon\Carbon::create($applicant->birth_of_date)->isoFormat('D MMMM Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="penutup" style="margin-top: 10px">
                <span>
                    Demikian surat pengantar ini dibuat untuk dapat dipergunakan sebagaimana mestinya. Atas perhatian
                    dan kerjasamanya kami ucapkan terimakasih.
                </span>
            </div>
            <br>
            <br>
            <div class="ttd">
                <span>
                    Cikarang, {{ \Carbon\Carbon::create($applicant->mcu_date)->isoFormat('D MMMM Y') }}
                </span>
                <br>
                <label for="">
                    <strong>LPK PRIMA BUANA INDONESIA</strong>
                    <hr style=" width: 150px ; margin-top: 125px; margin-left: 0 ">
                </label>
            </div>
            <footer
                style="margin-top: 150px;   
                position: fixed;
                bottom: -30px;
                left: 0;
                right: 0;
                bottom: 0;          
                text-align: center;
                padding: 10px;">
                <hr style="width: 100% ; margin-bottom: 10px;">
                <span>Gedung Pusat Pelatihan :</span>
                <br>
                <span>
                    Jl. Amir Hamzah No. 110 Kel. Sertajaya Kec. Cikarang Timur Kab. Bekasi
                </span>
                <br>
                <span>
                    Tlp. 021 2948 1024 Email : primabuanaindonesia@gmail.com
                </span>
            </footer>
        </div>
    </div>
</body>

</html>
