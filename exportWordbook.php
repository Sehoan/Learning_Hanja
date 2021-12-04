<?php
/*
 * Author(s): Sehoan Choi (sc8zt), Ryu Patterson (rjp5cc)
 */
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT");

$jsonReport = '
[
  {
    "id": 522,
    "literal": "虐",
    "on_yomi": "ギャク",
    "kun_yomi": "しいた.げる",
    "meaning_en": "tyrannize, oppress, ",
    "stroke_count": 9
  },
  {
    "id": 698,
    "literal": "携",
    "on_yomi": "ケイ",
    "kun_yomi": "たずさ.える, たずさ.わる",
    "meaning_en": "portable, carry (in hand), armed with, bring along, ",
    "stroke_count": 13
  },
  {
    "id": 703,
    "literal": "畦",
    "on_yomi": "ケイ",
    "kun_yomi": "あぜ, うね",
    "meaning_en": "rice paddy ridge, furrow, rib, ",
    "stroke_count": 11
  },
  {
    "id": 786,
    "literal": "限",
    "on_yomi": "ゲン",
    "kun_yomi": "かぎ.る, かぎ.り, -かぎ.り",
    "meaning_en": "limit, restrict, to best of ability, ",
    "stroke_count": 9
  },
  {
    "id": 1728,
    "literal": "堕",
    "on_yomi": "ダ",
    "kun_yomi": "お.ちる, くず.す, くず.れる",
    "meaning_en": "degenerate, descend to, lapse into, ",
    "stroke_count": 12
  },
  {
    "id": 4437,
    "literal": "烋",
    "on_yomi": "コウ, キュウ, キョウ",
    "kun_yomi": "",
    "meaning_en": "boasting, fortunate, beautiful, ",
    "stroke_count": 10
  }
]';
header('Content-Type: application/json; charset=utf-8');
echo $jsonReport;
