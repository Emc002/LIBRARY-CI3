<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">EDIT BORROW DETAIL</label>
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
      <form enctype="multipart/form-data"  method="post" action="<?= base_url('BorrowDetail/saveEdit'); ?>">
      <input type="hidden" class="form-control" value="<?= $borrowdetail->id ?>" id="id" name="id">
        <div class="form-group f1">
          <label for="book_id">ID BOOK</label>
          <select class="form-select" name="book_id">
          <?php foreach ($book as $mem) {
            if ($mem->title == $borrowdetail->title) {
          ?>
          <option value="<?= $mem->id ?>" selected><?= $mem->id ?> - <?= $borrowdetail->title ?></option>
          <?php } } ?>
            <?php foreach ($book as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->id ?> - <?= $mem->title ?></option>
            <?php } ?>
          </select>
        </div>  
        <div class="form-group f1">
          <label for="borrow_id">ID BORROW BOOK</label>
          <select class="form-select" name="borrow_id">
          <option value="<?= $borrowdetail->id ?>" selected><?= $borrowdetail->id ?> - <?= $borrowdetail->full_name ?></option>
            <?php foreach ($borrowbook as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->full_name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="deadline_at">DEADLINE AT</label>
          <input type="text" class="form-control" value="<?= $borrowdetail->deadline_at ?>" id="deadline_at" name="deadline_at">
        </div>
        <div class="form-group f1">
          <label for="note">NOTE</label>
          <input type="text" class="form-control" id="note" value="<?= $borrowdetail->note ?>" name="note"></input>
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