const onSearchClick = () => {
    console.log("Search clicked")
}



function logoutUser(event) {
    event.preventDefault(); // Prevent the default anchor behavior
    fetch('./auth/logout_processing.php', {
        method: 'POST', // Use POST to send data
        credentials: 'include' // Include cookies for session handling
    })
        .then(response => {
            if (response.ok) {
                // Handle successful logout, e.g., refresh the page or update UI
                location.reload(); // Reload the page to update the UI
            } else {
                console.error('Logout failed');
            }
        })
        .catch(error => console.error('Error:', error));
}
