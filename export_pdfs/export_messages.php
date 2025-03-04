<?php
require_once('../TCPDF-main/tcpdf.php');
require_once('../db.php');

$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Joyland Church');
$pdf->SetTitle('Messages Report');
$pdf->SetHeaderData('', 0, 'Messages Report', 'Generated by Joyland Church');

$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

$html = '<h2>Messages Report</h2>';
$html .= '<table border="1" cellpadding="5">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Message</th>
                <th>Date</th>
            </tr>';

$query = "SELECT FirstName, LastName, Message, Message_Date FROM contactus ORDER BY Message_Date DESC";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
                <td>' . htmlspecialchars($row['FirstName']) . '</td>
                <td>' . htmlspecialchars($row['LastName']) . '</td>
                <td>' . htmlspecialchars($row['Message']) . '</td>
                <td>' . htmlspecialchars($row['Message_Date']) . '</td>
              </tr>';
}

$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('messages_report.pdf', 'D');
?>
