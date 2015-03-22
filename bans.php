<?php require_once 'engine/init.php'; include 'layout/overall/header.php';

// Fetch ban data and store it as an array[row][columns] = value
$bans = mysql_select_multi("SELECT `id`, `comment` FROM `bans` ORDER BY `id` DESC LIMIT 25");
?>
<table border="0" cellspacing="0">
    <tr class="yellow">
        <td><center>Ban Table</center></td>
    </tr>
    <?php
    foreach ($bans as $ban) {
        ?>
        <tr>
            <td><center><?php echo "Ban id: ".$ban['id']." for ".$ban['comment']; ?></center></td>
        </tr>
        <?php
    }
    ?>
</table>

<?php include 'layout/overall/footer.php'; ?>