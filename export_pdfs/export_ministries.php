<?php
require_once('../TCPDF-main/tcpdf.php');
require_once('../db.php');

$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Joyland Church');
$pdf->SetTitle('Ministries Report');
$pdf->SetHeaderData('', 0, 'Ministries Report', 'Generated by Joyland Church');

$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

$html = '<h2>Ministries Report</h2>';
$html .= '<table border="1" cellpadding="5">
            <tr>
                <th>Name</th>
                <th>Ministry</th>
                <th>Registration Date</th>
            </tr>';

$query = "SELECT name, ministry, registered_at FROM ministries ORDER BY ministry ASC";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
                <td>' . htmlspecialchars($row['name']) . '</td>
                <td>' . htmlspecialchars($row['ministry']) . '</td>
                <td>' . htmlspecialchars($row['registered_at']) . '</td>
              </tr>';
}

$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('ministries_report.pdf', 'D');
?>
