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
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">

<!--[if lt IE 9]>
	<script src="lib/js/html5shive.js"></script>
<![endif]-->

</head>
<body>
    <?php include("header.php"); ?>
    <?php
        include 'db.helper/db_helper.php';
        header("Content-type:text/html;charset=utf-8");        
        $sql = "select * from member where staff_id =".$_GET['staff_id'];
        $result = $conn->query($sql);
        $pub_list;
        $exp_list;
        while ($row = mysqli_fetch_array($result)){
            $pub_list = $row["publication_list"];
            $exp_list = $row["experience_list"];
            $exps = explode(",",$exp_list);
            $pubs = explode(",",$pub_list);
    ?>
    <!-- Classes Section -->
    <section class="classes-section-3">
            <div class="container">
                    
                    <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div>
                                    <img alt="" src="file.db/member.photo//<?php echo $row["photo"]?>" height="300" width="300">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                    <div class="class-information">
                                            <h3><?php echo $row["name_en"] ?></h3>
                                            <h5>
                                                <span class="el-icon-mobile-phone"></span><?php echo $row["telephone"] ?> &nbsp;&nbsp;&nbsp;
                                                <span class="el-icon-message"></span> <?php echo $row["email"] ?>
                                            </h5>
                                            <p>
                                                <?php echo $row["biograph"]?>
                                            </p>
                                    </div>
                                    <div class="class-meta-data">
                                            <div class="class-single-meta pull-left">
                                                    <p>Publications</p>
                                                    <h4><?php echo count($pubs)?></h4>
                                            </div>
                                            <div class="class-single-meta pull-left">
                                                    <p>Experiences</p>
                                                    <h4><?php echo count($exps)?></h4>
                                            </div>
                                            <div class="clearfix"></div>
                                    </div>
                            </div>
                    </div>
            </div>
    </section>
    <!-- /.classes-section-2 -->

    <!-- Subject and teacher Section -->
    <section class="subject-and-teacher-details">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="subject-details">
                        <div class="sub-heading"><h4>Publications<span>( <?php echo count($pubs)?> Papers )</span></h4></div>
                        <ul class="subject-list">
                            <?php
                              
                               for($i=0;$i< count($pubs);$i++){
                                   $pub = trim($pubs[$i]," ");
                                   if(strlen($pub)>0){
                                       $sql = "select * from publication where publication_id =".$pub;
                                       $result = $conn->query($sql);
                                       while ($row = mysqli_fetch_array($result)){
                            ?>
                            <li>
                                <?php echo $row["authors"].".\"".$row["title"]."\"".$row["venue_name"]. " (".$row["year"].") ".$row["volume"]."-".$row["number_v"]." p.".$row["number_v"] ?>
                                <span>
                                <a href="<?php echo $row["demo_link"]?>">[demo_link]</a>
                                <a href="file.db/publication/source.code/<?php echo $row["source_code"]?>">code</a>
                                <a href="file.db/publication/manuscript/<?php echo $row["manuscript"]?>">manuscript</a>
                                </span>
                            </li>
                            <?php
                                    }
                                }
                            }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="subject-details">
                        <div class="sub-heading"><h4>Experiences<span>( <?php echo count($exps)?> Experiences )</span></h4></div>
                        <ul class="subject-list">
                            <?php
                               
                               for($i=0;$i< count($exps);$i++){
                                   $exp = trim($exps[$i]," ");
                                   if(strlen($exp)>0){
                                       $sql = "select * from experience where experience_id =".$exp;
                                       $result = $conn->query($sql);
                                       while ($row = mysqli_fetch_array($result)){
                            ?>
                            <li>
                                <b>Name：</b> <?php echo $row["experience_name"] ?>  <br/><br/>
                                <b>Time span：</b><?php echo $row["start_time"] ?> ~ <?php echo $row["end_time"] ?><br/><br/>
                                <b>Description：</b><?php echo $row["description"] ?> <br/><br/>
                                <b>Main Task：</b> <?php echo $row["main_task"] ?> <br/><br/>
                            </li>
                            <?php
                                    }
                                }
                            }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.subject-and-teacher-details -->
    <?php }?>
    <!-- /.team-section -->
    <?php include("footer.php"); ?>
</body>
</html>