<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f2f2f2;
    }

    .wrapper {
        width: 100%;
    }

    .card {
        display: inline-block;
        vertical-align: top;
        position: relative;
        width: 6.5cm;
        height: 10cm;
        background: #ffffff;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        margin: 20px 0 0 20px;
    }

    .card-header {
        background: #08009d;
        color: #ffffff;
        padding: 18px 16px 18px;
        position: relative;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .card-header::after {
        content: '';
        position: absolute;
        bottom: -14px;
        left: 0;
        width: 100%;
        height: 28px;
        background: #ffffff;
        border-top-left-radius: 50% 18px;
        border-top-right-radius: 50% 18px;
    }

    .card-header h1 {
        font-size: 28px;
        margin: 5px 0 10px;
        font-weight: bold;
    }

    .card-header h2 {
        font-size: 18px;
        font-weight: bold;
        margin: 0;
        letter-spacing: 0.8px;
    }

    .card-header span {
        font-size: 18px;
        font-weight: bold;
        color: #60a5fa;
    }

    .card-body {
        text-align: center;
        padding: 26px 12px 16px;
    }

    .card-body img {
        width: 3cm;
        height: 3cm;
        margin-bottom: 14px;
    }

    .name {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 4px;
        letter-spacing: 0.5px;
    }

    .id-number {
        font-size: 12px;
        color: #374151;
        margin-bottom: 4px;
    }

    .division {
        font-size: 11px;
        color: #6b7280;
    }
    </style>
</head>

<body>

    <div class="wrapper">
        @foreach($employees as $u)
        <div class="card">
            <div class="card-header">
                <h1>DAC</h1>
                <h2>INTERNSHIP</h2>
                <h2>PROGRAM</h2>
                <span>2025</span>
            </div>

            <div class="card-body">
                <img src="data:image/png;base64,{{ $u['qr'] }}" alt="QR Code">
                <div class="name">{{ strtoupper($u['name']) }}</div>
                <div class="id-number">{{ $u['id_number'] }}</div>
                <div class="division">{{ $u['division'] }}</div>
            </div>
        </div>

        @if(($loop->iteration % 4) == 0)
        <div style="page-break-after: always;"></div>
        @endif

        @endforeach
    </div>
</body>

</html>