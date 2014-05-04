<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('/')?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/')?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('/')?>css/bootstrap.theme" rel="stylesheet">
    <link href="<?php echo base_url('/')?>css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="js/muJs.js"></script>
    <![endif]-->
</head>
<body>

<?php include_once('header_admin.php');?>


<section class="container">
    <div class="row">

        <div class="col-lg-12 well"  style="background: #ffffff;">

            <div class="col-lg-12">
                <ul class="list-unstyled col-lg-8" >
                    <h4>Personal Information</h4>

                    <li><span>User Name:</span> <?php echo "Shamima Nasrin";?></li>
                    &nbsp;
                    <li><span>Counrty:</span> Bangladesh</li>
                    &nbsp;
                    <li><span>Birthday:</span> <?php echo "12/03/1991";?></li>
                    &nbsp;
                    <li><span>Occupation:</span> Web Developer</li>
                    &nbsp;
                    <li><span>Email:</span> <a href="#"><?php echo "tumpa.ffsda@mail.com";?></a></li>
                    &nbsp;
                    <li><span>Interests:</span> Cycling, Music, Anling</li>
                    &nbsp;
                    <li><span>Website Url:</span> <a href="#">http://www.mywebsite.com</a></li>
                    &nbsp;
                    <li><span>Mobile Number:</span></li>
                    &nbsp;
                    <li>
                        <h4>Educational Information</h4>
                        <table class="table table-striped" border="1" width="100%" style="text-align: center">
                            <tr>
                                <th>Education Name</th>
                                <th>Result</th>
                                <th>Institute Name</th>
                                <th>Passing Year</th>
                            </tr>

                            <tr>
                                <td width="20%">SSC</td>
                                <td width="20%">5.00</td>
                                <td>Feni Govt. Pilot High School</td>
                                <td width="20%">2007</td>

                            </tr>
                            <tr>
                                <td width="20%">HSC</td>
                                <td width="20%">4.90</td>
                                <td>Bir Shreshtha Noor Mohammad Rifle Public School and College</td>
                                <td width="20%">2009</td>

                            </tr>

                            <tr>
                                <td width="20%">BSCSE</td>
                                <td width="20%">3.85</td>
                                <td>United International University</td>
                                <td width="20%">2014</td>

                            </tr>

                        </table>
                    </li>


                </ul>


            </div>

        </div>

    </div>
</section>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- toolTip JS -->
<!-- End ToolTip JS -->

<script src="js/bootstrap.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
