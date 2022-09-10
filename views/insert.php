<?php include('partials/header.php')  ?>
<div class="container main-wrapper">
   
    <div class="from-wrapper">
    <h1>Address Book</h1>
    <form action="../index.php?act=add" method="post">
      <div class="form-group row mb-30">
        <div class="col-6">
          <label>First Name</label>
          <input type="text" class="form-control" name="first_name"/>
        </div>
        <div class="col-6">
          <label>Last Name</label>
          <input type="text" class="form-control" name="last_name"/>
        </div>
      </div>
      <div class="form-group row mb-30">
        <div class="col-6">
          <label>Email</label>
          <input type="text" class="form-control" name="email"/>
        </div>
        <div class="col-6">
          <label>Street</label>
          <input type="text" class="form-control" name="street"/>
        </div>
      </div>
      <div class="form-group row mb-30">
        <div class="col-6">
          <label>Zip Code</label>
          <input type="text" class="form-control" name="zip_code"/>
        </div>
        <div class="col-6">
          <label>City</label>
          <select class="form-control" name="city">
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
        </div>
      </div>
        <button  type="submit" name="addbtn" class="btn btn-primary">Submit</button>
    </form>
    </div>
   
</div>
<?php include('partials/footer.php')  ?>
