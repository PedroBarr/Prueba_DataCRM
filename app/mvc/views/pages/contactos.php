<!-- Page: contactos -->
<div class="page_wrapper">
  <div class="page_container">
    <div class="page_content">
      <?php
        //include 'app/config/auth.php';
        use config\auth as Auth;

        Auth\AuthService::get_instance()->a();
      ?>
      <button class="confirm_button"> Traer Datos </button>
    </div>
  </div>
</div>