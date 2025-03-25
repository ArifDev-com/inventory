<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            @yield('name') Page
        </title>
        <style type="text/css">
            * {
                font-size: 10pt;
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
                font-size: 10pt;
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
            .border td
            {
                border: 1px solid black;
                font-weight: bold;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 10pt;
            }
            .border tr td:nth-child(3),
            .border tr td:nth-child(4),
            .border tr td:nth-child(5),
            .border tr td:nth-child(2),
            .border tr td:nth-child(1)
            {
                text-align: center;
            }

            footer {
                position: fixed; bottom: -40px;
                left: 0px; right: 0px;
            }
        </style>
    </head>
    <body>
        <p style="text-indent: 0pt; text-align: left;"><br /></p>
        <p style="text-indent: 0pt; text-align: left;"><span></span></p>
        <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 30px;">
            <tbody>
                <tr>
                    <td>
                        <img src="{{'data:image/png;base64,' . base64_encode(file_get_contents(public_path('logo.png')))}}" alt="image" style="width: 160px; height: auto;">
                    </td>
                    <td style="text-align: left; padding-left: 200px; ">
                        <div style="display: inline-block; width: 450px; font-size: 11px;">
                            73, Kawran Bazar (1st Floor), Tejgaon, Dhaka-1215, Bangladesh
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
        <div  style="
            padding: 10px;
            position: absolute;
            text-align: center;
            width: 100%;
            top: 90px;
            ">
            <div style="
                background: #807e7f;
                color: #fff;
                border-radius: 5px;
                font-size: 20px;
                font-weight: bold;
                font-family: Arial, sans-serif;
                display: inline-block;
                padding: 10px;
                ">
                @yield('name')
            </div>
        </div>

        @yield('content')
        <footer>
            <table style="width: 100%;">
                <tr>
                    {{-- <td style="text-align: center;">
                        _______________
                        <br>
                        Received by
                    </td>
                    <td style="text-align: center;">
                        SOLD GOODS ARE NOT TAKEN BACK
                    </td>
                    <td style="text-align: center;">
                        {{ $sale->user?->name }}
                        <br>
                        _______________
                        <br>
                        for CAPITAL LIFT
                    </td> --}}
                    @yield('footer')
                </tr>
            </table>
        </footer>
    </body>
</html>
