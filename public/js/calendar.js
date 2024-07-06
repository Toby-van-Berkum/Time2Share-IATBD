document.addEventListener('DOMContentLoaded', function () {
    // Get the start date and end date input elements
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');

    // Get today's date for comparison
    const today = new Date().toISOString().split('T')[0];
    const minDate = today;

    // Set minimum date for start date and end date
    startDateInput.min = minDate;
    endDateInput.min = minDate;

    // Event listener for changes in the end date input
    endDateInput.addEventListener('change', function() {
        // Parse the dates from input fields
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        // Check if end date is earlier than start date
        if (endDate < startDate) {
            // Set start date to end date
            startDateInput.value = endDateInput.value;
        }
    });
});