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

            <div class="col-lg-9">
                <ul class="list-unstyled col-lg-12" >
                    &nbsp;

                    <h4>Personal Information</h4>
                    <hr>
                    <li><span>First Name:</span> <?php echo "afdsfsas";?></li>
                    &nbsp;
                    <li style=""><span>Last Name:</span> <?php echo "afdsfsas";?></li>
                    &nbsp;
                    <li><span>Father's Name:</span> <?php echo "afdsfsas";?></li>
                    &nbsp;
                    <li><span>Mother's Name:</span> <?php echo "afdsfsas";?></li>
                    &nbsp;
                    <li><span>Date Of Birth:</span> <?php echo "00/11/2000";?></li>
                    &nbsp;
                    <li><span>Present Address:</span> dhanmondi,dhaka-1200,Bangladesh</li>
                    &nbsp;
                    <li><span>Permanent Address:</span> dhanmondi,dhaka-1200,Bangladesh</li>
                    &nbsp;
                    <li><span>E-mail:</span> <a href="#">jhgj@gmail.com</a></li>
                    &nbsp;
                    <li><span>Mobile Number:</span>+880-1812345678</li>
                    &nbsp;
                    <li>
                        <h4>Educational Information</h4>
                        <hr>
                        <table class="table table-striped" border="1" width="100%" style="text-align: center">
                            <tr>
                                <th width="25%" style="text-align: center">Education Name</th>
                                <th width="15%" style="text-align: center">Result</th>
                                <th style="text-align: center">Institute Name</th>
                                <th width="15%" style="text-align: center">Passing Year</th>
                            </tr>

                            <tr>
                                <td >Secondary/Equivalent level</td>
                                <td >5.00</td>
                                <td>Feni Govt. Pilot High School</td>
                                <td >2007</td>

                            </tr>
                            <tr>
                                <td>Intermediate/equivalent level</td>
                                <td >4.90</td>
                                <td>Bir Shreshtha Noor Mohammad Rifle Public School and College</td>
                                <td >2009</td>

                            </tr>

                            <tr>
                                <td >Bachelors</td>
                                <td >3.85</td>
                                <td>United International University</td>
                                <td >2014</td>

                            </tr>
                            <tr>
                                <td >Masters</td>
                                <td >3.85</td>
                                <td>United International University</td>
                                <td>2014</td>

                            </tr>

                        </table>
                    </li>
                </ul>



            </div>
            <div class="col-lg-3">
                <a href="" class="">
                    <img src="images/default_image.png" width="150px" alt="web image">
                </a>
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
