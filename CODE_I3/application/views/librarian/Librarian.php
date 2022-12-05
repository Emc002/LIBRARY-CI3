<div class="col-lg-10 divtwo">
	<div class="row setting noxy">
		<div class="col-lg-12 two">
			<div class="row">
				<div class="col-7">
					<h1>LIBRARIAN DASHBOARD
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
			<h4>LIBRARIAN TABLE</h4>
			<table id="mainTable" class="table librarianTable table-light table-info table-hover table-bordered">
				<a href="<?= base_url('Librarian/add'); ?>" type="button" class="btn btn-secondary">ADD LIBRARIAN</a>
				<thead>
					<tr>
						<th>NO LIBRARIAN</th>
						<th>AVATAR</th>
						<th>USERNAME</th>
						<th>NAME</th>
						<th>EMAIL</th>
						<th>CREATED AT</th>
						<th>UPDATED AT</th>
						<th>ACTION</th>
					</tr>
				</thead>

				<tbody>

					<?php
					$N = 1;
					foreach ($librarian as $td) {
					?>
						<tr>
							<td>
								<?php echo $N++ ?>
							</td>
							<td>
								<?php if($td->avatar){ ?>
								<img class="tabavatar" src=" <?php echo base_url("/assets/profile/$td->avatar") ?>" width="200" />
								<?php } ?>
								<?php if (!$td->avatar){ ?>
								<a><?php echo $td->username ?></a>
								<?php } ?>
							</td>
							<td>
								<?php echo $td->username ?>
							</td>
							<td>
								<?php echo $td->name ?>
							</td>
							<td>
								<?php echo $td->email ?>
							</td>

							<td>
								<?php echo $td->created_at ?>
							</td>
							<td>
								<?php echo $td->updated_at ?>
							</td>
							<td>
								<a href="<?php echo base_url(); ?>Librarian/edit/<?php echo $td->id; ?>" type="button" class="btn btn-warning">EDIT</a>
								<a href="<?php echo base_url(); ?>Librarian/delete/<?php echo $td->id; ?>" type="button" class="btn btn-danger">DELETE</a>
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
	 let s1 = document.querySelector('#s1')
       s1.classList.toggle('stayIn');
</script>