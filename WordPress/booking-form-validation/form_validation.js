document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('.cart');
    var childrenInput = document.getElementById('wc_bookings_field_persons_20');
    var adultsInput = document.getElementById('wc_bookings_field_persons_21');
    var submitButton = form.querySelector('[type="submit"]');

    function validateAdultsAndChildren() {
        var children = parseInt(childrenInput.value, 10);
        var adults = parseInt(adultsInput.value, 10);

        // Check if adults exceed children
        if (adults > children) {
            // If so, prevent form submission and alert the user
            submitButton.disabled = true;
            alert('Desired alert text');
        } else {
            // If validation passes, ensure the button is enabled
            submitButton.disabled = false;
        }
    }

    // Attach event listeners to input fields
    childrenInput.addEventListener('change', validateAdultsAndChildren);
    adultsInput.addEventListener('change', validateAdultsAndChildren);

    // run the validation on form submission
    form.addEventListener('submit', function(event) {
        var children = parseInt(childrenInput.value, 10);
        var adults = parseInt(adultsInput.value, 10);

        if (adults > children) {
            event.preventDefault(); // Stop form from submitting
            alert('Desired alert text');
        }
    });
});
