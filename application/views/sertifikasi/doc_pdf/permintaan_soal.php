<style>
  .full-width{width:100%}
  .pilihan{padding-left: 15px;}
</style>
<div class="full-width">
  <div class="col-lg-12">
     <?php
     $no=1;
     foreach ($data as $key): ?>
    <div class="row">
      <a style="margin-bottom:5px;"> <?php echo $no.') '.$key->PERTANYAAN; ?></a><br/><br/>
      <div class="row pilihan">
        A. <?php echo $key->PILIHAN_1; ?>
      </div>
      <div class="row pilihan">
        B. <?php echo $key->PILIHAN_2; ?>
      </div>
      <div class="row pilihan">
        C. <?php echo $key->PILIHAN_3; ?>
      </div>
      <div class="row pilihan">
        D. <?php echo $key->PILIHAN_4; ?>
      </div>
      <div class="row pilihan">
        E. <?php echo $key->PILIHAN_5; ?>
      </div>
      <div class="row pilihan">
        F. <?php echo $key->PILIHAN_6; ?>
      </div>
      <div class="row pilihan">
        G. <?php echo $key->PILIHAN_7; ?>
      </div>
      <div class="row pilihan">
        H. <?php echo $key->PILIHAN_8; ?>
      </div>
    </div><br/><br/><br/>
      <?php
      $no++;
    endforeach;  ?>
  </div>
</div>
