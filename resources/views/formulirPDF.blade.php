<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    {{-- <link rel="stylesheet" href="style.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('style.css') }}"> --}}
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
            border: 1px solid #000;
            padding: 10px 5px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }

        .logo img {
            width: 400px;
            margin-bottom: -15px;
        }

        .title {
            flex-grow: 1;
            margin: 0 20px;
            font-size: 5px;
        }

        .noreg {
            margin-top: -10px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .noreg table {
            border-width: 0;
            border-color: #000;
            margin: 0 auto;
        }



        section h4 {
            font-size: 14px;
        }

        h5 {
            font-size: 12px;
            font-style: normal;
        }

        /* Tabel Data */

        table {
            margin-top: -20px;
        }

        table td {
            padding-left: 4px;
            padding-right: 4px;
            font-size: 12px;
        }

        table .label {
            width: 115px;
        }


        .epilog {
            margin-top: -15px;
        }

        .epilog .tgl_daftar {
            margin-top: -20px;
            font-size: 11px;
            text-align: right;
            margin-right: 11px;
        }



        .signature {
            margin-top: 10px !important;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }

        .signature table .pihak_kedua {
            padding-right: 550px;
            margin-bottom: 250px;
        }

        .signature_name {
            margin-top: 125px !important;
        }


        /* Form */

        form h3 {
            text-align: center;
        }

        .field {
            margin-bottom: 15px;
        }

        .field label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .field input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="img/kop.jpg" alt="Logo">
            </div>
            <div class="title">
                <h1>FORMULIR PENDAFTARAN</h1>
            </div>
            <div class="noreg">
                <table border="1px" style="margin-top: 3px">
                    <tr>
                        <td class="x" style="width:10px; border:1px solid black">
                            {{-- @if ($applicants->id < 9)
                                {{ 0 . 0 . $applicants->id }}
                            @elseif($applicants->id > 99)
                                {{ 0 . 0 . 0 . $applicants->id }}
                            @else
                                {{ $applicants->id }}
                            @endif --}}
                        </td>
                        <td class="x" style="width:10px; border:1px solid black"></td>
                        <td class="x" style="width:10px; border:1px solid black"></td>
                        <td style=" border:1px solid black">/FP/LPK/</td>
                        <td class="x" style=" border:1px solid black">
                            @if (\Carbon\Carbon::create($applicants->created_at)->isoFormat('M') < 9)
                                {{ 0 . \Carbon\Carbon::create($applicants->created_at)->isoFormat('M') }}
                            @else
                                {{ \Carbon\Carbon::create($applicants->created_at)->isoFormat('M') }}
                            @endif
                        </td>
                        <td class="y" style=" border:1px solid black">
                            {{ \Carbon\Carbon::create($applicants->created_at)->isoFormat('Y') }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <form>
            <section>
                <h4 class="personal">I. PERSONAL DATA</h4>
                <table>
                    <tr>
                        <td class="label">Nama</td>
                        <td>: {{ $applicants->appplicant_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">No. KTP</td>
                        <td>: {{ $applicants->identity_number }}</td>
                    </tr>
                    <tr>
                        <td class="label">No. NPWP</td>
                        <td>: {{ $applicants->npwp }}</td>
                    </tr>
                    <tr>
                        <td class="label">No. BPJS Kesehatan</td>
                        <td>: {{ $applicants->bpjs_kesehatan }}</td>
                    </tr>
                    <tr>
                        <td class="label">Tempat, Tanggal Lahir</td>
                        <td>: {{ $applicants->birth_of . ',' . $birth_of_date }}</td>
                    </tr>
                    <tr>
                        <td class="label">Alamat</td>
                        <td>: {{ $applicants->address }}</td>
                    </tr>
                    <tr>
                        <td class="label">Domisili</td>
                        <td>: {{ $applicants->domisili }}</td>
                    </tr>
                    <tr>
                        <td class="label">No. Hp Aktif</td>
                        <td>: {{ $applicants->phone_number }}</td>
                    </tr>
                    <tr>
                        <td class="label">No. WhatsApp</td>
                        <td>: {{ $applicants->wa_number }}</td>
                    </tr>
                    <tr>
                        <td class="label">Email</td>
                        <td>: {{ $applicants->email }}</td>
                    </tr>
                    <tr>
                        <td class="label">Kontak Darurat</td>
                        <td>: {{ $applicants->emergency_number }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nama Kontak Darurat</td>
                        <td>: {{ $applicants->emergency_number_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Status Pernikahan</td>
                        <td>: {{ $applicants->maried_status }}</td>
                    </tr>
                    <tr>
                        <td class="label">Jenis Kelamin</td>
                        <td>: {{ $applicants->gender }}</td>
                    </tr>
                    <tr>
                        <td class="label">Agama</td>
                        <td>: {{ $applicants->religion }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nama Ibu</td>
                        <td>: {{ $applicants->mother }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nama Ayah</td>
                        <td>: {{ $applicants->father }}</td>
                    </tr>
                    <tr>
                        <td class="label">Status Vaksin</td>
                        <td>: {{ $applicants->vaccine }}</td>
                    </tr>
                    <tr>
                        <td class="label">Tinggi Badan</td>
                        <td>: {{ $applicants->height }} Cm</td>
                    </tr>
                    <tr>
                        <td class="label">Berat Badan</td>
                        <td>: {{ $applicants->weight }} Kg</td>
                    </tr>
                    <tr>
                        <td class="label">Ukuran Seragam</td>
                        <td>: {{ $applicants->uniform_size }}</td>
                    </tr>
                    <tr>
                        <td class="label">Ukuran Sepatu</td>
                        <td>: {{ $applicants->shoes_size }}</td>
                    </tr>
                </table>
                <h4 class="pendidikan">II. PENDIDIKAN TERAKHIR</h4>
                <table>
                    <tr>
                        <td class="label">Nama Sekolah</td>
                        <td>: {{ $applicants->education_level }}</td>
                    </tr>
                    <tr>
                        <td class="label">Tahun Lulus</td>
                        <td>: {{ $applicants->graduated }}</td>
                    </tr>
                    <tr>
                        <td class="label">Jurusan</td>
                        <td>: {{ $applicants->major }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nilai Matematika</td>
                        <td>: {{ $applicants->math_value }}</td>
                    </tr>
                    <tr>
                        <td class="label">Skill/Keahlian</td>
                        <td>: {{ $applicants->skills }}</td>
                    </tr>
                </table>
                <h4 class="pengalaman">III. Pengalaman </h4>
                <table>
                    <tr>
                        <td class="label">Nama Perusahaan</td>
                        <td>: {{ $applicants->company_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Uang Saku / Upah</td>
                        <td>: {{ $applicants->salary }}</td>
                    </tr>
                    <tr>
                        <td class="label">Jabatan / Bagian</td>
                        <td>: {{ $applicants->position }}</td>
                    </tr>
                    <tr>
                        <td class="label">Masa Kerja</td>
                        <td>: {{ $applicants->duration }}</td>
                    </tr>
                </table>
                <div class="epilog">
                    <h5>Demikian formulir ini saya isi dengan sebenarnya. Apabila saya berbohong, maka saya siap
                        dikenakan
                        sanksi.</h5>
                    <div class="tgl_daftar">
                        <p>Cikarang, {{ $tgl_daftar }}</p>
                    </div>
                </div>
                <div class="signature">
                    <table>
                        <tr>
                            <td class="pihak_kedua">Pihak Kedua</td>
                            <td class="pihak_satu">Pihak Pertama</td>
                        </tr>
                        <br>
                        <br>
                        <br>
                        <tr class="signature_name">
                            <td class="pihak_kedua">Pihak Kedua</td>
                            <td class="pihak_satu">LPK PBI</td>
                        </tr>
                    </table>
                </div>
            </section>
        </form>

    </div>

    <script>
        // Set current date
        document.getElementById('current-date').textContent = new Date().toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
    </script>
</body>

</html>
