<?= $this->Html->css('my.css') ?>
<div id="list-container">
    <header>
      <h1>観光イキイキ君</h1>
    </header>
    <main>
      <p>p</p>
      <h2>h2</h2>
      <ol>
        <?php foreach($spots as $spot): ?>
        <li>
          <h2><?= $spot->spot_name ?></h2>
          <h3><?= $spot->spot_description ?></h3>
        </li>
        <?php endforeach; ?>
      </ol>
    </main>
    <footer></footer>
  </div>
  <aside>
    <div id="map"></div>
  </aside>
  <span class="hidden">
    <?= json_encode($spots) ?>
</span>
  <?= $this->Html->script('scripts.js') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtT1D5p3cErKKf8ZHS-gd5bmR0-32AZH8&callback=initMap"
async defer></script>