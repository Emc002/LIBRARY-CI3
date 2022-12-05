<div class="col-lg-10 divtwo">
	<div class="row setting noxy">
		<div class="col-lg-12 two">
			<div class="row">
				<div class="col-7">
					<h1>BORROW RETURN DASHBOARD
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
			<h4>BORROW RETURN TABLE</h4>
			<table class="table librarianTable table-light table-info table-hover table-bordered">
				<a href="<?= base_url('BorrowReturn/add'); ?>" type="button" class="btn btn-secondary">ADD BORROW RETURN</a>
				<thead>
					<tr>
						<th>NO</th>
						<th>TITLE</th>
						<th>DEADLINE AT</th>
						<th>RETURN AT</th>
						<th>NOTE</th>
						<th>CREATED AT</th>
						<th>UPDATED AT</th>
						<th>ACTION</th>
					</tr>
				</thead>

				<tbody>

					<?php
					$N = 1;
					foreach ($borrowreturn as $td) {
					?>
						<tr>
							<td>
								<?php echo $N++ ?>
							</td>
              <!-- table book -->
              <td>
								<?php echo $td->title ?>
							</td>
              <!-- table borrow book -->
							<td>
								<?php echo $td->deadline_at ?>
							</td>
              <td>
								<?php echo $td->return_at ?>
							</td>
							<td>
								<?php echo $td->note ?>
							</td>
							<td>
								<?php echo $td->created_at ?>
							</td>
							<td>
								<?php echo $td->updated_at ?>
							</td>
							<td>
								<a href="<?php echo base_url(); ?>BorrowReturn/edit/<?php echo $td->id; ?>" type="button" class="btn btn-warning">EDIT</a>
								<a href="<?php echo base_url(); ?>BorrowReturn/delete/<?php echo $td->id; ?>" type="button" class="btn btn-danger">DELETE</a>
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
	 let s1 = document.querySelector('#s9')
       s1.classList.toggle('stayIn');
</script>