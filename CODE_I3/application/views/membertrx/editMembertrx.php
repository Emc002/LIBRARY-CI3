<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">EDIT MEMBER TRX</label>
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
      <form enctype="multipart/form-data"  method="post" action="<?= base_url('Membertrx/saveEdit'); ?>">
      <input type="hidden" class="form-control" value="<?= $membertrx->id ?>" id="id" name="id">
        <div class="form-group f1">
          <label for="member_id">ID MEMBER</label>
          <select class="form-select" name="member_id">
          <?php foreach ($member as $mem) {
            if ($mem->full_name == $membertrx->full_name) {
          ?>
          <option value="<?= $mem->id ?>" selected><?= $mem->id ?> - <?= $membertrx->full_name ?></option>
          <?php } } ?>
            <?php foreach ($member as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->id ?> - <?= $mem->full_name ?></option>
            <?php } ?>
          </select>
        </div>  
        <div class="form-group f1">
          <label for="subs_id">ID SUBSCRIPTION</label>
          <select class="form-select" name="subs_id">
          <?php foreach ($subs as $mem) {
            if ($mem->title == $membertrx->title) {
          ?>
          <option value="<?= $mem->id ?>" selected><?= $mem->id ?> - <?= $membertrx->title ?></option>
          <?php } } ?>
            <?php foreach ($subs as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->id ?> - <?= $mem->title ?></option>
            <?php } ?>
          </select>
        </div>  
        <div class="form-group f1">
          <label for="trx_date">DATE TRX</label>
          <input type="date" class="form-control" value="<?= $membertrx->trx_date ?>" id="trx_date" name="trx_date">
        </div>
        <div class="form-group f1">
          <label for="active_at">ACTIVE AT</label>
          <input type="date" class="form-control" value="<?= $membertrx->active_at ?>" id="active_at" name="active_at">
        </div>
        <div class="form-group f1">
          <label for="status">STATUS</label>
          <select class="form-select" name="status">
            <option value="<?= $membertrx->status ?>" selected><?= $membertrx->status ?></option>
            <option value="paid">PAID</option>
            <option value="unpaid">UNPAID</option>
          </select>
        </div>
        <div class="form-group f1">
          <label for="total_order">TOTAL ORDER</label>
          <input type="text" class="form-control" value="<?= $membertrx->total_order ?>" id="total_order" name="total_order">
        </div>
        <div class="form-group f1">
          <label for="note">NOTE</label>
          <input type="text" class="form-control" value="<?= $membertrx->note ?>" id="note" name="note">
        </div>
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