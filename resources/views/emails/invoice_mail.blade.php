<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="font-size: 34px; font-weight: 500;">Receipt</h1>
    <p style="font-size: 14px; color: rgb(150,150,150); margin-top: 10px;">INVOICE #: {{ $invoice_number }}</p>
    <table width="100%" cellPadding="0" cellSpacing="0" style="margin-top: 10px;">
        <thead>
            <tr>
                <td style="font-size: 14px; margin-top: 10px;">CUSTOMER #: {{ $customer_num }}</td>
                <td align="right" style="font-size: 14px; margin-top: 5px;">DATE : {{ $invoice_date }}</td>
            </tr>
        </thead>
    </table>
    <hr style="border: 1px solid rgb(200,200,200); margin-top: 10px;" />

    <p style="font-size: 14px; margin-top: 5px;">BILL TO:</p>
    <p style="font-size: 18px; margin-top: 5px;">{{ $to }}</p>
    <p style="font-size: 18px; margin-top: 5px;">{{ $to_address }}</p>
    <p style="font-size: 18px; margin-top: 5px;">{{ $to_email }}</p>
    <p style="font-size: 18px; margin-top: 5px;">{{ $to_contact }}</p>


    <table width="100%" cellPadding="0" cellSpacing="0" style="margin-top: 10px">
        <thead>
            <tr>
                <td col-span="4" align="left">PAYMENT:</td>
            </tr>
            <tr>
                <td col-span="3" align="left" style="font-size: 18px; font-weight: 500">{{ $card_number }}</td>
                <td align="right" style="font-size: 18px; font-weight: 300; letter-spacing: 1.2px;">{{ $currency }} {{ $total_amount }}</td>
            </tr>



            <tr>
                <td col-span="3" align="left" style="font-size: 18px; font-weight: 500"><br />Received Payment</td>
                <td align="right" style="font-size: 18px; font-weight: 300; letter-spacing: 1.2px;"><br />{{ $currency }} {{ $total_amount }}</td>
            </tr>

            <tr>
                <td col-span="4">
                    <hr style="border: 1px solid rgb(200,200,200); margin-top: 10px; />
                </td>
            </tr>

            <tr>
                <td col-span=" 3" align="left" style="font-size: 18px; font-weight: 500"><br />Balance Due ({{ $currency }})
                </td>
                <td align="right" style="font-size: 18px; font-weight: 400; letter-spacing: 1px;"><br />{{ $currency }} {{ 0.00 }}</p>
                    <br>
                </td>
            </tr>



        </thead>

        <tbody>
            <tr>
                <td col-span="4"><br /></td>
            </tr>
            <tr>
                <td style="padding: 5px 0px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 700;">SN#</td>
                <td style="padding: 5px 10px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 700;">Duration</td>
                <td style="padding: 5px 10px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 700;">Service</td>
                <td align="right" style="padding: 5px 0px; font-size: 18px; font-weight: 700;">Amount</td>
            </tr>
            <tr>
                <td style="padding: 5px 0px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 500;">1</td>
                <td style="padding: 5px 10px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 500;">{{ $duration }} time</td>
                <td style="padding: 5px 10px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 500;">{{ $service_name }}</td>
                <td align="right" style="padding: 5px 0px; font-size: 18px; font-weight: 300;">{{ $currency }} {{ $service_price }}</td>
            </tr>
            <!-- <tr>
                <td style="padding: 5px 0px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 500;">2</td>
                <td style="padding: 5px 10px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 500;">One Time</td>
                <td style="padding: 5px 10px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 500;">Resume Review</td>
                <td align="right" style="padding: 5px 0px; font-size: 18px; font-weight: 300;">C$16.31</td>
            </tr>
            <tr>
                <td style="padding: 5px 0px; border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 500;">3</td>
                <td style="padding:'5px 10px','border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 500;">One Time</td>
                <td style="padding:'5px 10px','border-right: 1px solid rgb(200,200,200); font-size: 18px; font-weight: 500;">Resume Review</td>
                <td align="right" style="padding: 5px 0px; font-size: 18px; font-weight: 300;">C$16.31</td>
            </tr> -->

            <tr>
                <td col-span="3" align="right" style="padding-top: 10px; font-size: 18px; font-weight: 700;">Subtotal</td>
                <td align="right" style="padding-top: 10px; font-size: 18px; font-weight: 400;">{{ $currency }} {{ $subtotal }}</td>
            </tr>

            <tr>
                <td col-span="3" align="right" style="padding: 10px 0px; font-size: 18px; font-weight: 500;">Taxes</td>
                <td align="right" style="padding: 10px 0px; font-size: 18px; font-weight: 300;">{{ $currency }} {{ $tax_amount }}</td>
            </tr>

            <tr>
                <td col-span="3" align="right" style="font-size: 18px; font-weight: 500;">Fees</td>
                <td align="right" style="font-size: 18px; font-weight: 300;">{{ $currency }} {{ $fees_amount }}</td>
            </tr>

            <tr>
                <td col-span="4">
                    <hr style="border: 1px solid rgb(200,200,200); margin: 20px 0px;" />
                </td>
            </tr>

            <tr>
                <td col-span="3" align="right" style="font-size: 18px; font-weight: 500;">Total ({{ $currency }})</td>
                <td align="right" style="font-size: 18px; font-weight: 500;">{{ $currency }} {{ $total_amount }}</td>
            </tr>

            <tr>
                <td col-span="4">
                    <hr style="border: 1px solid rgb(200,200,200); margin: 20px 0px;" />
                </td>
            </tr>
        </tbody>
    </table>

    <p style="font-size: 14px; margin: 5px 0px;">BILL FROM:</p>
    <p style="font-size: 16px; font-weight: 600; margin-top: 15px;">{{ $from_website }}</p>
    <p style="font-size: 16px; font-weight: 600; margin-top: 3px;">{{ $from_address }}</p>
    <p style="font-size: 16px; font-weight: 600; margin-top: 3px;">{{ $from_email }}</p>
    <p style="font-size: 16px; font-weight: 600; margin-top: 3px;">{{ $from_number }}</p>
    <p style="font-size: 16px; font-weight: 600; margin-top: 3px;">GST: 785332008 RT0001</p>
</body>

</html>