<?php include_once "includes/sidebar.php"; ?>
<?php include_once "includes/header.php"; ?>
    <!-- Content Wrapper -->


  
<div class="container">
	<div class="row">
	    
	    <div class="col-md-12">
	        
    		<h1>Create post</h1>
    		
    		<form enctype="multipart/form-data" id="add" >
    		    
    		  
    		    
    		    <div class="form-group">
    		        <label for="title">Title <span class="require">*</span></label>
    		        <input type="text" class="form-control" id="title" />
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="category" >
                       <?php 
                       $category = new Model();
                       $conditions=["select" => "name"];
                       $data = $category->getData("category");
                       foreach ($data as $data) {
                           # code...
                       
                       ?> 
                    <option value="<?php echo $data['id'] ?>"> <?php echo $data['category'] ?> </option>
                    <?php  } ?>
                    </select>
            </div>

            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="slide"  value="1">Slide
                </label>
            </div>
               
    		    
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea id="text"  rows="5" class="form-control"></textarea>
                </div>

                
                <div class="form-group">
    		        <label for="description">Image</label>
    		        <input type="file" class="form-control" id="img" />
    		    </div>
                <div class="form-group">
    		        <label for="description">Tags</label>
    		        <input type="text" class="form-control" id="tags" placeholder="Enter tags use comma between them" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <p><span class="require">*</span> - required fields</p>
    		    </div>
    		    
    		    <div class="form-group">
    		        <button type="submit" id="submit"  class="btn btn-primary">
    		            Create
    		        </button>
    		        <button class="btn btn-default">
    		            <a href="index.php">Cancel</a>
    		        </button>
    		    </div>
    		    
    		</form>
		</div>
		
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
    let slide = document.getElementById('slide').value;
    let text = document.getElementById('text').value;
    let img = document.getElementById('img');
    let message = "You have added post successfully";
    let tags = document.getElementById("tags").value;
    
    const phpadress = "added.php";
    let myob = {
        "title":title,
        "category":category,
        "slide":slide,
        "text":text,
        "img":img,
        "tags":tags
    }
    let fetch = new Fetch();
    fetch.setFetch(myob,phpadress,message);

})

</script>


<?php include_once "includes/footer.php" ?>