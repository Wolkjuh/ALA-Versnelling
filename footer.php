</main>
<footer>
  <section class="socialmedia">
    <a href="https://instagram.com"><img class="instagramlogo" src="assets/Images/instagram.png" height="50px"></a>
    <a href="https://facebook.com"><img class="facebooklogo" src="assets/Images/facebook.png" height="50px"></a>
  </section>
  <div class="copyright">
    <p>&copy Bart van Wijk</p>
  </div>
  <div class="klantnummer">
  <?php
    include 'Includes/db.inc.php';
    
    $userUid = $_SESSION['useruid'];
    $klantnummerQuery = "SELECT klantnummer FROM users WHERE usersUid = '" . $userUid . "'";
    $klantResult = $conn->query($klantnummerQuery);
    $klantRow = $klantResult->fetch_assoc();
    $klantnummer = $klantRow['klantnummer'];

    $kortingQuery = "SELECT korting FROM users WHERE usersUid = '" . $userUid . "'";
    $kortingResult = $conn->query($kortingQuery);
    $kortingRow = $kortingResult->fetch_assoc();
    $korting = $kortingRow['korting'];

    if (isset($_SESSION['useruid'])) {
      if ($_SESSION['useruid'] == "Admin") {

      } else {
        echo "<p>Klantnummer: " . $klantnummer . "</p>";
      }
    }
    ?>
  </div>
  <div class="korting">
    <?php
      include 'Includes/db.inc.php';

      $kortingQuery = "SELECT korting FROM users WHERE usersUid = '" . $userUid . "'";
      $kortingResult = $conn->query($kortingQuery);
      $kortingRow = $kortingResult->fetch_assoc();
      $korting = $kortingRow['korting'];

      if (isset($_SESSION['useruid'])) {
        if ($_SESSION['useruid'] == "Admin") {

        } else {
          echo "<p>Korting: " . $korting . "%</p>";
        }
      }
    ?>
  </div>
</footer>
</body>
<style>
  footer {
    background-color: rgb(33, 112, 33);
    height: 10vh;
    width: 100%;
  }

  .instagramlogo {
    margin: 10px 0 0 0;
  }

  .klantnummer p {
    position: absolute;
    bottom: 4%;
    margin: 0 0 30px 10px;
    color: beige;
    z-index: 12;
  }

  .korting p {
    position: absolute;
    bottom: 2%;
    margin: 0 0 13px 10px;
    color: beige;
    z-index: 12;
  }

  .copyright p {
    position: absolute;
    bottom: 4%;
    left: 44%;
    text-align: center;
  }

  .socialmedia {
    margin: 0 0 0 90%;
  }
</style>
</html>