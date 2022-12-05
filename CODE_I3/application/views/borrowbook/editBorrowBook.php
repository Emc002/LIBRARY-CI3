<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">EDIT BORROW BOOK</label>
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
      <form enctype="multipart/form-data"  method="post" action="<?= base_url('BorrowBook/saveEdit'); ?>">
      <input type="hidden" class="form-control" value="<?= $borrowbook->id ?>" id="id" name="id">
        <div class="form-group f1">
          <label for="member_id">ID MEMBER</label>
          <select class="form-select" name="member_id">
          <option value="<?= $borrowbook->id ?>" selected><?= $borrowbook->member_id ?> - <?= $borrowbook->full_name ?></option>
            <?php foreach ($member as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->full_name ?></option>
            <?php } ?>
          </select>
        </div> 
        <div class="form-group f1">
          <label for="trx_date">DATE TRX</label>
          <input type="date" class="form-control" value="<?= $borrowbook->trx_date ?>"  id="trx_date" name="trx_date">
        </div>
        <div class="form-group f1">
          <label for="note">NOTE</label>
          <textarea type="text" class="form-control" id="note" name="note"><?= $borrowbook->note ?></textarea>
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