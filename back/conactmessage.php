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
                        aria-label="Start date: activate to sort column ascending" style="width: 107px;">Website</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" 
                        aria-label="Start date: activate to sort column ascending" style="width: 107px;">Posted At</th>
                      
                </thead>

                <tbody>

                    <?php
                    $sql = new Model();
                    $conditions = [
                        
                        "orderby" => "id",
                        "orderedtype" => "DESC"
                    ];
                    $data = $sql->getData("contact  ", $conditions);
                    foreach ($data as $data) {
                        # code...

                    ?>
            <td id="<?php echo $data['com_id'] ?>"> <?php echo $data['name'] ?> </td>   
            <td > <?php echo $data['email'] ?> </td>
            <td>  <?php echo $data['message'] ?> </td>
            <td> <?php echo $data['website'] ?>  </td>
            <td> <?php echo $data['created_at'] ?>  </td>
        

            </tr>

<!-- Button trigger modal -->


                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
   


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
  


</script>

<?php include_once "includes/footer.php" ?>