<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Themeum">

<!-- Include All Css -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/preset.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">

<!-- Include All JavaScript -->
<script src="lib/js/jquery.min.js"></script>
<script src="lib/js/bootstrap.min.js"></script>
<script src="lib/js/mixIt.js"></script>
<script src="lib/js/jquery.magnific-popup.min.js"></script>
<script src="lib/js/main.js"></script>

<!--[if lt IE 9]>
	<script src="lib/js/html5shive.js"></script>
<![endif]-->

</head>
<body>
    <?php include("header.php"); ?>
    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 text-center">
                    <h2 class="title">AIYoung Team Members</h2>
                    <p class="subtitle color">
                        Skilled and Professional in AI
                    </p>
                </div>
            </div>

            <div class="row">
                <?php
                include 'db.helper/db_helper.php';
                $sql = "select * from member";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_array($result)){
                ?>
                <div class="col-sm-6 col-md-3 col-xs-12 text-center">
                    <div class="single-team">
                        <div>
                            <a href="member_detail.php?staff_id=<?php echo $row["staff_id"]?>"><img alt="" src="file.db/member.photo//<?php echo $row["photo"]?>"></a>
                        </div>
                        <h3><a href="member_detail.php?staff_id=<?php echo $row["staff_id"]?>"><?php echo $row["name_en"]?></a></h3>
                        <p><a href="member_detail.php?staff_id=<?php echo $row["staff_id"]?>"><?php echo $row["position"]?></a></p>
                    </div>
                </div>
                <?php }?>
            </div>
            
            <div class="row">
                <div class="col-sm-12 col-xs-12 text-center">
                    <div class="stuff-button">
                        <a class="primary-btn" href="#"><span>See All Members</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- /.team-section -->
    <?php include("footer.php"); ?>
</body>
</html>