// Define an array to store activities, initially checking local storage for any stored data
let activities = JSON.parse(localStorage.getItem('activities')) || [];

// Get form elements
const form = document.getElementById('activity-form');
const nameInput = document.getElementById('name');
const dateInput = document.getElementById('date');
const timeInput = document.getElementById('time');
const locationInput = document.getElementById('location');
const ootdInput = document.getElementById('ootd');
const submitButton = document.getElementById('submit-btn');
const activityItems = document.getElementById('activity-items');
const editButton = document.getElementById('edit-btn');





// Function to edit an activity
function editActivity(index) {


    const activity = activities[index];
    nameInput.value = activity.name;
    dateInput.value = activity.date;
    timeInput.value = activity.time;
    locationInput.value = activity.location;
    ootdInput.value = activity.ootd;

    submitButton.style.display = 'none';
    editButton.style.display = 'block';

    // Update the activity on edit
    editButton.onclick = function () {
        // Update the activity in the array
        const newAction = `updateActivity.php?id=${index}`;
        form.setAttribute('action', newAction);

        clearForm();

        submitButton.style.display = 'block';
        editButton.style.display = 'none';
    };
}

// Function to update an activity in the database (you can customize this)
function updateActivityInDatabase(index) {
    const activity = activities[index];

    // Show an alert to indicate successful update (you can customize this)
    alert("Activity updated successfully!");
}

// Function to delete an activity
function deleteActivity(index) {
    const confirmDelete = window.confirm("Are you sure you want to delete this activity?");
    
    if (confirmDelete) {
        activities.splice(index, 1); // Remove the activity from the array
        displayActivities(); // Update the displayed activities
    }
}



// Initial display of activities
// displayActivities();

// Rest of your code for edit and form submission...
// JavaScript Functionality For the Add Activity
document.getElementById("activity-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Get form data
    const formData = new FormData(event.target);

    // Make an AJAX request to activities.php
    fetch("activities.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            alert("Activity added successfully!");
            // You can add more code here to update the UI if needed
        } else {
            alert("Failed to add activity. Please try again.\nError: " + data.error);
        }
    })
    .catch((error) => {
        console.error("Error:", error);


    });
});

// ... (your existing code)

// Function to clear the form
function clearForm() {
    nameInput.value = '';
    dateInput.value = '';
    timeInput.value = '';
    locationInput.value = '';
    ootdInput.value = '';
}

// Add event listener for form submission
form.addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission
    addActivity();
    
    // Clear the form after adding activity
    clearForm();
});

// ... (your existing code continues)

