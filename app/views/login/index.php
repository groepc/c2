<form class="form-signin" action="<?php echo DIR ?>/login/process/" method="post">
    <?php if (isset($data['error'])) : ?>
        <div class="alert alert-danger"><?php echo $data['error']; ?></div>
    <?php endif; ?>
    <h2 class="form-signin-heading">Project Score - Studenten</h2>
    <label for="inputEmail" class="sr-only">E-mailadres</label>
    <input type="email" id="inputEmail" name="username" class="form-control" placeholder="E-mailadres" required autofocus>
    <label for="inputPassword" class="sr-only">Wachtwoord</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Wachtwoord" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
</form>