<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #1e90ff; padding: 15px; text-align: center; color: white; border-radius: 8px 8px 0 0; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 0 0 8px 8px; }
        .content h2 { color: #1e90ff; }
        .note { background-color: #e6f3ff; padding: 10px; border-radius: 4px; margin: 20px 0; }
        a { color: #1e90ff; }
        .footer { color: #777; font-size: 12px; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Madryn Empleos</h1>
    </div>
    <div class="content">
        <h2>¡Postulación Enviada!</h2>
        <p>Hola,</p>
        <p>Hemos enviado tu currículum para el puesto de "<strong>{{ $oferta->titulo ?? 'Sin título' }}</strong>" en <strong>{{ $oferta->empresa_consultora ?? 'Sin empresa' }}</strong>.</p>
        <p>Si el empleador necesita contactarte, lo hará directamente. ¡Te deseamos mucho éxito!</p>
        <p class="note">
            Somos un proyecto sin ánimo de lucro. Si conocés empresas que quieran publicar ofertas, invitalas a visitar
            <a href="https://madryn-empleos.vercel.app">madryn-empleos.vercel.app</a>.
        </p>
        <p class="footer">El equipo de Madryn Empleos</p>
    </div>
</body>
</html>