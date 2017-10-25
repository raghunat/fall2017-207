<!DOCTYPE html>
<html>
  <head>
    <title>String Functions</title>
    <style>
      .codeOutput {
        background: black;
        color: white;
      }
    </style>
  </head>
  <body>
    <h1>String Funcitons</h1>
    <h2>Substring</h2>
    <h3>substr(string, length)</h3>
    <p>
      Returns a portion of a string.
    </p>
    <pre style="background:black; color: white;">
      <?php
        $string1 = "Sample String";
        //echo substr($string1, 10);
        echo "<h1>Hey Amanda</h1>"
       ?>
    </pre>

    <h2>String Length</h2>
    <h3>strlen(string)</h3>
    <p>
      Returns the number of characters in a string
    </p>
    <pre class="codeOutput">
      <?php
        echo strlen($string1);
      ?>
    </pre>

    <h2>String Replace</h2>
    <h3>str_replace(needle, new_needle, haystack)</h3>
    <p>
      Replaces string contents based on the needle, with the
      needle.
    </p>
    <pre class="codeOutput">
      <?php
        echo str_replace("Sample", "Replaced Sample", $string1);
       ?>
    </pre>

    <h2>Trim</h2>
    <h3>trim(string)</h3>
    <p>
      Removes extra white space from the beginning and end of a string.
    </p>
    <pre class="codeOutput">
      <?php
        echo trim(" My String                Ends  ");
       ?>
    </pre>

    <h2>String Position</h2>
    <h3>strpos(haystack, needle)</h3>
    <p>
      Returns the position of a string inside another string.
    </p>
    <pre class="codeOutput">
      <?php
        echo strpos($string1, "String");
       ?>
    </pre>

    <h2>String to Lower</h2>
    <h3>strtolower(string)</h3>
    <p>
      Returns a string in all lower case letters.
    </p>
    <pre class="codeOutput">
      <?php echo strtolower("IM KIND OF A BIG DEAL"); ?>
    </pre>

    <h2>String to Upper</h2>
    <h3>strtoupper(string)</h3>
    <p>
      Returns a string in all upper case letters.
    </p>
    <pre class="codeOutput">
      <?php echo strtoupper("shhhh its a secret!"); ?>
    </pre>
  </body>
</html>
