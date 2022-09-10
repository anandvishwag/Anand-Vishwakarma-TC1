<?php include('partials/header.php')  ?>
<div class="container main-wrapper">
    <h1>Address Book</h1>
    <div class="row">
      <div class="col-4">
      <a href="views/insert.php" class="btn btn-success">Add New</a>
      </div>
      <div class="col-4 text-left">
        <form action="index.php?act=filterByCity" method="post" >
          <div class="d-flex">
          <select class="form-control" name="key">
             <option value="">---Select Country---</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Delhi">Delhi</option>
            <option value="Bangalore">Bangalore</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Ahmedabad">Ahmedabad</option>
            <option value="Chennai">Chennai</option>
            <option value="Kolkata">Kolkata</option>
            <option value="Surat">Surat</option>
            <option value="Pune">Pune</option>
            <option value="Jaipur">Jaipur</option>
            <option value="Lucknow">Lucknow</option>
          </select>
          <button type="submit" class="btn btn-info">Go</button>
          </div>
        
         </form>

      </div>
      <div class="col-4 text-right">
        <a href="index.php?act=exportToJson" class="btn btn-primary">Export to Json</a> 
        <a href="index.php?act=exportToXml" class="btn btn-primary">Export to XML</a> 
      </div>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Street</th>
      <th scope="col">Zip code</th>
      <th scope="col">City</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>  
  <?php  
  foreach ($userArr  as $key => $value) { ?>
     <tr>
        <th scope="row"><?php echo ++$key; ?></th>
        <td><?php echo $value['first_name'] ?></td>
        <td><?php echo $value['last_name'] ?></td>
        <td><?php echo $value['email'] ?></td>
        <td><?php echo $value['street'] ?></td>
        <td><?php echo $value['zip_code'] ?></td>
        <td><?php echo $value['city'] ?></td>
        <td><a href="index.php?act=update&id=<?php echo $value['id'] ?>"  class="btn btn-info btn-sm">Edit</a> | <a href="index.php?act=delete&id=<?php echo $value['id'] ?>"  class="btn btn-danger btn-sm">Delete</a></td>
      </tr>
   <?php   }?> 
  </tbody>
</table>
</div>
<?php include('partials/footer.php')  ?>
