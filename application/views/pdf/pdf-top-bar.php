<style media="screen">
  html{
        margin:0;
  }

  body{
    font-family: 'arial';
    background-color: #333;
  }

  section p{
    line-height: 150%;
  }

  /*Page break*/
  section,
  .detail-list-loop{
    margin-bottom: 50px;
  }

  section:last-child,
  .detail-list-loop:last-child{
    page-break-after: avoid;
  }

  .container{
    margin: 100px 251px;
    padding: 72px;
    -webkit-box-shadow: 1px 1px 9px 1px rgba(0,0,0,0.75);
    -moz-box-shadow: 1px 1px 9px 1px rgba(0,0,0,0.75);
    box-shadow: 1px 1px 9px 1px rgba(0,0,0,0.75);
    background-color:#FFF;
  }

  .top-bar{
    height: 60px;
    width: 100%;
    -webkit-box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.75);
    box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.75);
    background-color:#222;
    position: fixed;
    top:0;
    /*display: none;*/
  }

  .generate-btn{
    padding: 5px 10px;
    background-color: #EEE;
    float:right;
    color: #333;
    text-decoration: none;
  }
</style>
<div class="top-bar">
  <a href="<?php echo base_url().'report/'.$this->uri->segment(2).'/generate'?>" target="_blank" class="generate-btn"><i class="fa fa-file-pdf-o"></i> Generate</a>
</div>
