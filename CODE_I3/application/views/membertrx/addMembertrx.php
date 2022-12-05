<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">ADD MEMBER TRX</label>
    <?php
    $arrival = new DateTime();
    $arrivalString = $arrival->format("Y-m-d");
    ?>

    <div class="">
      <?php
      if (validation_errors() != false) {
      ?>
        <div class="alert alert-danger" role="alert">
          <?php echo validation_errors(); ?>
        </div>
      <?php
      }
      ?>
      <form method="post" enctype="multipart/form-data" action="<?= base_url('Membertrx/saveAdd'); ?>">
        <div class="form-group f1">
          <label for="member_id">ID MEMBER</label>
          <select class="form-select" name="member_id">
            <?php foreach ($member as $mem) { ?>
              <option value="<?= $mem->id ?>"><?= $mem->full_name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="subs_id">ID SUBSCRIPTION</label>
          <select class="form-select" name="subs_id">
            <?php foreach ($subs as $s) { ?>
              <option value="<?= $s->id ?>"><?= $s->title ?></option>
              <?php } ?>
          </select>
        </div>
        <div class="form-group f1">
          <label for="trx_date">DATE TRX</label>
          <input type="date" class="form-control" id="trx_date" name="trx_date">
        </div>
        <div class="form-group f1">
          <label for="active_at">ACTIVE AT</label>
          <input type="date" class="form-control" id="active_at" name="active_at">
        </div>
        <div class="form-group f1">
          <label for="status">STATUS</label>
          <select class="form-select" name="status">
            <option value="none" selected>STATUS</option>
            <option value="piad">PAID</option>
            <option value="unpaid">UNPAID</option>
          </select>
        </div>
        <div class="form-group f1">
          <label for="total_order">TOTAL ORDER</label>
          <input type="text" class="form-control" id="total_order" name="total_order">
        </div>
        <div class="form-group f1">
          <label for="note">NOTE</label>
          <input type="text" class="form-control" id="note" name="note">
        </div>
        <input type="hidden" class="form-control datepicker" value="<?php echo $arrivalString; ?>" id="created_at" name="created_at">
        <div class="form-group f1">
          <input type="submit" class="btn btn-primary" value="upload">
        </div>
      </form>
    </div>
  </div>
</div>