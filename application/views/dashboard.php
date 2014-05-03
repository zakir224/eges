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
                    <h3 style="font-size: xx-large">Dashboard</h3>
                    <hr>
                    <h4>Personal Files/Attachments</h4>
                    <div class="row">

                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Passport
                            </label>
                        </div>
                    </div>
                    <h4>Educational Files/Attachments</h4>
                    <div class="row">
                        <div class="col-lg-4">

                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"> SSC Certificate
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"> SSC Marks Sheet
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"> HSC Certificate
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"> HSC Marks Sheet
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Bachelors Certificate
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Bachelors Marks Sheet
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Masters Certificate
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Masters Marks Sheet
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Other Papers
                            </label>
                        </div>
                    </div>
                    <h4>Financial Files/Attachments</h4>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Other Files
                            </label>
                        </div>
                    </div>

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
