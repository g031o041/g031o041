<?= $this->Html->css('my.css') ?>
<div id="list-container">
    <header>
      <h1>観光イキイキ君</h1>
    </header>
    <main>
      <ul>
        <li>
          <h2><?= $this->Html->link(__($spot->spot_name), ['action' => 'view', $spot->id]) ?></h2>
          <h3><?= $this->Text->truncate($spot->spot_description, 24, ['ellipsis' => '…']) ?></h3>
          <span class="hidden"><?= json_encode(['id'=> $spot->id, 'name' => $spot->spot_name, 'address' => $spot->spot_address]) ?></span>
        </li>
      </ol>
    </main>
    <footer></footer>
  </div>
  <aside>
    <div id="map"></div>
  </aside>
  <span class="hidden">
    <?= json_encode($spot) ?>
</span>
  <?= $this->Html->script('scripts.js') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtT1D5p3cErKKf8ZHS-gd5bmR0-32AZH8&callback=initMap"
async defer></script>