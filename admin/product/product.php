<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="product-style.css">
    <script src="https://kit.fontawesome.com/cee04f8a65.js" crossorigin="anonymous"></script>
  </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-primary mt-3">

  <form action="insert.php" method="POST" enctype="multipart/form-data">     
<div class="mb-3">
    <p class=" product text-primary text-center fw-bold fs-3">Product Detail:</p>
</div>
<div class="mb-3">
  <label class="form-label">Product Name:</label>
  <input type="text" name="pname" class="form-control"  placeholder="Enter product name">
</div>
<div class="mb-3">
  <label class="form-label">Product Price:</label>
  <input type="text" name="pprice" class="form-control"  placeholder="Enter product price">
</div>
<div class="mb-3">
  <label class="form-label">Product image:</label>
  <input type="file"name="pimage"class="form-control">
</div>
<div class="mb-3">
  <label class="form-label">Product Details:</label>
  <input type="text" name="pdetails" class="form-control"  placeholder="Enter product details">
</div>
<div class="mb-3">
  <label class="form-label">Select Page Category:</label>
  <select class="form-select" aria-label="Default select example" name="pages">
  <option selected value="Sales">Today's sales</option>
  <option value="Home">Home</option>
  <option value="Apple">Keyboard</option>
  <option value="Printer">Printer</option>
  <option value="Laptop">Laptop</option>
  <option value="Adapter">Adapter</option>
  <option value="Monitor">Monitor</option>
  <option value="Bag">Bag</option>
  <option value="Mouse">Mouse</option>
  <option value="Headsets">Headsets</option>
  <option value="Keyboard">Keyboard</option>
  <!-- <option value="Adapters">Adapters</option>
  <option value="Headsets">Headsets</option>
  <option value="Microphones">Microphones</option> -->
</select>
</div>
<button name="submit" class="text-white bg-primary fs-4 fw-bold my-3 form-control">Upload</button>
</form> 
</div>
        </div></div>
    
             <!-- Display data
             <div class="container">
              <div class="row">
                <div class="col-md-8 m-auto">
                <table class="table table-bordered border-dark text-center table-hover my-5">
             <!-- <table class="border-5px text-center table-hover border my-5"> -->
            <!-- <thead class="bg-primary fs-5 font-monospace text-white"> -->
  <!-- <thead class= "bg-primary text-light fs-5 font-monospace text-center"> -->
    <!-- <th scope="col" class="py-2">Id</th>
    <th scope="col" class="py-2">Name</th>
    <th scope="col" class="py-2">Price </th>
    <th scope="col" class="py-2">Image</th>
    <th scope="col" class="py-2">Details</th>
    <th scope="col" class="py-2">Category</th>
    <th scope="col" class="py-2">Update</th>
    <th scope="col" class="py-2">Delete</th>
</thead>
<td> <a href=""> </a></td>
<tbody>
  <?php 
//   include'conn.php';
// $Record = mysqli_query($conn,"SELECT * FROM `productdetails`");
// while($row = mysqli_fetch_array($Record))
// echo"
// <tr>
//   <td>$row[id]</td>
//   <td>$row[pname]</td>
//   <td>$row[pprice]</td>
//   <td><img src='$row[pimage]' height='100px' width='150px'></td>
//   <td>$row[pdetails]</td>
//   <td>$row[pcategory]</td>
//   <td> <a href=''class='btn-success rounded btn-sm text-decoration-none text-light '>Update </a></td>
//   <td> <a href=''class='btn-success rounded btn-sm text-decoration-none'>Delete </a></td>
// </tr>
// ";
//   ?>
</tbody class="text-center">
</table>
</div>
              </div>
             </div> --> -->
       
</body>
</html>