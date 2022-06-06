<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
while ( have_posts() ) :
	the_post();
	get_header();
?>


<main id="content" <?php post_class( 'site-main' ); ?> role="main">
	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
	<?php endif; ?>
	<div class="page-content">
		<?php the_content(); ?>
	</div>

	<!-- Her ligger sidens indhold. Udover en overskrift og knapper til filtrering,
	ligger der også en section som vi tilføjer indhold til ved hjælp af javascript  -->
	<div id="fake_main">
      <div class="container_2">
        <h1 id="overskrift">SE ET UDVALG AF VORES SORTIMENT</h1>
        <p id="intro_tekst">
          Her finder du et udsnit af plakater i vores sortiment. Du er
          velkom-men til at kontakte os, hvis du søger en specifik plakat eller
          ønsker professionel vejledning.
        </p>
        <h2>FILTRER EFTER kategori</h2>
        <nav id="filtrering">

        </nav>
      </div>
      <!-- Her har vi lavet vores template til at udskrive json billeder i vores loopview. -->
      <div class="json_content">
        <section id="maal-oversigt"></section>
      </div>
	</div>
    <template>
      <article>
        <img src="" alt="" class="billede" />
        <!-- Dette er en div til vores text json indhold. 
            Indholdet bliver vist som overlay ved hover. -->
        <div class="overlay">
          <h3 class="navn"></h3>
          <h4 class="kunstner" style="text-transform: uppercase;"></h4>
          <p class="pris"></p>
          <button class="klik_info">Se mere</button>
        </div>
      </article>
    </template>

    <style>
  html,
  body {
    width: 100%;
    overflow-x: hidden;
    padding: none;
    margin: none;
  }
  * {
    box-sizing: border-box;
    text-decoration: none;
  }

  *:focus {
    outline: 0 !important;
    outline:none
  }

  img {
    max-width: 100%;
  }
  /* TEKST STYLING*/
  h1,
  h2,
  h3,
  h4,
  h5 {
    font-family: Staatliches, sans-serif;
    font-weight: 400;
    font-style: normal;
    color: #173f2f;
  }
  h1 {
    padding-top: 1rem;
    font-size: 3rem;
    justify-self: center;
  }
  h2 {
    font-size: 2.4rem;
    justify-self: center;
    padding-top: 0.3rem;
    padding-bottom: 0.1rem;
  }
  h3 {
    font-size: 1.9rem;
    text-transform: uppercase;
    margin: 2%;
  }
  h4 {
    font-size: 1.6rem;
    text-transform: uppercase;
    margin: 2%;
  }
  .overlay p {
    margin: 2%;
  }
  p {
    font-family: kefa, sans-serif;
    font-size: 0.938rem;
    font-weight: 400;
    font-style: normal;
    color: #000000;
    padding-top: 1rem;
    text-overflow: ellipsis;
    max-width: 400px;
  }

  #intro_tekst {
    justify-self: center;
    text-align: center;
  }

  /* TEKST STYLING SLUT*/

  #filtrering {
    display: flex;
    justify-content: center;
    gap: 2%;
  }

  .container_2 {
    display: grid;
    grid-template-columns: 1;
    grid-row: 1;
    grid-column: 2/3;
  }

  main {
    display: grid;
    grid-template-columns: 1fr minmax(0, 1000px) 1fr;
  }
  /* Laver grid på vores json indhold */
  .json_content {
    grid-column: 2/3; /* Placerer vores indhold i midten af vores main grid */
    grid-row: 2;
  }
  #maal-oversigt {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 10px;
  }

  #filtrering button {
    border: 2px solid #173f2f;
    background-color: transparent;
    color: #173f2f;
    display: inline-block;
    font-family: Staatliches;
    font-size: 10px;
    text-decoration: none;
    aspect-ratio: 6/7;
    white-space: inherit;
    width: 60px;
    height: auto;
    padding: 0;
    transition: 0.5s ease;
    letter-spacing: 1%;
  }

  #filtrering button:hover {
    border: 2px solid #fff;
    background-color: #69846c;
    color: #fff;
    display: inline-block;
    font-family: Staatliches;
    font-size: 10px;
    text-decoration: none;
    aspect-ratio: 6/7;
    white-space: inherit;
    width: 60px;
    height: auto;
    padding: 0;
    transition: 0.5s ease;
  }
  #filtrering button:focus {
    border: 42x solid #fff;
    background-color: #69846c;
    color: #fff;
    display: inline-block;
    font-family: Staatliches;
    font-size: 10px;
    text-decoration: none;
    aspect-ratio: 6/7;
    white-space: inherit;
    width: 60px;
    height: auto;
    padding: 0;
    transition: 0.5s ease;
  }
  @media (max-width: 600px) {
    .container_2 p {
      text-align: center;
      padding: 0% 2% 0% 2%;
    }
    h1 {
      text-align: center;
    }
    .overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 30%;
      width: 100%;
      opacity: 1;
      padding: 5px;
      margin-bottom: 2rem;
    }
    .overlay h4,
    .overlay p {
      display: none;
    }
    .overlay h3,
    #klik_info {
      margin-top: 40%;
    }

    article {
      margin-top: 3rem;
      margin-bottom: 1rem;
    }

    article: {
      margin-top: 3rem;
      margin-bottom: 1rem;
    }
    article:last-child {
      margin-bottom: 5rem;
    }
    article:first-child {
      margin-top: 1rem;
      margin-bottom: 1rem;
    }
  }

  /* dekstop media */
  @media (min-width: 600px) {
    h2{
      margin-top: 5% ;
      margin-bottom: 10%;
    }
    #filtrering button {
      border: 3px solid #173f2f;
      border-radius: 0px 0px 0px 0px;
      background-color: transparent;
      color: #173f2f;
      cursor: pointer;
      font-size: 20px;
      padding: 0px 25px;
      aspect-ratio: 6/7;
      text-transform: uppercase;
      white-space: inherit;
      width: 200px;
      height: auto;
      transition: 0.5s ease;
      letter-spacing: 0.1rem;
    }
    #filtrering button:hover {
      border: 3px solid transparent;
      border-radius: 0px 0px 0px 0px;
      background-color: #69846c;
      color: #fff;
      cursor: pointer;
      font-size: 20px;
      padding: 0px 25px;
      aspect-ratio: 6/7;
      text-transform: uppercase;
      white-space: inherit;
      width: 200px;
      height: auto;
      transition: 0.5s ease;
    }
    #filtrering button:focus {
      border: 3px solid transparent;
      border-radius: 0px 0px 0px 0px;
      background-color: #69846c;
      color: #fff;
      cursor: pointer;
      font-size: 20px;
      padding: 0px 25px;
      aspect-ratio: 6/7;
      text-transform: uppercase;
      white-space: inherit;
      width: 200px;
      height: auto;
      transition: 0.5s ease;
    }

    /* gør overlay synligt ved hover over produkt */
    article:hover .overlay {
      opacity: 1;
    }

    .overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 50%;
      width: 100%;
      opacity: 0;
      transition: 0.5s ease;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 5px;
    }
  }

  button:hover {
    background-color: #173f2f2c;
    transition: 0.5s ease;
  }
  button:active {
    background-color: #69846c;
    color: #fff;
    border: 0px;
    transition: 0.5s ease;
  }

  /* OVERLAY START */
  /* Vi har et overlay over produkterne med informationer ved hover. */

  .overlay p,
  .overlay h3,
  .overlay h4 {
    color: #193f2f;
  }

  /* Knap i overlay, så sender brugeren til popup */

  .klik_info {
    background-color: transparent;
    border-style: solid;
    border-width: 3px 3px 3px 3px;
    border-radius: 0px 0px 0px 0px;
    padding: 12px 10px 12px 10px;
    display: inline-block;
    cursor: pointer;
    font-family: "Staatliches", Sans-serif;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
    font-style: normal;
    text-decoration: none;
    line-height: 1em;
    letter-spacing: 2px;
	  white-space: inherit;
    transition: 0.5s ease;
    fill: #193F2F;
    color: #173f2f;
    border-color: #193F2F;
    float: left;
    aspect-ratio: inherit;
    margin-left: 2%;
  }


  .klik_info:hover {
    background-color: #648B70;
    color: #fff;
    border: 3px solid transparent;
    transition: 0.5s ease;
  }
  .klik_info:active {
    background-color: #69846c;
    color: #fff;
    border: 3px solid transparent;
    transition: 0.5s ease;
  }
  .klik_info:focus {
    background-color: #69846c;
    color: #fff;
    border: 3px solid transparent;
    transition: 0.5s ease;
  }
  /* Indhold fra vores json */
  article {
    position: relative;
    transition: 250ms ease-in;
    padding: 1rem;
    cursor: pointer;
    max-width: 100%;
  }

  article img {
    max-width: 100%;
  }
  /* OVERLAY SLUT */
