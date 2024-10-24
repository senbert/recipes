<div class="tab-pane fade" id="tools">
        <h2 class="text-center">Recipe tools</h2>
        <a href="/recipe/add_tool/{{recipe.id}}" class="btn btn-primary mb-3" role="button" class="btn btn-primary mb-3" role="button">Add Tool</a>
        {% if tools %}
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
           
             {% for tool in tools %}
            <tr>
                <th scope="row">{{loop.index}}</th>
                <td>{{tool.name}}</td>
                <td>
                    <a href="/recipe/delete_tool?tool_id=<?php echo $tool['tool_id']; ?>&recipe_id=<?php echo $tool['recipe_id']; ?> " class="btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <{% endfor %}
            </tbody>
        </table>
        {% else %}
       <p>Инструментов нету</p>
       {% endif %}

    </div>