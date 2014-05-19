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
                    <li><span style="font-size: medium">Full Name  :</span>
                        &emsp;&emsp;&emsp;&emsp;<?php echo $applicant['first_name']." ".$applicant['last_name'];?></li>
                    &nbsp;

                    <li><span style="font-size: medium">Father's Name  :</span>
                        &emsp;&emsp;&emsp;&emsp;<?php echo $applicant['father_name'];?></li>
                    &nbsp;
                    <li><span style="font-size: medium">Mother's Name  :</span>
                        &emsp;&emsp;&emsp;&emsp;<?php echo $applicant['mother_name'];?></li>
                    &nbsp;
                    <li><span style="font-size: medium">Date Of Birth  :</span>
                        &emsp;&emsp;&emsp;&emsp;<?php echo $applicant['d_o_b'];?></li>
                    &nbsp;
                    <li><span style="font-size: medium">Present Address  :</span>
                        &emsp;&emsp;&emsp;&emsp;<?php echo $applicant['present_add'];?></li>
                    &nbsp;
                    <li><span style="font-size: medium">Permanent Address  :</span>
                        &emsp;&emsp;&emsp;&emsp;<?php echo $applicant['parmanent_add'];?></li>
                    &nbsp;
                    <li><span style="font-size: medium">E-mail  :</span> <a href="#">&emsp;&emsp;&emsp;&emsp;<?php echo $applicant['email'];?></a></li>
                    &nbsp;
                    <li><span style="font-size: medium;">Mobile Number  :</span>&emsp;&emsp;&emsp;&emsp;<?php echo $applicant['mobile'];?></li>
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
                                <td ><?php echo $edu["ssc_gpa_result"]?></td>
                                <td><?php echo $edu["ssc_institution"]?></td>
                                <td ><?php echo $edu["ssc_passing_year"]?></td>

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
                    <li>
                        &nbsp;
                        <h4>Financial Information</h4>
                        <hr>
                    <li><span style="font-size: medium">Yearly Expense  :</span>&emsp;&emsp;&emsp;&emsp;  <?php echo "zdsczcz";?></li>
                    &nbsp;

                    <li><span style="font-size: medium">Relative Information  :</span>&emsp;&emsp;&emsp;&emsp;<?php echo "mhbjjj"?></li>
                    &nbsp;
                    <li><span style="font-size: medium">Relative Support  :</span>&emsp;&emsp;&emsp;&emsp;<?php echo "zdsczcz";?></li>
                    &nbsp;

                    <li><span style="font-size: medium">Sponsor Information  :</span>&emsp;&emsp;&emsp;&emsp;<?php echo "mhbjjj"?></li>
                    &nbsp;
                    <li><span style="font-size: medium">Bank Name  :</span>&emsp;&emsp;&emsp;&emsp;<?php echo "zdsczcz";?></li>
                    &nbsp;

                    <li><span style="font-size: medium">Bank Amount  :</span>&emsp;&emsp;&emsp;&emsp;<?php echo "mhbjjj"?></li>
                    &nbsp;

                </ul>



            </div>
            &nbsp;&nbsp;
            <div class="col-lg-3">
                <?php if($applicant['image']) {?>
                    <a href="<?php echo base_url('/images')."/".$applicant['applicant_id']."/".$applicant['image'];?>"><img src="<?php echo base_url('/images')."/".$applicant['applicant_id']."/".$applicant['image'];?>" width="150"></a>
                <?php }?>
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
