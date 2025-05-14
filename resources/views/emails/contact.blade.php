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
        <h2>Nuevo Mensaje de Contacto</h2>
        <p>¡Hola equipo!</p>
        <p>Hemos recibido un nuevo mensaje a través del formulario de contacto:</p>
        <table>
            <tr>
                <td><strong>Nombre:</strong></td>
                <td>{{ $contact->name }}</td>
            </tr>
            <tr>
                <td><strong>Apellido:</strong></td>
                <td>{{ $contact->lastName }}</td>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $contact->email }}</td>
            </tr>
            <tr>
                <td><strong>Mensaje:</strong></td>
                <td>{{ $contact->message }}</td>
            </tr>
        </table>
        <p>Por favor, revisa este mensaje y responde al remitente si es necesario utilizando la opción 'Responder'.</p>
        <p class="footer">Sistema Automático de Madryn Empleos</p>
    </div>
</body>
</html>