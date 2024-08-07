<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Formulir Pendaftaran</title>
    {{-- <link rel="stylesheet" href="style.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('style.css') }}"> --}}
    <link href="{{ public_path('style.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container"
        style="width: 100%;   
                height: 90%; 
                margin: 0 auto;
                border: 1px solid #000;
                padding: 10px 5px;">
        <div class="header"
            style="display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;">
            <div class="logo" style="display: flex; justify-content: center">
                <img src="img/kop.jpg" alt="Logo" style="width:400">
            </div>
            <div class="title" style="margin-bottom: 20px">
                <h1 style="font-size: 15px">FORMULIR PENDAFTARAN</h1>
            </div>
            <div class="noreg"
                style="margin-top: -10px;
                display: flex;
                justify-content: center;
                width: 100%; ">
                <table
                    style="margin-top: 3px border-width: 0;
                    border-color: #000;  
                    margin: 0 auto;   ">
                    <tr>
                        <td class="x" style="width:10px; border:1px solid black; padding: 0px 5px;">
                            {{-- @if ($applicants->id < 9)
                                {{ 0 . 0 . $applicants->id }}
                            @elseif($applicants->id > 99)
                                {{ 0 . 0 . 0 . $applicants->id }}
                            @else
                                {{ $applicants->id }}
                            @endif --}}
                        </td>
                        <td class="x" style="width:10px; border:1px solid black; padding: 0px 5px;"></td>
                        <td class="x" style="width:10px; border:1px solid black; padding: 0px 5px;"></td>
                        <td style=" border:1px solid black; padding: 0px 5px;">/FP/LPK/</td>
                        <td class="x" style=" border:1px solid black; padding: 0px 5px;">
                            @if (\Carbon\Carbon::create($applicants->created_at)->isoFormat('M') < 9)
                                {{ 0 . \Carbon\Carbon::create($applicants->created_at)->isoFormat('M') }}
                            @else
                                {{ \Carbon\Carbon::create($applicants->created_at)->isoFormat('M') }}
                            @endif
                        </td>
                        <td class="y" style=" border:1px solid black; padding: 0px 5px;">
                            {{ \Carbon\Carbon::create($applicants->created_at)->isoFormat('Y') }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <form style="margin-top: -10px">
            <section>
                <div class="labels">
                    <h4 class="personal" style="margin-bottom: 20px ; font-weight: bold">I. PERSONAL DATA</h4>
                </div>
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
                <br>
                <div class="labels">
                    <h4 class="pendidikan" style="font-weight: bold">II. PENDIDIKAN TERAKHIR</h4>
                </div>
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
                <br>
                <div class="labels">
                    <h4 class="pengalaman" style="font-weight: bold">III. Pengalaman </h4>
                </div>
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
                    <br>
                </table>
                <div class="epilog">
                    <h5>Demikian formulir ini saya isi dengan sebenarnya. Apabila saya berbohong, maka saya siap
                        dikenakan
                        sanksi.</h5>
                    <br>
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
