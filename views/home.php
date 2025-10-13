<?php
if($_SESSION["role"]!="U"){

    header('Location: index.php?pid=Login');
}
?>
<div>
    <div class="container">
        <div class="row mt-5 vh-100 ">
            <div class="col-md-12 col-xl-6 text-light position-relative">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <h1>Bienvenido a Liga Main</h1> 
                    <p>Tu plataforma para gestionar ligas deportivas de manera eficiente y sencilla.</p>
                </div> 
            </div>
            <div class="col ">
                <div class="overflow-auto">
                    <?php
                    //colocar los respectivos campenoatos del usuario en cards 
                    
                    ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="..." class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>