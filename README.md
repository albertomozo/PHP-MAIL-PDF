# ENUNCIADO

VAmos a disponer de un JSON de curso y Alumnos y queremos enviar por correo en un PDF Adjunto los resultados de cada alumnos.

VAmos a usar

phpMailer https://github.com/PHPMailer/PHPMailer

```bash
composer require phpmailer/phpmailer
```	

DOMPDF 

```bash
composer require dompdf/dompdf
```	

Nuestro composer.json contendra

```json
{
    "require": {
        "phpmailer/phpmailer": "^6.9",
        "dompdf/dompdf": "^3.0"
    }
}
```



Partimos de los repositorios 


https://github.com/albertomozo/PHP-mail

mas concretamente del ejemplo 

https://github.com/albertomozo/PHP-dompdf 


## Instalacion

```bash
git clone https://github.com/albertomozo/PHP-MAIL-DOMPDF.git
```

Y luego ejercutar en la terminal

```bash
composer install
```	

## estructura
📁datos : caperta con los json de datos 
📁inc : ficheros incovados en includes
📁pdf : Carpeta, incialmente vacia, donde iremos guardando los PDF generados


## 00-correo_pdf.php

Lee el datos/cursos.json, genera un pdf con los datos del mismo y los envia como copia oculta a todos los alumnos que estan en el json.

```php	
 for ($i = 0; $i < count($data['alumnos']); $i++)
 {
            $mail->addBCC($data['alumnos'][$i]['email']);
 }
```	

## 01-correo_pdf_alumno.php

En esta caso vamos a enviar un email a cada alumno solo con sus notas.


