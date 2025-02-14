
function redirectToHomeOnReload() {
        // Check if the 'performance' API is supported
        if (performance && performance.navigation.type === performance.navigation.TYPE_RELOAD) {
            // Redirect to the home page
            window.location.href = 'index.html'; // Adjust the path as needed
        }
    }

    // Call the function when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', redirectToHomeOnReload);




document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault();
});
function login(event) {
    event.preventDefault(); // Prevent form submission

    const usernameInput = document.getElementById('username').value.trim();
    const passwordInput = document.getElementById('password').value.trim();

    // Example validation: Check if username is 'user' and password is 'pass'
    if (usernameInput === 'Speedsterclicks' && passwordInput === '!') {
        document.getElementById('demo').innerHTML = 'Logged in successfully!';
        // Redirect to another page after successful login
        window.location.href = 'dashboard.html'; // Replace 'dashboard.html' with your target page
    } else {
        document.getElementById('demo').innerHTML = 'Invalid username or password.';
    }
}


const express = require('express');
const multer  = require('multer');
const app = express();
const port = 3000;

// Set up storage engine
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, 'uploads/');
  },
  filename: function (req, file, cb) {
    cb(null, file.originalname);
  }
});

const upload = multer({ storage: storage });

// Serve static files from the 'uploads' directory
app.use('/uploads', express.static('uploads'));

// Serve static files from the 'public' directory
app.use(express.static('public'));

// Route to handle image upload
app.post('/upload', upload.single('image'), (req, res) => {
  res.send('Image uploaded successfully.');
});

// Start the server
app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
