jQuery(document).ready(function() {
    // const img_data = signatureData.replace(/^data:image\/(png|jpg);base64,/, "");
    var canvas = document.getElementById("signature");

    const signaturePad = new SignaturePad(canvas);
    jQuery('#save-sign').on('click', function() {
        const signatureData = signaturePad.toDataURL('image/png');
        jQuery('.privew').html('<img src="' + signatureData + '">')


        jQuery.ajax({
            url: my_ajax_object.ajax_url,
            method: 'POST',
            data: {
                action: 'save_signature',
                signature_data: signatureData,

            },
            success: function(data) {

            }
        })
    });

    jQuery('#clear-signature').on('click', function() {
        signaturePad.clear();
    });
});