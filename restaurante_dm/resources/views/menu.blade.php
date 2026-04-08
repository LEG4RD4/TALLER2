<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monster Menu | Exotic Experience</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon-pink: #ff0055;
            --neon-cyan: #00f2ff;
            --dark-bg: #050505;
        }

        body { 
            background-color: var(--dark-bg); 
            color: white; 
            font-family: 'Rajdhani', sans-serif;
            background-image: radial-gradient(circle at 50% -20%, #220011 0%, #050505 80%);
        }

        /* Navbar Estilo Cristal */
        .navbar { 
            background: rgba(0, 0, 0, 0.8); 
            backdrop-filter: blur(15px);
            border-bottom: 2px solid var(--neon-pink);
            box-shadow: 0 0 20px rgba(255, 0, 85, 0.4);
        }
        .navbar-brand { font-family: 'Permanent Marker', cursive; color: var(--neon-pink) !important; font-size: 1.8rem; }

        /* Título Neón Animado */
        .glitch-title {
            font-family: 'Permanent Marker', cursive;
            font-size: 4rem;
            text-transform: uppercase;
            text-shadow: 3px 3px var(--neon-cyan), -3px -3px var(--neon-pink);
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px var(--neon-pink), 0 0 20px var(--neon-pink); }
            to { text-shadow: 0 0 20px var(--neon-cyan), 0 0 40px var(--neon-cyan); }
        }

        /* Tarjetas Exóticas */
        .burger-card {
            background: rgba(20, 20, 20, 0.9);
            border: 2px solid #222;
            border-radius: 0 40px 0 40px;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .burger-card::before {
            content: '';
            position: absolute;
            top: -50%; left: -50%; width: 200%; height: 200%;
            background: conic-gradient(transparent, transparent, transparent, var(--neon-pink));
            animation: rotate-border 4s linear infinite;
            z-index: -1;
        }

        @keyframes rotate-border {
            100% { transform: rotate(360deg); }
        }

        .burger-card:hover {
            transform: scale(1.05) rotate(1deg);
            border-color: var(--neon-cyan);
            box-shadow: 0 0 50px rgba(0, 242, 255, 0.3);
        }

        .burger-img {
            height: 250px;
            object-fit: cover;
            border-radius: 0 35px 0 35px;
            margin: 10px;
            filter: saturate(1.5) contrast(1.1);
            border: 1px solid #333;
        }

        .price-tag {
            font-size: 2rem;
            color: var(--neon-cyan);
            font-weight: 700;
            text-shadow: 0 0 10px var(--neon-cyan);
        }

        .btn-order {
            background: transparent;
            border: 2px solid var(--neon-pink);
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px 25px;
            border-radius: 0;
            clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%);
            transition: 0.3s;
        }

        .btn-order:hover {
            background: var(--neon-pink);
            box-shadow: 0 0 20px var(--neon-pink);
            color: black;
            transform: translateY(-3px);
        }

        .footer-text { color: #444; letter-spacing: 5px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">👾 BURGER MONSTER</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('inicio') }}">INICIO</a>
                <a class="nav-link active fw-bold" style="color: var(--neon-cyan)" href="{{ route('menu') }}">LA CARTA</a>
                <a class="nav-link" href="{{ route('pedido.index') }}">MONITOR</a>
                <a class="nav-link" href="{{ route('nosotros') }}">NOSOTROS</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-4">
        <div class="text-center mb-5">
            <h1 class="glitch-title">MENU EXOTICO</h1>
            <p class="text-secondary lead fw-bold">SABOR QUE TE HARA EXPLOTAR LOS CIRCUITOS</p>
        </div>

        <div class="row">
            @php
                $hamburguesas = [
                    ['nombre' => 'THE KRAKEN', 'precio' => 38000, 'desc' => 'Doble carne Angus, aros negros y salsa de calamar.', 'img' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600'],
                    ['nombre' => 'VOLCANO SPICY', 'precio' => 32500, 'desc' => 'Jalapeños ahumados y jeringa de salsa nuclear.', 'img' => 'https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?w=600'],
                    ['nombre' => 'CYBER CHICKEN', 'precio' => 29000, 'desc' => 'Pollo panko neón y ensalada morada eléctrica.', 'img' => 'https://images.unsplash.com/photo-1521305916504-4a1121188589?w=600'],
                    ['nombre' => 'BACON APOCALYPSE', 'precio' => 36000, 'desc' => 'Triple bacon caramelizado y baño de queso azul.', 'img' => 'https://images.unsplash.com/photo-1553979459-d2229ba7433b?w=600'],
                    ['nombre' => 'GREEN MONSTER', 'precio' => 34000, 'desc' => 'Nachos triturados, guacamole y jalapeños verdes.', 'img' => 'https://images.unsplash.com/photo-1607013251379-e6eecfffe234?w=600'],
                    ['nombre' => 'GOLDEN WAGYU', 'precio' => 48000, 'desc' => 'Carne Wagyu, oro comestible y reducción de vino.', 'img' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?w=600'],
                ];
            @endphp

            @foreach($hamburguesas as $h)
            <div class="col-md-4 mb-5">
                <div class="card burger-card h-100">
                    <img src="{{ $h['img'] }}" class="burger-img" alt="burger">
                    <div class="card-body d-flex flex-column">
                        <h3 class="fw-bold mb-3" style="color: var(--neon-pink)">{{ $h['nombre'] }}</h3>
                        <p class="text-secondary small fw-bold mb-4">{{ $h['desc'] }}</p>
                        
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="price-tag">${{ number_format($h['precio'], 0) }}</span>
                            
                            <form action="{{ route('agregar.pedido') }}" method="POST">
                                @csrf
                                <input type="hidden" name="nombre" value="{{ $h['nombre'] }}">
                                <input type="hidden" name="precio" value="{{ $h['precio'] }}">
                                <input type="hidden" name="descripcion" value="{{ $h['desc'] }}">
                                <button type="submit" class="btn-order">ORDENAR 👾</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer class="text-center py-5">
        <p class="footer-text fw-bold">TERMINAL CENTRAL // BURGER MONSTER 2026</p>
    </footer>

</body>
</html>