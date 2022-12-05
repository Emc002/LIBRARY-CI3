<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">EDIT BORROW RETURN</label>
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
      <form enctype="multipart/form-data"  method="post" action="<?= base_url('BorrowReturn/saveEdit'); ?>">
      <input type="hidden" class="form-control" value="<?= $borrowreturn->id ?>" id="id" name="id">
      <div class="form-group f1">
          <label for="book_id">ID BOOK</label>
          <select class="form-select" name="book_id">
          <option value="<?= $borrowreturn->id ?>" selected><?= $borrowreturn->id ?> - <?= $borrowreturn->title ?></option>
            <?php foreach ($book as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->title ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="detail_id">ID BORROW DETAIL</label>
          <select class="form-select" name="detail_id">
          <option value="<?= $borrowreturn->id ?>" selected><?= $borrowreturn->id ?> - <?= $borrowreturn->deadline_at ?></option>
            <?php foreach ($borrowreturnAll as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->deadline_at ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="return_at">RETURN AT</label>
          <input type="date" class="form-control" value="<?= $borrowreturn->return_at ?>" id="return_at" name="return_at">
        </div>
        <div class="form-group f1">
          <label for="note">NOTE</label>
          <textarea type="text" class="form-control" id="note" name="note"><?= $borrowreturn->note ?></textarea>
        </div>
          <input type="hidden" class="form-control datepicker" value="<?php echo $arrivalString; ?>"  id="updated_at" name="updated_at">      
        <div class="form-group f1">

          <a href="#" class="btn btn-warning">Back</a>
          <input type="submit" class="btn btn-primary" value="upload">
        </div>

      </form>

    </div>
  </div>
</div>