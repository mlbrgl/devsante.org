<?php if(!defined('KIRBY')) exit ?>

title: Article
pages: false
files:
  sortable: true
fields:
  title:
    label: Titre
    type: text
  author:
    label: Auteur
    type: text
    width: 1/2
  datetime:
    label: Mis à jour le 
    type: datetime
    date: 
      format: DD/MM/YYYY
    required: true
    default: now
    width: 1/2
  teaser:
    label: Accroche
    type: textarea
  text:
    label: Texte
    type: textarea
  tags:
    label: Tags
    type: tags