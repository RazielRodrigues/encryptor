<!-- Enchanted Encryption Form -->
<form method="post" class="p-4 rounded shadow-sm bg-light">
    <div class="mb-3">
        <label for="toEncrypt" class="form-label" style="font-family: 'Quintessential', cursive;">
            <i class="fas fa-wand-magic-sparkles"></i> Cast Your Encryption Spell
        </label>
        <textarea
            maxLength="50"
            class="form-control"
            rows="3"
            id="toEncrypt"
            name="toEncrypt"
            required
            placeholder="Enter your secret incantation here..."
            style="font-family: 'Quintessential', cursive; resize: none;"></textarea>
        <small class="form-text text-muted">
            <i class="fas fa-info-circle"></i> Only available for small messages yet
        </small>
    </div>

    <h6 id="charCount" class="text-end text-secondary">
        50 characters remaining
    </h6>

    <button type="submit"
        class="btn btn-outline-secondary mt-2 w-100"

        style="font-family: 'Quintessential', cursive;">
        <i class="fas fa-lock"></i> Encrypt Now
    </button>

    <hr class="my-5" />

    <div class="row" id="download">
        <div class="col-sm-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title" style="font-family: 'Quintessential', cursive;">
                        <i class="fas fa-key"></i> Your Private Key
                    </h5>
                    <p class="card-text bg-light p-3 rounded overflow-auto" id="decryptkey" style="max-height: 150px;">
                        <?php if (!empty($privKey)) { ?>
                            <?php echo base64_encode($privKey); ?>
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-4">
            <div class="card border-0 shadow-sm mx-auto">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title" style="font-family: 'Quintessential', cursive;">
                        <i class="fas fa-scroll"></i> Encrypted Spell
                    </h5>
                    <p class="card-text bg-light p-3 rounded overflow-auto" id="result">
                        <?php if (!empty($encrypted)) { ?>
                            <?php echo base64_encode($encrypted); ?>
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row  ">
            <?php if (!empty($encrypted)) { ?>
                <button
                    id="download-button"
                    class="btn btn-outline-secondary mt-2"
                    style="font-family: 'Quintessential', cursive;">
                    <i class="fas fa-download"></i> Save for Later
                </button>
            <?php } ?>
        </div>

    </div>

</form>

<script>
if (document.getElementById('toEncrypt')) {
    document.getElementById('toEncrypt').addEventListener('input', function () {
        var maxLength = this.maxLength;
        var currentLength = this.value.length;
        var remainingCharacters = maxLength - currentLength;

        var charCountElement = document.getElementById('charCount');
        charCountElement.textContent = remainingCharacters + ' characters remaining';
    });
}

if (document.getElementById('download-button') !== null) {
    document.getElementById('download-button').addEventListener('click', function (e) {
        e.preventDefault()

        // Get the content of the text areas
        var decryptKeyContent = document.getElementById('decryptkey') ? document.getElementById('decryptkey').textContent : '';
        var resultContent = document.getElementById('result') ? document.getElementById('result').textContent : '';

        // Combine the content into a single string
        var textToSave = 'Private key: ' + decryptKeyContent.trim() + '\n\nEncrypted Message: \n' + resultContent.trim();

        // Create a blob with the text content
        var blob = new Blob([textToSave], {
            type: 'text/plain'
        });

        // Create a link element
        var link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'decrypted_data.txt'; // Name of the file to be downloaded

        // Programmatically click the link to trigger the download
        link.click();

        // Cleanup
        URL.revokeObjectURL(link.href);
    });
}
</script>