// Load ads when the page loads
window.onload = loadAds;

async function loadAds() {
    try {
        console.log("Sending GET request to adController.php...");
        const response = await fetch('../Backend/adController.php');
        console.log("Response status:", response.status);

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const rawResponse = await response.text();
        console.log("Raw response:", rawResponse);

        const ads = JSON.parse(rawResponse); // Parse raw response as JSON
        console.log("Parsed ads:", ads);

        // Render the ads on the page
        const adsContainer = document.getElementById('adsContainer');
        adsContainer.innerHTML = "<h2>All Ads</h2>"; // Clear previous content and add heading

        ads.forEach(ad => {
            const adElement = document.createElement('div');
            adElement.classList.add('ad-item'); // Optional: Add a CSS class for styling
            adElement.innerHTML = `
                <p><strong>${ad.name}</strong> posted:</p>
                <p>${ad.content}</p>
                <p><em>${new Date(ad.date_posted).toLocaleString()}</em></p>
            `;
            adsContainer.appendChild(adElement);
        });
    } catch (error) {
        console.error("Error in loadAds:", error);
        alert("Failed to load ads. Please try again later.");
    }
}

// Handle ad submission
document.getElementById('adForm').addEventListener('submit', async (event) => {
    event.preventDefault();
    console.log("Form submission triggered");

    const formData = new FormData(event.target);
    console.log("Form data:", Array.from(formData.entries()));

    try {
        const response = await fetch('../Backend/adController.php', {
            method: 'POST',
            body: formData,
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const result = await response.json();
        console.log("Server response:", result);

        if (result.success) {
            loadAds(); // Reload ads to reflect the new state
            event.target.reset();
        } else {
            alert('Error: ' + result.error);
        }
    } catch (error) {
        console.error("Error sending request:", error);
        alert("Failed to post ad. Please try again.");
    }
});
