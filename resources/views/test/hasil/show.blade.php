<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hasil Tes Psikologi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table.hasil, 
        .hasil th, 
        .hasil td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .test-title {
            font-weight: bold;
            background-color: #f8f9fa;
        }
        .header-info {
            margin-bottom: 20px;
            width: 100%;
        }
        .header-info td {
            padding: 5px;
            border: none;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center">HASIL TES PSIKOLOGI</h2>

    <table class="header-info">
        <tr>
            <td width="120">Nama</td>
            <td width="10">:</td>
            <td>{{ $hasil->user->name }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $hasil->user->username }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $hasil->user->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Tanggal Tes</td>
            <td>:</td>
            <td>{{ $hasil->created_at->format('l, d F Y') }}</td>
        </tr>
    </table>

    <!-- Tes GHQ -->
    <table class="hasil">
        <tr class="test-title">
            <td colspan="3">TES GHQ</td>
        </tr>
        <tr>
            <th width="33%">Nilai</th>
            <th width="33%">Angka</th>
            <th width="34%">Keterangan</th>
        </tr>
        <tr>
            <td>Nilai Total</td>
            <td>{{ $hasil->ghq_total }}</td>
            <td></td>
        </tr>
    </table>

    <!-- Tes DASS21 -->
    <table class="hasil">
        <tr class="test-title">
            <td colspan="3">TES DASS21 @if ($hasil->last_test == 'ghq12') <strong>(TIDAK DIKERJAKAN)</strong> @endif</td>
        </tr>
        <tr>
            <th width="33%">Nilai</th>
            <th width="33%">Angka</th>
            <th width="34%">Keterangan</th>
        </tr>
        <tr>
            <td>Nilai Depresi</td>
            <td>{{ $hasil->dass21_depresi }}</td>
            <td></td>
        </tr>
        <tr>
            <td>Nilai Kecemasan</td>
            <td>{{ $hasil->dass21_kecemasan }}</td>
            <td></td>
        </tr>
        <tr>
            <td>Nilai Stress</td>
            <td>{{ $hasil->dass21_stress }}</td>
            <td></td>
        </tr>
    </table>

    <!-- Tes HSCL -->
    <table class="hasil">
        <tr class="test-title">
            <td colspan="3">TES HSCL @if ($hasil->last_test == 'dass-21' || $hasil->last_test == 'ghq12') <strong>(TIDAK DIKERJAKAN)</strong> @endif</td>
        </tr>
        <tr>
            <th width="33%">Nilai</th>
            <th width="33%">Angka</th>
            <th width="34%">Keterangan</th>
        </tr>
        <tr>
            <td>Nilai Depresi</td>
            <td>{{ $hasil->hscl25_depresiDSM4 }}</td>
            <td></td>
        </tr>
        <tr>
            <td>Nilai Kecemasan</td>
            <td>{{ $hasil->hscl25_kecemasan }}</td>
            <td></td>
        </tr>
        <tr>
            <td>Nilai Total</td>
            <td>{{ $hasil->hscl25_total }}</td>
            <td></td>
        </tr>
    </table>

    <!-- Tes HTQ -->
    <table class="hasil">
        <tr class="test-title">
            <td colspan="3">TES HTQ @if ($hasil->last_test == 'dass-21' || $hasil->last_test == 'ghq12' || $hasil->last_test == 'hscl-25') <strong>(TIDAK DIKERJAKAN)</strong> @endif</td>
        </tr>
        <tr>
            <th width="33%">Nilai</th>
            <th width="33%">Angka</th>
            <th width="34%">Keterangan</th>
        </tr>
        <tr>
            <td>Nilai Depresi</td>
            <td>{{ $hasil->htq_depresiDSM4 }}</td>
            <td></td>
        </tr>
        <tr>
            <td>Nilai Total</td>
            <td>{{ $hasil->htq_total }}</td>
            <td></td>
        </tr>
    </table>

</body>
</html>