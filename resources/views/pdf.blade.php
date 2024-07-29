<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="logo.png" alt="Logo">
            </div>
            <div class="title">
                <h2>Pusat Lembaga Pelatihan Kerja<br>PRIMA BUANA INDONESIA</h2>
                <p>Jl. Amir Hamzah No. 10 RT.01 RW.04, Karangasih, Cikarang Timur Kab. Bekasi</p>
                <p>Telp: 021-333-1024 Email: lpkprimabuanaindonesia@gmail.com</p>
            </div>
            <div class="logo">
                <img src="logo2.png" alt="Logo 2">
            </div>
        </div>

        <h3>FORMULIR PENDAFTARAN</h3>
        <form>
            <section>
                <h4>I. PERSONAL DATA</h4>
                <label for="no">No:</label>
                <input type="text" id="no" name="no">
                <label for="tanggal">Tanggal:</label>
                <input type="text" id="tanggal" name="tanggal">

                <!-- Personal Data Fields -->
                <div class="field">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama">
                </div>
                <div class="field">
                    <label for="ktp">No. KTP:</label>
                    <input type="text" id="ktp" name="ktp">
                </div>
                <div class="field">
                    <label for="npwp">No. NPWP:</label>
                    <input type="text" id="npwp" name="npwp">
                </div>
                <div class="field">
                    <label for="bpjs">No. BPJS Kesehatan:</label>
                    <input type="text" id="bpjs" name="bpjs">
                </div>
                <div class="field">
                    <label for="tempat-lahir">Tempat/Tgl Lahir:</label>
                    <input type="text" id="tempat-lahir" name="tempat-lahir">
                </div>
                <div class="field">
                    <label for="alamat-ktp">Alamat KTP:</label>
                    <input type="text" id="alamat-ktp" name="alamat-ktp">
                </div>
                <!-- Add more fields as necessary -->

                <h4>II. PENDIDIKAN TERAKHIR</h4>
                <!-- Pendidikan Fields -->
                <div class="field">
                    <label for="sekolah">Nama Sekolah:</label>
                    <input type="text" id="sekolah" name="sekolah">
                </div>
                <div class="field">
                    <label for="tahun-lulus">Tahun Lulus:</label>
                    <input type="text" id="tahun-lulus" name="tahun-lulus">
                </div>
                <!-- Add more fields as necessary -->

                <h4>III. PENGALAMAN MAGANG/BEKERJA</h4>
                <!-- Pengalaman Fields -->
                <div class="field">
                    <label for="perusahaan">Nama Perusahaan:</label>
                    <input type="text" id="perusahaan" name="perusahaan">
                </div>
                <!-- Add more fields as necessary -->

                <p>Demikian Formulir ini saya isi dengan sebenarnya. Apabila saya berbohong, maka saya siap dikenakan
                    sanksi</p>
                <div class="signatures">
                    <div class="signature">
                        <label>Pihak Kedua</label>
                        <input type="text" name="pihak-kedua">
                    </div>
                    <div class="signature">
                        <label>Cikarang, <span id="current-date"></span> 2024</label>
                        <input type="text" name="pihak-pertama">
                    </div>
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
