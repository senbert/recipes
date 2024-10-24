<main class="page">
     <section class="contact-container">
          <article class="contact-info">
            
            <h3>Want To Get In Touch?</h3>
            <p>
              Four dollar toast biodiesel plaid salvia actually pickled banjo
              bespoke mlkshk intelligentsia edison bulb synth.
            </p>
            <p>Cardigan prism bicycle rights put a bird on it deep v.</p>
            <p>
              Hashtag swag health goth air plant, raclette listicle fingerstache
              cold-pressed fanny pack bicycle rights cardigan poke.
            </p>
          </article>
          <article>
            {{message|raw}}
            <form class="form contact-form" action="/contact/add" method="POST">
              <div class="form-row">
                <label html="name" class="form-label">your name</label>
                <input type="text" name="name" id="name" class="form-input" />
              </div>
              <div class="form-row">
                <label html="email" class="form-label">your email</label>
                <input type="text" name="email" id="email" class="form-input" />
              </div>
              <div class="form-row">
                <label html="message" class="form-label">message</label>
                <textarea name="message" id="message" class="form-textarea"></textarea>
              </div>
              <button type="submit" class="btn btn-block">
                submit
              </button>
              
            </form>
          </article>
        </section>
     <!-- featured recipes -->
       <section class="featured-recipes">
        <h5 class="featured-title">Look At This Awesomesouce!</h5>
        <div class="recipes-list">
          <!-- single recipe -->
           <!-- php foreach for all recipe -->
           {% for recipe in recipes %}
          <a href="/recipe/{{recipe.id}}" class="recipe">
            <img
              src="/assets/img/recipes/{{recipe.img}} "
              class="img recipe-img"
              alt=""
            />
            <h5>{{recipe.name}} </h5>
            <p>Prep : {{recipe.prep}}min | Cook :{{recipe.cook}}min</p>
          </a>
          <!-- end of single recipe -->
           {% endfor %}
            <!-- end php foreach for all recipe -->
           
          <!-- end of single recipe -->
        </div>
      </section>
    </main>