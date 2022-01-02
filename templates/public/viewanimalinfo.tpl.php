<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Pet Info</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  

    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
    <link rel="stylesheet" type="text/css" href="Styling.css">

  


  

</head>
<body>
  <div>
    <!--Heading Banner-->
      <?php include_once("templates/include/header.txt");?>
  </div>
  <main class="green-background">
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
      <!--A few sentences describing what an animal is and looks like-->
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
      <!--A list of stats that help that particular animal score better in shows-->
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
            For information about different breeds in this species, click the link below:
          </p>
          <nav>
            <p><a href="/creaturetopia-public/animalReference">Breeds</a></p>
          </nav>
        </div>
      </section>
    </div>
    <div class="green-background" id=return-links>
      <p><a href="./index.html" accesskey="h">Site Home</a></p>
      <p><a href="#" accesskey="a">Your Homepage</a></p>
    </div>
  </main>
    <div>
      <!--footer info and links-->
      <?php include_once("templates/include/legal.txt");?>
    </div>
</div>