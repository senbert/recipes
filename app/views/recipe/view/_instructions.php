<div class="tab-pane fade" id="instructions">
        <h2 class="text-center">Recipe instructions</h2>
        <a href="/instruction/add/{{recipe.id}}" class="btn btn-primary mb-3" role="button">Add instruction</a>
        {% if instructions %}
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Step</th>
                <th scope="col">Text</th>
                <th scope="col" width="200px">Actions</th>
            </tr>
            </thead>
            <tbody>
            {% for instruction in instructions %}
            <tr>
                <th scope="row">{{instruction.step}}</th>
                <td>{{instruction.name}} </td>
                <td>
                    <a href="/instruction/delete/{{instruction.id}}" class="btn-sm btn-danger">Delete</a>
                    <a href="/instruction/edit/{{instruction.id}}" class="btn-sm btn-primary">Edit</a>
                </td>
            </tr>
            {% endfor %}


            <!-- <tr>
                <th scope="row">2</th>
                <td>Pabst pitchfork you probably haven't heard of them, asymmetrical seitan tousled succulents wolf banh mi man bun bespoke selfies freegan ethical hexagon.</td>
                <td>
                    <a href="#" class="btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn-sm btn-primary">Edit</a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Polaroid iPhone bitters chambray. Cornhole swag kombucha live-edge.</td> -->
                <!-- <td>
                    <a href="#" class="btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn-sm btn-primary">Edit</a>
                </td>
            </tr> -->
            </tbody>
        </table>
        {% else %}
            <p>Инструкций нету</p>
        {% endif %}
    </div>