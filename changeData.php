<?php
include "function.php";
$log = new FAssetClerk();

$log->change_asset($_POST);?>
    <script>
        alert("Changed!!");
    </script>
<?php
header("Location: asset_details.php?id=".$_POST['id']);
?>