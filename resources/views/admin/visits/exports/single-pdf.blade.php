<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Data Kunjungan {{ $visit->institution }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            padding: 20px;
        }
        .main-title {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
            min-height: 80px;
        }
        .logo-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 70px;
        }
        .logo-container img {
            max-width: 100%;
            height: auto;
        }
        .title-text {
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: bold;
            padding-top: 10px;
            margin-left: 80px;
        }
        .divider {
            border-top: 2px solid #000;
            margin: 20px 0;
            clear: both;
        }
        .content {
            margin-top: 30px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 8px;
            vertical-align: top;
        }
        .info-table td:first-child {
            width: 200px;
            font-weight: bold;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="main-title">
        <div class="logo-container">
            <img src="{{ public_path('images/Logo_Padang.svg') }}" alt="Logo">
        </div>
        <div class="title-text">
            DETAIL DATA KUNJUNGAN<br>
            DINAS PMPTSP KOTA PADANG
        </div>
    </div>

    <div class="divider"></div>

    <div class="content">
        <table class="info-table">
            <tr>
                <td>Nama Pemohon</td>
                <td>: {{ $visit->name }}</td>
            </tr>
            <tr>
                <td>Pimpinan Rombongan</td>
                <td>: {{ $visit->group_leader }}</td>
            </tr>
            <tr>
                <td>Institusi</td>
                <td>: {{ $visit->institution }}</td>
            </tr>
            <tr>
                <td>Nomor WhatsApp</td>
                <td>: {{ $visit->whatsapp_number }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ $visit->email }}</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td>: {{ $visit->province->name }}</td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>: {{ $visit->city->name }}</td>
            </tr>
            <tr>
                <td>Penginapan</td>
                <td>: {{ $visit->homestay }}</td>
            </tr>
            <tr>
                <td>Tanggal Kunjungan</td>
                <td>: {{ $visit->day->locale('id')->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td>Jam Kunjungan</td>
                <td>: {{ $visit->clock->format('H:i') }} WIB</td>
            </tr>
            <tr>
                <td>Topik Kunjungan</td>
                <td>: {{ $visit->topic }}</td>
            </tr>
            <tr>
                <td>Jumlah Rombongan</td>
                <td>: {{ $visit->group_size }} orang</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Padang, {{ now()->locale('id')->isoFormat('D MMMM Y') }}<br>
        Kepala Dinas PMPTSP Kota Padang,<br><br><br><br><br><br><br>
        
        Swesti Fanloni, S.STP, M.Si<br>
        NIP. 197910181998102001
    </div>
</body>
</html>