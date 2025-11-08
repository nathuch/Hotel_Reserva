<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ControllerExcel
{

    public function generar_excel()
    {
        if (!empty($_SESSION['reservas']) && is_array($_SESSION['reservas']))
            $rows = $_SESSION['reservas'];
        else {
            echo 'No hay reservas para exportar';
            exit;
        }

        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        $headers = ['Reserva ID', 'Habitacion', 'Fecha de entrada', 'Fecha de salida', 'Monto', 'solicitudes especiales'];
        $col = 'A';
        foreach ($headers as $h) {
            $worksheet->setCellValue("{$col}1", $h);
            $col++;
        }
        $rownum = 2;
        foreach ($rows as $row) {
            $worksheet->setCellValue("A{$rownum}", $row['id']);
            $worksheet->setCellValue("B{$rownum}", $row['habitacion']);
            $worksheet->setCellValue("C{$rownum}", $row['checkin']);
            $worksheet->setCellValue("D{$rownum}", $row['checkout']);
            $worksheet->setCellValue("E{$rownum}", $row['pay']);
            $worksheet->setCellValue("F{$rownum}", $row['specialrequest']);

            $rownum++;
        }


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="hello world.xlsx"');
        header('Cache-Control: max-age=0');

        header('Content-Type: application/v');
        $writer->save('php://output');
        exit;
    }
}
