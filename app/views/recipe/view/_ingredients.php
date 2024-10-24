<div class="tab-pane fade" id="ingredients">
        <h2 class="text-center">Recipe ingredients</h2>
        <a href="/ingredient/add/{{recipe.id}}" class="btn btn-primary mb-3" role="button">Add ingredient</a>
            {% if ingredients %}
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            
            {% for ingredient in ingredients %}
            
            <tr>
                <th scope="row">{{loop.index}}</th>
                <td>{{ingredient.name}} </td>
                <td>
                    <a href="/ingredient/delete/{{ingredient.id}} " class="btn-sm btn-danger">Delete</a>
                    <a href="/ingredient/edit/{{ingredient.id}}" class="btn-sm btn-primary">Edit</a>
                </td>
            </tr>
            {% endfor %}
           
            </tbody>
        </table>
        {% else %}
            <p>Ингедиентов нету</p>
        {% endif %}
    </div>