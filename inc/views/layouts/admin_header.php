<header>
    <section>
        <h1>Yodas Brain CMS</h1>
        <select>
            <?php
                $admins = main\find_all_admins();
                while($row = mysqli_fetch_assoc($admins)){
            ?>
            <option>
            <?php echo $row["username"]; ?>
            </option>
            <?php
                }
            mysqli_free_result($admins);
            ?>
        </select>
        <div>
            <ul>
                <li>
                    <a href="http://yodas.brain/views/admin.php">Admins</a>
                    <ul>
                        <li><a href="<?php ROOT_PATH; ?>/views/actions/new_admin.php">+ admins</a></li>
                <li><a href="<?php ROOT_PATH; ?>/views/actions/delete_admin.php">- admins</a></li>
                    </ul>
                </li>
                <li>
                    <a>Logout</a>
                </li>
            </ul>
        </div>
    </section>
</header>
