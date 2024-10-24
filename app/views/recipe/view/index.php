<div class="container mt-3">
    <h1 class="text-center">{{recipe.name}}</h1>
    <!-- nav -->
    {% include 'recipe/view/_nav.php' %}
  
    <div class="tab-content mt-3">

        <!-- info -->  
        {% include 'recipe/view/_info.php' %}

        <!-- tags -->
        {% include 'recipe/view/_tags.php' %}
        
        <!-- tools -->
        {% include 'recipe/view/_tools.php' %}
        
        <!-- ingredients -->
        {% include 'recipe/view/_ingredients.php' %}

        <!-- instructions -->
        {% include 'recipe/view/_instructions.php' %}

    </div>
</div>

 