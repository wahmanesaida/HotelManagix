<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annulation de reservation!</title>
</head>
<body>
    <h1>Votre réservation a été annulée</h1>
    <p>Cher(e) {{$reservation->clients->name}},</p>
    <p>Votre réservation a été annulée. Nous sommes désolés pour tout inconvénient causé.</p>
    <p>Numéro de réservation : {{$reservation->id}}</p>
</body>
</html>
