<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">EDIT SUBSCRIPTION</label>
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
      <form enctype="multipart/form-data"  method="post" action="<?= base_url('Subs/saveEdit'); ?>">
      <input type="hidden" class="form-control" value="<?= $subs->id ?>" id="id" name="id">
        <div class="form-group f1">
          <label for="title">TITLE</label>
          <input type="text" class="form-control" value="<?= $subs->title ?>" id="title" name="title">
        </div>

        <div class="form-group f1">
          <label for="month">MONTH</label>
          <input type="text" class="form-control" value="<?= $subs->month ?>" id="month" name="month">
        </div>

        <div class="form-group f1">
          <label for="price">PRICE</label>
          <input type="text" class="form-control" value="<?= $subs->price ?>" id="price" name="price">
        </div>

        <div class="form-group f1">
          <label for="status">STATUS</label>
          <select class="form-select" name="status">
            <option value="<?= $subs->status ?>" selected><?= $subs->status ?></option>
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