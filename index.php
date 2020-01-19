<?php
include_once "includes/header.php";

?>
<!-- featured 
================================================== -->
<section class="s-featured">
<div class="row">
<div class="col-full">

    <div class="featured-slider featured" data-aos="zoom-in">
        <?php
        $slide = new Model();
        $coditions =[
            "select"=>"*,posts.id as postid",
            "leftjoin" =>"category",
            "from"=>"category_id",
            "to"=>"id",
            "orderby"=>"id",
            "orderedtype"=>"DESC",
                     
                    ];
           $where = ["status" => 2];         
        $data = $slide->getData("posts",$coditions,$where); 
        foreach ($data as $data) {
            # code...
        
        ?>

        <div class="featured__slide">
            <div class="entry">

                <div class="entry__background" style="background-image:url(back/img/<?php echo $data['img'] ?>);"></div>
                
                <div class="entry__content">
                    <span class="entry__category"><a href="#0"> <?php echo $data['category'] ?> </a></span>
   
                    <h1><a href="single.php?single=<?php echo $data['postid'] ?>" title=""><?php echo $data['title'] ?></a></h1>

                    <div class="entry__info">
                        <a href="#0" class="entry__profile-pic">
                        <img src="back/img/<?php echo $data['img'] ?>" alt="">
                        </a>
                        <ul class="entry__meta">
                            <li><a href="#0">Admin</a></li>
                            <li><?php echo $data['created_at'] ?> </li>
                        </ul>
                    </div>
                </div> <!-- end entry__content -->
                
            </div> <!-- end entry -->
        </div> <!-- end featured__slide -->

    <?php  } ?>
        
        
    </div> <!-- end featured -->

</div> <!-- end col-full -->
</div>
</section> <!-- end s-featured -->


<!-- s-content
================================================== -->
<section class="s-content">

<div class="row entries-wrap wide">
<div class="entries">
<?php 
     if (!isset($_GET['page'])) {
        $page=1;
    }else{
        $page=$_GET['page'];
    }
   
    $totalpage ="";
    $getdata = new Model;
    $sql = [
    "select"=>"*,posts.id as postid",   
    "leftjoin" =>"category",
    "from"=>"category_id",
    "to"=>"id",
    "orderby"=>"id",
    "orderedtype"=>"DESC",
    "count"=>true,
    "page" => $page,
    "limit" => 6,
    
            ];

            
    
    $data = $getdata->getData("posts",$sql);
     $totalpage= $data[1];  
    foreach ($data[0] as $data) {
       
    
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