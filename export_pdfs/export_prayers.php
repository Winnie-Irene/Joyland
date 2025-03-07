<?php
require_once('../TCPDF-main/tcpdf.php');
require_once('../db.php');

$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Joyland Church');
$pdf->SetTitle('Prayer Requests Report');
$pdf->SetHeaderData('', 0, 'Prayer Requests Report', 'Generated by Joyland Church');

$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

$html = '<h2>Prayer Requests Report</h2>';
$html .= '<table border="1" cellpadding="5">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Request</th>
                <th>Date</th>
            </tr>';

$query = "SELECT name, email, prayer, created_at FROM prayer_requests ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
                <td>' . htmlspecialchars($row['name']) . '</td>
                <td>' . htmlspecialchars($row['email']) . '</td>
                <td>' . htmlspecialchars($row['prayer']) . '</td>
                <td>' . htmlspecialchars($row['created_at']) . '</td>
              </tr>';
}

$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('prayer_requests_report.pdf', 'D');
?>
