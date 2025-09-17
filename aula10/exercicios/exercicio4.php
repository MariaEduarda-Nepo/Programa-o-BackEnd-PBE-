<?php 


class Email {
    public function enviar() {
        return "Enviando email...";
    }
}

class Sms {
    public function enviar() {
        return "Enviando SMS...";
    }
}

function notificar($meio) {
    if (method_exists($meio, 'enviar')) {
        echo $meio->enviar() . "\n";
    } else {
        echo "Objeto inválido para notificação." . "\n";
    }
}

// Teste interativo
echo "Escolha o meio de notificação (Email, Sms): ";

if ($notificacao == "Email") {
    $email = new Email();
    notificar($email);
} elseif ($notificacao == "Sms") {
    $sms = new Sms();
    notificar($sms);
} else {
    echo "Meio de notificação inválido!" . "\n";
}
?>