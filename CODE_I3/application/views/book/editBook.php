<div class="container-fluid psion">
  <div class="boxcreate col-12">
    <label class="headtitle">EDIT BOOK</label>
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
      <form enctype="multipart/form-data"  method="post" action="<?= base_url('Book/saveEdit'); ?>">
      <input type="hidden" class="form-control" value="<?= $book->id ?>" id="id" name="id">
        <div class="form-group f1">
          <label for="isbn">ISBN</label>
          <input type="text" class="form-control" value="<?= $book->isbn ?>" id="isbn" name="isbn">
        </div>
        <div class="form-group f1">
          <label for="title">TITLE</label>
          <input type="text" class="form-control" value="<?= $book->title ?>" id="title" name="title">
        </div>
        <div class="form-group f1">
          <label for="synopsis">SYNOPSIS</label>
          <textarea type="text" class="form-control" id="synopsis" name="synopsis"><?= $book->synopsis ?></textarea>
        </div>
        <div class="form-group f1">
          <label for="author">AUTHOR</label>
          <input type="text" class="form-control" value="<?= $book->author ?>" id="author" name="author">
        </div>
        <div class="form-group f1">
          <label for="publisher">PUBLISHER</label>
          <input type="text" class="form-control" value="<?= $book->publisher ?>" id="publisher" name="publisher">
        </div>
        <div class="form-group f1">
          <label for="category">CATEGORY</label>
          <input type="text" class="form-control" value="<?= $book->category ?>" id="category" name="category">
        </div>
        <div class="form-group f1">
          <label for="language">LANGUAGES</label>
          <input type="text" class="form-control" value="<?= $book->language ?>" id="language" name="language">
        </div>

        <div class="form-group f1">
        <img src=" <?php echo base_url("/assets/cover/$book->cover") ?>" width="200"/><br>	 
          <label for="cover">CHANGE COVER</label>
          <input type="file" class="form-control" value="<?= $book->cover ?>" id="cover" name="cover">
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