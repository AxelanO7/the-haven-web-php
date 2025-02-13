<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user"></i> Data Profile</h1>
</div>

<?= $this->session->flashdata('message'); ?>

<?php if($this->session->userdata('id_user_level') == ('1')): ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fas fa-fw fa-edit"></i> Edit Data Profile</h6>
    </div>
	
	<?php echo form_open('Profile/update/'.$profile->id_user); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_user', $profile->id_user) ?>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">E-Mail</label>
					<input autocomplete="off" type="email" name="email" value="<?php echo $profile->email ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Username</label>
					<input autocomplete="off" type="text" name="username" value="<?php echo $profile->username ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Password</label>
					<input autocomplete="off" type="password" name="password" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Lengkap</label>
					<input autocomplete="off" type="text" name="nama" value="<?php echo $profile->nama ?>" required class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>
<?php endif; ?>

<?php if($this->session->userdata('id_user_level') != ('1')): ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fas fa-fw fa-edit"></i> Edit Data Profile</h6>
    </div>
	
	<?php echo form_open('Profile/update/'.$profile->id_user); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_user', $profile->id_user) ?>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">E-Mail</label>
					<input autocomplete="off" type="email" name="email" value="<?php echo $profile->email ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Username</label>
					<input disabled="true" autocomplete="off" type="text" name="username" value="<?php echo $profile->username ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Password</label>
					<input autocomplete="off" type="password" name="password" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Lengkap</label>
					<input autocomplete="off" type="text" name="nama" value="<?php echo $profile->nama ?>" required class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>
<?php endif; ?>

<?php $this->load->view('layouts/footer_admin'); ?>