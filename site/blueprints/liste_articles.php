<?php if(!defined('KIRBY')) exit ?>

title: Articles
pages:
  template: 
    - article
    - default
fields:
  title:
    label: Title
    type:  text
  text:
    label: Texte
    type:  textarea