<header>
  <h1>Hmmmmm.....</h1>
  <h2>We couldn't find anybody by that first name.</h2>
</header>

<section>
  <h3>Want to try again?</h3>
  <form action="singleArrayItem.php" method="GET">
    <input type="text" name="firstName" placeholder="Enter a First Name">
    <input type="submit" value="Retry">
  </form>
</section>
<style>
  header {
    height: 150px;
    text-align: center;
  }
  header h1 {
    color: orange;
  }
  section {
    max-width:600px;
    margin: auto;
  }
  section form {
    margin-top: 20px;
    border: 1px solid black;
    box-shadow: 0 0 2px black;
  }
  form input {
    width: 95%;
    margin: 2.5%;
  }
</style>