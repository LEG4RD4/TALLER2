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

        /* --- TABLA DE ALTO IMPACTO --- */
        .table { border-collapse: separate; border-spacing: 0 15px; }

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
            background-color: #111 !important;
            border-radius: 10px;
            transition: 0.3s;
        }

        .table td {
            padding: 20px !important;
            border: none;
            vertical-align: middle;
        }

        /* --- ETIQUETAS CON TEXTO NEGRO (PARA QUE NO SE OPAQUE) --- */
        .badge-nombre {
            background-color: #fff; /* Blanco puro */
            color: #000 !important; /* TEXTO NEGRO */
            padding: 5px 15px;
            font-weight: 900;
            border-radius: 4px;
            display: inline-block;
            font-size: 1.2rem;
        }

        .badge-contacto {
            background-color: #00f2ff; /* Cian Brillante */
            color: #000 !important; /* TEXTO NEGRO */
            padding: 3px 10px;
            font-weight: 800;
            border-radius: 4px;
            font-family: 'Share Tech Mono', monospace;
            display: inline-block;
            margin-bottom: 5px;
        }

        .badge-telefono {
            background-color: #adff2f; /* Verde Lima */
            color: #000 !important; /* TEXTO NEGRO */
            padding: 3px 10px;
            font-weight: 800;
            border-radius: 4px;
            font-family: 'Share Tech Mono', monospace;
            display: inline-block;
        }

        .message-box {
            background: #222;
            padding: 12px;
            border-radius: 8px;
            color: #fff;
            border-left: 4px solid #ff0055;
        }

        .badge-id {
            background: #333;
            color: #ff0055;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #ff0055;
        }
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
                <a class="nav-link" href="{{ route('nosotros') }}">NOSOTROS</a>
                <a class="nav-link fw-bold active text-info" href="{{ route('buzon.index') }}">📥 BUZÓN</a>
            </div>
        </div>
    </nav>

    <div class="container main-container">
        <h1 class="text-center mb-5 fw-bold" style="color: #ff0055; text-shadow: 2px 2px #00f2ff;">CENTRAL DE INTELIGENCIA PQRS</h1>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CLIENTE</th>
                        <th>CONTACTO</th>
                        <th>MENSAJE</th>
                        <th>HORA</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mensajes as $m)
                    <tr>
                        <td class="text-center"><span class="badge-id">#{{ $m->id }}</span></td>
                        <td>
                            <div class="badge-nombre">
                                {{ strtoupper(str_replace('PQRS: ', '', $m->nombre)) }}
                            </div>
                        </td>
                        <td>
                            @php $partes = explode('|', $m->descripcion); @endphp
                            <div class="badge-contacto">
                                📧 {{ $partes[0] ?? 'N/A' }}
                            </div><br>
                            <div class="badge-telefono">
                                📞 {{ $partes[1] ?? 'N/A' }}
                            </div>
                        </td>
                        <td>
                            <div class="message-box">
                                {{ $partes[2] ?? $m->descripcion }}
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="fw-bold" style="color: #00f2ff;">{{ $m->created_at->format('H:i:s') }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-5">SIN TRANSMISIONES...</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>