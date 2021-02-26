<?php
// jik ada userdata dengan item success, maka jalankan ini 
if ($this->session->has_userdata('success')) { ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
        <!-- memunculkan pesan data, success adalah nama item yang sudah dibuat di method process  -->
        <?= $this->session->flashdata('success'); ?>
    </div>

<?php } ?>

<?php
// jik ada userdata dengan item danger, maka jalankan ini 
if ($this->session->has_userdata('danger')) { ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
        <!-- memunculkan pesan data, danger adalah nama item yang sudah dibuat di method process  -->
        <?= $this->session->flashdata('danger'); ?>
    </div>

<?php } ?>

<?php
// jik ada userdata dengan item danger, maka jalankan ini 
if ($this->session->has_userdata('error')) { ?>
    <div class="alert alert-error alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-ban"></i>
        <!-- memunculkan pesan data, error adalah nama item yang sudah dibuat di method process  -->
        <?= $this->session->flashdata('error'); ?>
    </div>

<?php } ?>