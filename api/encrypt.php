<form method="post">
    <label for="toEncrypt">What to encrypt?</label>
    <textarea maxlength="50" id="toEncrypt" name="toEncrypt" rows="2" style="width: 100%;" required></textarea>
    <h3 id="charCount">50 characters remaining</h3>
    <div>
        <button type="submit">Encrypt</button>
    </div>
</form>

<hr>

<div class="row" id="download">

    <div class="col-6">
        <?php if (!empty($privKey)) {  ?>

            <div>
                <label for="decryptkey">Key to decrypt</label>
                <textarea id="decryptkey" disabled="true" rows="10" style="width: 100%;"><?php echo base64_encode($privKey); ?></textarea>
            </div>


        <?php } ?>
    </div>

    <div class="col-6">

        <?php if (!empty($encrypted)) {  ?>
            <div>
                <label for="result">Result</label>
                <textarea id="result" disabled="true" rows="10" style="width: 100%;"><?php echo base64_encode($encrypted); ?></textarea>
            </div>
        <?php } ?>
    </div>

</div>

<div class="row <?php if (empty($encrypted)) {  ?> d-none <?php } ?>">

    <div class="col-12">
        <button id="download-button" type="submit">Save for later</button>
    </div>

</div>

<hr>