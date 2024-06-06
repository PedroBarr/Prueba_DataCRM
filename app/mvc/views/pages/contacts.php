<!-- Page: Contacts -->
<div class="page_wrapper">
  <div class="page_container">
    <div class="page_content">
      <form method="POST">
        <div id="contacts_table_container">
        </div>
        <button
          type="submit"
          id="get_contacts_button"
          class="confirm_button"
        >
          Get Contacts
        </button>
      </form>
    </div>
  </div>
</div>

<script>
  let component = `<?php
    use controllers as MVC;

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      $controller = MVC\select_controller(CONTACTS);
      $component = $controller->get_list_as_view();
      echo $component;
    }
  ?>`;

  render_content('#contacts_table_container', component);
</script>