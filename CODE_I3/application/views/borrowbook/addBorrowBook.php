<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">ADD BORROW BOOK</label>
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

      <form method="post" enctype="multipart/form-data" action="<?= base_url('BorrowBook/saveAdd'); ?>">
        <div class="form-group f1">
          <label for="member_id">ID MEMBER</label>
          <select class="form-select" name="member_id">
            <?php foreach ($member as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->full_name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="trx_date">DATE TRX</label>
          <input type="date" class="form-control" id="trx_date" name="trx_date">
        </div>
        <div class="form-group f1">
          <label for="note">NOTE</label>
          <input type="text" class="form-control" id="note" name="note">
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