
$(document).ready(function () {
  $('.buy-button').click(function () {
    var drugName = $(this).attr('data-drug');
    var prescriptionRequired = $(this).attr('data-prescription-required') === 'true';

    if (prescriptionRequired) {
      // Display popup for prescription upload
      var popupContent = '<div>Prescription is required for ' + drugName + '. Please upload a prescription.</div>';
      popupContent += '<input type="file" class="prescription">';
      popupContent += '<button class="btn btn-primary upload-prescription">Upload Prescription</button>';
      $.magnificPopup.open({
        items: {
          src: '<div class="white-popup">' + popupContent + '</div>',
          type: 'inline'
        }
      });

      // Process the purchase after prescription validation
      $('.upload-prescription').click(function () {
        var uploadedPrescription = $('.prescription').prop('files')[0];
        if (uploadedPrescription) {
          alert('Prescription uploaded for ' + drugName + '. It will take some time while we validate the prescription.');
          // Close the popup after processing
          $.magnificPopup.close();
        } else {
          alert('Please upload a prescription.');
        }
      });
    } else {
      // Process the purchase
      alert('Processing purchase of ' + drugName + '...');
    }
  });
});
