<?php
return array(
'Comments_1' => array(
	'ID' =>'1',
	'lang' =>'ru',
	'author' =>'2',
	'state' =>'create',
	'visible' =>'all',
	'config' =>NULL,
	'text' =>'comment is one',
	'parent' =>'0',
	'linkID' =>'2',
	'linkType' =>'content',
	'create' =>'2013-03-15 00:00:00',
	'update' =>'2013-03-15 00:00:00',
),
'Comments_2' => array(
	'ID' =>'2',
	'lang' =>'ru',
	'author' =>'2',
	'state' =>'moderate',
	'visible' =>'all',
	'config' =>NULL,
	'text' =>'comment is two',
	'parent' =>'0',
	'linkID' =>'2',
	'linkType' =>'content',
	'create' =>'2013-03-15 03:00:00',
	'update' =>'2013-03-15 04:00:00',
),
'Comments_3' => array(
	'ID' =>'3',
	'lang' =>'ru',
	'author' =>'3',
	'state' =>'update',
	'visible' =>'all',
	'config' =>NULL,
	'text' =>'this is third comment and it is child of one',
	'parent' =>'1',
	'linkID' =>'2',
	'linkType' =>'content',
	'create' =>'2013-03-15 09:00:00',
	'update' =>'2013-03-15 09:45:00',
),
'Comments_4' => array(
	'ID' =>'4',
	'lang' =>'ru',
	'author' =>'4',
	'state' =>'create',
	'visible' =>'all',
	'config' =>NULL,
	'text' =>'this is first comment of second content',
	'parent' =>'0',
	'linkID' =>'3',
	'linkType' =>'content',
	'create' =>'2013-03-14 00:00:00',
	'update' =>'2013-03-15 18:44:26',
),
'Comments_5' => array(
	'ID' =>'5',
	'lang' =>'ru',
	'author' =>'3',
	'state' =>'update',
	'visible' =>'all',
	'config' =>NULL,
	'text' =>'the second comment of second content page',
	'parent' =>'0',
	'linkID' =>'3',
	'linkType' =>'content',
	'create' =>'2013-03-15 03:00:00',
	'update' =>'2013-03-15 05:00:00',
),
);