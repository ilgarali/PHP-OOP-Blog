<?php
include_once "includes/header.php";

?>
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

    <?php 
    $sql=new Model();
    $conditions = [
        "select"=>"*,posts.id as postid",   
        "leftjoin" =>"category",
        "from"=>"category_id",
        "to"=>"id",
        "orderby"=>"id",
        "orderedtype"=>"DESC"
        
        
    ];
    $where = $_GET['single'];
    $data = $sql->getData("posts",$conditions,["posts.id"=>$where]);
    foreach ($data as $data) {
        
    
    ?>
        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                <img class="img-fluid" height="100" src="back/img/<?php echo $data['img'] ?>"  alt="">
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
                        <?php $x= $data['tags']; $d= explode(",",$x); foreach ($d as $d) { ?>
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
<?php }?>

        <div class="s-content__entry-nav">
            <div class="row s-content__nav">
                <div class="col-six s-content__prev">
                    <a href="#0" rel="prev">
                        <span>Previous Post</span>
                        The Pomodoro Technique Really Works. 
                    </a>
                </div>
                <div class="col-six s-content__next">
                    <a href="#0" rel="next">
                        <span>Next Post</span>
                        3 Benefits of Minimalism In Interior Design.
                    </a>
                </div>
            </div>
        </div> <!-- end s-content__pagenav -->

        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">5 Comments</h3>

                    <!-- START commentlist -->
                    <ol class="commentlist">

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author">Itachi Uchiha</div>

                                    <div class="comment__meta">
                                        <div class="comment__time">Jun 15, 2018</div>
                                       
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,
                                facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>
                                </div>

                            </div>

                        </li> <!-- end comment level 1 -->

                      
                        

                    </ol>
                    <!-- END commentlist -->           

                </div> <!-- end col-full -->
            </div> <!-- end comments -->

            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="col-full">

                    <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                    <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
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