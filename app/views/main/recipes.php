     <!-- main -->
    <main class="page">
      <section class="recipes-container">
        <!-- tag container -->
        <div class="tags-container">
          <h4>recipes</h4>
          <div class="tags-list">
        {% for tag in tags %}
            <a href="tag-template.html">{{tag.name}} (1)</a>
            {% endfor %}
          </div>
        </div>
        <!-- end of tag container -->
        <!-- recipes list -->
        <div class="recipes-list">
        {% for recipe in recipes %}
          <!-- single recipe -->
          <a href="/recipe/{{recipe.id}}" class="recipe">
            <img
              src="../assets/img/recipes/{{recipe.img}}"
              class="img recipe-img"
              alt=""
            />
            <h5>{{recipe.name}} </h5>
            <p>Prep :{{recipe.prep}}min | Cook : {{recipe.cook}}min</p>
          </a>
          <!-- end of recipe -->
        {% endfor %}

        </div>
      </section>
    </main>
  