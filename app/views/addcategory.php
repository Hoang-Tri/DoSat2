<form action="<?php echo BASE_URL ?>/category/insertCategory" method="post" class="form" autocomplete="off">

    <?php 
        if(isset($msg)) {
            echo "<span style='color: red; font-weight:bold'>$msg</span>";
        }
    ?>
    <table class="table__insert-category">
        <thead>
            <th>INSERT CATEGORY HERE!</th>
        </thead>

        <tbody>
            <tr>
                <td><input required type="text" name="title"></td> 
            </tr>

            <tr>
                <td><input required type="text" name="desc"></td>
            </tr>
        </tbody>
    </table>

    <button>Submit</button>
</form>