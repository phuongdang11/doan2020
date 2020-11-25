<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>QR - Burn Coffee </title>
</head>
<body>

<div class="text-center" style="margin-top: 50px;">
    <h3>Quét mã để vào Website nhanh hơn ! </h3>

    {
        !! QrCode::size(300)->generate('burncoffee.com'); !!
        
        QrCode::BTC($address, $amount);
        //Sends a 0.334BTC payment to the address
        QrCode::BTC('bitcoin address', 0.334);
        //Sends a 0.334BTC payment to the address with some optional arguments
        QrCode::size(500)->BTC('address', 0.0034, [
            'label' => 'my label',
            'message' => 'my message',
            'returnAddress' => 'https://www.returnaddress.com'
        ]);
    }

    <p>Burn Coffee xin chào !</p>
</div>

</body>
</html>