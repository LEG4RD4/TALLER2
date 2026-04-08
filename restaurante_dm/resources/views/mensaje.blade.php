<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #050505; color: #00f2ff; font-family: monospace; }
        .msg-card { background: #111; border: 1px solid #00f2ff; padding: 15px; margin-bottom: 10px; border-left: 10px solid #ff0055; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1>📥 BUZÓN DE CRÍTICAS Y RECLAMOS</h1>
            <a href="{{ route('nosotros') }}" class="btn btn-outline-info">VOLVER</a>
        </div>

        @foreach($mensajes as $m)
        <div class="msg-card">
            <h4 class="text-white">{{ $m->nombre }}</h4>
            <p>{{ $m->descripcion }}</p>
            <small class="text-secondary">RECIBIDO: {{ $m->created_at }}</small>
        </div>
        @endforeach
    </div>
</body>
</html>