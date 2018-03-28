<?php
$this->load->view("templates/header");
if (isset($sidebar))
    $this->load->view($sidebar);
if (isset($contents))
    $this->load->view($contents);
$this->load->view("templates/footer");