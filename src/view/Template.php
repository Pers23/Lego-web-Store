<?php

namespace view;

class Template {
  static function render($params) {
?>

<!DOCTYPE html>
<html>
      <meta charset="UTF-8"/>

<head>

  <!-- Inclusion des méta-données -->
  <?php include "commons/head.php" ?>

</head>

<body>

  <!-- TODO: Inclure le nav ici -->
  <?php include "commons/nav.php"?>

  <!-- Inclusion du module à afficher -->
  <?php include "modules/" . $params["module"]; ?>

  <!-- TODO: Inclure le footer ici -->
<?php include "commons/footer.php"?>

</body>

</html>

<?php
  }
}