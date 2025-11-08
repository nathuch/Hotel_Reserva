<?php

ob_clean();

class PDF extends FPDF
{
    public $postData;

    function generatetable()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(40, 10, 'Nombre', 1);
        $this->Cell(40, 10, 'Apellido', 1);
        $this->Cell(40, 10, 'Habitacion', 1);
        $this->Cell(40, 10, 'Check-In', 1);
        $this->Cell(40, 10, 'Check-Out', 1);
        $this->Cell(40, 10, 'Pago', 1);
        $this->Cell(60, 10, 'Solicitud Especial', 1);
        $this->Ln();

        $this->SetFont('Arial', '', 12);
        foreach ($this->postData as $row) {
            $this->Cell(40, 10, $row['nombre'], 1);
            $this->Cell(40, 10, $row['apellido'], 1);
            $this->Cell(40, 10, $row['habitacion'], 1);
            $this->Cell(40, 10, $row['checkin'], 1);
            $this->Cell(40, 10, $row['checkout'], 1);
            $this->Cell(40, 10, $row['pay'], 1);
            $this->Cell(60, 10, substr($row['specialrequest'], 0, 20) . '...', 1);
            $this->Ln();
        }
    }
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('Reporte de Reservas'), 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, utf8_decode('listado de usuario registrado en el sistema'), 0, 1);
$pdf->Ln(5);
$pdf->postData = $lista_reserva;
$pdf->generatetable();

$pdf->Output('I', 'reporte_usuarios.pdf');

//--exit;
