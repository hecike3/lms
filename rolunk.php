<?php
include "assets/header.php";
?>

    <div class="hero" id="animateMe">
        Rólunk
    </div>

    <div class="spacer"></div>

<div class="container">
<div class="row">
    <div class="col-md-4">
      <div class="caption">
        <div class="counter">
          <div class="value" akhi="1000">0</div> 
          <p class="unit"> + sor</p>
        </div>

        <p class="description">kód</p>
      </div>
    </div>
  


    <div class="col-md-4">
      <div class="caption">
        <div class="counter">
          <div class="value" akhi="500">0</div> 
          <p class="unit"> db</p>
        </div>

        <p class="description">csésze kávé</p>
      </div>
    </div>


    <div class="col-md-4">
      <div class="caption">
          <div class="counter">
            <div class="value" akhi="36">0</div> 
            <p class="unit"> óra</p>
          </div>

          <p class="description">munka</p>
      </div>
    </div>

</div>

<div class="spacer"></div>

<div class="row">
  <div class="col-sm-12">

    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 80%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">80%</div>
    </div>
    <p class="description"> Front-end </p>

    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 90%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">90%</div>
    </div>
    <p class="description"> Back-end </p>

    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">101%</div>
    </div>
    <p class="description"> Királyság-o-Meter </p>

    </div>
  </div>

  <hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading"> Ez bizony egy h2 szöveg
    </h2>
    <span class="text-muted">Ez pedig egy sima alcím</span>
    <p class="lead">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore velit corporis accusantium enim eveniet placeat ea illo adipisci, maxime nemo ipsa possimus quasi nostrum quis magnam ut, minima, accusamus debitis.
    </p>
  </div>

  <div class="col-md-5">
    <img src="https://kep.cdn.indexvas.hu/1/0/1283/12831/128317/12831752_e076a54f8a8bddf9f0e19bfe0ad9f2c6_wm.jpg" class="featurette-image img-fluid mx-auto">
  </div>

</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-5">
    <img src="https://kep.cdn.indexvas.hu/1/0/1283/12831/128317/12831752_e076a54f8a8bddf9f0e19bfe0ad9f2c6_wm.jpg" class="featurette-image img-fluid mx-auto">
  </div>

  <div class="col-md-7">
    <h2 class="featurette-heading"> Ez bizony egy h2 szöveg
    </h2>
    <span class="text-muted">Ez pedig egy sima alcím</span>
    <p class="lead">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore velit corporis accusantium enim eveniet placeat ea illo adipisci, maxime nemo ipsa possimus quasi nostrum quis magnam ut, minima, accusamus debitis.
    </p>
  </div>

</div>



</div>



</div>



<script type="module">
import Letterize from "https://cdn.skypack.dev/letterizejs@2.0.0";
const test = new Letterize({
      targets: "#animateMe"
    });

    var animation = anime.timeline({
      targets: test.listAll,
      delay: anime.stagger(50),
      loop: true
    });

    animation
      .add({
        translateY: -40
      })
      .add({
        translateY: 0
      });


const counters = document.querySelectorAll('.value');
const speed = 100;

counters.forEach( counter => {
   const animate = () => {
      const value = +counter.getAttribute('akhi');
      const data = +counter.innerText;
     
      const time = value / speed;
     if(data < value) {
          counter.innerText = Math.ceil(data + time);
          setTimeout(animate, 1);
        }else{
          counter.innerText = value;
        }
     
   }
   
   animate();
});


</script>

<?php
include "assets/footer.php";
?>

