<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
    <title>A Simple Responsive HTML Email</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            min-width: 100% !important;
            font-family: 'Cairo','Courier New', Monospace;
            font-size: 16px;
        }

        img {
            height: auto;
        }

        .content {
            width: 100%;
            max-width: 600px;
        }

        .header {

            padding: 40px 30px 20px 30px;
        }

        .innerpadding {
            padding: 30px 30px 30px 30px;
        }

        .borderbottom {
            border-bottom: 1px solid #f2eeed;
        }

        .subhead {
            font-size: 15px;
            color: #ffffff;
        }

        .h1, .h4, .bodycopy {
            color: #1a202c;
        }

        .h1 {
            font-size: 33px;
            line-height: 38px;
            font-weight: bold;
            color: white
        }

        .h4 {
            padding: 0 0 15px 0;
            font-size: 18px;
            line-height: 28px;
            font-weight: bold;
        }

        .bodycopy {
            font-size: 16px;
            line-height: 22px;
        }

        .button {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            padding: 0 30px 0 30px;
        }

        .button a {
            color: #ffffff;
            text-decoration: none;
        }

        .footer {
            padding: 20px 30px 15px 30px;
        }

        .footercopy {
            font-size: 14px;
            color: #ffffff;
        }

        .footercopy a {
            color: #ffffff;
            text-decoration: underline;
        }

        @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
            body[yahoo] .hide {
                display: none !important;
            }

            body[yahoo] .buttonwrapper {
                background-color: transparent !important;
            }

            body[yahoo] .button {
                padding: 0px !important;
            }

            body[yahoo] .button a {
                background-color: #e05443;
                padding: 15px 15px 13px !important;
            }

            body[yahoo] .unsubscribe {
                display: block;
                margin-top: 20px;
                padding: 10px 50px;
                background: #2f3942;
                border-radius: 5px;
                text-decoration: none !important;
                font-weight: bold;
            }
        }

        /*@media only screen and (min-device-width: 601px) {
          .content {width: 600px !important;}
          .col425 {width: 425px!important;}
          .col380 {width: 380px!important;}
          }*/

    </style>
</head>

<body yahoo bgcolor="#f6f8f1" style="direction: rtl">
<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
            <![endif]-->
            <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="header" bgcolor="#ff8730">
                        <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td height="70" style="padding: 0 20px 20px 0;">
                                    <img class="fix"
                                         src="https://assets.stickpng.com/thumbs/584856ade0bb315b0f7675ab.png"
                                         width="70" height="70" border="0" alt=""/>
                                </td>
                            </tr>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td>
                        <![endif]-->
                        <table class="col425" align="right" border="0" cellpadding="0" cellspacing="0"
                               style="width: 100%; max-width: 425px;">
                            <tr>
                                <td height="70">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="subhead" style="padding: 0 0 0 3px;color:white">
                                                تامنصورت
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="h1" style="padding: 5px 0 0 0;color:white">
                                                جماعة حربيل
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </td>
                </tr>
                <tr>
                    <td class="innerpadding borderbottom">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                            <tr>
                                <td class="bodycopy">
                                    {!! $content  !!}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @if(isset($att))
                                        <a href="{{ $att }}" target="_blank">{{ $filename }}</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="text-decoration: underline">{{ $subject }}</p>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="innerpadding borderbottom">

                        <!--[if (gte mso 9)|(IE)]>
                        <table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td>
                        <![endif]-->
                        <table class="col380" align="right" border="0" cellpadding="0" cellspacing="0"
                               style="width: 100%; max-width: 380px;">
                            <tr>
                                <td>
                                    <table width="100%" align="right" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="bodycopy">
                                                الموقع الرسمي لجماعة حربيل تامنصورت بوابة الأخبار عن الجماعة و المدينة
                                                وكل ما يتعلق بالمنطقة
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 20px 0 0 0;">
                                                <table class="buttonwrapper" bgcolor="#ff8730" border="0"
                                                       cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="button" height="45">
                                                            <a href="#">الذهاب إلى الموقع</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </td>
                </tr>

                <tr>
                    <td class="footer" bgcolor="#ff8730">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center"   class="footercopy" style="direction: ltr">
                                    &copy; 2020 Commun Harbil Tamansourt
                                </td>
                            </tr>
                            <tr>

                                </td>
                            </tr>
                        </table>

                </tr>
            </table>
        </td>
    </tr>
</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
</td>
</tr>
</table>
</body>
</html>


