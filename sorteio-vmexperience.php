<?php
require_once 'dbconfig.php';


error_reporting(~E_ALL);

if (isset($_POST['btnsave'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $whats = $_POST['whats'];
  $city = $_POST['city'];
  $number = $_POST['number'];


$validar = false;

$sorteio = rand(1, 3500);
$query = $DB_con->query("SELECT * FROM forms WHERE number = '$sorteio';");
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

while($resultado != null){
  $sorteio = rand(1, 3500);
  $query = $DB_con->query("SELECT * FROM forms WHERE number = '$sorteio';");
  $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
}




  

  $stmt = $DB_con->prepare('INSERT INTO forms (name,email,whats,city,number) VALUES(:uname,:uemail,:uwhats,:ucity,:unumber)');
  $stmt->bindParam(':uname', $name);
  $stmt->bindParam(':uemail', $email);
  $stmt->bindParam(':uwhats', $whats);
  $stmt->bindParam(':ucity', $city);
  $stmt->bindParam(':unumber', $sorteio);

  
  if ($stmt->execute()) {
    echo ("<script type= 'text/javascript'>alert('Obrigado! O número do seu sorteio é $sorteio');</script>
      <script>window.location = 'sorteio-vmexperience.php';</script>");
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div id="teste">

    <div id="form" class="container">
      <div class="row justify-content-center">
        <div class="col-3">
          <img src="img1.jpeg" style="width: 200px;" alt="" srcset="">
        </div>
      </div>
      <div class="container">
        <h4 class="text-center">Preencha o formulário e participe de nosso sorteio</h4>
        <form method="POST" action="" class="row g-3">
          <div class="col-12">
            <label for="inputName" class="form-label">Nome Completo</label>
            <input type="text" value="<?php echo $name; ?>" name="name" placeholder="Digite seu nome completo" class="form-control" id="inputName">
          </div>
          <div class="col-12">
            <label for="inputPhone" class="form-label">Telefone</label>
            <input type="text" value="<?php echo $whats; ?>" name="whats" placeholder="Telefone" class="form-control" id="inputPhone">
          </div>
          <div class="col-12">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="text" value="<?php echo $email ?>" name="email" placeholder="Email para contato" class="form-control" id="inputEmail">
          </div>
          <div class="col-md-6">
            <label for="inputCity" class="form-label">Cidade</label>
            <input type="text" value="<?php echo $city; ?>" name="city" placeholder="Cidade" class="form-control" id="inputCity">
          </div>
          <input type="hidden" value="<?php echo $sorteio; ?>" name="number" placeholder="Numero" class="form-control" id="inputCity">
          <div class="col-12">
            <button type="submit" name="btnsave" class="btn btn-red" style="background-color: #006999; color:azure;">CADASTRE-SE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </section>
  </main><!-- End #main -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
  <!-- Template Main JS File -->
</body>

</html>