<?php $email_options = wl_get_email_options(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--[if !mso]><!-->
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!--<![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $email_options['company_name'] ?></title>
        <!--[if (gte mso 9)|(IE)]>
            <style type="text/css">
                table {border-collapse: collapse;}
            </style>
        <![endif]-->
        <style type="text/css">
            html, body {
                color: <?= $email_options['text_color'] ?>;
                font-family: <?= $email_options['font_family'] ?>;
                font-size: <?= $email_options['font_size'] ?>;
                line-height: <?= $email_options['line_height'] ?>;
                background-color: <?= $email_options['background_color'] ?>;
            }
            a, a:link {
                color: <?= $email_options['link_color'] ?> !important;
            }
            h1, h2, h3, h4, h5, h6 {
                color: <?= $email_options['heading_color'] ?>;
            }
            p {
                margin: 0 0 20px;
            }
            hr {
                border: none;
                border-top: solid 2px #bcbcbc;
                margin: 20px 0;
            }
        </style>
    </head>
    <body style="height: 100%; width: 100%; margin: 0; background-color: <?= $email_options['background_color'] ?>; font-family: <?= $email_options['font_family'] ?>; font-size: <?= $email_options['font_size'] ?>; line-height: <?= $email_options['line_height'] ?>; color: <?= $email_options['text_color'] ?>; font-weight: lighter;">
        <center class="wrapper" style="max-width: 600px; margin: 0 auto; padding: 0 20px 10px;">
            <table style="border-collapse: collapse;" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <thead style="page-break-inside: avoid; page-break-after: avoid;">
                    <tr>
                        <td style="text-align: center; padding: 60px 0 30px;">
                            <a href="<?php home_url(); ?>"><img src="<?= $email_options['logo'] ?>" alt="<?= $email_options['company_name'] ?>" style="margin: 0 0 0 -40px; padding: 0; border: none; width: auto; height: auto; max-width: 75%;" />
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="padding: 5%; background-color: <?= $email_options['body_background_color'] ?>; border-radius: 5px; border: solid 1px #eee;">
                                <div id="header" style="background-color: <?= $email_options['header_background_color'] ?>; color: <?= $email_options['header_text_color'] ?>; padding: 30px 30px 25px; text-align: center; margin-bottom: 25px;">
                                    <p style="font-size: 2em; line-height: 1.5; font-weight: lighter; margin: 0;">!!subject!!</p>
                                </div>
                                <div id="body">
