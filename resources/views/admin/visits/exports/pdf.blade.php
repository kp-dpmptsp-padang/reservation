<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Kunjungan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
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
            font-size: 20px;
            font-weight: bold;
            padding-top: 10px;
        }
        .header {
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .unit-info {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
            width: 100%;
            text-align: left;
        }
        .visit-title {
            font-family: Arial, sans-serif;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin: 20px 0 10px;
        }
        .period {
            font-family: Arial, sans-serif;
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .divider {
            border-top: 2px solid #000;
            margin: 20px 0;
            clear: both;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .status {
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            color: white;
        }
        .status-menunggu {
            background-color: #FDB022;
        }
        .status-terverifikasi {
            background-color: #3B82F6;
        }
        .status-sedang-berlangsung {
            background-color: #8B5CF6;
        }
        .status-selesai {
            background-color: #22C55E;
        }
        .status-batal {
            background-color: #EF4444;
        }
        .rombongan {
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="main-title">
        <div class="logo-container">
            <img src="{{ public_path('images/Logo_Padang.svg') }}" alt="Logo">
        </div>
        <div class="title-text">
            PENGOLAHAN DATA KUNJUNGAN <br>
            DI DPMPTSP KOTA PADANG
        </div>
    </div>
    
    <div class="header clearfix">
        <div class="unit-info">
            <div>UNIT PELAYANAN : DPMPTSP KOTA PADANG</div>
            <div>ALAMAT : JL. SUDIRMAN NO. 1, PADANG</div>
            <div>WA/Web : 081374078088 / https://dpmptsp.padang.go.id</div>
        </div>
    </div>

    <div class="divider"></div>

    <div class="visit-title">LAPORAN KUNJUNGAN DI DPMPTSP KOTA PADANG</div>
    <div class="period">Periode : {{ $period }}</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Status</th>
                <th>Pimpinan</th>
                <th>Institusi</th>
                <th>WhatsApp</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Penginapan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Topik</th>
                <th class="rombongan">Rombongan (Orang)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visits as $index => $visit)
            <tr>
                <td class="rombongan">{{ $index + 1 }}</td>
                <td>
                    <div class="status status-{{ $visit->status->value }}">
                        @switch($visit->status->value)
                            @case('menunggu')
                                Menunggu
                                @break
                            @case('terverifikasi')
                                Terverifikasi
                                @break
                            @case('sedang-berlangsung')
                                Sedang Berlangsung
                                @break
                            @case('selesai')
                                Selesai
                                @break
                            @case('batal')
                                Batal
                                @break
                        @endswitch
                    </div>
                </td>
                <td>{{ $visit->group_leader }}</td>
                <td>{{ $visit->institution }}</td>
                <td>{{ $visit->whatsapp_number }}</td>
                <td>{{ $visit->province->name }}</td>
                <td>{{ $visit->city->name }}</td>
                <td>{{ $visit->homestay }}</td>
                <td>{{ $visit->day->format('d/m/Y') }}</td>
                <td>{{ $visit->clock->format('H:i') }}</td>
                <td>{{ $visit->topic }}</td>
                <td class="rombongan">{{ $visit->group_size }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Padang, {{ now()->locale('id')->isoFormat('D MMMM Y') }}<br>
        Kepala Dinas PMPTSP Kota Padang,<br><br><br><br><br><br><br>
        
        Swesti Fanloni, S.STP, M.Si<br>
        NIP. 197910181998102001
    </div>
</body>
</html>