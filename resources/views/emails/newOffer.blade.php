<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #1e90ff; padding: 15px; text-align: center; color: white; border-radius: 8px 8px 0 0; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 0 0 8px 8px; }
        .content h2 { color: #1e90ff; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        td { padding: 10px; border: 1px solid #ddd; }
        tr:nth-child(odd) { background-color: #f1f1f1; }
        .footer { color: #777; font-size: 12px; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Madryn Empleos</h1>
    </div>
    <div class="content">
        <h2>Nueva Oferta Registrada</h2>
        <p>¡Hola equipo!</p>
        <p>Se ha registrado una nueva oferta en la plataforma:</p>
        <table>
            <tr>
                <td><strong>Título:</strong></td>
                <td>{{ $oferta->titulo ?? 'Sin título' }}</td>
            </tr>
            <tr>
                <td><strong>Empresa:</strong></td>
                <td>{{ $oferta->empresa_consultora ?? 'Sin empresa' }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $oferta->email_contacto ?? 'Sin email' }}</td>
            </tr>
            <tr>
                <td><strong>Forma:</strong></td>
                <td>{{ $oferta->forma_postulacion ?? 'Sin forma' }}</td>
            </tr>
        </table>
        <p class="footer">Equipo de Madryn Empleos</p>
    </div>
</body>
</html>