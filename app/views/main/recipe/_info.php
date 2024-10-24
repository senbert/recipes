<article class="recipe-info">
    <h2>{{ recipe.name }}</h2>
    <p>
        {{ recipe.text }}
    </p>
    <div class="recipe-icons">
        <article>
        <i class="fas fa-clock"></i>
        <h5>prep time</h5>
        <p>{{ recipe.prep }} min.</p>
        </article>
        <article>
        <i class="far fa-clock"></i>
        <h5>cook time</h5>
        <p>{{ recipe.cook }} min.</p>
        </article>
        <article>
        <i class="fas fa-user-friends"></i>
        <h5>serving</h5>
        <p>{{ recipe.server }} servings</p>
        </article>
    </div>
</article>