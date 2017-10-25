<header>
  <h1>Oops!</h1>
  <h2>An error occured. Sorry!</h2>
</header>

<section class="errorContactSection">
  <form method="POST" action="sendEmail.php">
    <input type="text" placeholder="Your Name" name="name">
    <input type="text" placeholder="email@you.com" name="email">
    <textarea name="message" cols="30" rows="10" placeholder="Insert a Message"></textarea>
    <input type="submit" value="submit">
  </form>
</section>

<style>
  header {
    height: 150px;
    text-align: center;
  }
  header h1 {
    color: red;
  }

  .errorContactSection {
    max-width: 600px;
    margin: auto;
  }
  .errorContactSection form {
    margin-top: 20px;
    border: 1px solid black;
    box-shadow: 0 0 2px black;
  }
  form input, form textarea {
    width: 95%;
    margin: 2.5%;
  }
</style>