<div>
  <!--Heading Banner-->
    <header id="site-name">
      <h1>
        Creaturetopia
      </h1>
    </header>
  </div class="green-background">
      <section id="animalIntro">
      <!--small image of animal goes here-->
        <div id="introImage">
        </div>
        <!--Name variable-->
        <h4 id="animal">
          <?php echo $animal->animal_name; ?>
        </h4>
      </section>
  </div>
  <div class="green-background">
    <section id="animalInfo">
      <!--A few sentances describing what an animal is and looks like-->
      <div id=description>
      <?php echo $animal->description_of_animal; ?>
      </div>
      <p>
        Some of the items you can use on your animal include:
      </p>
      <ul id="items">
      <?php echo $item->item_name; ?>
      <?php echo $item->item_description; ?>
      <?php echo $item->stats_affected; ?>
      </ul>
      <p>
        Stats that can help your animal do well in shows include:
      </p>
      <!--A list of stats that help that particualr animal score beteer in shows-->
      <ul id="stats">
        stat list
      </ul>
      <h4>
        Stock Images
      </h4>
        <!--Below are all the images the site has available for users to have on their animals page-->
        <div id="stock">
        </div>
        <div id="species">
          <p>
            For information about differnt breeds in this species, click the link below:
          </p>
          <p><a href="#">Breeds</a></p>
        </div>
      </section>
    </div>
    <div class="green-background" id=return-links>
      <p><a href="./index.html" accesskey="h">Site Home</a></p>
      <p><a href="#" accesskey="a">Your Homepage</a></p>
    </div>
    <footer id="legalities">
      <p>
        <small>
          By creating and registering an account, you're agreeing to follow Creatutopia's <a href="#" accesskey="r">Rules</a>, <a href="#" accesskey="t">Terms Of Sevice</a>, and have read and agreed with our <a href="./privacy_policy.html">Privacy Policy</a>.
        </small>
      </p>
    </footer>
</div>