<form method="post">
    <div class="row">
        <div class="col-6">
            <label for="key">Decryption key</label>
            <textarea id="key" type="key" name="key" rows="10" style="width: 100%;" required></textarea>
        </div>
        <div class="col-6">
            <label for="message">Encrypted message</label>
            <textarea id="message" name="message" rows="10" style="width: 100%;" required></textarea>
        </div>
    </div>
    <div>
        <button class="mb-5"="submit">Decrypt</button>
    </div>
</form>



<?php if (!empty($decrypted)) {  ?>

    <hr>

    <h3>Result</h3>

    <div class="content-section">
        <?php echo $decrypted; ?>
    </div>
<?php } ?>