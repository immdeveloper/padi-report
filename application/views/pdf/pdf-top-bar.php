<div class="top-bar">
  <span>Report Preview for <strong><?php echo $status['url'] ?></strong> - <?php echo date('j<\s\up>S</\s\up> F Y', strtotime($status['date']));?></span>
  <a href="#" id="generate-report" class="generate-btn" data-id="<?php echo $this->uri->segment(2); ?>"><i class="fa fa-file-pdf-o"></i> Generate</a>
  <a href="<?=base_url()?>edit-report/<?php echo $this->uri->segment(2); ?>" id="update-report" class="generate-btn" data-id="<?php echo $this->uri->segment(2); ?>"><i class="fa fa-file-pdf-o"></i> Edit Report</a>
</div>
