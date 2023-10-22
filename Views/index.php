<form action="/upload" method="POST" enctype="multipart/form-data">
    <input type="file" name="recepit">
    <button type="submit">Upload</button>
</form>

<hr>

<?php if( !empty( $invoice ) ){ ?>
    Invoice ID: <?php echo $invoice["id"] ?>
    Inoivce Amount: <?php echo $invoice["amount"] ?>
    Invoice User: <?php echo $invoice["full_name"] ?>
<?php } ?>
