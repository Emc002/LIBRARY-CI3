<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">ADD BORROW RETURN</label>
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

      <form method="post" enctype="multipart/form-data" action="<?= base_url('BorrowReturn/saveAdd'); ?>">
      <div class="form-group f1">
          <label for="book_id">ID BOOK</label>
          <select class="form-select" name="book_id">
            <?php foreach ($book as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->title ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="detail_id">ID BORROW DETAIL</label>
          <select class="form-select" name="detail_id">
            <?php foreach ($borrowdetail as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->id ?> DEADLINE DATE : <?= $mem->deadline_at ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="return_at">RETURN AT</label>
          <input type="date" class="form-control" id="return_at" name="return_at">
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