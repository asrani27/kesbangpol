<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR CODE</title>
</head>
<body>
    <?php echo QrCode::size(500)->generate('kesbangpol.banjarmasinkota.go.id/sarandigital');; ?>

</body>
</html>