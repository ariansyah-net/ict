<?php
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetTitle('Codefications Computer');
  // $pdf->SetHeaderMargin(30);
  // $pdf->SetTopMargin(20);
  // $pdf->setFooterMargin(20);
  // $pdf->SetAutoPageBreak(true);
  // $pdf->SetAuthor('Ariansyah');
  // $pdf->SetDisplayMode('real', 'default');
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();

$html='
	<style>
		table{
		margin-top:30px;
		border: none;
		}
		td {
		font-size: 9px;
		text-align:center;
		line-height:1.4;
		}
	</style>

		<table>
			<tr>
			<td>'.$ar['codefication'].'</td>
			<td>'.$ar['codefication'].'</td>
			<td>'.$ar['codefication'].'</td>
			</tr>
			<tr>
			<td><img src="arians/img/barcode.jpg" style="width:120px" height="30px"></td>
			<td><img src="arians/img/barcode.jpg" style="width:120px" height="30px"></td>
			<td><img src="arians/img/barcode.jpg" style="width:120px" height="30px"></td>
			</tr>
			<tr>
			<td>www.it.ffup.org</td>
			<td>www.it.ffup.org</td>
			<td>www.it.ffup.org</td>
			</tr>
			<tr>
			<td>Powered by IT Operation</td>
			<td>Powered by IT Operation</td>
			<td>Powered by IT Operation</td>
			</tr>
		</table>
	';
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output('Codefications.pdf', 'I');
	?>
