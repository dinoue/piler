<?php

use PHPUnit\Framework\TestCase;

include_once("system/model.php");
include_once("system/misc.php");
include_once("model/health/health.php");

final class FormatTest extends TestCase
{

   public function providerTestTimeFormatValues(){
      return [
         ['0', '0.00 ms'],
         ['15', '15.00 sec'],
         ['0.87', '870.00 ms']
      ];
   }

   /**
    * @dataProvider providerTestTimeFormatValues
    */

   public function test_format_time_1($timeval, $expected_result) {
      $result = ModelHealthHealth::format_time($timeval);
      $this->assertEquals($result, $expected_result);
   }


   public function providerTestConvertDateStringToYmdByTemplateValues() {
      return [
         ['2021.05.01', 'y.m.d', ['0','0','0']],
         ['2021.05.01', 'Y.m', ['0','0','0']],
         ['2021.05.01', 'Y.m.d.e', ['0','0','0']],
         ['2021.05.01', 'Y.m.d', ['2021','05','01']],
         ['2021.05.01', 'Y.m.d.', ['0','0','0']],
         ['2021.05.01', 'Y-m-d', ['2021','05','01']],
         ['12/01/2008', 'm/d/Y', ['2008','12','01']],
         ['12-01-2008', 'm-d-Y', ['2008','12','01']],
      ];
   }

   /**
    * @dataProvider providerTestConvertDateStringToYmdByTemplateValues
    */

   public function test_convert_date_string_to_ymd_by_template($date, $date_template, $expected_result) {
      $result = convert_date_string_to_ymd_by_template($date, $date_template);
      $this->assertEquals($result, $expected_result);
   }


}