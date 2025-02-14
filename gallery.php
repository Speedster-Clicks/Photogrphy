<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Gallery</h1>
        <nav>
            <ul>
                <div class="dropdown">
                    <span class="menu-btn"></span>      
                    <div class="dropdown-content">
                        <li><a href="index.html">🏠 Home</a></li>
                        <li><a href="about.html">ℹ️ Team</a></li>
                        <li><a href="contact.html">✉️ Contact</a></li>
                        <li><a href="login.html">🔒 Login</a></li>
                    </div>
                </div>
            </ul>
        </nav>
    </header>

    <section class="gallery">
    <div class="image-grid">
        <?php
        $dir = 'uploads';
        if (is_dir($dir)) {
            $images = array_diff(scandir($dir), array('.', '..'));
            foreach ($images as $image) {
                echo '<img src="' . $dir . '/' . $image . '" alt="Gallery Image" style="width: 200px; height: auto; margin: 10px;">';
            }
        } else {
            echo '<p>No images uploaded yet.</p>';
        }
        ?>
    </div>
</section>



    <footer>
        <p>&copy; 2025 Speedsterclicks Photography</p>
    </footer>
</body>
</html>
