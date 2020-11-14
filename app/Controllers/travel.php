<?php
 namespace App\Controllers;
 class Travel extends BaseController
 {
 public function index()
 {     $table = new \CodeIgniter\View\Table();
 $headings = $places->fields;
$displayHeadings = array_slice($headings, 1, 2);
$table->setHeading(array_map('ucfirst', $displayHeadings));
foreach ($records as $record) {
$table->addRow($record->name,$record->description);
}
return $table->generate();
$nameLink = anchor("travel/showme/$record->id",$record->name);
$table->addRow($nameLink,$record->description);
//$table->addRow($record->name,$record->description);
$template = [
'table_open' => '<table cellpadding="5px">',
'cell_start' => '<td style="border: 1px solid #dddddd;">',
'row_alt_start' => '<tr style="background-color:#dddddd">',
];
$table->setTemplate($template);
$fields = [
 'title' => 'Travel Destinations',
 'heading' => 'Travel Destinations',
 'footer' => 'Copyright Xavier'
 ];
//connect to the model
//retrive all the records
//get a template parser
$parser = \Config\Services::parser();
//tell it about the substitions
return $parser->setData($fields)
 ->render('templates\top') .
 $table->generate() .
 $parser->setData($fields)
 ->render('templates\bottom');
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     // connect to the model
 $places = new \App\Models\Places();
 // retrieve all the records
 $records = $places->findAll();
 // get a template parser
 $parser = \Config\Services::parser();
 // tell it about the substitions
 return $parser->setData(['records' => $records])
 // and have it render the template with those
 ->render('placeslist');
 }
 public function showme($id)
 {// connect to the model
 $places = new \App\Models\Places();
 // retrieve all the records
 $record = $places->find($id);
 // get a template parser
 $parser = \Config\Services::parser();
 // tell it about the substitions
 return $parser->setData($record)
 // and have it render the template with those
 ->render('oneplace');
 }
 }