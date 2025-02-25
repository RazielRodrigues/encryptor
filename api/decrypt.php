<form method="post">
    <div class="form-group">
        <label for="key">Decryption key</label>
        <textarea class=" form-control" id="key" type="key" name="key" rows="10" style="width: 100%;" required></textarea>
    </div>
    <div class="form-group">
        <label for="key">Encrypted message</label>
        <textarea class=" form-control" id="message" type="message" name="message" rows="10" style="width: 100%;" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Decrypt</button>
</form>

<hr>

<div class="row" id="download">
    <?php if (!empty($decrypted)) {  ?>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Result</h5>
                    <p class="card-text" id="decryptkey">
                        <?php echo $decrypted; ?>
                    </p>
                    <button id="download-button" class="btn btn-primary mb-2">Save for later</button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>