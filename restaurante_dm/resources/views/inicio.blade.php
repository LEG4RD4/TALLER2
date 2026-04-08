<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Monster | El Sabor Exótico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Inter:wght@400;900&display=swap" rel="stylesheet">
    <style>
        body { background-color: #0a0a0a; font-family: 'Inter', sans-serif; color: white; overflow-x: hidden; }
        .navbar { background: rgba(0,0,0,0.9); border-bottom: 2px solid #ff0055; backdrop-filter: blur(10px); }
        .navbar-brand { font-family: 'Bungee', cursive; color: #ff0055 !important; font-size: 1.5rem; }
        .hero { height: 90vh; display: flex; align-items: center; background: radial-gradient(circle at center, #3d0014 0%, #0a0a0a 100%); }
        .neon-text { font-family: 'Bungee', cursive; color: #fff; text-shadow: 0 0 10px #ff0055, 0 0 20px #ff0055, 0 0 40px #ff0055; font-size: 5rem; line-height: 1; }
        .btn-exotic { background: #ff0055; color: white; border: none; padding: 15px 40px; font-weight: 900; border-radius: 0px; clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%); transition: 0.3s; }
        .btn-exotic:hover { background: #fff; color: #ff0055; transform: scale(1.1); }
        .floating-burger { animation: float 4s ease-in-out infinite; width: 100%; max-width: 500px; filter: drop-shadow(0 0 30px rgba(255, 0, 85, 0.5)); }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-30px); } }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">👾 BURGER MONSTER</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active text-white fw-bold" href="{{ route('inicio') }}">INICIO</a>
                <a class="nav-link" href="{{ route('menu') }}">LA CARTA</a>
                <a class="nav-link" href="{{ route('pedido.index') }}">PEDIDOS</a>
                <a class="nav-link" href="{{ route('nosotros') }}">NOSOTROS</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-6">
                    <h1 class="neon-text mb-4">SABOR<br>BRUTAL</h1>
                    <p class="lead mb-5 text-secondary">¿Cansado de lo normal? Ven a probar la hamburguesa que desafía las leyes de la cocina tradicional.</p>
                    <a href="{{ route('menu') }}" class="btn-exotic shadow-lg">EXPLORAR MENÚ</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://pngimg.com/uploads/burger_sandwich/burger_sandwich_PNG4135.png" class="floating-burger" alt="Monster Burger">
                </div>
            </div>
        </div>
    </section>
</body>
</html>