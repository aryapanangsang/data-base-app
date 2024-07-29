<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
</head>

<body>
    <h1>Laporan</h1>
    <h3>{{ $date }}</h3>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
        @php
            $no = 1;
        @endphp

        @foreach ($applicants as $applicant)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $applicants->appplicant_name }}</td>
                <td>{{ $applicants->address }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
