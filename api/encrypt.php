<!-- Load FontAwesome for icons -->

<!-- Enchanted Encryption Form -->
<form method="post" class="p-4 rounded shadow-sm bg-light">
    <div class="mb-3">
        <label for="toEncrypt" class="form-label" style="font-family: 'Quintessential', cursive;">
            <i class="fas fa-wand-magic-sparkles"></i> Cast Your Encryption Spell
        </label>
        <textarea 
            class="form-control" 
            rows="3" 
            id="toEncrypt" 
            name="toEncrypt" 
            required
            placeholder="Enter your secret incantation here..."
            style="font-family: 'Quintessential', cursive; resize: none;"
        ></textarea>
        <small class="form-text text-muted">
            <i class="fas fa-info-circle"></i> Keep your message concise for a potent spell.
        </small>
    </div>

    <h6 id="charCount" class="text-end text-secondary">
        <i class="fas fa-feather-alt"></i> 50 characters remaining
    </h6>

    <button type="submit" 
    class="btn btn-outline-secondary mt-2 w-100"

    style="font-family: 'Quintessential', cursive;">
        <i class="fas fa-lock"></i> Encrypt Now
    </button>

    <hr class="my-5" />

<!-- Encrypted Results Section -->
<div class="row" id="download">
    <?php if (!empty($privKey)) { ?>
        <div class="col-sm-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title" style="font-family: 'Quintessential', cursive;">
                        <i class="fas fa-key"></i> Your Private Key
                    </h5>
                    <p class="card-text bg-light p-3 rounded overflow-auto" id="decryptkey" style="max-height: 150px;">
                        <?php echo base64_encode($privKey); ?>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!empty($encrypted)) { ?>
        <div class="col-sm-6 mb-4">
            <div class="card border-0 shadow-sm mx-auto">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title" style="font-family: 'Quintessential', cursive;">
                        <i class="fas fa-scroll"></i> Encrypted Spell
                    </h5>
                    <p class="card-text bg-light p-3 rounded overflow-auto" id="result"  >
                        <?php echo base64_encode($encrypted); ?>
                    </p>

                </div>
            </div>
        </div>
        
        <div class="row">
            <button 
                id="download-button" 
                class="btn btn-outline-secondary mt-2"
                style="font-family: 'Quintessential', cursive;"
            >
                <i class="fas fa-download"></i> Save for Later
            </button>
        </div>
    <?php } ?>

</div>


</form>