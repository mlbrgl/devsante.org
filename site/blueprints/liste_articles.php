<?php if(!defined('KIRBY')) exit ?>

title: Articles
pages:
  template: article
  num:
    mode: date
    field: datetime
    format: %Y%m%d%H%I
fields:
  title:
    label: Title
    type:  text
  text:
    label: Texte
    type:  textarea