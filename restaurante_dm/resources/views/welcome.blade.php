<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restaurante DM - Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .navbar-custom { background-color: #2c3e50; }
        .hero-section { 
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1517248135467-4c7ed9d42439?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            color: white;
            padding: 60px 0;
            margin-bottom: 30px;
        }
        .card-form { border-left: 5px solid #e67e22; }
    </style>
</head>
<body>

<header class="hero-section text-center">
    <h1>Restaurante DM</h1>
    <p>Panel de Administración de Menú</p>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card card-form shadow">
                <div class="card-body">
                    <h5 class="card-title">Añadir Nuevo Plato</h5>
                    <form action="{{ route('producto.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Nombre del Plato</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Precio (COP)</label>
                            <input type="number" name="precio" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Descripción Breve</label>
                            <textarea name="descripcion" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Registrar en Sistema</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">Listado de Menú Actual</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $p)
                            <tr>
                                <td><strong>{{ $p->nombre }}</strong></td>
                                <td>{{ $p->descripcion }}</td>
                                <td><span class="badge bg-success">${{ number_format($p->precio, 0) }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>