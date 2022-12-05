<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">ADD BOOK TRX</label>
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

      <form method="post" enctype="multipart/form-data" action="<?= base_url('BookTrx/saveAdd'); ?>">
        <div class="form-group f1">
          <label for="book_id">ID BOOK</label>
          <select class="form-select" name="book_id">
            <?php foreach ($book as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->title ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="member_id">ID MEMBER</label>
          <select class="form-select" name="member_id">
            <?php foreach ($member as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->full_name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="detail_id">ID BORROW DETAIL</label>
          <select class="form-select" name="detail_id">
            <?php foreach ($borrowdetail as $mem) { ?>
              <option value="<?= $mem->id ?>"> DEADLINE DATE :<?= $mem->deadline_at ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="type">TYPE</label>
          <select class="form-select" name="type">
              <option value="fine">FINE</option>
              <option value="borrow">BORROW</option>

          </select>
        </div>
        <div class="form-group f1">
          <label for="price">PRICE</label>
          <input type="text" class="form-control" id="price" name="price">
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