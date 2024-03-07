<!DOCTYPE html>
<html>

<head>
    <title> Login Information</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700&display=swap" rel="stylesheet">
    <style>
        @media(max-width: 767px){
            .col3{width: 100% !important;}
        }
    </style>
</head>

<body style="margin: 0; font-family: 'Roboto', sans-serif;">

    <table width="604" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto; border: 1px solid #ccc;">
        <!-- START HEADER/BANNER -->
        <tbody>
            <tr>
                <td>
                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" style="padding: 0 15px;">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td height="30"></td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="width:124px; height:40px;  text-align: left;">
                                                    <a href="#" style="width:124px; height:40px; display: inline-block;">
                                                    <img style="width: 70%; height: auto;" src="{{ url('admin/img/Trilokn_Logo.png')}}"></a><b>Trilokn Infotech</b>
                                                </td>
                                                <td align="right" style="min-width:200px;">
                                                   <a href="https://www.facebook.com" target="_blank" rel="noopener" style="margin-right:10px;display: inline-block;"><img src="https://www.appgurus.com.au/wp-content/uploads/2021/10/facebook-icon.png" style="height: 15px; display: inline-block;"></a>
                                                    <a href="https://www.linkedin.com/company" target="_blank" rel="noopener" style="margin-right:10px;display: inline-block;"><img style="height: 15px; display: inline-block;" src="https://www.appgurus.com.au/wp-content/uploads/2021/10/linkedin-icon.png"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="40" ></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <!-- END HEADER/BANNER -->

            <!-- START 3 BOX SHOWCASE -->
            <tr>
                <td align="center">
                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" style="padding: 0 15px;">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td align="left" style="font-family: 'Roboto', sans-serif; font-size:22px; font-weight: bold;
                                                color:#000;line-height: 18px;">Dear {{$user['firstname']}}<br> </td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                               <td align="left" style="font-size:13px;color: #000;line-height: 18px;font-family: 'Roboto', sans-serif;">
                                                I am very pleased to announce that our team is growing. We have a new teammate,<b> {{$user['firstname']}}</b> ,who is joining us at Trilokn Infotech.<br><br>

                                                I believe <b>{{$user['firstname']}}</b> will be a valuable asset to our team.<br><br>

                                                We share your account details for login our help desk.<br>

                                                <p><b>Email Id :: {{$user['email']}}</b></p>
                                                {{-- <p><b>Password :: {{$user['password']}}</b></p> --}}
                                                <p><b>Role :: Employee</b></p>

                                                Please feel free to introduce yourself to <b>{{$user['firstname']}}</b> and welcome him to our team.<br><br>

                                                Best of Luck,<br>
                                                Thanks<br>
                                                HR Department<br>
                                                Trilokn Infotech Private Limited<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="30"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="{{url('/forgot-password')}}" style="color: #fff;text-decoration: none;background: #433185;width: 110px;height: 30px;display: inline-block;font-size: 15px;text-align: center;line-height: 30px;font-family: 'Roboto', sans-serif; display: table-cell;    vertical-align: middle; ">
                                                                        forgot password <span style="padding-left: 4px;"><img src="https://www.appgurus.com.au/wp-content/uploads/2021/10/arrow-right.png" style="height: 10px; width: 10px;"  alt=""></span></a>
                                                                </td>
                                                                <td width="15"></td>
                                                                {{-- <td>
                                                                    <a href="mailto:info@appgurus.com.au" style="color: #000000;text-decoration: none;background: #fff;border: 1px solid #000;width: 110px;height: 30px;display: inline-block;font-size: 15px;text-align: center;line-height: 30px;font-family: 'Roboto', sans-serif; display: table-cell;    vertical-align: middle; ">
                                                                        Email Us <span style="padding-left: 4px;"><img src="https://www.appgurus.com.au/wp-content/uploads/2021/10/arrow-b-right.png" style="height: 10px; width: 10px;"></span></a>
                                                                </td> --}}
                                                                <td width="10"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="50"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <!-- END 3 BOX SHOWCASE -->

            <!-- START AWESOME TITLE -->

            {{-- <tr>
                <td align="center" style="background: #000000">
                    <table align="center" class="col-600" width="600" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                              <td align="center" style="background: #000000">
                                <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" style="padding: 0 15px;">
                                    <tbody>
                                        <tr>
                                            <td height="40"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: 'Roboto', sans-serif; font-size:20px; color:#ffffff; line-height:24px; font-weight: bold;">Your Enquiry</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table class="col3"  border="0" align="left" cellpadding="0" cellspacing="0" style="width: 22%;">
                                                    <tbody>
                                                        <tr>
                                                            <td height="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <table class="insider"  border="0" align="left" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td height="15"></td>
                                                                        </tr>
                                                                        <tr align="left">
                                                                            <td style="font-family: 'Roboto', sans-serif; font-size:16px;
                                                                            color:#fff; line-height:24px; font-weight: 400;">Name</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="10"></td>
                                                                        </tr>
                                                                        <tr align="left">
                                                                            <td style="font-family: 'Roboto', sans-serif; font-size:14px; color:#fff; line-height:24px; font-weight: 300; word-break: break-word;">[text-516]</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="10"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table  height="10" border="0" cellpadding="0" cellspacing="0" align="left" >
                                                    <tbody>
                                                        <tr>
                                                            <td height="10" style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                                            <p style="padding-left: 20px;">&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="col3"  border="0" align="left" cellpadding="0" cellspacing="0" style="width: 30%;">
                                                    <tbody>
                                                        <tr>
                                                            <td height="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <table class="insider"  border="0" align="left" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td height="15"></td>
                                                                        </tr>
                                                                        <tr align="left">
                                                                            <td style="font-family: 'Roboto', sans-serif; font-size:16px;
                                                                            color:#fff; line-height:24px; font-weight: 400;">Email</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td height="10"></td>
                                                                        </tr>

                                                                        <tr align="left">
                                                                            <td style="font-family: 'Roboto', sans-serif; font-size:14px; color:#fff; line-height:24px; font-weight: 300; word-break: keep-all;"><a href="mailto:[email-732]" target="_blank" style="font-family: 'Roboto', sans-serif; font-size:14px; color:#fff; line-height:24px; font-weight: 300; text-decoration: none; word-break: keep-all;">[email-732]</a></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="10"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table s height="10" border="0" cellpadding="0" cellspacing="0" align="left" >
                                                    <tbody>
                                                        <tr>
                                                            <td height="10" style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                                                <p style="padding-left: 20px;">&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="col3"  border="0" align="left" cellpadding="0" cellspacing="0" style="width: 30%;">
                                                    <tbody>
                                                        <tr>
                                                            <td height="10"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <table class="insider"  border="0" align="left" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td height="15"></td>
                                                                        </tr>

                                                                        <tr align="left">
                                                                            <td style="font-family: 'Roboto', sans-serif; font-size:16px;
                                                                            color:#fff; line-height:24px; font-weight: 400;">Phone</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td height="10"></td>
                                                                        </tr>

                                                                        <tr align="left">
                                                                            <td style="font-family: 'Roboto', sans-serif; font-size:14px; color:#fff; line-height:24px; font-weight: 300;"><a href="tel:[tel-471]" style="font-family: 'Roboto', sans-serif; font-size:14px; color:#fff; line-height:24px; font-weight: 300; text-decoration: none;">[tel-471]</a></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="10"></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td height="30"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: 'Roboto', sans-serif; font-size:16px; color:#fff; line-height:26px; font-weight: 400;">Description</td>
                                        </tr>
                                        <tr>
                                             <td height="10"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: 'Roboto', sans-serif;font-size:13px;color:#fff;line-height:20px;font-weight: 400;">[textarea-423]</td>
                                        </tr>
                                        <tr>
                                             <td height="50"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr> --}}

            <!-- END AWESOME TITLE -->

            <!-- START WHAT WE DO -->

            {{-- <tr>
                <td>
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="background: #fff;">
                        <tbody>
                            <tr>
                                <td>
                                    <tr>
                                        <td>
                                            <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" >
                                                <tbody>
                                                    <tr>
                                                         <td height="40"></td>
                                                    </tr>
                                                    <tr>
                                                        <!-- <td width="20"></td> -->
                                                        <td style="text-align: center;">
                                                            <a href="https://www.appgurus.com.au/about-us/" style="font-family: 'Roboto', sans-serif;font-size: 12px;color: #000;line-height: 10px;font-weight: 400;text-decoration: none;">About Us</a>
                                                        </td>
                                                        <td width="8"></td>
                                                        <td style="text-align: center;">
                                                            <a href="https://www.appgurus.com.au/portfolio/" style="font-family: 'Roboto', sans-serif;font-size: 12px;color: #000;line-height: 10px;font-weight: 400; text-decoration: none;">Portfolio</a>
                                                        </td>
                                                        <td width="8"></td>
                                                        <td style="text-align: center;">
                                                            <a href="https://www.appgurus.com.au/services/" style="font-family: 'Roboto', sans-serif;font-size: 12px;color: #000;line-height: 10px;font-weight: 400;text-decoration: none;">Services</a>
                                                        </td>

                                                        <td width="8"></td>
                                                        <td style="text-align: center;">
                                                            <a href="https://www.appgurus.com.au/process/" style="font-family: 'Roboto', sans-serif;font-size: 12px;color: #000;line-height: 10px;font-weight: 400;text-decoration: none;">Process</a>
                                                        </td>
                                                        <!-- <td width="20"></td> -->
                                                    </tr>
                                                    <tr>
                                                         <td height="40"></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr> --}}
            <!-- END FOOTER -->

        </tbody>
    </table>
</body>

</html>
