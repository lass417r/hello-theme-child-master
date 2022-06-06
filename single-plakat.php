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
	<div class="page-content">
		<div class="json_content_single">
		  <!-- Her har vi lavet vores article til at udskrive json billeder i vores loopview. -->
      <button class="tilbage">Gå tilbage</button>
			<article>
         <img src="" alt="" class="billede" />
					<!-- Dette er en div til vores text json indhold. 
      		Indholdet bliver vist som overlay ved hover. -->
      		<div class="sw_info">
     		    <h3 class="navn"></h3>
						<h4 class="kunstner" style="color: #000000; font-family: Staatliches; font-size: 26 px; text-transform: uppercase; font-weight: 400;"></h4>
						<h5 class="size"></h5>
         		<p class="kategori"></p>
						<p class="beskrivelse"></p>
            <br>
         		<h4 class="pris"></h4>
					</div>
			</article>
		
			
		</div>
	</div>
</main>

<style>

  *:focus {
    outline: 0 !important;
    outline:none
  }

  html, body {
    width: 100%;
    overflow-x: hidden
  }

	h1,
  h2,
  h3,
  h4,
  h5 {
    font-family: Staatliches, sans-serif;
    font-weight: 400;
    font-style: normal;
	color: #000000;
  }
  h5 {
    font-size: 23 px;
	text-transform: uppercase;
  }
  h2 {
    font-size: 39 px;
	text-transform: uppercase;
  }
  h3 {
    font-size: 31 px;
    text-transform: uppercase;
	margin-top: 10%;
 
  }
  h4 {
    font-size: 26 px;
    text-transform: uppercase;

  }

  p {
    font-family: kefa, sans-serif;
    font-weight: 400;
    font-style: normal;
    color: #000000;
    padding-top: 1.5%;
	font-size: 15 px;
    text-overflow: ellipsis;
    max-width: 400px;
  }
  article {
    display: grid;
    grid-template-columns: 1fr 1fr;
		grid-template-rows: 1;
    gap: 30px;
    margin-bottom: 2rem;

  }

	button {
    background-color: transparent;
    border-style: solid;
    border-width: 3px 3px 3px 3px;
    border-radius: 0px 0px 0px 0px;
    padding: 12px 10px 12px 10px;
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
  }
  button:hover {
    background-color: #648B70;
    color: #fff;
    border: 3px solid #fff;
    transition: 0.5s ease;
  }
  button:active {
    background-color: #69846c;
    color: #fff;
    border: 3px solid #fff;
    transition: 0.5s ease;
  }
  button:focus {
    background-color: #69846c;
    color: #fff;
    border: 3px solid #fff;
    transition: 0.5s ease;
  }

  .tilbage {
  position: relative;
  left: 11%;
  top: 20px;
  margin-top: 5%;
  z-index: 111;
  }

  @media (max-width: 600px) {
    button {
    border: 3px solid #173f2f;
    font-size: 16px;
    padding: 10px 10px;

    }
  
    .tilbage {
      position: relative;
      left: 11%;
      top: 20px;
      margin-top: 5%;
      margin-bottom: 5%;
      z-index: 111;
    }
  }







}
</style>

<script> 


		let maal;
		window.addEventListener("DOMContentLoaded", getJson);

		async function getJson() {
			const dbUrl = "https://lasse-godtkjaer.dk/johannes_indramning/wp-json/wp/v2/plakat/"+<?php echo get_the_ID()?>;
			const data = await fetch (dbUrl);
			maal = await data.json();
			visRetter(); 
		}

		//vis data om retten

		function visRetter(){
			document.querySelector(".billede").src = maal.billede.guid;
			document.querySelector("h3").textContent = maal.title.rendered;
			document.querySelector("h4").textContent = maal.kunstner;
			document.querySelector(".kategori").textContent = maal.kategori;
			document.querySelector(".size").textContent = maal.storrelse;
			document.querySelector(".beskrivelse").textContent = maal.beskrivelse;
			document.querySelector(".pris").textContent = maal.pris;
		}

		document.querySelector(".tilbage").addEventListener("click", () => {history.back();})

</script>


<?php
	get_footer();
	endwhile;
?>
