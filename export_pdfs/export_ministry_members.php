<?php
require_once('../TCPDF-main/tcpdf.php');
require_once('../db.php');

$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Joyland Church');
$pdf->SetTitle('Ministry Members Report');
$pdf->SetHeaderData('', 0, 'Ministry Members Report', 'Generated by Joyland Church');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 10);
$pdf->AddPage();


$query = "SELECT ministry, COUNT(*) AS TotalMembers FROM ministries GROUP BY ministry";
$result = mysqli_query($conn, $query);

$html = '<h2>Ministry Members Report</h2>';
$html .= '<table border="1" cellpadding="5">';
$html .= '<tr style="background-color:#f2f2f2;"><th>Ministry Name</th><th>Total Members</th></tr>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>';
    $html .= '<td>' . $row['ministry'] . '</td>';
    $html .= '<td>' . $row['TotalMembers'] . '</td>';
    $html .= '</tr>';
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('ministry_members_report.pdf', 'D');

exit;
?>
