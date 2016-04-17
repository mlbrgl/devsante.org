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
  date:
    label: Mis à jour le 
    type: date
    default: today
    format: DD/MM/YYYY
    width: 1/2
  teaser:
    label: Accroche
    type: textarea
  text:
    label: Texte
    type: textarea