<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">EDIT LIBRARIAN</label>
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
      <form enctype="multipart/form-data"  method="post" action="<?= base_url('Librarian/saveEdit'); ?>">
      <input type="hidden" class="form-control" value="<?= $librarian->id ?>" id="id" name="id">
        <div class="form-group f1">
          <label for="username">USERNAME</label>
          <input type="text" class="form-control" value="<?= $librarian->username ?>" id="username" name="username">
        </div>

        <div class="form-group f1">
          <label for="name">NAME</label>
          <input type="text" class="form-control" value="<?= $librarian->name ?>" id="name" name="name">
        </div>

        <div class="form-group f1">
          <label for="email">EMAIL</label>
          <input type="text" class="form-control" value="<?= $librarian->email ?>" id="email" name="email">
        </div>

        <div class="form-group f1">
          <label for="password">PASSWORD</label>
          <input type="text" class="form-control" value="<?= $librarian->password ?>" id="password" name="password">
        </div>

        <div class="form-group f1">
        <img src=" <?php echo base_url("/assets/profile/$librarian->avatar") ?>" width="200"/><br>	 
          <label for="nama_laptop">CHANGE AVATAR</label>
          <input type="file" class="form-control" value="<?= $librarian->avatar ?>" id="avatar" name="avatar">
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