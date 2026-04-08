<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Rajdhani:wght@700&display=swap" rel="stylesheet">
    <style>
        body { background: #000; color: white; font-family: 'Rajdhani', sans-serif; }
        .neon-border { border: 2px solid #ff0055; box-shadow: 0 0 20px #ff0055; border-radius: 20px; padding: 30px; background: rgba(10,0,5,0.8); }
        .pqrs-form { background: #111; border-left: 5px solid #00f2ff; padding: 20px; border-radius: 10px; }
        .btn-pqrs { background: #00f2ff; color: black; font-weight: bold; border: none; width: 100%; padding: 10px; clip-path: polygon(0 0, 100% 0, 95% 100%, 5% 100%); }
        .navbar { border-bottom: 2px solid #ff0055; background: black; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('inicio') }}" style="font-family: 'Permanent Marker'; color: #ff0055 !important;">👾 BURGER MONSTER</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('inicio') }}">INICIO</a>
                <a class="nav-link" href="{{ route('menu') }}">LA CARTA</a>
                <a class="nav-link" href="{{ route('pedido.index') }}">MONITOR</a>
                <a class="nav-link active" href="{{ route('nosotros') }}">NOSOTROS</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h1 style="font-family: 'Permanent Marker'; color: #ff0055; font-size: 4rem;">NUESTRA LEYENDA</h1>
                <p class="lead">No somos una hamburguesería, somos una rebelión contra el sabor aburrido. En el corazón de Pasto, creamos monstruos que alimentan tu alma.</p>
            </div>
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1550547660-d9450f859349?w=600" class="img-fluid neon-border" alt="Chef">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 neon-border">
                <h2 class="text-center mb-4" style="color: #00f2ff;">CENTRO DE PQRS</h2>
                <form action="{{ route('pqrs.store') }}" method="POST" class="pqrs-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>TU NOMBRE</label>
                            <input type="text" name="nombre" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>TIPO</label>
                            <select name="tipo" class="form-control bg-dark text-white border-secondary">
                                <option value="Queja">Queja</option>
                                <option value="Reclamo">Reclamo</option>
                                <option value="Sugerencia">Sugerencia</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>MENSAJE</label>
                        <textarea name="comentario" class="form-control bg-dark text-white border-secondary" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn-pqrs">ENVIAR AL SISTEMA 🚀</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>