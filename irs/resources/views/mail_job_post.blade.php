
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <style type="text/css"></style>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Droid+Sans);
        /* Take care of image borders and formatting */
        
        img {
            max-width: 600px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }
        
        a {
            text-decoration: none;
            border: 0;
            outline: none;
            color: #bbbbbb;
        }
        
        a img {
            border: none;
        }
        /* General styling */
        
        td,
        h1,
        h2,
        h3 {
            font-family: Helvetica, Arial, sans-serif;
            font-weight: 400;
        }
        
        td {
            text-align: center;
        }
        
        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100%;
            height: 100%;
            color: #37302d;
            background: #ffffff;
            font-size: 16px;
        }
        
        table {
            border-collapse: collapse !important;
        }
        
        .headline {
            color: #ffffff;
            font-size: 30px;
        }
        
        .force-full-width {
            width: 100% !important;
        }
        
        .force-width-80 {
            width: 80% !important;
        }
        .table-bg{
            background:#fff;
            color:#5b5b5b;
            border-radius:4px;
            font-family:arial;
            font-size:13px;
            padding:10px 20px;
            width:90%;
            margin:20px auto;
            line-height:17px;
            border:3px #1ABB9C solid;
            clear:both
        }
        .logo{
            width:150px;
            height:40px;
            float:left;
            margin:20px 0 0 10px
        }
        .date{
            margin-top:-30px;
        }
        .footer{
            margin-top:50px;
        }
    </style>
    <style media="screen" type="text/css">
        @media screen {
            /*Thanks Outlook 2013! https://goo.gl/XLxpyl*/
            td,
            h1,
            h2,
            h3 {
                font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
            }
        }
    </style>
    <style media="only screen and (max-width: 480px)" type="text/css">
        /* Mobile styles */
        
        @media only screen and (max-width: 480px) {
            table[class="w320"] {
                width: 320px !important;
            }
            td[class="mobile-block"] {
                width: 100% !important;
                display: block !important;
            }
        }
    </style>
</head>

<body class="body" style="background:#F7F7F7;margin:0 auto;max-width:640px;padding:0 20px margin-top:100px; border: ">
<table align="center" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><div style="margin:auto;padding:0px 0 0px 0">  
            <img src="<?php echo url('/'); ?>/public/images/foodlinked.png" alt="foodlinkes" class="logo">
            
            
            </div>
                <div class="table-bg">
                    <p align="left">Hi <?php echo $name ?>!</p>
                    <p align="right" class="date" >	<?php echo date("d M, Y"); ?></p>
                    <p></p>
                    <p align="left">Thank you! You have successfully Posted Job On Foodlinked. And your Job will be Share on Other Job Boards in 24 hours and Will be expire in 50 days. </p>
                    <p align="left">Please check details given below. </p>
                    <hr/>
                    <p align="left">Employer Name : <?php echo $name ?></p>
                    
                    <p align="left">Company Name : <?php echo $company_Name ?></p>
                    <p align="left">Job Title : <?php echo $Job_Title ?></p>
                    <p align="left" class="footer">--</p>
                    <p align="left" >Thanks & Regard's</p>
                    <p align="left"><span class="il" >Foodlinked</span> Team</p></div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                       
                    </tr></tbody></table></td></tr>
                
                    </tbody>
                </table>
</body>

</html>