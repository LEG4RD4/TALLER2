<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Leyenda | Burger Monster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Inter:wght@300;400;900&family=Permanent+Marker&display=swap" rel="stylesheet">
    <style>
        body { 
            background: radial-gradient(circle at top, #1a000a 0%, #050505 100%); 
            font-family: 'Inter', sans-serif; 
            color: white; 
            min-height: 100vh;
        }

        /* Navbar estilo neón */
        .navbar { background: rgba(0,0,0,0.9); border-bottom: 2px solid #ff0055; backdrop-filter: blur(10px); }
        .navbar-brand { font-family: 'Bungee', cursive; color: #ff0055 !important; }

        /* Contenedores con efecto cristal */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
            margin-bottom: 50px;
        }

        .title-exotic {
            font-family: 'Permanent Marker', cursive;
            font-size: 4rem;
            color: #ff0055;
            text-shadow: 3px 3px 0px #00f2ff;
            transform: rotate(-2deg);
        }

        /* Formulario Estilo Terminal */
        .form-label { font-weight: 900; color: #00f2ff; letter-spacing: 1px; font-size: 0.8rem; }
        .form-control, .form-select {
            background: rgba(0,0,0,0.5) !important;
            border: 1px solid #333 !important;
            color: #fff !important;
            border-radius: 0;
            padding: 12px;
            transition: 0.3s;
        }
        .form-control:focus {
            border-color: #ff0055 !important;
            box-shadow: 0 0 15px rgba(255, 0, 85, 0.3);
        }

        /* Botón Brutal */
        .btn-monster {
            background: #ff0055;
            color: white;
            font-family: 'Bungee';
            font-size: 1.2rem;
            border: none;
            padding: 15px;
            width: 100%;
            clip-path: polygon(5% 0, 100% 0, 95% 100%, 0% 100%);
            transition: 0.3s;
        }
        .btn-monster:hover {
            background: #00f2ff;
            color: #000;
            transform: scale(1.02);
            cursor: pointer;
        }

        .img-monster {
            border-radius: 20px;
            filter: grayscale(0.5) contrast(1.2);
            border: 2px solid #ff0055;
            box-shadow: 0 0 20px #ff0055;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">👾 BURGER MONSTER</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('inicio') }}">INICIO</a>
                <a class="nav-link" href="{{ route('menu') }}">LA CARTA</a>
                <a class="nav-link" href="{{ route('pedido.index') }}">PEDIDOS</a>
                <a class="nav-link active fw-bold" href="{{ route('nosotros') }}">NOSOTROS</a>
                <a class="nav-link" href="{{ route('buzon.index') }}" style="color: #00f2ff !important;">📥 BUZÓN</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4">
                <h1 class="title-exotic mb-4">NACE EL MONSTRUO</h1>
                <p class="lead" style="color: #bbb; line-height: 1.8;">
                    No buscamos ser una hamburguesería más. En <strong>Burger Monster</strong> cocinamos con furia y pasión. Nacimos en las calles, bajo luces neón, con la misión de destruir el hambre con sabores que no deberían ser legales. 
                </p>
                <div class="d-flex gap-3 mt-4">
                    <div class="p-3 border-start border-3 border-danger">
                        <h4 class="mb-0">+5000</h4>
                        <small class="text-secondary">Víctimas del sabor</small>
                    </div>
                    <div class="p-3 border-start border-3 border-info">
                        <h4 class="mb-0">100%</h4>
                        <small class="text-secondary">Carne Real</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?w=600" class="img-fluid img-monster" alt="Burger Shop">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="glass-card">
                    <h2 class="text-center mb-5" style="font-family: 'Bungee'; letter-spacing: 2px;">
                        <span style="color: #00f2ff;">TRANSMISIÓN</span> DE PQRS
                    </h2>

                    <form action="{{ route('pqrs.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-uppercase">Identificación del Sujeto</label>
                                <input type="text" name="nombre" class="form-control" placeholder="NOMBRE COMPLETO" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-uppercase">Canal de Respuesta</label>
                                <input type="email" name="correo" class="form-control" placeholder="EMAIL@EJEMPLO.COM" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-uppercase">Línea de Enlace</label>
                                <input type="text" name="telefono" class="form-control" placeholder="TELÉFONO" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-uppercase">Categoría del Reporte</label>
                                <select name="tipo" class="form-select">
                                    <option value="Queja">⚠️ QUEJA</option>
                                    <option value="Reclamo">❌ RECLAMO</option>
                                    <option value="Sugerencia">💡 SUGERENCIA</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label text-uppercase">Detalle del Incidente</label>
                                <textarea name="comentario" class="form-control" rows="4" placeholder="ESCRIBE AQUÍ TU MENSAJE..." required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn-monster">INICIAR ENVÍO DE DATOS 🚀</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-5 text-secondary">
        <small>&copy; 2026 BURGER MONSTER CORE - PASTO, COLOMBIA</small>
    </footer>
</body>
</html>