<!-- Magical Decryption Form -->
<form method="post" class="p-4 rounded shadow-sm bg-light">
    <div class="mb-3">
        <label for="key" class="form-label" style="font-family: 'Quintessential', cursive;">
            <i class="fas fa-wand-magic-sparkles"></i> Enter Your Secret Decryption Key
        </label>
        <textarea
            class="form-control"
            id="key"
            name="key"
            rows="5"
            required
            placeholder="Paste your private key here..."
            style="font-family: 'Quintessential', cursive; resize: none; box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.1);"></textarea>
    </div>

    <div class="mb-3">
        <label for="message" class="form-label" style="font-family: 'Quintessential', cursive;">
            <i class="fas fa-lock"></i> Encrypted Message
        </label>
        <textarea
            class="form-control"
            id="message"
            name="message"
            rows="5"
            required
            placeholder="Paste the encrypted message here..."
            style="font-family: 'Quintessential', cursive; resize: none; box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.1);"></textarea>
    </div>

    <button
        type="submit"
        class="btn btn-outline-secondary mt-2 w-100"
        style="font-family: 'Quintessential', cursive; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">

        <i class="fas fa-lock-open"></i> Decrypt Now
    </button>

    <hr class="my-5" />

    <div class="row" id="download">
        <div class="col-sm-12">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Quintessential', cursive;">
                        <i class="fas fa-scroll"></i> Decrypted Message
                    </h5>
                    <p class="card-text bg-light p-3 rounded overflow-auto" id="decryptkey" style="max-height: 200px;">
                        <?php if (!empty($decrypted)) { ?>
                            <?php echo htmlspecialchars($decrypted); ?>
                        <?php } ?>
                    </p>
                    <?php if (!empty($decrypted)) { ?>
                        <button id="download-button" class="btn btn-outline-secondary mt-2 w-100" style="font-family: 'Quintessential', cursive;">
                            <i class="fas fa-save"></i> Save for Later
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</form>