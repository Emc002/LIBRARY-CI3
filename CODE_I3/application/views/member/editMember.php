<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">EDIT MEMBER</label>
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
      <form enctype="multipart/form-data"  method="post" action="<?= base_url('Member/saveEdit'); ?>">
      <input type="hidden" class="form-control" value="<?= $member->id ?>" id="id" name="id">
      <div class="form-group f1">
          <label for="nik">NIK</label>
          <input type="text" class="form-control" value="<?= $member->nik ?>" id="nik" name="nik">
        </div>
        <div class="form-group f1">
          <label for="full_name">FULL NAME</label>
          <input type="text" class="form-control" value="<?= $member->full_name ?>" id="full_name" name="full_name">
        </div>
        <div class="form-group f1">
          <label for="phone">PHONE</label>
          <input type="text" class="form-control" value="<?= $member->phone ?>" id="phone" name="phone">
        </div>
        <div class="form-group f1">
          <label for="address">ADDRESS</label>
          <input type="text" class="form-control" value="<?= $member->address ?>" id="address" name="address">
        </div>
        <div class="form-group f1">
          <label for="born_place">BORN PLACE</label>
          <input type="text" class="form-control" value="<?= $member->born_place ?>" id="born_place" name="born_place">
        </div>
        <div class="form-group f1">
          <label for="born_date">BORN DATE</label>
          <input type="date" class="form-control" value="<?= $member->born_date ?>" id="born_date" name="born_date">
        </div>
        <div class="form-group f1">
          <label for="gender">GENDER</label>
          <select class="form-select" name="gender">
            <option value="<?= $member->gender ?>" selected><?= $member->gender ?></option>
            <option value="L">MALE</option>
            <option value="P">FEMALE</option>
          </select>
        </div>
        <div class="form-group f1">
          <label for="country">COUNTRY</label>
          <input type="text" class="form-control" value="<?= $member->country ?>" id="country" name="country">
        </div>
        <div class="form-group f1">
          <label for="nationality">NATIONALITY</label>
          <select class="form-select" name="nationality">
            <option value="<?= $member->nationality ?>" selected><?= $member->nationality ?></option>
            <option value="WNI">WNI</option>
          </select>
        </div>
        <div class="form-group f1">
          <label for="status">STATUS</label>
          <select class="form-select" name="status">
            <option value="<?= $member->status ?>" selected><?= $member->status ?></option>
            <option value="active">ACTIVE</option>
            <option value="non active">NON ACTIVE</option>
          </select>
        </div>
          <input type="hidden" class="form-control datepicker" value="<?php echo $arrivalString; ?>"  id="updated_at" name="updated_at">      
        <div class="form-group f1">

          <a href="#" class="btn btn-warning">Back</a>
          <input type="submit" class="btn btn-primary" value="submit">
        </div>

      </form>
      
    </div>
  </div>
</div>