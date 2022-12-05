
  <div class="container-fluid">
    <div class="row cover0">
      <div class="col-lg-4">
        <h1>LOGIN PAGE</h1>
      </div>
    </div>
    <div class="row cover">
      <div class="col-lg-4 alertset">
      <?php echo $this->session->flashdata('msg'); ?>
      </div>
    </div>

    <div class="row cover">
      <div class="col-lg-8 box_login">

        <form action="<?php echo base_url(); ?>Auth/login" method="post">
          <div class="control">
            <div class="line">
              <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="USERNAME">
            </div>
            <div class="line">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="PASSWORD">
            </div>
            <input type="submit" class="btn solid" name="submit" value = "Submit">
          </div>      
        </form>
      </div> 
    </div>
  </div>
 

</body>

</html>