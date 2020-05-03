<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0;">
    <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;background-color:#f5f5f5;">
                    <tr>
                        <td align="center" style="padding: 0.4em;"> <!-- Adding the logo -->
                            <img src="{{asset('https://i.ibb.co/Jr5Bbxp/Whats-App-Image-2020-05-01-at-10-removebg-preview.png')}}" alt="Pharomina Logo" style="align:center; width: 20rem; height:30vh;">
                            <h1> <!-- Adding the name -->
                                <font style="font-size: 1.5em;" face="Roboto">From <strong style="color: #128B92;">Pharomina Tours</strong>!</font>
                            </h1> <!-- Adding the username, in {} braces and capital so that it gets replaced by the function in backend.js -->
                            <font style="text-transform:uppercase; font-size: 2em;" face="Roboto" color="grey">Hello {{$NAME}}</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 0.8em 0.4em 0.4em 0.4em"> <!-- Adding the mail content, in {} braces and capital so that it gets replaced by the function in backend.js -->
                            <font face="Roboto" color="grey" style="font-size: 1.8em;">{{$CONTENT}}</font>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td align="center" style="padding: 2em 0 2em 0;">
                            <span>
                                <button type="button" href="" style="font-family:Roboto; sans-serif; font-size:1.5em; font-weight:50; color:rgb(57,57,57); text-align:center; text-transform:uppercase; text-decoration:none; background-color:#128B92; padding:0.5em; border-radius: 1em;">Visit the site</button>
                            </span>
                        </td>
                    </tr> -->
                    <tr>
                        <td align="center" valign="middle" style="background:#128B92">
                            <div>
                                <span align="center">
                                    <hr> <!-- Adding the footer -->
                                    All rights reserved to Pharomina Tours© 2020
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="middle">
                            <div> <!-- Adding the community sites (not our actual ones) -->
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="right" style="padding: 20px 5px 20px 5px;">
                                            <a href="https://www.facebook.com/pages/Pharomina-tours/242774469209797" target="_blank">
                                                <img src="http://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" style="display:block" height="24" width="24" alt="color-facebook-48.png"></a>
                                        </td>
                                        <td align="left">
                                            <a href="https://www.facebook.com/pages/Pharomina-tours/242774469209797" style="font-family:Arial;font-size:12px;text-decoration:none;color:rgb(32,32,32);font-weight:normal" target="_blank">Community</a>
                                        </td>
                                        <td align="right" style="padding: 20px 5px 20px 5px;">
                                            <a href="https://www.instagram.com/Pharomina/" target="_blank">
                                                <img src="http://cdn-images.mailchimp.com/icons/social-block-v2/color-instagram-48.png" style="display:block" height="24" width="24" alt="color-linkedin-48.png"></a>
                                        </td>
                                        <td align="left">
                                            <a href="https://www.instagram.com/Pharomina/" style="font-family:Arial;font-size:12px;text-decoration:none; color:rgb(32,32,32); font-weight:normal" target="_blank">Community</a>
                                        </td>
                                        <td align="right" style="padding: 20px 5px 20px 5px;">
                                            <a href="https://www.linkedin.com/company/000000/" target="_blank">
                                                <img src="http://cdn-images.mailchimp.com/icons/social-block-v2/color-linkedin-48.png" style="display:block;" height="24" width="24" alt="color-linkedin-48.png"></a>
                                        </td>
                                        <td align="left">
                                            <a href="https://www.linkedin.com/company/000000/" style="font-family:Arial; font-size:12px; text-decoration:none; color:rgb(32,32,32); font-weight:normal" target="_blank">Corporate</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>