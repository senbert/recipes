<div>
    <h4>ingredients</h4>
    {% for ingredient in ingredients %}
    
    <p class="single-ingredient">{{ ingredient.name}}</p>
    {% endfor %}
</div>