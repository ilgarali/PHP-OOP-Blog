<?php include_once "includes/sidebar.php"; ?>
<?php include_once "includes/header.php"; ?>
    <!-- Content Wrapper -->


  
<div class="container">
	<div class="row">
    <?php 
                       $sql = new Model();
                       $edit = $_GET['edit'];
                       $where = ['posts.id'=>$edit];
                       $conditions=[
                        "select"=>"*,posts.id as postid",
                           "leftjoin" => "category",
                           "from"=>"category_id",
                           "to"=>"id"];
                       $data = $sql->getData("posts",$conditions,$where);
                     
                       foreach ($data as $data) {
                           # code...
                       
                       ?> 
	    <div class="col-md-12">
	        
    		<h1>Edit post</h1>
    		
    		<form enctype="multipart/form-data" id="add" >
    		    
    		  
    		    
    		    <div class="form-group">
    		        <label for="title">Title <span class="require">*</span></label>
    		        <input type="text" class="form-control" id="title" value="<?php echo $data['title'] ?>" />
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="category" >
                      
                    <option  value="<?php echo $data['id'] ?>"> <?php echo $data['category'] ?> </option>
                    <?php $category = new Model();
                              $cat = $category->getData("category");
                            foreach ($cat as $cat) { ?>
                                <option value="<?php echo $cat['id'] ?>"> <?php echo $cat['category'] ?> </option>
                               
                               <?php  }

                        ?>
                    </select>
            </div>

            <div class="form-check-inline">
                <label class="form-check-label">
                    <input value="<?php echo $data['status'] ?>" type="checkbox" class="form-check-input" id="slide"  >Slide
                </label>
            </div>
               
    		    
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea  id="text"  rows="5" class="form-control"><?php echo $data['text'] ?> </textarea>
                </div>

                
                <div class="form-group">
    		        <label for="description">Image</label>
    		        <input type="file" class="form-control" id="img" value="<?php echo $data['img'] ?>"  />
    		    </div>
                <div class="form-group">
    		        <label for="description">Tags</label>
    		        <input type="text" class="form-control" value="<?php echo $data['tags'] ?>" id="tags" placeholder="Enter tags use comma between them" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <p><span class="require">*</span> - required fields</p>
    		    </div>
    		    
    		    <div class="form-group">
                    <input type="hidden" id="getid" value="<?php echo $data['postid'] ?>">
    		        <button type="submit" id="submit"  class="btn btn-primary">
    		            Create
    		        </button>
    		        <button class="btn btn-default">
    		            <a href="index.php">Cancel</a>
    		        </button>
    		    </div>
    		    
    		</form>
		</div>
		<?php  } ?>
	</div>
</div>

       
        </div>
        <!-- /.container-fluid -->
        
        <script>
let add = document.getElementById("add");
add.addEventListener("submit",(e) => {
    e.preventDefault();

    let title = document.getElementById('title').value;
    let category = document.getElementById('category').value;
  
    
    let getid = document.getElementById('getid').value;
   
    
    let slide = document.getElementById('slide');
    let status =1;
    if (slide.checked) {
        status = 2;
    }
 
    
    let text = document.getElementById('text').value;
    let img = document.getElementById('img');
    let message = "You have updated post successfully";
    let tags = document.getElementById("tags").value;
    
    const phpadress = "edited.php";
    let myob = {
        "title":title,
        "category":category,
        "status":status,
        "text":text,
        "img":img,
        "tags":tags,
        "id":getid
    }
    let fetch = new Fetch();
    fetch.setFetch(myob,phpadress,message);

})

</script>



<?php include_once "includes/footer.php" ?>