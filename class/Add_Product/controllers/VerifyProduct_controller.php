<?php


class VerifyProduct_Controller
{

public static function verifyProduct($product = [], $type) {
  foreach ($product as $measure) {
    if(empty($measure)) {
      throw new \Exception(sprintf("Please, provide %s", $type));
    }
    if(!is_numeric($measure)) {
      throw new \Exception("Please, provide the data of indicated type");
    }
  }
  return true;
}


public static function verifyInformations($informations) {
  foreach ($informations as $info) {
    if(empty($info)) {
      throw new \Exception("Please, submit required data");
    }elseif (!is_numeric($informations[2])) {
      throw new \Exception("Please, submit required data");
    }
  }
  return true;
}

}
