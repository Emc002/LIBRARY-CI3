<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">ADD BOOK</label>
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

      <form method="post" enctype="multipart/form-data" action="<?= base_url('Book/saveAdd'); ?>">
        <div class="form-group f1">
          <label for="cover">COVER</label>
          <input type="file" class="form-control" id="cover" name="cover">
        </div>
        <div class="form-group f1">
          <label for="isbn">ISBN</label>
          <input type="text" class="form-control" id="isbn" name="isbn">
        </div>
        <div class="form-group f1">
          <label for="title">TITLE</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group f1">
          <label for="synopsis">SYNOPSIS</label>
          <input type="text" class="form-control" id="synopsis" name="synopsis">
        </div>
        <div class="form-group f1">
          <label for="author">AUTHOR</label>
          <input type="text" class="form-control" id="author" name="author">
        </div>
        <div class="form-group f1">
          <label for="publisher">PUBLISHER</label>
          <input type="text" class="form-control" id="publisher" name="publisher">
        </div>
        <div class="form-group f1">
          <label for="category">CATEGORY</label>
          <input type="text" class="form-control" id="category" name="category">
        </div>
        <div class="form-group f1">
          <label for="language">LANGUAGES</label>
          <input type="text" class="form-control" id="language" name="language">
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