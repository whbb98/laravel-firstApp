console.log("welcome to network page");

// Sample data for user profiles
const users = [
  {
    name: "John Doe",
    occupation: "Doctor",
    department: "Pneumology",
    hospital: "ABC Hospital",
    city: "New York",
    photo: "https://randomuser.me/api/portraits/men/1.jpg"
  },
  {
    name: "Jane Smith",
    occupation: "Nurse",
    department: "Pneumology",
    hospital: "XYZ Hospital",
    city: "Los Angeles",
    photo: "https://randomuser.me/api/portraits/women/2.jpg"
  },
  // Add more sample users here
];

// Function to generate user profile cards
function generateUserProfileCard(user) {
  return `
          <div class="col-md-4">
            <div class="card mb-3">
              <img src="${user.photo}" class="card-img-top" alt="User Photo">
              <div class="card-body">
                <h5 class="card-title fw-bold">${user.name}</h5>
                <p class="card-text fst-italic">
                <i class="fa-solid fa-user-doctor"></i> ${user.occupation}
                </p>
                <p class="card-text fst-italic">
                <i class="fa-solid fa-building-user"></i> ${user.department}
                </p>
                <p class="card-text fst-italic">
                <i class="fa-solid fa-hospital"></i> ${user.hospital}
                </p>
                <p class="card-text fst-italic">
                <i class="fa-solid fa-location-dot"></i> ${user.city}
                </p>
              </div>
              <div class="card-footer">
                <button class="btn btn-outline-custom-primary btn-add">Add</button>
                <button class="btn btn-outline-custom-warning">Remove</button>
              </div>
            </div>
          </div>
        `;
}

// Function to display user profile cards
function displayUserProfiles() {
  const userProfileContainer = document.getElementById('user-profiles');
  userProfileContainer.innerHTML = '';

  for (let user of users) {
    const card = generateUserProfileCard(user);
    userProfileContainer.innerHTML += card;
  }
}

// Display initial user profiles
displayUserProfiles();