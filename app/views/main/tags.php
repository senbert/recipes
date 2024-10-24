<main class="page">
  <section class="tags-wrapper">
    {% for tag in tags %}
      {% if tag.count %}
      <!-- single tag -->
        <a href="/tag/{{tag.id}}" class="tag">
          <h5>{{tag.name}}</h5>
          <p>{{tag.count}} recipe</p>
        </a>
      <!-- end of single tag -->
       {% endif %}
    {% endfor %}
  </section>
</main>

  