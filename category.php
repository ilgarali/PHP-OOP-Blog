<?php
include_once "includes/header.php";

?>
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                
                <?php 
                $catid = $_GET['category'];
                if (!isset($_GET['page'])) {
                    $page=1;
                }else{
                    $page=$_GET['page'];
                }
                $condt = [
                    "select"=>"*,posts.id as postid",  
                    "leftjoin"=>"posts",
                    "from"=>"id",
                    "to"=>"category_id",
                    "page" => $page,
                    "limit" => 6,
                ];
                $where = ["category.id"=>$catid];
                $sql=new Model;
                $data = $sql->getData("category",$condt,$where);
                $totalpage= $data[1];
                $getcat = $data[0];
               
                ?>
                
                <h1 class="display-1 display-1--with-line-sep">Category: <?php echo $getcat[0]['category'] ?></h1>
               
            </div>
        </div>
        
        <div class="row entries-wrap add-top-padding wide">
            <div class="entries">
                <?php foreach ($data[0] as $data) {
                   
               ?>
<article class="col-block">
        
        <div class="item-entry" data-aos="zoom-in">
            <div class="item-entry__thumb">
                <a href="single.php?single=<?php echo $data['postid'] ?>" class="item-entry__thumb-link">
                    <img src="back/img/<?php echo $data['img'] ?>" 
                           alt="">
                </a>
            </div>
   
            <div class="item-entry__text">    
                <div class="item-entry__cat">
                    <a href="category.html"><?php echo $data['category'] ?></a> 
                </div>

                <h1 class="item-entry__title"><a href="single.php?single=<?php echo $data['postid'] ?>"> <?php echo $data['title'] ?> </a></h1>
                    
                <div class="item-entry__date">
                    <a href="single.php?single=<?php echo $data['postid'] ?>"><?php echo $data['created_at'] ?></a>
                </div>
            </div>
        </div> <!-- item-entry -->

    </article> <!-- end article -->
<?php  } ?>
                

            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->

        <div class="row pagination-wrap">
<div class="col-full">
    <nav class="pgn" data-aos="fade-up">
        <ul>

            <?php
     
            
            for ($page=1; $page<=$totalpage ; $page++) { 
               echo '<li><a class="pgn__num" href="index.php?page='.$page.'" >'.$page.'</a></li>';
            } ?>
            
        
            
        </ul>
    </nav>
</div>
</div>


    </section> <!-- end s-content -->

    <?php 
include_once "includes/footer.php";

?>