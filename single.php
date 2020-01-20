<?php
include_once "includes/header.php";

?>
<!-- s-content
    ================================================== -->
<section class="s-content s-content--top-padding s-content--narrow">
<div style="display: none;">
<?php 
  $where = $_GET['single'];
  if (isset($where)) {
      $updatehit = new Controller;
      $x = 1;

      $sql2 = new Model();
      $cond2 = [
          "select" => "hits"
      ];
      $gethit = $sql2->getData("posts", $cond2, ["id" => $where]);


      $updatehit->update("posts", ["hits" => (int) $gethit[0]["hits"] + $x], ["id" => $where]);
  }

?>
</div>
    <?php
    $sql = new Model();
    $conditions = [
        "select" => "*,posts.id as postid",
        "leftjoin" => "category",
        "from" => "category_id",
        "to" => "id",
        "orderby" => "id",
        "orderedtype" => "DESC"


    ];
  
    
    $data = $sql->getData("posts", $conditions, ["posts.id" => $where]);
    foreach ($data as $data) {


    ?>
        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img class="img-fluid" style="width: 100% !important;height:576px !important;" src="back/img/<?php echo $data['img'] ?>" alt="">
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    <?php echo $data['title'] ?>
                </h1>
                <ul class="entry__header-meta">
                    <li class="date"><?php echo $data['created_at'] ?></li>
                    <li class="byline">
                        By
                        <a href="#0">Admin</a>
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">






                <p><?php echo $data['text'] ?></p>


                <div class="entry__taxonomies">
                    <div class="entry__cat">
                        <h5>Posted In: </h5>
                        <span class="entry__tax-list">
                            <a href="#0"><?php echo $data['category'] ?></a>

                        </span>
                    </div> <!-- end entry__cat -->

                    <div class="entry__tags">
                        <h5>Tags: </h5>
                        <span class="entry__tax-list entry__tax-list--pill">
                            <?php $x = $data['tags'];
                            $d = explode(",", $x);
                            foreach ($d as $d) { ?>
                                <a href="#0">
                                    <?php echo $d; ?>
                                </a> <?php    } ?>

                        </span>
                    </div> <!-- end entry__tags -->
                </div> <!-- end s-content__taxonomies -->

                <div class="entry__author">
                    <img src="images/avatars/user-03.jpg" alt="">

                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Posted by</span>
                            <a href="#0">Jonathan Doe</a>
                        </h5>

                        <div class="entry__author-desc">
                            <p>
                                Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat
                                impedit laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas
                                voluptatum. Lorem ipsum dolor sit.
                            </p>
                        </div>
                    </div>
                </div>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->
    <?php } ?>

    <div class="s-content__entry-nav">
        <div class="row s-content__nav">
            <div class="col-six s-content__prev">
                <?php 
                $cond = [
                    "limit"=>1
                ];
                $sql3 = new Model();

                $data = $sql3->getData("posts",$cond,["id" =>$where-1]);
               foreach ($data as $data) {
                   # code...
               
                ?>
                <a href="single.php?single=<?php echo $data['id'] ?>" rel="prev">
                    <span>Previous Post</span>
                    <?php echo $data['title'] ?>
                </a>

            <?php }?>
            </div>
            <div class="col-six s-content__next">

            <?php 
                $cond = [
                    "limit"=>1
                ];
                $sql3 = new Model();

                $data = $sql3->getData("posts",$cond,["id" =>$where+1]);
               foreach ($data as $data) {
                   # code...
               
                ?>
                <a href="single.php?single=<?php echo $data['id'] ?>" rel="next">
                    <span>Next Post</span>
                    <?php echo $data['title'] ?>
                </a>
                <?php }?>
            </div>
        </div>
    </div> <!-- end s-content__pagenav -->

    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">
            <?php 
                $cond = [
                    "count"=>"s"
                ];
                $sql3 = new Model();
                

                $data = $sql3->getData("comments",$cond,["post_id" =>$where]);
                ?>
                <h3 class="h2">5 Comments</h3>

                <!-- START commentlist -->
                <ol class="commentlist">

                    <li class="depth-1 comment">

                      
                    <?php 
                $cond = [
                    "orderby"=>"id",
                    "orderedtype"=>"DESC"
                ];
                $sql3 = new Model();
                

                $data = $sql3->getData("comments",$cond,["post_id" =>$where,"status"=>1]);
                
                foreach ($data as $data) {
                    # code...
               
                ?>
                        <div class="comment__content">

                            <div class="comment__info">
                                <div class="comment__author"><?php echo $data['name'] ?></div>

                                <div class="comment__meta">
                                    <div class="comment__time"><?php echo $data['created_at'] ?></div>

                                </div>
                            </div>
                
                            <div class="comment__text">
                                <p> <?php echo $data['message'] ?> </p>

                        </div>
                        <?php   } ?>
                    </li> <!-- end comment level 1 -->




                </ol>
                <!-- END commentlist -->

            </div> <!-- end col-full -->
        </div> <!-- end comments -->

        <div class="row comment-respond">

            <!-- START respond -->
            <div id="respond" class="col-full">

                <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                <form name="contactForm" id="contactForm" autocomplete="off">
                    <fieldset>

                        <div class="form-field">
                            <input name="cName" id="cName" class="full-width" placeholder="Your Name*" value="" type="text">
                        </div>

                        <div class="form-field">
                            <input name="cEmail" id="cEmail" class="full-width" placeholder="Your Email*" value="" type="text">
                        </div>

                        <div class="form-field">
                            <input name="cWebsite" id="cWebsite" class="full-width" placeholder="Website" value="" type="text">
                        </div>

                        <div class="message form-field">
                            <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message*"></textarea>
                        </div>

                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

                    </fieldset>
                </form> <!-- end form -->

            </div>
            <!-- END respond-->

        </div> <!-- end comment-respond -->

    </div> <!-- end comments-wrap -->

</section> <!-- end s-content -->


<?php
include_once "includes/footer.php";

?>
<script>

let contactForm = document.getElementById("contactForm");
contactForm.addEventListener("submit",(e) => {
    e.preventDefault();
    
let cName = document.getElementById("cName").value;
let cEmail = document.getElementById("cEmail").value;
let cWebsite = document.getElementById("cWebsite").value;
let cMessage = document.getElementById("cMessage").value;  
let post_id = "<?php echo $where ?>";
const phpaddress ="sendcomment.php";
let message = "We have received your comment";
let myob = {
    "name":cName,
    "email":cEmail,
    "website":cWebsite,
    "message":cMessage,
    "post_id":post_id
}
let fetcData = new Fetch;
fetcData.setFetch(myob,phpaddress,message);



})

</script>