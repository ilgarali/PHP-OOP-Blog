<?php
include_once "includes/header.php";

?>
<!-- featured 
================================================== -->
<section class="s-featured">
<div class="row">
<div class="col-full">

    <div class="featured-slider featured" data-aos="zoom-in">

        <div class="featured__slide">
            <div class="entry">

                <div class="entry__background" style="background-image:url('images/thumbs/featured/featured-guitarman.jpg');"></div>
                
                <div class="entry__content">
                    <span class="entry__category"><a href="#0">Music</a></span>
   
                    <h1><a href="#0" title="">What Your Music Preference Says About You and Your Personality.</a></h1>

                    <div class="entry__info">
                        <a href="#0" class="entry__profile-pic">
                            <img class="avatar" src="images/avatars/user-05.jpg" alt="">
                        </a>
                        <ul class="entry__meta">
                            <li><a href="#0">Jonathan Smith</a></li>
                            <li>June 02, 2018</li>
                        </ul>
                    </div>
                </div> <!-- end entry__content -->
                
            </div> <!-- end entry -->
        </div> <!-- end featured__slide -->

        <div class="featured__slide">

            <div class="entry">

                <div class="entry__background" style="background-image:url('images/thumbs/featured/featured-watch.jpg');"></div>
                
                <div class="entry__content">
                    <span class="entry__category"><a href="#0">Management</a></span>

                    <h1><a href="#0" title="">The Pomodoro Technique Really Works.</a></h1>

                    <div class="entry__info">
                        <a href="#0" class="entry__profile-pic">
                            <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                        </a>

                        <ul class="entry__meta">
                            <li><a href="#0">John Doe</a></li>
                            <li>June 13, 2018</li>
                        </ul>
                    </div>
                </div> <!-- end entry__content -->
                
            </div> <!-- end entry -->

        </div> <!-- end featured__slide -->

        <div class="featured__slide">

            <div class="entry">

                <div class="entry__background" style="background-image:url('images/thumbs/featured/featured-beetle.jpg');"></div>

                <div class="entry__content">
                    <span class="entry__category"><a href="#0">LifeStyle</a></span>

                    <h1><a href="#0" title="">The difference between Classics, Vintage & Antique Cars.</a></h1>

                    <div class="entry__info">
                        <a href="#0" class="entry__profile-pic">
                            <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                        </a>

                        <ul class="entry__meta">
                            <li><a href="#0">John Doe</a></li>
                            <li>June 12, 2018</li>
                        </ul>
                    </div>
                </div> <!-- end entry__content -->

            </div> <!-- end entry -->

        </div> <!-- end featured__slide -->
        
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
                <a href="single-standard.php" class="item-entry__thumb-link">
                    <img src="back/img/<?php echo $data['img'] ?>" 
                           alt="">
                </a>
            </div>
   
            <div class="item-entry__text">    
                <div class="item-entry__cat">
                    <a href="category.html"><?php echo $data['category'] ?></a> 
                </div>

                <h1 class="item-entry__title"><a href="single-standard.html"> <?php echo $data['title'] ?> </a></h1>
                    
                <div class="item-entry__date">
                    <a href="single-standard.html"><?php echo $data['created_at'] ?></a>
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