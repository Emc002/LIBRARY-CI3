<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">ADD SUBSCRIPTION</label>
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

      <form method="post" enctype="multipart/form-data" action="<?= base_url('Subs/saveAdd'); ?>">
        <div class="form-group f1">
          <label for="title">TITLE</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group f1">
          <label for="month">MONTH</label>
          <input type="text" class="form-control" id="month" name="month">
        </div>

        <div class="form-group f1">
          <label for="price">PRICE</label>
          <input type="text" class="form-control" id="price" name="price">
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

          <a href="#" class="btn btn-warning">Back</a>
          <input type="submit" class="btn btn-primary" value="upload">
        </div>

      </form>

    </div>
  </div>
</div>