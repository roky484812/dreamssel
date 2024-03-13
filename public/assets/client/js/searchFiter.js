const items = document.querySelector(".items");
const searchUser = document.querySelector('#search');
let users = [];

const fetchImages = () => {
  fetch("https://api.github.com/users")
    .then(res => {
      res.json()
        .then(res => {
          users = res;
        })
        .catch(err => console.log(err));
    })
    .catch(err => console.log(err));
};

const showUsers = (arr) => {
  let output = "";

  if (searchUser.value.trim().length > 0) {
    arr.forEach(({ login, avatar_url }) => (output += `
      <tr>
        <td class="py-2 pl-5 border-b border-gray-200 bg-white">
          <div class="flex items-center">
            <div class="flex-shrink-0 w-10 h-10">
              <img class="w-full h-full rounded-full" src=${avatar_url} />
            </div>
            <div class="ml-3">
              <h1 class="capitalize font-semibold text-base text-gray-900 whitespace-no-wrap">
                ${login}
              </h1>
            </div>
          </div>
        </td>
        <td class="py-2 text-center border-b border-gray-200 bg-white text-sm">
          <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded" 
            href=https://github.com/${login}>See profile
          </a>
        </td>
      </tr>
    `));
  }
  
  items.innerHTML = output;
};

document.addEventListener("DOMContentLoaded", () => {
  fetchImages();
  showUsers([]); // Initialize with an empty array to hide suggestions on page load
});

searchUser.addEventListener('input', (e) => {
  const element = e.target.value.toLowerCase();
  const newUser = users
    .filter(user => user.login
      .toLowerCase()
      .includes(element));

  showUsers(newUser);
});

// Close the suggestions list when clicking outside the search box
document.addEventListener('click', (e) => {
  if (!e.target.closest('#search')) {
    items.innerHTML = ''; // Clear suggestions when clicking outside
  }
});

// Show the suggestions list when the search box is focused
searchUser.addEventListener('focus', () => {
  if (searchUser.value.trim() !== '') {
    showUsers(users);
  }
});

// Hide the suggestions list when the search box loses focus
searchUser.addEventListener('blur', () => {
  setTimeout(() => {
    items.innerHTML = '';
  }, 200); // Delay to allow click event to fire before hiding suggestions
});
