<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Young</title>
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <link rel="stylesheet" href="../../css/detail.css">
</head>
<body>
  <div id="app">
    <?php
        include '../../db.helper/db_helper.php';
        header("Content-type:text/html;charset=utf-8");        
        $sql = "select * from member where staff_id =".$_GET['staff_id'];
        $result = $conn->query($sql);
        $pub_list;
        $exp_list;
        while ($row = mysqli_fetch_array($result)){
            $pub_list = $row["publication_list"];
            $exp_list = $row["experience_list"];
    ?>
    <section class="author">
      <div class="author-background"></div>
      <div class="author-wrapper">
        <div class="author-content">
          <div class="author-content-wrapper">
            <div class="author-avator">
              <img src="../../file.db/member.photo/<?php echo $row["photo"]?>" height="100" width="100">
            </div>
            <div class="author-details">
              <h1 class="author-name"><?php echo $row["name_en"] ?></h1>
              <div class="author-intro">
                <div class="author-intro-name">
                    <?php echo $row["name_en"] ?>  <?php echo $row["name"] ?>
                </div>
                <div class="author-phone">
                  <span class="el-icon-mobile-phone"></span>
                  <?php echo $row["telephone"] ?>
                </div>
                <div class="author-email">
                  <span class="el-icon-message"></span>
                  <?php echo $row["email"] ?>
                </div>
                <!-- <div class="author-intro-areas">
                  <div class="areas-title">研究方向</div>
                  <div class="areas-content">
                    <p class="areas-item">dsdsadasdasda</p>
                    <p class="areas-item">dsdsadasdasda</p>
                    <p class="areas-item">dsdsadasdasda</p>
                  </div>
                </div> -->
                <div class="author-biograph">
                  <p v-bind:style="{display: authorIntroIsOpen ? 'block' : '-webkit-box'}"><?php echo $row["biograph"] ?></p>
                  <span @click="openAuthorIntro">[[authorIntroIsOpen? 'Unfold' : 'Fold']] Introduction</span>
                </div>
                <!-- <p>
                  {{member.biograph}}
                </p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </section>
    <section class="pubs">
      <div class="pubs-wrapper">
        <div class="pubs-header">
        </div>
        <div class="pubs-main clearfix">
        <!--
          <div class="pubs-main-pagination">
             <div class="block">
              <el-pagination
                @current-change="handleCurrentChange"
                :current-page.sync="currentPage"
                :page-size="15"
                layout="total, prev, pager, next"
                :total="23">
              </el-pagination>
            </div>
          </div>
         -->
          <div class="pubs-classify">
            <div class="author-areas">
              <h3>Experiences</h3>
                <?php
                    $exps = strtok($exp_list, ",");
                    for($i=0;$i< count($exp_list);$i++){
                        $exp = trim($exps," ");
                        if(strlen($exp)>0){
                            $sql = "select * from experience where experience_id =".$exp;
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                ?>
              <div class="experience-wrapper">
                <div class="experience-name">
                  <p>
                    Name: <?php echo $row["experience_name"] ?>
                  </p>
                </div>
                <div class="experience-time">
                  <p>
                    <span class="el-icon-caret-right"></span>
                    Time span：<?php echo $row["start_time"] ?> ~ <?php echo $row["end_time"] ?>
                  </p>
                </div>
                <div class="experience-task">
                  <p id="experience-task">
                    Main Task： <?php echo $row["main_task"] ?>
                  </p>
                  <el-button type="text" @click="openTask">View whole task</el-button>
                </div>
                <div class="experience-desc">
                  <p id="experience-desc">
                      <?php echo $row["description"] ?>
                  </p>
                  <el-button type="text" @click="openDesc">View whole description</el-button>
                </div>
              </div>
            <?php
                    }
                }
            }?>
              
            </div>
          </div>
         <h3>Publications</h3>
          <div class="pubs-list">
                <?php
                    $pubs = strtok($pub_list, ",");
                    for($i=0;$i< count($pub_list);$i++){
                        $pub = trim($pubs," ");
                        if(strlen($pub)>0){
                            $sql = "select * from publication where publication_id =".$pub;
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                ?>
              <p> <?php echo $row["authors"].".\"".$row["title"]."\"".$row["venue_name"]. "(".$row["year"].")".$row["volume"]."-".$row["number_v"]." p.".$row["number_v"] ?>
                  <a href="<?php echo $row["demo_link"]?>">[demo_link]</a>
                  <a href="../../file.db/publication/source.code/<?php echo $row["source_code"]?>">code</a>
                  <a href="../../file.db/publication/manuscript/<?php echo $row["manuscript"]?>">manuscript</a>
              </p>
            <?php
                    }
                }
            }?>
            
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script>
  function getQueryString(name) { 
    let reg = `(^|&)${name}=([^&]*)(&|$)`
    let r = window.location.search.substr(1).match(reg); 
    if (r != null) return unescape(r[2]); return null; 
  }
  var experienceTaskText = document.getElementById('experience-task').innerText
  var experienceDescText = document.getElementById('experience-desc').innerText

    var app = new Vue({
      el: '#app',
      delimiters:['[[', ']]'],
      data: {
          authorIntroIsOpen: false,
          currentPage: 1,
      },
      methods: {
        handleCurrentChange(page) {
          window.location.href = "?page=" + page
        },
        openTask() {
          this.$alert(experienceTaskText, '研究的主要任务', {});
        },
        openDesc() {
          this.$alert(experienceDescText, '研究描述', {});
        },
        openAuthorIntro() {
          this.authorIntroIsOpen = !this.authorIntroIsOpen
        }
      },
      created: function() {
        var page = getQueryString('page')
        this.currentPage = +page || 1
      }
    })
</script>
</html>