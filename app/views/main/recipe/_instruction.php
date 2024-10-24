<article>
    <h4>instructions</h4>
    {% for instruction in instructions %}
    <!-- single instruction -->
    <div class="single-instruction">
        <header>
        <p> {{instruction.step}} </p>
        <div></div>
        </header>
        <p>
         {{ instruction.name }}  
        </p>
    </div>
    <!-- end of single instruction -->
        {% endfor %}
</article>