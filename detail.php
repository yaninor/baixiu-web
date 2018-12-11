<?php
  $id = $_GET['id'];
  $sql = "select p.id,p.title,p.feature,p.content,c.name,u.nickname,p.views,p.likes,p.created from posts p
          inner join users u
          on p.user_id = u.id
          inner join categories c
          on p.category_id = c.id
          where p.status = 'published' and p.id=$id";
  require_once "admin/api/phpTools/phpTools.php";
  $contentList = mysqli_excute_select($sql)[0];
  $views = $contentList['views']+1;
  $sql = "update posts set views='$views' where id=$id";
  mysqli_excute_zsg($sql);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
  <?php
        $sql = "select * from categories";
        $categoryList = mysqli_excute_select($sql);
        $iconList = ['fa-glass','fa-phone','fa-fire','fa-gift'];
      ?>
    <div class="topnav">
      <ul>
      <?php foreach($categoryList as $key => $value):?>
        <li><a href="list.php?id=<?php echo $value['id']?>&name=<?php echo $value['name']?>"><i class="fa <?php echo $iconList[$key]?>"></i><?php echo $value['name']?></a></li>
    <?php endforeach; ?>
      </ul>
    </div>
    <div class="header">
      <h1 class="logo"><a href="index.php"><img src="assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
      <?php foreach($categoryList as $key => $value):?>
        <li><a href="list.php?id=<?php echo $value['id']?>&name=<?php echo $value['name']?>"><i class="fa <?php echo $iconList[$key]?>"></i><?php echo $value['name']?></a></li>
    <?php endforeach; ?>
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div>
    <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">
        <?php  
          $sql = "select id,title,views,feature from posts order by rand() limit 5";
          $postList = mysqli_excute_select($sql);
          foreach($postList as $value):
        ?>
          <li>
            <a href="detail.php?id=<?php echo $value['id']?>">
              <p class="title"><?php echo $value['title'] ?></p>
              <p class="reading">阅读(<?php echo $value['views'] ?>)</p>
              <div class="pic">
                <img src="<?php echo $value['feature'] ?>" alt="">
              </div>
            </a>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div class="article">
        <div class="breadcrumb">
          <dl>
            <dt>当前位置：</dt>
            <dd><a href="javascript:;"><?php echo $contentList['name']?></a></dd>
            <dd><?php echo $contentList['title']?></dd>
          </dl>
        </div>
        <h2 class="title">
          <a href="javascript:;"><?php echo $contentList['title']?></a>
        </h2>
        <div class="meta">
          <span><?php echo $contentList['nickname']?> 发布于 <?php echo $contentList['created']?></span>
          <span>分类: <a href="javascript:;"><?php echo $contentList['name']?></a></span>
          <span>阅读: (<?php echo $contentList['views']?>)</span>
          <?php 
            $sql = "select * from comments where post_id=$id and status='approved'";
            $count = count(mysqli_excute_select($sql));
          ?>
          <span>评论: (<?php echo $count ?>)</span>
          <div><?php echo $contentList['content']?></div>
        </div>
      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul>
        <?php 
           $sql = "select * from posts where status='published' order by rand() limit 4";
           $list = mysqli_excute_select($sql);
           foreach($list as $value):
        ?>
          <li>
            <a href="detail.php?id=<?php echo $value['id']?>">
              <img src="<?php echo $value['feature']?>" alt="">
              <span><?php echo $value['title']?></span>
            </a>
          </li>
           <?php endforeach;?>
        </ul>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
</body>
</html>
