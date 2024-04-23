<form action="<?php echo BASE_URL ?>/login/authentication_login" method="post" class="form" autocomplete="off">

    <?php 
        if(isset($msg)) {
            echo "<span style='color: red; font-weight:bold'>$msg</span>";
        }
    ?>
    <table class="table__insert-category">
        <tbody>
            <tr>
                <td>User Name</td>
                <td><input required type="text" name="ad_username"></td> 
            </tr>

            <tr>
                <td>Password</td>
                <td><input required type="password" name="ad_password"></td>
            </tr>
        </tbody>
    </table>

    <button>Submit</button>
</form>