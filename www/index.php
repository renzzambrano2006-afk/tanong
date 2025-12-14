<?php
$saved_text = "I am Edrian Galanza Tangonan, My hobbies are playing online games,
I am interested in hacking and my goal is to
become a good cyber security";


if (file_exists("about.txt")) {
    $saved_text = file_get_contents("about.txt");
}


$success = "";
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_type = $_POST["form_type"] ?? '';
    
    if ($form_type === "contact") {
        
        $firstname = $_POST["firstname"] ?? '';
        $lastname = $_POST["lastname"] ?? '';
        $email = $_POST["email"] ?? '';
        $mobile = $_POST["mobile"] ?? '';
        $message = $_POST["message"] ?? '';

      
        $firstname = htmlspecialchars(trim($firstname));
        $lastname = htmlspecialchars(trim($lastname));
        $email = htmlspecialchars(trim($email));
        $mobile = htmlspecialchars(trim($mobile));
        $message = htmlspecialchars(trim($message));

      
        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobile) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $file = fopen("messages.txt", "a");
            fwrite($file, "First Name: $firstname\nLast Name: $lastname\nEmail: $email\nMobile: $mobile\nMessage: $message\n-------------------------\n");
            fclose($file);
            $success = "Your message has been sent successfully!";
        } else {
            $error = "Please fill in all fields correctly.";
        }
        
    } elseif ($form_type === "about_edit") {
        
        $new_text = $_POST["message"] ?? '';
        
        if (!empty($new_text)) {
            $new_text_sanitized = htmlspecialchars(trim($new_text));
            
            file_put_contents("about.txt", $new_text_sanitized);
            $saved_text = $new_text_sanitized; 
        }
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="finals.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>Personal Web Portfolio</title>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">Edrian.</a>

        <nav class="navbar">
            <a href="#Home" >Home</a>
            <a href="#About">About</a>
            <a href="#Project">Project</a>
            <a href="#Skillsss">Skills</a>
            <a href="#Gallery">Gallery</a>
            <a href="#Contact">Contact</a>
        </nav>
    </header>

    <section class="home" id="Home">
        <div class="home-content">
            <h1>Hi, I'm Edrian Tangonan</h1>
            <h3>Future Web Developer</h3>
            <p>
                As an IT student, incorporating physical activity into my daily 
                routine can help improve my focus and productivity while coding 
                or studying. Regular exercise can also enhance my problem-solving
                skills and reduce stress, leading to better academic performance.
                By prioritizing physical activity, I can maintain a healthy work-life 
                balance and achieve success in my IT pursuits.</p>
        </div> 
        <div class="home-image">
                <img src="pic-1.jpg" class="homes">
            </div>

            <span class="home-imgHover"></span>
    </section>
    
    <section class="main" id="About">
    <div class="container">
        <div class="main-content">
            <form method="POST">
                <input type="hidden" name="form_type" value="about_edit">
                <h2>Welcome To My Website</h2>

                <div class="about-display">
                    <p><?php echo nl2br(htmlspecialchars($saved_text)); ?></p>
                </div>

               
                <textarea name="message" placeholder="Edit about me text here...">
<?php 

echo ($_SERVER["REQUEST_METHOD"] == "POST" && $form_type === "about_edit") ? "" : htmlspecialchars($saved_text); 
?>
                </textarea>

                <input type="submit" value="Send" id="button">
            </form>
        </div>

        <div class="main-image">
            <img src="about.jfif" class="mains">
        </div>
    </div>
</section>



    <section class="project" id="Project">

     <h1 style="color: #081b29;">.</h1>

     <div class="project-container">
     <div class="projects">
     <img src="project.jpg" class="project-img">
     <div class="project-content">
     <h1>The Main Page</h1>
    <p>This is the main page shop now</p>

     </div>
     </div>
    <div class="projects">
 <img src="proj1.png" class="project-img">
     <div class="project-content">
    <h1>The Second Page</h1>
    <p>This is the second you can shop now</p>

     </div>
     </div>
     <div class="projects">
     <img src="proj.png" class="project-img">
     <div class="project-content">
    <h1>The Third Page</h1>
     <p>The order summary or the confirmation button to order</p>

     </div>
    </div>
  </div>

    </section>


     <section class="skillss" id="Skillsss">
     <div class="skills">
     <div class="skill">
     <div class="skill-name">HTML</div>
     <div class="skill-bar">
     <div class="skill-per" per="70%" style="max-width: 70%;"></div>

     </div>
    </div>
     <div class="skill">
     <div class="skill-name">CSS</div>
     <div class="skill-bar">
     <div class="skill-per" per="50%" style="max-width: 50%;"></div>

    </div>
     </div>
    <div class="skill">
     <div class="skill-name">JAVA SCRIPT</div>
     <div class="skill-bar">
     <div class="skill-per" per="20%" style="max-width: 20%;"></div>

    </div>
     </div>
    </div>
    </section>


    <section class="slide-container" id="Gallery">
     <div class="slider-images">
     <div class="slider-img">
     <img src="1st.jfif" alt="1" class="pictures">
     <h1>LUNA</h1>
     <div class="details">
     <h2>Luna</h2> 
    </div>
     </div>
    <div class="slider-img">
    <img src="oop1.jfif" alt="2" class="pictures">
     <h1 class="girl">ME</h1>
     <div class="details">
     <h2>Manaoag</h2>

    </div>
    </div>
     <div class="slider-img">
      <img src="3rd.jfif" alt="3" class="pictures">
<h1 class="bor">Boracay</h1>
    <div class="details">
    <h2>Boracay</h2>
     
    </div>
     </div>
     <div class="slider-img active">
    <img src="4th.jfif" alt="4" class="pictures">
    <h1 class="tagay">Tagaytay</h1>
    <div class="details">
     <h2>tagaytay</h2>
    
     </div>
     </div>
    <div class="slider-img">
     <img src="5th.jfif" alt="5" class="pictures">
    <h1>Iloilo</h1>
 <div class="details">
    <h2>Ilo-ilo</h2>
     
     </div>
    </div>
     <div class="slider-img">
     <img src="oop2.jfif" alt="6" class="pictures">
     <h1 class="girl">ME</h1>
    <div class="details">
     <h2>Manaoag</h2>
    
     </div>
    </div>
     <div class="slider-img">
    <img src="7th.jfif" alt="7" class="pictures">
    <h1>Milo</h1>
    <div class="details">
     <h2>Milo</h2>
    
    </div>
     </div>
     </div>

     </section>



   <section class="cont" id="Contact">
    <div class="contact-container">

        <form method="POST" action="">
            <input type="hidden" name="form_type" value="contact">
            
            <h1>Contact Information</h1>

            <script>
<?php if (!empty($success) && $form_type === 'contact'): ?>
    alert("Your message has been sent successfully!");
<?php elseif (!empty($error) && $form_type === 'contact'): ?>
    alert("Please fill in all fields correctly.");
<?php endif; ?>
</script>


            <input type="text" name="firstname" id="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="text" name="mobile" id="mobile" placeholder="Mobile" required>

            <h4>Type Your Message Here...</h4>
            <textarea name="message" required></textarea>

            <input type="submit" value="Send" id="button">
        </form>

    </div>
</section>



    <audio id="bg-music" loop>
    <source src="unti.mp3" type="audio/mpeg">
     Your browser does not support the audio element.
    </audio>

<button id="music-toggle">Play Music</button>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <script>
    
            $(document).ready(function($){

    $('.slider-img').on('click', function(){
    $('.slider-img').removeClass('active'); 
     $(this).addClass('active'); 


     })
    });
    </script>
</body>
</html>