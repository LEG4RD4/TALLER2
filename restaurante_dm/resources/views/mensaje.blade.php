<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control | PQRS Burger Monster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&family=Permanent+Marker&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        body { background-color: #050505; color: #fff; font-family: 'Rajdhani', sans-serif; }
        .navbar { background: #000; border-bottom: 2px solid #ff0055; }
        .navbar-brand { font-family: 'Permanent Marker', cursive; color: #ff0055 !important; }
        .main-container { margin-top: 40px; background: #000; padding: 20px; }

        /* --- TABLA --- */
        .table { border-collapse: separate; border-spacing: 0 15px; width: 100%; }
        .table thead th {
            background-color: #ff0055 !important;
            color: #fff !important;
            font-weight: 900;
            text-transform: uppercase;
            padding: 15px;
            border: none;
            text-align: center;
        }
        .table tbody tr {
            background-color: #fff !important; 
            border-radius: 0px;
        }
        .table td {
            padding: 15px !important;
            border: none;
            vertical-align: middle;
            color: #000; 
        }

        
        .badge-id {
            background: #333;
            color: #ff0055;
            font-weight: bold;
            padding: 8px 12px;
            border: 2px solid #ff0055;
            display: inline-block;
        }
        .badge-nombre { font-weight: 900; font-size: 1.1rem; color: #000; text-transform: uppercase; }
        
        .label-email {
            background-color: #00f2ff !important;
            color: #000 !important;
            padding: 5px 10px;
            font-weight: 800;
            border-radius: 4px;
            font-family: 'Share Tech Mono', monospace;
            display: block;
            margin-bottom: 5px;
            width: fit-content; /* Se ajusta al texto */
            min-width: 200px;
        }
        .label-tel {
            background-color: #adff2f !important;
            color: #000 !important;
            padding: 5px 10px;
            font-weight: 800;
            border-radius: 4px;
            font-family: 'Share Tech Mono', monospace;
            display: block;
            width: fit-content;
            min-width: 200px;
        }
        .message-box {
            background: #222;
            padding: 12px;
            border-radius: 8px;
            color: #fff;
            border-left: 5px solid #ff0055;
            font-size: 0.95rem;
        }
        .text-hora { color: #00f2ff; font-weight: bold; font-family: 'Share Tech Mono', monospace; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">👾 BURGER MONSTER</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('inicio') }}">INICIO</a>
                <a class="nav-link" href="{{ route('menu') }}">LA CARTA</a>
                <a class="nav-link" href="{{ route('pedido.index') }}">PEDIDOS</a>
                <a class="nav-link active text-info" href="{{ route('buzon.index') }}">📥 BUZÓN</a>
            </div>
        </div>
    </nav>

    <div class="container main-container">
        <h1 class="text-center mb-5 fw-bold" style="color: #ff0055; text-shadow: 2px 2px #00f2ff;">CENTRAL DE INTELIGENCIA PQRS</h1>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>CLIENTE</th>
                        <th>CONTACTO</th>
                        <th>MENSAJE</th>
                        <th style="width: 100px;">HORA</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mensajes as $m)
                    <tr>
                        <td class="text-center">
                            <span class="badge-id">#{{ $m->id }}</span>
                        </td>
                        <td>
                            <div class="badge-nombre">
                                {{ strtoupper($m->nombre) }} 
                                @if(str_contains($m->mensaje, 'TIPO:'))
                                    <small class="d-block text-muted" style="font-size: 0.8rem;">
                                        ({{ strtoupper(explode('|', explode('TIPO: ', $m->mensaje)[1] ?? '')[0] ?? 'PQRS') }})
                                    </small>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="label-email">
                                📧 {{ strtoupper($m->correo) }}
                            </div>
                            <div class="label-tel">
                                📞 
                                @if(str_contains($m->mensaje, 'TEL:'))
                                    {{ explode('|', explode('TEL: ', $m->mensaje)[1] ?? '')[0] ?? 'S/N' }}
                                @else
                                    {{ $m->telefono ?? '3132194011' }}
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="message-box">
                                <strong style="color: #ff0055;">DETALLE:</strong> 
                                @if(str_contains($m->mensaje, 'DETALLE:'))
                                    {{ strtoupper(explode('DETALLE: ', $m->mensaje)[1] ?? $m->mensaje) }}
                                @else
                                    {{ strtoupper($m->mensaje) }}
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="text-hora">
                                {{ $m->created_at->format('H:i:s') }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">ESPERANDO TRANSMISIONES...</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>