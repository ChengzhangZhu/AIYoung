<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Young</title>
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <link rel="stylesheet" href="../../css/list.css">
</head>
<body>
  <div id="app">
    <el-container>
        <el-main class="home-top" v-bind:style="{paddingLeft: '175px', paddingRight: '175px'}">
          <el-row :gutter="20">
              <el-col :span="12">
                  <img src="../../images/team.jpg" height="150" width="200">
              </el-col>
              <el-col :span="12">
                <div class="team-intro">
                  <h2 class="team-intro-title">Team Introduction</h2>
                  <div class="team-intro-content">
                      AIYoung is a strong technical team, which devotes itself to the development of AI (artifical intelligence) products and AI educations.
                      It is formed in July 2018 in Sydney. Currently, our AI products include "Auto web crawlers" and "sentiment analysis". We plan to start
                      AI education for the youths in Hunan. 
                  </div>
                </div>
              </el-col>
          </el-row>
        </el-main>
      </el-container>
    <el-container>
      <el-main v-bind:style="{paddingLeft: '175px', paddingRight: '175px'}">
        <el-row :gutter="20">
        <?php
             include '../../db.helper/db_helper.php';
             $sql = "select * from member";
             $result = $conn->query($sql);
             while ($row = mysqli_fetch_array($result)){
        ?>
            <el-col :span="6">
              <el-card class="member">
                <div class="member-intro">
                  <div class="member-name"><?php echo $row["name_en"] ?></div>
                  <div class="">
                      <a href="team_detail.php?staff_id=<?php echo $row["staff_id"]?>"><img src="../../file.db/member.photo/<?php echo $row["photo"]?>"></a>
                  </div>
                  <div class="research-brow">Research area(s)</div>
                  <div class="member-result">
                    <!-- <p>
                        {{member.research_interests}}
                    </p> -->
                    <div class="interets-content">
                        <span class="interets-item"><?php echo $row["research_interests"]?></span>
                    </div>
                  </div>
                </div>
              </el-card>
            </el-col>
        <?php }?>


        </el-row>
<!--        <div class="block">
            <el-pagination
              @current-change="handleCurrentChange"
              :current-page.sync="currentPage"
              layout="total, prev, pager, next"
              :page-size="6"
              :total="{{page_obj.paginator.num_pages}}">
            </el-pagination>
          </div>-->
      </el-main>
    </el-container>
    
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
    var app = new Vue({
      el: '#app',
      data: {
          message: 'Hello Vue!',
          currentPage: 1,
      },
      methods: {
        handleCurrentChange(page) {
          var href = window.location.href
          var hrefLen = href.length
          var url =  href[hrefLen - 1] === '/' ? href.slice(0, -1) : href
          window.location.href = url + "?page=" + page
        }
      },
      created: function() {
        var page = getQueryString('page')
        this.currentPage = +page || 1
      }
    })
</script>
</body>
</html>
