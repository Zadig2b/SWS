<?php

echo "Cet index est normalement inaccessible, si le .htaccess fait correctement son travail.";

// Commencer par rediriger vers le dossier public :

header("location: /public/");