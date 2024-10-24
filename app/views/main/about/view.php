</head>
  <body>

    <main class="page">
      <section class="about-page">
        <article>
          <h2>I'm baby coloring book poke taxidermy</h2>
          <p>
            Taxidermy forage glossier letterpress heirloom before they sold out
            you probably haven't heard of them banh mi biodiesel chia.
          </p>
          <p>
            Taiyaki tumblr flexitarian jean shorts brunch, aesthetic salvia
            retro.
          </p>
          <a href="contact.html" class="btn"> contact </a>
        </article>
        <!-- needs fixes -->
        <img
          src="../assets/img/about.jpeg"
          alt="Person Pouring Salt in Bowl"
          class="img about-img"
        />
      </section>
      <section class="featured-recipes">
        <h5 class="featured-title">Look At This Awesomesouce!</h5>
        <div class="recipes-list">
          <!-- single recipe -->
            {% for recipe in recipes %}
          <a href="/recipe/{{recipe.id}}" class="recipe">
            <img
              src="/assets/img/recipes/{{recipe.img}} "
              class="img recipe-img"
              alt=""
            />
            <h5>{{recipe.name}} </h5>
            <p>Prep :{{recipe.prep}} min | Cook : {{recipe.cook}} min</p>
          </a>
          <!-- end of single recipe -->
           {% endfor %}
          <!-- single recipe -->
         
          <!-- end of single recipe -->
        </div>
      </section>
    </main>