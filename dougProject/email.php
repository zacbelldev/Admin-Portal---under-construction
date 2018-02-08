<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
$senderName = "Zac Bell";
$senderEmail = "zac@monkeybarstorage.com";

$dealerName = "John Doe";
$dealerEmail = "onlinesales@monkeybarstorage.com";

$qtrSalesLastYear = 1234.56;
$qtrSalesThisYear = 1534.12;
$growth = 0;
$percentChange = 23;

require('PHPMailer/PHPMailerAutoload.php');

if (isset($_POST['submitForm'])) {

    $mail = new PHPMailer;

    $mail->setFrom('zac@monkeybarstorage.com', 'Zac Bell');
    $mail->addAddress('monkeybarsshipping@gmail.com', 'Zac Bell');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('zac@monkeybarstorage.com', 'Zac Bell');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    if (isset($_FILES['attach1']) && $_FILES['attach1']['error'] == UPLOAD_ERR_OK) {
        $mail->addAttachment($_FILES['attach1']['tmp_name'],
            $_FILES['attach1']['name']);
    }

    if (isset($_FILES['attach2']) && $_FILES['attach2']['error'] == UPLOAD_ERR_OK) {
        $mail->addAttachment($_FILES['attach2']['tmp_name'],
            $_FILES['attach2']['name']);
    }

    $mail->isHTML(true);    // Set email format to HTML

    $mail->Subject = 'Quarterly Report';

    $mail->Body =
        '<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Email Template</title>
</head>
<body>
<span class="preheader"></span>
<table class="body">
    <tr>
        <td class="center" align="center" valign="top">
            <center data-parsed="">

                <table align="center" class="container float-center">
                    <tbody>
                    <tr>
                        <td>
                            <table class="row">
                                <tbody>
                                <tr>

                                    <th class="small-12 large-8 columns first">
                                        <table>
                                            <tr>
                                                <th>
                                                    <table class="spacer">
                                                        <tbody>
                                                        <tr>
                                                            <td height="16px" style="font-size:16px;line-height:16px;">
                                                                &#xA0;</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <h1>Quarterly Report</h1>
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>

                            <table class="spacer">
                                <tbody>
                                <tr>
                                    <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="row">
                                <tbody>
                                <tr>
                                    <th class="small-12 large-12 columns first last">
                                        <table>
                                            <tr>
                                                <th>
                                                    <h3 class="text-center">' . $dealerName . '</h3>
                                                    <p class="text-center">Thank you for your continued business as a dealer of Monkey Bar Storage. We greatly appreciate working with you and look forward to a successful year. Your quarterly sales stats are below:</p>
                                                </th>
                                                <th class="expander"></th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                            <table class="row">
                                <tbody>
                                <tr>
                                    <th class="small-12 large-4 columns first">
                                        <table>
                                            <tr>
                                                <th>
                                                    <h5 class="text-center">Q2 - 2016</h5>
                                                    <p class="text-center">' . $qtrSalesLastYear . '</p>
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                    <th class="small-12 large-4 columns first">
                                        <table>
                                            <tr>
                                                <th>
                                                    <h5 class="text-center">Q2 - 2017</h5>
                                                    <p class="text-center">' . $qtrSalesThisYear . '</p>
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                    <th class="small-12 large-4 columns first">
                                        <table>
                                            <tr>
                                                <th>
                                                    <h5 class="text-center">Growth</h5>
                                                    <p class="text-center">' . $growth . '</p>
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                            <table class="spacer">
                                <tbody>
                                <tr>
                                    <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="row">
                                <tbody>
                                <tr>
                                    <th class="small-12 large-12 columns first last">
                                        <table>
                                            <tr>
                                                <th>
                                                    <h3 class="text-center">Percent Change: ' . $percentChange . '</h3>
                                                </th>
                                                <th class="expander"></th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                            <table class="spacer">
                                <tbody>
                                <tr>
                                    <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="row collapsed footer">
                                <tbody>
                                <tr>
                                    <th class="small-12 large-12 columns first last">
                                        <table>
                                            <tr>
                                                <th>
                                                    <table class="spacer">
                                                        <tbody>
                                                        <tr>
                                                            <td height="16px" style="font-size:16px;line-height:16px;">
                                                                &#xA0;</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="text-center">&copy; 2017 Monkey Bar Storage<br>
                                                        <a href="#">zac@monkeybarstorage.com</a>
                                                    </p>
                                                </th>
                                                <th class="expander"></th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>

                            <table class="spacer">
                                <tbody>
                                <tr>
                                    <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                                </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                    </tbody>
                </table>

            </center>
        </td>
    </tr>
</table>
<!-- prevent Gmail on iOS font size manipulation -->
<div style="display:none; white-space:nowrap; font:15px courier; line-height:0;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
</body>
</html>';

//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        $messageTwo = 'Message could not be sent.';
        $messageTwo .= 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $messageTwo = 'Message has been sent.';
    }
}





