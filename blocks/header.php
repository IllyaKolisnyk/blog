<header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-5 border-bottom">
      <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
        <svg style="color: #0d6efd;" xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 448 512" role="img"><title>ДОБРА НОВИНА</title><path fill-rule="evenodd" clip-rule="evenodd" d="M448 336v-288C448 21.49 426.5 0 400 0H96C42.98 0 0 42.98 0 96v320c0 53.02 42.98 96 96 96h320c17.67 0 32-14.33 32-31.1c0-11.72-6.607-21.52-16-27.1v-81.36C441.8 362.8 448 350.2 448 336zM144 144c0-8.875 7.125-15.1 16-15.1L208 128V80c0-8.875 7.125-15.1 16-15.1l32 .0009c8.875 0 16 7.12 16 15.1V128L320 128c8.875 0 16 7.121 16 15.1v32c0 8.875-7.125 16-16 16L272 192v112c0 8.875-7.125 16-16 16l-32-.0002c-8.875 0-16-7.127-16-16V192L160 192c-8.875 0-16-7.127-16-16V144zM384 448H96c-17.67 0-32-14.33-32-32c0-17.67 14.33-32 32-32h288V448z" fill="currentColor"></path></svg>
        <span class="fs-4" style="color: #0d6efd;">ДОБРА НОВИНА</span>
      </a>
      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="index.php">Головна</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="contacts.php">Контакти</a>
        <?php
            if(isset($_COOKIE['login']) && $_COOKIE['login'] == "Kolisnyk_Illya") {
                echo '<a class="me-3 py-2 text-dark text-decoration-none" href="article.php">Додати статтю</a>';
            }
        ?>
      </nav>
      <?php
      if(!isset($_COOKIE['login'])):
      ?>
        <a class="btn btn-primary m-2" href="auth.php">Увійти</a>
        <a class="btn btn-primary m-2" href="registration.php">Реєстрація</a>
      <?php else: ?>
          <a class="btn btn-primary m-2" href="auth.php">Кабінет користувача</a>
      <?php endif;?>
    </div>
</header>