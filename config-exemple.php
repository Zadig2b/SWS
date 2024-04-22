<?php
      // lors de la mise en open source, remplacer les infos concernant la base de données.
      
      define('DB_HOST', '');
      define('DB_NAME', 'sws');
      define('DB_USER', '');
      define('DB_PWD', '');
      define('PREFIXE', '');
      
      // Si le nom de domaine ne pointe pas vers le dossier public, indiquer le chemin entre le nom de domaine et le dossier public.
      // exemple: /mon-site/public/
      define('HOME_URL', '/');
      
      // Ne pas toucher :
      
      define('DB_INITIALIZED', TRUE);