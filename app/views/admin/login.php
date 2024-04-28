<div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <h2 class="text-center text-dark mt-5">Welcome back</h2>
        <div class="card my-5">
            <form class="card-body cardbody-color p-lg-5" action="<?php echo BASE_URL ?>/admin_login/authentication_login" method="post" class="form" autocomplete="off">
            <?php 
                if(isset($msg)) {
                    echo "<span style='color: red; font-weight:bold'>$msg</span>";
                }
            ?>

            <div class="text-center">
              <img src="<?php echo BASE_URL?>/assets/admin-assets/img/avatar-1.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="150px" alt="profile">
            </div>

            <div class="mb-3">
              <label for="username" class="form-label">User Name</label>
              <input type="text" name="ad_username" class="form-control" aria-describedby="emailHelp" id="username"
                required placeholder="User Name">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="ad_password" placeholder="Password">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary px-5 mb-5 w-100">Login</button></div>
          </form>
        </div>

      </div>
    </div>
</div>

