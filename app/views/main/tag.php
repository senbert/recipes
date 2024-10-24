<main class="page">
    <div class="featured-recipes">
        <h4>{{tag.name}} </h4>
        <!-- recipes list -->
        <div class="recipes-list">
            {% for recipe in tag.recipes %}
            <!-- single recipe -->
            <a href="/recipe/{{recipe.id}}" class="recipe">
                <img
                src="/assets/img/recipes/{{recipe.img}}"
                class="img recipe-img"
                alt=""
                />
                <h5>{{recipe.name}}</h5>
                <p>Prep : {{recipe.prep}} min | Cook : {{recipe.cook}} min</p>
            </a>
            <!-- end of single recipe -->
            {% endfor %}
        </div>
        <!-- end of recipe list -->
    </div>        
</main>