<?php include_once "includes/sidebar.php"; ?>
<?php include_once "includes/header.php"; ?>
<!-- Content Wrapper -->


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus" aria-hidden="true">

</i>Add Category</a></button>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">



                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 107px;">Category</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 107px;">Action</th>
                </thead>

                <tbody>

                    <?php
                    $sql = new Model();
                    $conditions = [


                        "orderby" => "id",
                        "orderedtype" => "DESC"
                    ];
                    $data = $sql->getData("category", $conditions);
                    foreach ($data as $data) {
                        # code...

                    ?>
            <td id="<?php echo $data['id'] ?>"> <?php echo $data['category'] ?> </td>
            <td>
              
                <button type="button" class="btn btn-info my-2 edit " value="<?php echo $data['id'] ?>">Edit</button>
                <button class="btn btn-warning delete" id="<?php echo $data['id'] ?>" value="<?php echo $data['id'] ?>">Delete</button>


            </td>

            </tr>

<!-- Button trigger modal -->


                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <label for="category"> Category</label>
       <input type="text"  id="category">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary category">ADD</button>
      </div>
    </div>
  </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    let category = document.querySelectorAll('.category');
    for (let i = 0; i < category.length; i++) {
        category[i].addEventListener("click", (e) => {
            e.preventDefault();
            let getcat = document.getElementById('category').value;
            
            

            const catadd = "catadd.php";
            let myob = {
                "getcat": getcat
            }
            let message = "You Have added category successfully. You are redirecting home page";
            let fetch = new Fetch;
            fetch.setFetch(myob, catadd, message);


        })

    }

    let edit = document.querySelectorAll('.edit');
    for (let f = 0; f < edit.length; f++) {
        edit[f].addEventListener("click",(e) =>{
            e.preventDefault();
           let getvalue = edit[f].value;
           
           let getid = document.getElementById(getvalue);
           
           
           
           let getval = document.getElementById(getvalue).innerText;
           getid.innerHTML =`
      
       <input type="text" id="${getval}"  >
      <button class="btn btn-success" id="confirm">Confirm</button>
      `;
        let confirm = document.getElementById('confirm');
        confirm.addEventListener("click",(e) => {
            e.preventDefault();
            let myval = document.getElementById(getval).value;
            let fetch = new Fetch();
            let myob = {
                "edit":myval,
                "where":getvalue
            };
            let message = "You Have edited category successfully. You are redirecting home page";
            const catupdate = "catadd.php";
            fetch.setFetch(myob,catupdate,message)

          
            
        })
      

                
                
            
          


        })

  
        
        
    }


let deletecat = document.querySelectorAll(".delete");
for (let i = 0; i < deletecat.length; i++) {
    deletecat[i].addEventListener("click",(e) => {
        e.preventDefault();
        let getvalue = deletecat[i].value;
        let fetch = new Fetch();
            let myob = {
                "id":getvalue,
                
            };
            let message = "You Have deleted category successfully. You are redirecting home page";
            const catupdate = "catadd.php";
            fetch.setFetch(myob,catupdate,message)
            let getdeleted = document.getElementById(i);
    
            
        
    })
    
}
 

</script>

<?php include_once "includes/footer.php" ?>