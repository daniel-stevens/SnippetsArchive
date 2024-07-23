<script>
    // Before the page unloads (e.g., refreshes or navigates away), store the current scroll position in localStorage
    window.addEventListener('beforeunload', function() {
        localStorage.setItem('scrollPosition', window.scrollY);
    });

    // When the DOM content is fully loaded, retrieve the stored scroll position from localStorage
    document.addEventListener('DOMContentLoaded', function() {
        var scrollPosition = localStorage.getItem('scrollPosition');
        // If a scroll position was stored, scroll the page to that position and then remove the stored value from localStorage
        if (scrollPosition) {
            window.scrollTo(0, parseInt(scrollPosition));
            localStorage.removeItem('scrollPosition');
        }
    });
</script>
