<?php include_once "includes/sidebar.php"; ?>
<?php include_once "includes/header.php"; ?>
<!-- Content Wrapper -->


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fa fa-plus" aria-hidden="true"></i>
      Add Post
    </a>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
          <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Image</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 247px;">Text</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 116px;">Title</th>

            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 107px;">Category</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 98px;">Action</th>
          </tr>
        </thead>

        <tbody>

          <?php
          if (!isset($_GET['page'])) {
            $page = 1;
          } else {
            $page = $_GET['page'];
          }

          $totalpage = "";
          $getdata = new Model;
          $sql = [
            "select" => "*,posts.id as postid",
            "leftjoin" => "category",
            "from" => "category_id",
            "to" => "id",
            "orderby" => "id",
            "orderedtype" => "DESC",
            "count" => true,
            "page" => $page,
            "limit" => 6,

          ];



          $data = $getdata->getData("posts", $sql);
          $totalpage = $data[1];
          foreach ($data[0] as $data) {
            # code...

          ?>

            <tr role="row" id="<?php echo $data['postid'] ?>" class="odd">

              <td class="sorting_1"> <img src="img/<?php echo $data['img'] ?>" class="img-fluid" height="100" width="200" alt=""> </td>
              <td><?php echo substr($data['text'], 0, 200) ?></td>
              <td><?php echo $data['title'] ?></td>

              <td> <?php echo $data['category'] ?> </td>
              <td>
                <button class="btn btn-info my-2"><a href="edit.php?edit=<?php echo $data['postid'] ?>">Edit</a></button>
                <button class="btn btn-warning delete" value="<?php echo $data['postid'] ?>">Delete</button>
              </td>

            </tr>
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
  let deletepost = document.querySelectorAll('.delete');
  for (let i = 0; i < deletepost.length; i++) {
    deletepost[i].addEventListener("click", (e) => {
      e.preventDefault();
      let getid = deletepost[i].value;
      const deletephp = "delete.php";
      let myob = {
        "id": getid
      }
      let message = "You Have deleted post successfully";
      let fetch = new Fetch;
      fetch.setFetch(myob, deletephp, message);


    })

  }
</script>

<?php include_once "includes/footer.php" ?>