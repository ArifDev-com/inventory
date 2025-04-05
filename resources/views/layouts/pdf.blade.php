<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        @yield('name') Page
    </title>
    <style type="text/css">
        html,
        body {
            margin-top: 20px;
            padding-top: 0px;
        }

        * {
            font-size: 10pt;
            font-family: Arial, sans-serif;
        }

        p {
            color: #3d3d3d;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
            margin: 0pt;
        }

        .s1 {
            color: #3d3d3d;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 11pt;
        }

        .s2 {
            color: #3d3d3d;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9.7pt;
        }


        h1 {
            color: #3d3d3d;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 10pt;
        }

        table {
            width: 100%;
        }

        table td {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
        }

        table th {
            vertical-align: middle;
        }

        /* set table cell border  */
        .border td {
            border: 1px solid #969696;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
        }

        .border tr td:nth-child(3),
        .border tr td:nth-child(4),
        .border tr td:nth-child(5),
        .border tr td:nth-child(2),
        .border tr td:nth-child(1) {
            text-align: center;
        }

        footer {
            position: fixed;
            /* bottom: -30px; */
            bottom: -35px;
            left: 0px;
            right: 0px;
        }

        footer td{
            font-size: 11px;
        }

        @page {
            size: auto;
            margin: 0px 30px;
            margin-bottom: 50px;
            margin-top: 100px;
            padding-top: 50px;
        }

        html, body{
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 30px;">
        <tbody>
            <tr>
                <td>
                    <img src="{{'data:image/png;base64,' . base64_encode(file_get_contents(public_path('logo2.png')))}}"
                        alt="image" style="width: 160px; height: auto;">
                </td>
                <td class="c_list_c" style="text-align: left; padding-left: 160px; ">
                    <div style="display: inline-block; width: 500px; font-size: 13px; color: #342b2b; font-family: Arial, sans-serif; font-weight: normal; letter-spacing: -0.20px;">
                        73, Karwan Bazar (1st Floor), Tejgaon, Dhaka-1215, Bangladesh.
                        <br>
                        Br. Office: 111, Borua Baganbari, Khilkhet, Dhaka-1229.
                        <br>
                        Tel: +880255012015, 01712903916, 01730474574-77, 01711254895-98
                        <br>
                        Email: capitalliftbd@gmail.com, Web: capitalliftbd.com,
                        aclelevators.com
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="
            padding: 10px;
            position: absolute;
            text-align: center;
            width: 100%;
            top: 85px;
            ">
        <div style="
                background: #807e7f;
                color: #fff;
                border-radius: 5px;
                font-size: 24px;
                font-weight: bold;
                font-family: Arial, sans-serif;
                display: inline-block;
                padding: 6px 10px;
                text-transform: uppercase;
                ">
            @yield('name')
        </div>
    </div>

    @yield('content')
    <footer>
        <table style="width: 100%;">
            <tr>
                @yield('footer')
            </tr>
        </table>
    </footer>
</body>

</html>