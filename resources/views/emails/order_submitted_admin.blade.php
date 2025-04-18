<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Submitted</title>
</head>
<body>
    <center>
        <div style="width: 200px; height: 100px">
            <img style="width: 100%" src="https://aiproresume.com/static/media/logo_resume.95d8170360850b4b51ee.png" alt="AIProresume Logo" srcset="">
        </div>
    </center>

    {{-- Header --}}
    <h1>{{ $user->name }} has just completed an order</h1>

    {{-- Order Table --}}
    <h3>ORDER NUMBER: {{ $order_number }}</h3>
    <table border="0" width="100%" cellpadding="5" cellspacing="0" style="font-family:arial;">
        <tr>
            <td align="left">Received Payment</td>
            <td align="right">{{ $currency }} {{ $total_amount }}</td>
        </tr>
    </table>
    <br>
    <table border="0" width="100%" cellpadding="10" cellspacing="0" style="font-family:arial;">
        <tr >
            <th style="border-right:1px solid #999;border-top:1px solid #999;border-left:1px solid #999;" align="left">SN#</th>
            <th style="border-top:1px solid #999;border-right:1px solid #999;" align="left">Services/Package</th>
            <th style="border-top:1px solid #999;border-right:1px solid #999;" align="right">Amount</th>
        </tr>
        @if ($package)
        <tr>
            <td style="border-left:1px solid #999;border-right:1px solid #999;">1</td>
            <td style="border-right:1px solid #999;">{{ $package['name'] }}</td>
            <td style="border-right:1px solid #999;" align="right">{{ $currency }} {{ $package['price'] }}</td>
        </tr>
        @endif

        <?php $i = $package ? 1 : 0; ?>

        @foreach ($services as $service)
        <?php ++$i; ?>
        <tr>
            <td style="border-left:1px solid #999;border-right:1px solid #999;">{{ $i }}</td>
            <td style="border-right:1px solid #999;">{{ $service['name'] }}</td>
            <td style="border-right:1px solid #999;" align="right">{{ $currency }} {{ $service['price'] }}</td>
        </tr>
        @endforeach

        <tr>
            <td style="font-weight:bold;border-top:1px solid #999;border-left:1px solid #999;" align="right" colspan="2" >Subtotal:</td>
            <td style="border-top:1px solid #999;border-right:1px solid #999;" align="right">{{ $currency }} {{ $subtotal }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;border-left:1px solid #999;" align="right" colspan="2" >Order discount:</td>
            <td style="border-right:1px solid #999;" align="right">({{ $currency }} {{ $discount_amount }})</td>
        </tr>
        <tr>
            <td style="font-weight:bold;border-left:1px solid #999;" align="right" colspan="2" >Tax (13%):</td>
            <td style="border-right:1px solid #999;" align="right">{{ $currency }} {{ $tax_amount }}</td>
        </tr>
        <tr>
            <td style="font-weight:bold;border-left:1px solid #999;" align="right" colspan="2" >Coins discount:</td>
            <td style="border-right:1px solid #999;" align="right">({{ $currency }} {{ $used_coins }})</td>
        </tr>
        <tr>
            <td style="font-weight:bold;border-top:1px solid #999;border-bottom:1px solid #999;border-left:1px solid #999;" align="right" colspan="2" ><strong>Total:</strong></td>
            <td style="border-top:1px solid #999;border-bottom:1px solid #999;border-right:1px solid #999;" align="right"><strong>{{ $currency }} {{ $total_amount }}</strong></td>
        </tr>
    </table>
</body>
</html>
