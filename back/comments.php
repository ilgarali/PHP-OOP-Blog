<?php include_once "includes/sidebar.php"; ?>
<?php include_once "includes/header.php"; ?>
<!-- Content Wrapper -->


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

 
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">



                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                        aria-label="Start date: activate to sort column ascending" style="width: 107px;">Name</th>

                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                        aria-label="Start date: activate to sort column ascending" style="width: 107px;">Email</th>

                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                        aria-label="Start date: activate to sort column ascending" style="width: 107px;">Message</th>

                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                        aria-label="Start date: activate to sort column ascending" style="width: 107px;">View Post</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                        aria-label="Start date: activate to sort column ascending" style="width: 107px;">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                        aria-label="Start date: activate to sort column ascending" style="width: 107px;">Action</th>
                </thead>

                <tbody>

                    <?php

if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }
                    $sql = new Model();
                    $conditions = [
                        "select"=>"*,comments.status as sta,comments.id as com_id",
                        "leftjoin"=>"posts",
                        "from"=>"post_id",
                        "to"=>"id",
                        "orderby" => "id",
                        "orderedtype" => "DESC",
                        "count" => true,
                        "page" => $page,
                        "limit" => 6,
                    ];
                   
                    $data = $sql->getData("comments", $conditions);
                    $totalpage = $data[1];
                    foreach ($data[0] as $data) {
                        # code...

                    ?>
            <td id="<?php echo $data['com_id'] ?>"> <?php echo $data['name'] ?> </td>   
            <td > <?php echo $data['email'] ?> </td>
            <td>  <?php echo $data['message'] ?> </td>
            <td><a href="../single.php?single=<?php echo $data['post_id'] ?>"><?php echo $data['title'] ?></a></td>
            <td> <?php   if ($data['sta'] == 0) {
                echo "Passive";
            }else{
                echo "Active";
            }  ?> </td>
            <td>
            <?php   if ($data['sta'] == 0) {
                echo '<button type="button" class="btn btn-info my-2 approve" id="'.$data['sta'] .'" value="'.$data['com_id'] .'">
                Approve</button>';
            }  ?> 
             
  <button class="btn btn-warning delete" id="<?php echo $data['com_id'] ?>" value="<?php echo $data['com_id'] ?>">Delete</button>


            </td>

            </tr>

<!-- Button trigger modal -->


                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
   
    <div class="row-">
  <div class="col-md-12 text-center">
  <ul style="list-style: none;">

<?php


for ($page = 1; $page <= $totalpage; $page++) {
  echo '<li style="display:inline;margin:5px;"><a class="pgn__num" href="index.php?page=' . $page . '" >' . $page . '</a></li>';
} ?>



</ul>
  </div>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
  

    let approve = document.querySelectorAll('.approve');
    for (let f = 0; f < approve.length; f++) {
        approve[f].addEventListener("click",(e) =>{
            e.preventDefault();
           let getvalue = approve[f].value;
          
          
            
            let fetch = new Fetch();
            let myob = {
                
                "com_id":getvalue
            };
            let message = "You Have approved comment successfully. You are redirecting home page";
            const catupdate = "catadd.php";
            fetch.setFetch(myob,catupdate,message)

          

          


        })

  
        
        
    }


let deletecat = document.querySelectorAll(".delete");
for (let i = 0; i < deletecat.length; i++) {
    deletecat[i].addEventListener("click",(e) => {
        e.preventDefault();
        let getvalue = deletecat[i].value;
        let fetch = new Fetch();
            let myob = {
                "delcom":getvalue,
                
            };
            let message = "You Have deleted category successfully. You are redirecting home page";
            const catupdate = "catadd.php";
            fetch.setFetch(myob,catupdate,message)
            
    
            
        
    })
    
}
 

</script>

<?php include_once "includes/footer.php" ?>