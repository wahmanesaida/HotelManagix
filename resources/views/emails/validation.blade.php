<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resrvation validé</title>
</head>
<body>
    <h1>Votre réservation a été validée</h1>
    <p>Cher(e) {{$reservation->clients->name}},</p>
    <p>Votre réservation a été validée avec succès. Nous vous attendons avec impatience.</p>
    <p>Numéro de réservation : {{$reservation->id}}</p>


</body>
</html>
