<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Edit User</h2>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('user/update/'.$user->id); ?>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" value="<?php echo $user->username; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="admin" <?php echo ($user->role == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option value="client" <?php echo ($user->role == 'client') ? 'selected' : ''; ?>>Client</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update User</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>