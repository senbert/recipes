
    <main class="page">
      <div class="recipe-page">
        <section class="recipe-hero">
          <img
            src="/assets/img/recipes/{{ recipe.img }}"
            class="img recipe-hero-img"
          />
          {% include 'main/recipe/_info.php' %}
          
            </div>
            <p class="recipe-tags">
              Tags : 
              {% for tag in tags %}
              <a href="/main/tag?tag_id={{ tag.id }} ">{{ recipe.name }}</a>
              {% endfor %}
            </p>
          </article>
        </section>
        <!-- content -->
        <section class="recipe-content">

          {% include 'main/recipe/_instruction.php' %}


          <article class="second-column">
            {% include 'main/recipe/_ingredients.php' %}

            {% include 'main/recipe/_tools.php' %}
          </article>
        </section>
      </div>
    </main>