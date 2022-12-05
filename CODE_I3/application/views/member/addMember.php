<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">ADD MEMBER</label>
    <?php
$arrival = new DateTime();
$arrivalString = $arrival->format("Y-m-d H:i:s");
?>

    <div class="">
    <?php 
			if(validation_errors() != false)
			{
				?>
				<div class="alert alert-danger" role="alert">
					<?php echo validation_errors(); ?>
				</div>
				<?php
			}
			?>
      <form method="post" enctype="multipart/form-data" action="<?= base_url('Member/saveAdd'); ?>">
        <div class="form-group f1">
          <label for="nik">NIK</label>
          <input type="text" class="form-control" id="nik" name="nik">
        </div>
        <div class="form-group f1">
          <label for="full_name">FULL NAME</label>
          <input type="text" class="form-control" id="full_name" name="full_name">
        </div>
        <div class="form-group f1">
          <label for="phone">PHONE</label>
          <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group f1">
          <label for="address">ADDRESS</label>
          <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="form-group f1">
          <label for="born_place">BORN PLACE</label>
          <input type="text" class="form-control" id="born_place" name="born_place">
        </div>
        <div class="form-group f1">
          <label for="born_date">BORN DATE</label>
          <input type="date" class="form-control" id="born_date" name="born_date">
        </div>
        <div class="form-group f1">
          <label for="gender">GENDER</label>
          <select class="form-select" name="gender">
            <option value="none" selected>Gender</option>
            <option value="L">MALE</option>
            <option value="P">FEMALE</option>
          </select>
        </div>
        <div class="form-group f1">
          <label for="country">COUNTRY</label>
          <input type="text" class="form-control" id="country" name="country">
        </div>
        <div class="form-group f1">
          <label for="nationality">NATIONALITY</label>
          <select class="form-select" name="nationality">
            <option value="none" selected>NONE</option>
            <option value="WNI">WNI</option>
          </select>
        </div>
        <div class="form-group f1">
          <label for="status">STATUS</label>
          <select class="form-select" name="status">
            <option value="none" selected>STATUS</option>
            <option value="active">ACTIVE</option>
            <option value="non activeP">NON ACTIVE</option>
          </select>
        </div>
          <input type="hidden" class="form-control datepicker" value="<?php echo $arrivalString; ?>"  id="created_at" name="created_at">      
        <div class="form-group f1">
          <input type="submit" class="btn btn-primary" value="SUBMIT">
        </div>
      </form>
    </div>
  </div>
</div>