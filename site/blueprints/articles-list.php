<?php if(!defined('KIRBY')) exit ?>

title: Articles
files: false
pages:
  template: article
  sort: flip
  num:
    mode: date
    field: datetime
    format: %Y%m%d%H%I
options:
  preview: false
  status: false
  template: false
  url: false