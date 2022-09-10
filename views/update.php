<?php include('partials/header.php')  ?>
<div class="container main-wrapper">
   
    <div class="from-wrapper">
    <h1>Update Address Book</h1>
    <form action="../test-project/index.php?act=update" method="post">
    <input type="hidden" class="form-control" name="id" value="<?php echo $result['id'] ?>"/>
      <div class="form-group row mb-30">
        <div class="col-6">
          <label>First Name</label>
          <input type="text" class="form-control" name="first_name" value="<?php echo $result['first_name'] ?>"/>
        </div>
        <div class="col-6">
          <label>Last Name</label>
          <input type="text" class="form-control" name="last_name" value="<?php echo $result['last_name'] ?>"/>
        </div>
      </div>
      <div class="form-group row mb-30">
        <div class="col-6">
          <label>Email</label>
          <input type="text" class="form-control" name="email" value="<?php echo $result['email'] ?>"/>
        </div>
        <div class="col-6">
          <label>Street</label>
          <input type="text" class="form-control" name="street" value="<?php echo $result['street'] ?>"/>
        </div>
      </div>
      <div class="form-group row mb-30">
        <div class="col-6">
          <label>Zip Code</label>
          <input type="text" class="form-control" name="zip_code" value="<?php echo $result['zip_code'] ?>"/>
        </div>
        <div class="col-6">
          <label>City</label>
          <select class="form-control" name="city">
             <option value="">---Select Country---</option>
            <option value="Mumbai" <?php if ($result['city'] == 'Mumbai') echo ' selected="selected"'; ?>>Mumbai</option>
            <option value="Delhi" <?php if ($result['city'] == 'Delhi') echo ' selected="selected"'; ?>>Delhi</option>
            <option value="Bangalore"  <?php if ($result['city'] == 'Bangalore') echo ' selected="selected"'; ?>>Bangalore</option>
            <option value="Hyderabad" <?php if ($result['city'] == 'Hyderabad') echo ' selected="selected"'; ?>>Hyderabad</option>
            <option value="Ahmedabad" <?php if ($result['city'] == 'Ahmedabad') echo ' selected="selected"'; ?>>Ahmedabad</option>
            <option value="Chennai" <?php if ($result['city'] == 'Chennai') echo ' selected="selected"'; ?>>Chennai</option>
            <option value="Kolkata" <?php if ($result['city'] == 'Kolkata') echo ' selected="selected"'; ?>>Kolkata</option>
            <option value="Surat" <?php if ($result['city'] == 'Surat') echo ' selected="selected"'; ?>>Surat</option>
            <option value="Pune" <?php if ($result['city'] == 'Pune') echo ' selected="selected"'; ?>>Pune</option>
            <option value="Jaipur" <?php if ($result['city'] == 'Jaipur') echo ' selected="selected"'; ?>>Jaipur</option>
            <option value="Lucknow" <?php if ($result['city'] == 'Lucknow') echo ' selected="selected"'; ?>>Lucknow</option>
          </select>
        </div>
      </div>
        <button  type="submit" name="updateBtn" class="btn btn-primary">Submit</button>
    </form>
    </div>
   
</div>
<?php include('partials/footer.php')  ?>
