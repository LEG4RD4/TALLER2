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

        .navbar { 
            background: rgba(0, 0, 0, 0.8); 
            backdrop-filter: blur(15px);
            border-bottom: 2px solid var(--neon-pink);
            box-shadow: 0 0 20px rgba(255, 0, 85, 0.4);
        }
        .navbar-brand { font-family: 'Permanent Marker', cursive; color: var(--neon-pink) !important; font-size: 1.8rem; }

        .glitch-title {
            font-family: 'Permanent Marker', cursive;
            font-size: 4rem;
            text-transform: uppercase;
            text-shadow: 3px 3px var(--neon-cyan), -3px -3px var(--neon-pink);
            animation: glow 2s ease-in-out infinite alternate;
        }

        .category-separator {
            font-family: 'Permanent Marker', cursive;
            color: var(--neon-cyan);
            border-bottom: 2px dashed var(--neon-pink);
            display: inline-block;
            padding-bottom: 10px;
            margin-bottom: 40px;
            margin-top: 60px;
            text-transform: uppercase;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px var(--neon-pink), 0 0 20px var(--neon-pink); }
            to { text-shadow: 0 0 20px var(--neon-cyan), 0 0 40px var(--neon-cyan); }
        }

        .burger-card {
            background: rgba(20, 20, 20, 0.9);
            border: 2px solid #222;
            border-radius: 0 40px 0 40px;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .burger-card::before {
            content: '';
            position: absolute;
            top: -50%; left: -50%; width: 200%; height: 200%;
            background: conic-gradient(transparent, transparent, transparent, var(--neon-pink));
            animation: rotate-border 4s linear infinite;
            z-index: -1;
        }

        @keyframes rotate-border { 100% { transform: rotate(360deg); } }

        .burger-card:hover {
            transform: scale(1.05) rotate(1deg);
            border-color: var(--neon-cyan);
            box-shadow: 0 0 50px rgba(0, 242, 255, 0.3);
        }

        .burger-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
            border-radius: 0 35px 0 35px;
            filter: saturate(1.5) contrast(1.1);
            border: 1px solid #333;
        }

        .price-tag {
            font-size: 1.7rem;
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
            padding: 8px 15px;
            border-radius: 0;
            clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%);
            transition: 0.3s;
            font-size: 0.9rem;
        }

        .btn-order:hover {
            background: var(--neon-pink);
            box-shadow: 0 0 20px var(--neon-pink);
            color: black;
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
                <a class="nav-link" href="{{ route('pedido.index') }}">PEDIDOS</a>
                <a class="nav-link" href="{{ route('nosotros') }}">NOSOTROS</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-4">
        <div class="text-center mb-5">
            <h1 class="glitch-title">MENU EXOTICO</h1>
            <p class="text-secondary lead fw-bold">SABOR QUE TE HARA EXPLOTAR LOS CIRCUITOS</p>
        </div>

        @php
            $categorias = [
                'LAS BESTIAS (HAMBURGUESAS)' => [
                    ['nombre' => 'THE KRAKEN', 'precio' => 38000, 'desc' => 'Doble carne Angus, aros negros y salsa de calamar.', 'img' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600'],
                    ['nombre' => 'VOLCANO SPICY', 'precio' => 32500, 'desc' => 'Jalapeños ahumados y jeringa de salsa nuclear.', 'img' => 'https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?w=600'],
                    ['nombre' => 'CYBER CHICKEN', 'precio' => 29000, 'desc' => 'Pollo panko neón y ensalada morada eléctrica.', 'img' => 'https://images.unsplash.com/photo-1521305916504-4a1121188589?w=600'],
                    ['nombre' => 'BACON APOCALYPSE', 'precio' => 36000, 'desc' => 'Triple bacon caramelizado y baño de queso azul.', 'img' => 'https://images.unsplash.com/photo-1553979459-d2229ba7433b?w=600'],
                    ['nombre' => 'GREEN MONSTER', 'precio' => 34000, 'desc' => 'Nachos triturados, guacamole y jalapeños verdes.', 'img' => 'https://images.unsplash.com/photo-1607013251379-e6eecfffe234?w=600'],
                    ['nombre' => 'GOLDEN WAGYU', 'precio' => 48000, 'desc' => 'Carne Wagyu, oro comestible y reducción de vino.', 'img' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?w=600'],
                    ['nombre' => 'NEON MUSHROOM', 'precio' => 31000, 'desc' => 'Champiñones al ajillo, queso suizo y alioli de trufa.', 'img' => 'https://images.unsplash.com/photo-1550547660-d9450f859349?w=600'],
                    ['nombre' => 'TOXIC VEGGIE', 'precio' => 28000, 'desc' => 'Falafel de la casa, hummus de remolacha y brotes.', 'img' => 'https://images.unsplash.com/photo-1512152272829-e3139592d56f?w=600'],
                ],
                'GARRAS Y DIENTES (ENTRADAS)' => [
                    ['nombre' => 'WINGS FROM HELL', 'precio' => 18000, 'desc' => 'Alitas bañadas en lava de habanero y miel negra.', 'img' => 'https://images.unsplash.com/photo-1527477396000-e27163b481c2?w=600'],
                    ['nombre' => 'NACHOS APOCALYPSE', 'precio' => 22000, 'desc' => 'Montaña de totopos, chili con carne y queso fundido.', 'img' => 'https://images.unsplash.com/photo-1513456852971-30c0b8199d4d?w=600'],
                    ['nombre' => 'TOXIC FRIES', 'precio' => 15000, 'desc' => 'Papas con polvo de chiles y salsa de queso neón.', 'img' => 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=600'],
                    ['nombre' => 'BAT BITES', 'precio' => 19000, 'desc' => 'Trozo de pollo premium con costra de carbón activado.', 'img' => 'https://images.unsplash.com/photo-1562967914-608f82629710?w=600'],
                    ['nombre' => 'CYBER TEQUEÑOS', 'precio' => 16000, 'desc' => 'Dedos de queso con mermelada de pimentón radiactivo.', 'img' => 'https://images.unsplash.com/photo-1541529086526-db283c563270?w=600'],
                    ['nombre' => 'MUTANT SHRIMPS', 'precio' => 25000, 'desc' => 'Camarones apanados en coco y salsa agridulce.', 'img' => 'https://images.unsplash.com/photo-1559742811-822873691df8?w=600'],
                    ['nombre' => 'ZOMBIE RIBS', 'precio' => 27000, 'desc' => 'Costillitas de cerdo bañadas en BBQ de cereza.', 'img' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=600'],
                    ['nombre' => 'EMPANADAS BYTE', 'precio' => 12000, 'desc' => 'Mini empanadas de carne con ají de piña.', 'img' => 'https://images.unsplash.com/photo-1552332386-f8dd00dc2f85?w=600'],
                    ['nombre' => 'GLITCH SALAD', 'precio' => 21000, 'desc' => 'Mix de verdes, frutos secos y vinagreta eléctrica.', 'img' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600'],
                ],
                'POCIONES RADIACTIVAS (BEBIDAS)' => [
                    ['nombre' => 'BLUE TOXIN', 'precio' => 12000, 'desc' => 'Soda de coco azul con perlas de nitrógeno.', 'img' => 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?w=600'],
                    ['nombre' => 'LAVA CHERRY', 'precio' => 12000, 'desc' => 'Granizado de cereza ácida con borde de sal neón.', 'img' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=600'],
                    ['nombre' => 'MORTAL MOJITO', 'precio' => 18000, 'desc' => 'Ron, hierbabuena negra y esencia de dragón.', 'img' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=600'],
                    ['nombre' => 'SLIME SHAKE', 'precio' => 16000, 'desc' => 'Malteada de pistacho con hilos de chocolate verde.', 'img' => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=600'],
                    ['nombre' => 'CYBER COLA', 'precio' => 7000, 'desc' => 'La clásica, servida con hielo seco.', 'img' => 'https://images.unsplash.com/photo-1622483767028-3f66f32aef97?w=600'],
                    ['nombre' => 'RADIOACTIVE BEER', 'precio' => 11000, 'desc' => 'Cerveza artesanal de la casa, rubia o negra.', 'img' => 'https://images.unsplash.com/photo-1535958636474-b021ee887b13?w=600'],
                    ['nombre' => 'PLASMA JUICE', 'precio' => 9000, 'desc' => 'Jugo natural de temporada en envase de suero.', 'img' => 'https://images.unsplash.com/photo-1547514701-42782101795e?w=600'],
                    ['nombre' => 'VODKA VOID', 'precio' => 20000, 'desc' => 'Vodka con frutos negros y toque de carbón.', 'img' => 'https://images.unsplash.com/photo-1551538827-9c037cb4f32a?w=600'],
                ],
                'DULCES PESADILLAS (POSTRES)' => [
                    ['nombre' => 'DARK VOLCANO', 'precio' => 14000, 'desc' => 'Coulant de chocolate al 70% con lava hirviendo.', 'img' => 'https://images.unsplash.com/photo-1624353365286-3f8d62daad51?w=600'],
                    ['nombre' => 'OREO OVERLOAD', 'precio' => 13000, 'desc' => 'Cheesecake de Oreo con jeringa de chocolate.', 'img' => 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?w=600'],
                    ['nombre' => 'RED VELVET GHOST', 'precio' => 15000, 'desc' => 'Pastel rojo intenso con crema de queso fantasmagorica.', 'img' => 'https://images.unsplash.com/photo-1616541823729-00fe0aacd32c?w=600'],
                    ['nombre' => 'NEON DONUTS', 'precio' => 10000, 'desc' => 'Par de donas con glaseado que brilla bajo luz UV.', 'img' => 'https://images.unsplash.com/photo-1551024601-bec78aea704b?w=600'],
                    ['nombre' => 'WAFFLE MATRIX', 'precio' => 18000, 'desc' => 'Waffle negro con helado de vainilla y frutas locas.', 'img' => 'https://images.unsplash.com/photo-1504113888839-1c8003673ef4?w=600'],
                    ['nombre' => 'BROWNIE BYTES', 'precio' => 12000, 'desc' => 'Brownie melcochudo con trozos de galleta.', 'img' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=600'],
                    ['nombre' => 'ICE CREAM GLITCH', 'precio' => 9000, 'desc' => '3 bolas de helado con toppings explosivos.', 'img' => 'https://images.unsplash.com/photo-1501443762994-82bd5dace89a?w=600'],
                    ['nombre' => 'CHURRO CIRCUIT', 'precio' => 11000, 'desc' => 'Churros en espiral con salsa de arequipe quemado.', 'img' => 'https://images.unsplash.com/photo-1578323851363-379b1836f138?w=600'],
                    ['nombre' => 'PANNA COTTA VOID', 'precio' => 14000, 'desc' => 'De frutos rojos con base de galleta negra.', 'img' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=600'],
                    ['nombre' => 'APPLE CRUNCH ERROR', 'precio' => 13000, 'desc' => 'Crocante de manzana con canela y mucho caramelo.', 'img' => 'https://images.unsplash.com/photo-1568571780765-9276ac417592?w=600'],
                ]
            ];
        @endphp

        @foreach($categorias as $titulo => $items)
            <div class="text-center mt-5">
                <h2 class="category-separator">{{ $titulo }}</h2>
            </div>
            
            <div class="row">
                @foreach($items as $item)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card burger-card h-100">
                        <div class="p-2">
                            <img src="{{ $item['img'] }}" class="burger-img" alt="item">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h4 class="fw-bold mb-2" style="color: var(--neon-pink); font-size: 1.1rem;">{{ $item['nombre'] }}</h4>
                            <p class="text-secondary small fw-bold mb-4" style="line-height: 1.1; font-size: 0.8rem;">{{ $item['desc'] }}</p>
                            
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="price-tag" style="font-size: 1.4rem;">${{ number_format($item['precio'], 0) }}</span>
                                </div>
                                <form action="{{ route('agregar.pedido') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="nombre" value="{{ $item['nombre'] }}">
                                    <input type="hidden" name="precio" value="{{ $item['precio'] }}">
                                    <input type="hidden" name="descripcion" value="{{ $item['desc'] }}">
                                    <button type="submit" class="btn-order w-100">ORDENAR 👾</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <footer class="text-center py-5">
        <p class="footer-text fw-bold">TERMINAL CENTRAL // BURGER MONSTER 2026</p>
    </footer>

</body>
</html>