<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monster Monitor | Live Feed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon-pink: #ff0055;
            --neon-cyan: #00f2ff;
            --dark-bg: #050505;
        }

        body { 
            background-color: var(--dark-bg); 
            color: white; 
            font-family: 'Share Tech Mono', monospace;
            background-image: linear-gradient(180deg, #1a0008 0%, #050505 100%);
            min-height: 100vh;
        }

        /* Navbar */
        .navbar { 
            background: rgba(0, 0, 0, 0.9); 
            border-bottom: 2px solid var(--neon-cyan);
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.3);
        }
        .navbar-brand { font-family: 'Permanent Marker', cursive; color: var(--neon-cyan) !important; }

        /* Contenedor del Monitor */
        .monitor-frame {
            border: 2px solid #222;
            background: rgba(10, 10, 10, 0.9);
            border-radius: 20px;
            padding: 30px;
            position: relative;
            box-shadow: inset 0 0 20px rgba(0, 242, 255, 0.05);
        }

        .monitor-frame::before {
            content: "LIVE FEED // ENCRYPTED";
            position: absolute;
            top: -12px;
            left: 20px;
            background: var(--neon-cyan);
            color: black;
            padding: 0 10px;
            font-size: 0.7rem;
            font-weight: bold;
        }

        /* Tabla Estilo Matrix */
        .table { color: var(--neon-cyan); border-color: #333; }
        .table thead { background: rgba(0, 242, 255, 0.1); color: var(--neon-cyan); text-transform: uppercase; }
        .table tbody tr:hover { background: rgba(255, 0, 85, 0.05); }

        .price-glow {
            color: var(--neon-pink);
            text-shadow: 0 0 10px var(--neon-pink);
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* Botón Volver Neón */
        .btn-back {
            background: transparent;
            border: 2px solid var(--neon-cyan);
            color: var(--neon-cyan);
            font-family: 'Permanent Marker', cursive;
            padding: 10px 30px;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
            clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 10% 100%);
        }

        .btn-back:hover {
            background: var(--neon-cyan);
            color: black;
            box-shadow: 0 0 30px var(--neon-cyan);
            transform: scale(1.1);
        }

        .status-dot {
            height: 10px;
            width: 10px;
            background-color: #0f0;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
            animation: blink 1s infinite;
        }

        @keyframes blink { 0% { opacity: 1; } 50% { opacity: 0; } 100% { opacity: 1; } }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">👾 MONSTER MONITOR</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('inicio') }}">INICIO</a>
                <a class="nav-link" href="{{ route('menu') }}">LA CARTA</a>
                <a class="nav-link active fw-bold" href="{{ route('pedido.index') }}">PEDIDOS</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="monitor-frame">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h2 fw-bold text-white mb-0">PEDIDOS <span style="color: var(--neon-cyan);">ACTIVOS</span></h1>
                    <p class="small text-secondary mb-0"><span class="status-dot"></span> SISTEMA SINCRONIZADO CON PASTO-CENTRO</p>
                </div>
                <div class="text-end">
                    <a href="{{ route('inicio') }}" class="btn-back">VOLVER AL INICIO</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>PRODUCTO</th>
                            <th>DETALLES</th>
                            <th class="text-center">PRECIO</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">
                        @forelse($productos as $p)
                        <tr style="border-bottom: 1px solid #222;">
                            <td class="text-secondary small">0x{{ $p->id }}</td>
                            <td class="fw-bold fs-5 text-white">{{ $p->nombre }}</td>
                            <td class="text-secondary small" style="max-width: 300px;">{{ $p->descripcion }}</td>
                            <td class="text-center">
                                <span class="price-glow">${{ number_format($p->precio, 0, ',', '.') }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <h3 class="text-muted">SIN PEDIDOS EN EL RADAR...</h3>
                                <a href="{{ route('menu') }}" class="btn btn-outline-danger mt-3">IR A LA CARTA</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="text-center py-5">
        <p class="text-secondary small fw-bold" style="letter-spacing: 3px;">DATABASE_SYNC_OK // TERMINAL_01</p>
    </footer>

</body>
</html>