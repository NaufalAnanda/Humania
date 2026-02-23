<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header { background-color: #2563EB; padding: 30px; text-align: center; color: #ffffff; }
        .header h1 { margin: 0; font-size: 24px; letter-spacing: 1px; }
        .content { padding: 40px 30px; color: #333333; line-height: 1.6; }
        .btn { display: inline-block; background-color: #2563EB; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 5px; font-weight: bold; margin-top: 20px; }
        .code-box { background-color: #f0f7ff; border: 1px dashed #2563EB; padding: 15px; text-align: center; margin: 20px 0; border-radius: 8px; }
        .code-text { font-size: 28px; font-weight: bold; color: #2563EB; letter-spacing: 2px; }
        .footer { background-color: #f9f9f9; padding: 20px; text-align: center; font-size: 12px; color: #888888; border-top: 1px solid #eeeeee; }
        .rules li { margin-bottom: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>HUMANIA</h1>
            <p style="margin: 5px 0 0 0; font-size: 14px; opacity: 0.8;">Talent Assessment Platform</p>
        </div>

        <div class="content">
            <p>Halo <strong>{{ $kandidat->name }}</strong>,</p>

            <p>Selamat! Anda telah diundang untuk mengikuti tahap assessment online sebagai bagian dari proses seleksi di Humania. Berikut adalah detail tes Anda:</p>

            <table style="width: 100%; margin-bottom: 20px;">
                <tr>
                    <td style="padding: 5px 0; color: #666;">Nama Modul:</td>
                    <td style="font-weight: bold;">{{ $assessment->title }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0; color: #666;">Durasi:</td>
                    <td style="font-weight: bold;">{{ $assessment->duration }} Menit</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0; color: #666;">Batas Waktu:</td>
                    <td style="font-weight: bold;">48 Jam sejak email ini diterima</td>
                </tr>
            </table>

            <p>Gunakan Kode Token berikut untuk mengakses ujian:</p>

            <div class="code-box">
                <div class="code-text">{{ $assessment->test_code }}</div>
            </div>

            <p><strong>Ketentuan Pengerjaan (PENTING):</strong></p>
            <ul class="rules">
                <li>Pastikan koneksi internet Anda stabil.</li>
                <li>Dilarang melakukan <b>Alt+Tab</b> atau berpindah tab browser. Sistem akan mencatat pelanggaran ini.</li>
                <li>Kerjakan di tempat yang kondusif dan tenang.</li>
            </ul>

            <center>
                <a href="{{ route('login') }}" class="btn">Mulai Ujian Sekarang</a>
            </center>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Humania TalentMap. All rights reserved.<br>
            Email ini dibuat otomatis oleh sistem. Jangan membalas email ini.
        </div>
    </div>
</body>
</html>
