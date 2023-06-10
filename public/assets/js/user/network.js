const users = [];
const searchFlags = {
  search: "",
  city: "all",
  hospital: "all",
  department: "all",
  occupation: ""
};
function generateUserProfileCard(user) {
  return `
  <div class="col-12 col-md-6 col-lg-4">
  <div class="card mb-3">
    <img style="height: 250px; object-fit: cover;" src="${user.profile.photo}" class="card-img-top" alt="User Photo">
    <div class="card-body">
      <h5 class="card-title fw-bold text-capitalize">
        ${user.first_name + " " + user.last_name}
      </h5>
      <p class="card-text fst-italic text-capitalize">
        <i class="fa-solid fa-user-doctor"></i> 
        ${user.profile.occupation}
      </p>
      <p class="card-text fst-italic text-capitalize">
        <i class="fa-solid fa-building-user"></i>
        ${user.profile.department}
      </p>
      <p class="card-text fst-italic ellipsis">
        <i class="fa-solid fa-hospital"></i>
        ${user.profile.hospital}
      </p>
      <p class="card-text fst-italic">
        <i class="fa-solid fa-location-dot"></i>
        ${user.profile.city}
      </p>
    </div>
    <div class="card-footer">
      <button data-userid="${user.id}" class="add-profile btn btn-outline-custom-primary">
        Add
      </button>
      <button data-userid="${user.id}" class="delete-profile btn btn-outline-custom-warning">
        Remove
      </button>
    </div>
  </div>
</div>

        `;
}

function fetchUsers(callback) {
  const formData = $("#search-users-form").serialize();
  $.ajax({
    url: "http://doctoraicollab.test/network/getAllUsers",
    type: "GET",
    data: formData,
    success: function (response) {
      response = JSON.parse(response);
      users.length = 0;
      response.forEach(function (user) {
        users.push(user);
      });
      callback();
    },
    error: function (xhr, status, error) {
      console.log("Error: " + error);
    }
  });
}

function renderUserProfiles() {
  const userProfileContainer = document.getElementById('user-profiles');
  userProfileContainer.innerHTML = '';
  for (const user of users) {
    const card = generateUserProfileCard(user);
    userProfileContainer.innerHTML += card;
  }
}

// >>>>>>>>>>>>>>>> button events
$('#user-profiles').on('click', '.add-profile',function (e) {
  const userid = $(this).data('userid');
  console.log("adding: " + userid);
});

$('#user-profiles').on('click', '.delete-profile',function (e) {
  const userid = $(this).data('userid');
  console.log("deleting: " + userid);
});

// <<<<<<<<<<<<<<<<< button events

// >>>>>>>>>>>>>>>>>>>>> filter events
$("#search-query").change(function (e) {
  searchFlags.search = ($(this).val()).trim();
  // fetchUsers(renderUserProfiles);
});

$("#btn-search").click(function (e) {
  e.preventDefault();
  const searchText = $("#search-query").val().trim();
  searchFlags.search = searchText;
  fetchUsers(renderUserProfiles);
});

$("#city-filter").change(function (e) {
  searchFlags.city = ($(this).val()).trim();
  fetchUsers(renderUserProfiles);
});

$("#hospital-filter").change(function (e) {
  searchFlags.hospital = ($(this).val()).trim();
  fetchUsers(renderUserProfiles);
});

$("#department-filter").change(function (e) {
  searchFlags.department = ($(this).val()).trim();
  fetchUsers(renderUserProfiles);
});

$("#occupation-filter").change(function (e) {
  searchFlags.occupation = ($(this).val()).trim();
  fetchUsers(renderUserProfiles);
});
// <<<<<<<<<<<<<<<<<<<<<< filter events

// >>>>>>>>>>> running when my script loads
console.log("welcome to network page");
fetchUsers(renderUserProfiles);
// <<<<<<<<<<< running when my script loads


