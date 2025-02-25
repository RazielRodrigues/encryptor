if (document.getElementById('download-button') !== null) {
    document.getElementById('download-button').addEventListener('click', function () {
        // Get the content of the text areas
        var decryptKeyContent = document.getElementById('decryptkey') ? document.getElementById('decryptkey').value : '';
        var resultContent = document.getElementById('result') ? document.getElementById('result').value : '';

        // Combine the content into a single string
        var textToSave = 'Key to decrypt:\n' + decryptKeyContent + '\n\nResult:\n' + resultContent;

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

if (document.getElementById('toEncrypt')) {
    document.getElementById('toEncrypt').addEventListener('input', function () {
        var maxLength = this.maxLength;
        var currentLength = this.value.length;
        var remainingCharacters = maxLength - currentLength;

        var charCountElement = document.getElementById('charCount');
        charCountElement.textContent = remainingCharacters + ' characters remaining';
    });
}
