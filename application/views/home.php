<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EGE Services</title>

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

    <!-- Bootstrap -->
    <link href="<?php echo base_url('/')?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/')?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('/')?>css/bootstrap.theme" rel="stylesheet">
    <link href="<?php echo base_url('/')?>css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php include_once('header.php');?>


<section class="container">
    <div class="row">

        <form  role="form">
            <div class="col-lg-12 well" style="background: #ffffff;">

                    <h3>List of Applicants</h3>

                    <table id="example" class="col-lg-12 table table-hover table-bordered" style="width: 100%">
                        <thead>
                        <tr><th>Applicant ID</th><th>Picture</th><th>First Name</th><th>Last Name</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                        <?php for($i=0;$i<count($applicant);$i++) { ?>
                            <tr>
                                <td><?php echo $applicant[$i]['applicant_id'];?></td>
                                <td><a href="<?php echo base_url('/images/')."/".$applicant[$i]['applicant_id']."/".$applicant[$i]['image'];?>">
                                        <img src="<?php echo base_url('/images/')."/".$applicant[$i]['applicant_id']."/".$applicant[$i]['image'];?>"
                                             width="50" height="50" style="margin-top: 10px; padding: 5px;background: lightgray"></a>
                                </td>
                                <td><?php echo $applicant[$i]['first_name'];?></td>
                                <td><?php echo $applicant[$i]['last_name'];?></td>

                                <td>
                                    <p>
                                    <form action="<?php echo base_url('index.php/welcome/personal_info');?>" method="get">
                                        <a href="<?php echo base_url('index.php/welcome/downloadAttachment/')."/".$applicant[$i]['applicant_id'];?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-download"></span></a>

                                        <a href="<?php echo base_url('index.php/welcome/personal_info/')."/".$applicant[$i]['applicant_id'];?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    </p>
                                </td>
                            </tr>
                        <?php } ?>
                        <!--    <tr><td>--><?php //echo $applicant[1]['applicant_id'];?><!--</td><td>--><?php //echo $applicant[1]['applicant_id'];?><!--</td></tr>-->
                        <!--    <tr><td>--><?php //echo $applicant[1]['applicant_id'];?><!--</td><td>--><?php //echo $applicant[1]['applicant_id'];?><!--</td></tr>-->
                        </tbody>
                    </table>

            </div>
        </form>
    </div>
</section>

<!--    <tr><td>--><?php //echo $applicant[1]['applicant_id'];?><!--</td><td>--><?php //echo $applicant[1]['applicant_id'];?><!--</td></tr>-->
<!--    <tr><td>--><?php //echo $applicant[1]['applicant_id'];?><!--</td><td>--><?php //echo $applicant[1]['applicant_id'];?><!--</td></tr>-->
    </tbody>
</table>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $(function(){
        $("#example").dataTable();
    })
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#example').dataTable();
    });
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
