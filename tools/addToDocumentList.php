<?php

/*

Kruno, 2017.
kruno.se (on gmx.com)



DESCRIPTION

	A very simple script to add entries to DocumentList.xml in batches.



USAGE

	Create file 'collecting-raw' in same folder where you have 'DocumentList.xml'. Collect misspellings in 'collecting-raw' in format

		missplelings		misspellings

	separating these two words with double tab. Leave last line in 'collecting-raw' empty.

	After collecting significant number of replacements, check if last line in 'DocumentList.xml' is empty and add empty line to very end and run if it's not.

	Run script 'addToDocumentList.php.php', e.g:

		php addToDocumentList.php

	Command should append entries from 'collecting-raw' to the end of 'DocumentList.xml' and clean out 'collecting-raw' leaving it empty. 

*/

$inputHandle = fopen("collecting-raw", "r");

$outputContent = "";

$closingLine = "</block-list:block-list>";

if($inputHandle) {

$lineNum = 0;

	while(($line = fgets($inputHandle)) !== false) {

		$explodeLine = explode("\t\t", trim($line));

		$outputContent .= "  <block-list:block block-list:abbreviated-name=\"" . $explodeLine[0] . "\" block-list:name=\"" . $explodeLine[1] . "\"/>\n";

			$lineNum++;

			echo $lineNum . "\n";

	}

	fclose($inputHandle);

}

$inputHandle = fopen("collecting-raw", "w");
	fwrite($inputHandle, "");
		fclose($inputHandle);


$outputFile = file_get_contents("DocumentList.xml");

$outputFile = str_replace("</block-list:block-list>\n", $outputContent, $outputFile);

$outputFile .= $closingLine . "\n";

$outputHandle = fopen("DocumentList.xml", "w");
	fwrite($outputHandle, $outputFile);
		fclose($outputHandle);

?>
