<?php
  session_start();
if (!empty($_SESSION['id']) and !empty($_SESSION['name']) and !empty($_SESSION['email'] and $_SESSION['role']==1) ){
  
    header("location:Admin/admin_dash.php"); 
        exit;
}else if (!empty($_SESSION['id']) and !empty($_SESSION['name']) and !empty($_SESSION['email'] and $_SESSION['role']!=1) ){
     header("location:view/"); 
        exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Shoes</title>
    <link rel="icon" href="images/custimages/bg.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shorthandcss@1.1.1/dist/shorthand.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:200,300,400,500,600,700,800,900&display=swap" />
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>


<section id="features" class="p-10 md-p-l5">
    <div class="mx-5 md-mx-l5">
        <h1 class="white fs-l3 lh-2 md-fs-xl1 md-lh-1 fw-900 ">Select Shoes Dashboard</h1>  
       
            </h6>

        </div>
    </div>  
</section>
<body   class="bg-black muli">
 


  
    <!-- features -->
    <section id="features" class="p-10 md-p-l5">
        <div class="flex flex-column md-flex-row mx-auto">
            
            <div class="w-100pc md-w-40pc">
                <div class="br-8 p-5 m-5">
                    <div class="flex justify-center items-center bg-indigo-lightest-10 white w-l5 h-l5 br-round mb-5"><img src="images/custimages/bg.png"></div>
                        <h4 class="white fw-600 fs-m3 mb-5">REGISTER</h4>
                        <div class="indigo-lightest fw-600 fs-m1 opacity-50">Don't Have An Account?</div>
                        <a href="Login/register.php"
                        class="mt-5 button bg-indigo-lightest-10 fs-s3 white no-underline hover-opacity-100 hover-scale-up-1 ease-300">Proceed</a>
                    </div>
                </div>
                <div class="w-100pc md-w-40pc">
                    <div class="br-8 p-5 m-5">
                        <div class="flex justify-center items-center bg-indigo-lightest-10 white w-l5 h-l5 br-round mb-5"><img src="images/custimages/bg.png"></div>
                            <h4 class="white fw-600 fs-m3 mb-5">LOGIN</h4>
                            <div class="indigo-lightest fw-600 fs-m1 opacity-50">Have An Account?</div>
                            <a href="Login/login.php"
                            class="mt-5 button bg-indigo-lightest-10 fs-s3 white no-underline hover-opacity-100 hover-scale-up-1 ease-300">Proceed</a>
                        </div>
                    </div>
                     <div class="w-100pc md-w-40pc">
                    <div class="br-8 p-5 m-5">
                        <div class="flex justify-center items-center bg-indigo-lightest-10 white w-l5 h-l5 br-round mb-5"><img src="images/custimages/bg.png"></div>
                            <h4 class="white fw-600 fs-m3 mb-5">Post Advert</h4>
                            <div class="indigo-lightest fw-600 fs-m1 opacity-50">Advertise Your Business</div>
                            <a href="Adverts"
                            class="mt-5 button bg-indigo-lightest-10 fs-s3 white no-underline hover-opacity-100 hover-scale-up-1 ease-300">Proceed</a>
                        </div>
                    </div>
                    <div class="w-100pc md-w-40pc">
                    <div class="br-8 p-5 m-5">
                        <div class="flex justify-center items-center bg-indigo-lightest-10 white w-l5 h-l5 br-round mb-5"><img src="images/custimages/bg.png"></div>
                            <h4 class="white fw-600 fs-m3 mb-5">View Website</h4>
                            <div class="indigo-lightest fw-600 fs-m1 opacity-50">View Website Without Logging In</div>
                            <a href="view/"
                            class="mt-5 button bg-indigo-lightest-10 fs-s3 white no-underline hover-opacity-100 hover-scale-up-1 ease-300">Proceed</a>
                        </div>
                    </div>
                </div>
            </section>

            

            

            


            

            <?php
            if(!empty($_SESSION['advert']) and $_SESSION['advert']=='yes'  ){
    ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script >
Swal.fire({
  icon: 'success',
  title: 'Advert Submitted Successfully',
  showConfirmButton: false,
 timer: 4000,
})
    </script>

    <?php
    unset($_SESSION['advert']);
}
else if (!empty($_SESSION['advert']) and $_SESSION['advert']=='no'  ){
     ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script >
Swal.fire({
  icon: 'error',
  title: 'Failed To Add Advert',
  showConfirmButton: false,
 timer: 4000,
})
    </script>

    <?php
 unset($_SESSION['advert']);
}

            ?>
            

            
            
            
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://unpkg.com/feather-icons"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
            <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js"></script>
            <script src="assets/js/script.js"></script>
        </body>

        </html>