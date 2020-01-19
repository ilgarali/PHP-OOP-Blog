class Fetch{
    setFetch(myob,phpadress,message){
        this.myob = myob;
        this.phpadress = phpadress;
        this.message = message;
       
       
        let formData = new FormData;
        let objectkeys = Object.keys(myob);
 
        let objectvalues = Object.values(myob);
        for (let i = 0; i < objectvalues.length; i++) {
            if (objectkeys[i] =="img") {
  
                formData.append(objectkeys[i],objectvalues[i].files[0]);
              
                
            }
            else{
                formData.append(objectkeys[i],objectvalues[i]);
            }
            
        }
        fetch(this.phpadress,{
            method:"post",
            body:formData
        }).then((res) => res.json())
        .then((res) => {if (res.res) {
            toastr.success(this.message);
            setTimeout(() => {
                window.location.href = "index.php";
            }, 2222);
        }})
        .catch((error) => console.log(error) );
        
    }
}