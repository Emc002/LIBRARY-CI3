<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">ADD LIBRARIAN</label>
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

      <form method="post" enctype="multipart/form-data" action="<?= base_url('Librarian/saveAdd'); ?>">
        <div class="form-group f1">
          <label for="username">USERNAME</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="form-group f1">
          <label for="name">NAME</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group f1">
          <label for="email">EMAIL</label>
          <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="form-group f1">
          <label for="password">PASSWORD</label>
          <input type="text" class="form-control" id="password" name="password">
        </div>

        <div class="form-group f1">
          <label for="avatar">AVATAR</label>
          <input type="file" class="form-control" id="avatar" name="avatar">
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