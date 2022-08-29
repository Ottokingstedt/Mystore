<?php 
    require_once __DIR__ . "/classes/Template.php";

    Template::header("");

    ?> 
 <main class="l-main">
            <!--===== HOME =====-->
            <section class="home" id="home">
                <div class="home__container bd-grid">
                    <div class="home__img">
                        <img src="/mystore/assets/img/img1.png" alt="" data-speed="-2" class="move">
                        <img src="/mystore/assets/img/img2.png" alt="" data-speed="2" class="move">
                        <img src="/mystore/assets/img/img3.png" alt="" data-speed="2" class="move">
                        <img src="/mystore/assets/img/img4.png" alt="" data-speed="-2" class="move">
                        <img src="/mystore/assets/img/img5.png" alt="" data-speed="-2" class="move">
                        <img src="/mystore/assets/img/hero-can-splash-dance-splash.png" alt="" data-speed="-2" class="move" style="width:auto; height: 120%; left:10%; top:-20%;">
                    </div>

                    <div class="home__data">
                        <h1 class="home__title">Wizard<br>Soda</h1>
                        <p class="home__description">Let's help discover the best soda drink <br> of the week.</p>
                        <a href="/Mystore/pages/products.php" class="home__button">Get Started</a>
                    </div>
                </div>
            </section>
        </main>

    <?php 
    
    Template::footer("");
    
    ?>

