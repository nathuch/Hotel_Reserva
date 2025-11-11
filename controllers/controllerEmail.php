<?php

use PHPMailer\PHPMailer\PHPMailer;

class ControllerEmail
{
    public function enviar_email_reserva($reserva_id)
    {
        if (!isset($_SESSION['reservas']) || empty($_SESSION['reservas'])) {
            echo "No hay reservas disponibles para enviar el correo.";
            return;
        }
        $reserva = null;
        foreach ($_SESSION['reservas'] as $r) {
            if ($r['id'] == $reserva_id) {
                $reserva = $r;
                break;
            }
        }
        // Looking to send emails in production? Check out our Email API/SMTP product!
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ng5632963@gmail.com'; // tu cuenta Gmail completa
        $mail->Password   = 'lhmf dria reup pjne';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;


        $mail->setFrom('no-reply@hotel.com', 'Hotel Reservas');
        $mail->addAddress($_SESSION['user']['correo'], $_SESSION['user']['nombre']);
        $mail->Subject = 'Confirmación de Reserva';
        $mail->Body = "Hola {$_SESSION['user']['nombre']},\n\nGracias por reservar con nosotros. Aquí están los detalles de su reserva:\n\n" .
            "Habitación: {$reserva['habitacion']}\n" .
            "Check-in: {$reserva['checkin']}\n" .
            "Check-out: {$reserva['checkout']}\n" .
            "Pago: {$reserva['pay']}\n" .
            "Estado: {$reserva['specialrequest']}\n\n" .
            "¡Esperamos verte pronto!\n\n" .
            "Saludos,\n" .
            "El equipo de Hotel reservas";

        if (!$mail->send()) {
            echo "Error al enviar el correo: " . $mail->ErrorInfo;
        } else {
            echo "Correo enviado exitosamente a " . $_SESSION['user']['correo'];
        }
    }
}