</style>





	<script>
		let plakat;
		let categories;
		let filterPlakater = "alle";

		// Her laver vi vores links til json og kategori som konstanter
		const url ="https://lasse-godtkjaer.dk/johannes_indramning/wp-json/wp/v2/plakat?per_page=100";
		const catUrl ="https://lasse-godtkjaer.dk/johannes_indramning/wp-json/wp/v2/categories";

		const liste = document.querySelector("#maal-oversigt");
		const skabelon = document.querySelector("template");

		// Lytter efter om DOM'en er loadet og starterter derefter functionen Start
		document.querySelector("DOMContentLoaded", start);

		function start() {
 		 getJson();
		}
		// I denne function henter vores script json data iform af
		// categories og projekter. Derudover console logger den og starter
		// funktionerne visPlakat og opretKnapper.
		async function getJson() {
 		 let response = await fetch(url);
 		 let catdata = await fetch(catUrl);
 		 plakat = await response.json();
 		 categories = await catdata.json();
 		 console.log(categories);
 		 console.log(plakat);
 		 visPlakat();
 		 opretKnapper();
		}
		// I denne function opretter vi vores forskellige filtrerings knapper
		// udfra vores forskellige WP kategorier. Derudover starter vi functionen
		// 	addEventListenersToButtons
		function opretKnapper() {
	 		categories.forEach((cat) => {document.querySelector("#filtrering").innerHTML += `<button class="filter" data-plakat="${cat.id}">${cat.name}</button>`;});
			addEventListenersToButtons();
		}
		// I denne function tilføjer vi eventListeners til de knapper vi lavede
		// i functionen lige ovenover.
		function addEventListenersToButtons() {
  			document.querySelectorAll("#filtrering button").forEach((elm) => {elm.addEventListener("click", filtrering);
	  });
		}
		// Denne function gør det muligt at filtrer ved tryk på knapperne
		function filtrering() {
	 filterPlakater = this.dataset.plakat;
 	 console.log(filterPlakater);
 	 visPlakat();
		}

		getJson();

		// I denne function udskriver vi vores Json data på siden. Derudover
		// tilføjer vi en eventListener, som gør det muligt at åbne singleview.
		function visPlakat() {
 		 console.log(plakat);
 	 	let temp = document.querySelector("template");
 		let container = document.querySelector("#maal-oversigt");
	  container.innerHTML = "";
  		plakat.forEach((plakat) => {
    	if (
      filterPlakater == "alle" ||
      plakat.categories.includes(parseInt(filterPlakater))
   	 ) {
      const klon = skabelon.cloneNode(true).content;
      klon.querySelector("h3").textContent = plakat.title.rendered;
      klon.querySelector("img").src = plakat.billede.guid;
      klon.querySelector(".kunstner").textContent = plakat.kunstner;
      klon.querySelector(".pris").textContent = plakat.pris;
      klon.querySelector("article").addEventListener("click", () => {
        location.href = plakat.link;
      });
      liste.appendChild(klon);
   	 }
  		});
		}

	</script>
</main>

<?php
	get_footer();
	endwhile;
?>
