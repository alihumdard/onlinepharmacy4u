<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Code</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <table style="max-width: 600px; margin: 0 auto; background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
        <tr>
            <td style="padding: 40px 20px;">
                <h1 style="margin: 0; color: #333333;">Order Confrimations</h1>
                <p style="margin-top: 10px; color: #666666;">We have received your order, and we just wanted to
                    say thank you for shopping with the Online
                    Pharmacy 4U!!
                </p>
                <div style="background-color: #f9f9f9; padding: 20px; border-radius: 5px; font-size: 24px; text-align: center; color: #333333;">
                   Order id: #00{{ $order->id }}
                </div>
                <p style="margin-top: 20px; color: #666666;">Hi {{ $order->shipingdetails->firstName }} , we're getting your order ready to be shipped. We will notify you when it has been sent.</p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; padding: 20px 0;">
                <a href="{{url('/')}}" style="margin: 0; font-size: 14px; color: #666666;">Visit Our Store</p>
            </td>
        </tr>
    </table>

</body>

</html>