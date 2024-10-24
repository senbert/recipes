
    <div class="tab-pane fade" id="tags">
        <h2 class="text-center">Recipe tags</h2>
        <a href="/recipe/add_tag/{{recipe.id}}" class="btn btn-primary mb-3" role="button">Add Tag</a>
        {% if tags %}
        <table class="table table-bordered table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            {% for tag in tags %}
            <tr>
                <th scope="row">{{loop.index}} </th>
                <td>{{tag.name}}</td>
                <td>
                    <a href="/recipe/delete_tag/{{recipe.id}}/{{tag.id}}" class="btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            {% endfor %}
    
        </tbody>
        </table>
        {% else %}
            <p>Тегов нет</p>
        {% endif %}
    </div>