<div class="col-lg-10 divtwo">
	<div class="row setting noxy">
		<div class="col-lg-12 two">
		<div class="row">
				<div class="col-7">
					<h1>BOOK TRX DASHBOARD
						WELCOME <?= $current_user->name ?>
					</h1>
					<p><?= $current_user->email ?></p>
				</div>
				<div class="col-5">
					<?php
					$avatar = $current_user->avatar ?
						base_url('assets/profile/' . $current_user->avatar)
						: get_gravatar($current_user->email)
					?>
					<div class="navigation">
						<a class="button" href="<?= base_url('auth/logout'); ?>">
							<img class="account-img" src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>">
							<div class="logout">LOG OUT</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-12 box6 nox table-responsive">
			<h4>BOOK TRX TABLE</h4>
			<table class="table librarianTable table-light table-info table-hover table-bordered">
				<a href="<?= base_url('BookTrx/add'); ?>" type="button" class="btn btn-secondary">ADD BOOK TRX</a>
				<thead>
					<tr>
						<th>NO</th>
						<th>TITLE</th>
						<th>NAME</th>
						<th>DEADLINE AT</th>
						<th>TYPE</th>
						<th>PRICE</th>
						<th>CREATED_AT</th>
						<th>UPDATED_AT</th>
						<th>ACTION</th>
					</tr>
				</thead>

				<tbody>

					<?php
					$N = 1;
					foreach ($booktrx as $td) {
					?>
						<tr>
							<td>
								<?php echo $N++ ?>
							</td>
              <!-- table book -->
              <td>
								<?php echo $td->title ?>
							</td>
              <!-- table member -->
							<td>
								<?php echo $td->full_name ?>
							</td>
               <!-- table borrow detail -->
							<td>
								<?php echo $td->deadline_at ?>
							</td>
							<td>
								<?php echo $td->type ?>
							</td>
							<td>
								<?php echo $td->price ?>
							</td>
							<td>
								<?php echo $td->created_at ?>
							</td>
							<td>
								<?php echo $td->updated_at ?>
							</td>
							<td>
								<a href="<?php echo base_url(); ?>BookTrx/edit/<?php echo $td->id; ?>" type="button" class="btn btn-warning">EDIT</a>
								<a href="<?php echo base_url(); ?>BookTrx/delete/<?php echo $td->id; ?>" type="button" class="btn btn-danger">DELETE</a>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
</div>
<script>
	 let s1 = document.querySelector('#s6')
       s1.classList.toggle('stayIn');
</script>