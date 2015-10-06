<section class="cd-gallery">
  <div class="cd-fail-message">No hay resultados</div>
  <ul>
    <?php $this->widget('zii.widgets.CListView', array(
      'dataProvider'=>$dataProvider,
      'itemView'=>'_view',
    )); ?>
  </ul>
</section>
<div class="cd-filter">
  <form>
    <div class="cd-filter-block">
      <div class="cd-filter-content">
        <input type="search" placeholder="...">
      </div> <!-- cd-filter-content -->
    </div> <!-- cd-filter-block -->
    <div class="cd-filter-block">
      <h4>Ciudad</h4>
      <div class="cd-filter-content">
        <div class="cd-select cd-filters">
        <select class="filter" name="selectThis">
          <option value=".calama">Calama</option>
          <option value=".antofagasta">Antofagasta</option>
          <option value=".option2">Iquique</option>
        </select>
        </div> <!-- cd-select -->
      </div> <!-- cd-filter-content -->
    </div> <!-- cd-filter-block -->
    <div class="cd-filter-block">
      <h4>Típo</h4>
      <div class="cd-filter-content">
        <div class="cd-select cd-filters">
        <select class="filter" name="selectThis" id="selectThis">
          <option value="">Típode propiedad</option>
          <option value=".option1">Casa</option>
          <option value=".option2">Departamento</option>
          <option value=".option3">Pieza</option>
          <option value=".option4">Terreno</option>
          <option value=".option4">Local</option>
        </select>
        </div> <!-- cd-select -->
      </div> <!-- cd-filter-content -->
    </div> <!-- cd-filter-block -->
    <div class="cd-filter-block">
      <h4>Radio buttons</h4>
      <ul class="cd-filter-content cd-filters list">
        <li>asdsdaasdadssdads</li>
      </ul> <!-- cd-filter-content -->
    </div> <!-- cd-filter-block -->
    <div class="cd-filter-block">
      <ul class="cd-filter-content cd-filters list">
      <li>
        <input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
        <label class="checkbox-label" for="checkbox1">Amoblado</label>
      </li>
      </ul> <!-- cd-filter-content -->
    </div> <!-- cd-filter-block -->
    <a class="button raised green" href="Busqueda.html" fit >Buscar<paper-ripple fit></paper-ripple></a>
  </form>
  <a href="#0" class="cd-close">X</a>
</div> <!-- cd-filter -->
<a href="#0" class="cd-filter-trigger">Filtrar resultados</a>
