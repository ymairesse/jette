<?php
/* Smarty version 4.3.1, created on 2024-04-12 08:36:34
  from '/home/yves/www/newOxfam/templates/navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6618d6722b9499_02429399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '795b1215f3d1136ed1a06313ad734894754a25c3' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/navbar.tpl',
      1 => 1712903705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6618d6722b9499_02429399 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"
      ><img src="images/logo-oxfam-mdm.png" alt="MDM Oxfam"
    /></a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarScroll"
      aria-controls="navbarScroll"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
        <?php if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?>

        <li class="nav-item">
          <a class="nav-link" id="gestCalendrier" href="#"
            ><i class="fa fa-calendar"></i> Calendrier des permanences</a
          >
        </li>

        <?php if (($_smarty_tpl->tpl_vars['user']->value['droits'] == 'admin')) {?>
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            >Planning et Périodes</a
          >

          <ul class="dropdown-menu">
            <li>
              <a href="#" class="dropdown-item" id="gestInscriptions">
                <i class="fa fa-calendar"></i> Gestion des inscriptions
              </a>
            </li>
            <li>
              <a href="#" class="dropdown-item" id="gestFreeze">
                <i class="fa fa-snowflake-o"></i> Gel des inscriptions
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            Initialisations
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#" class="dropdown-item" id="gestPeriodes">
                <i class="fa fa-hourglass" aria-hidden="true"></i> Gestion des
                contextes
              </a>
            </li>
            <li>
              <a href="#" class="dropdown-item" id="gestConges">
                <i class="fa fa-key" aria-hidden="true"></i>
                Gestion des congés
              </a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a href="#" class="dropdown-item" id="btn-clean">
                <i class="fa fa-trash-o" aria-hidden="true"></i> Nettoyage des
                mois échus
              </a>
            </li>
          </ul>
        </li>
        <?php }?>

        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            Préférences
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" id="editProfilPerso" href="#"
                ><i class="fa fa-user"></i> Profil personnel</a
              >
            </li>

            <?php if ((isset($_smarty_tpl->tpl_vars['user']->value)) && ($_smarty_tpl->tpl_vars['user']->value['droits'] == 'admin')) {?>
            <li>
              <a class="dropdown-item" id="gestUsers" href="#"
                ><i class="fa fa-users"></i> Gestion des utilisateurs</a
              >
            </li>
            <li>
              <a href="#" class="dropdown-item" id="approbationUsers">
                <i class="fa fa-user-plus" aria-hidden="true"></i> Approbation nouveaux bénévoles
              </a>
            </li>

            <?php }?>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a href="#" class="dropdown-item"> VERSION: <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
 </a>
            </li>
          </ul>
        </li>

        <?php }?>
        <li>
          <i
            style="display: none"
            class="fa fa-spinner fa-spin fa-3x fa-fw ajaxLoader"
          ></i>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <!-- Utilisation de ms-auto pour déplacer les boutons à droite -->

        <?php if (!((isset($_smarty_tpl->tpl_vars['user']->value)))) {?>
        <li class="nav-item">
          <a
            type="button"
            class="btn btn-warning btn-sm"
            href="#"
            id="creationCompte"
            title="Création d'un compte"
          >
            Créer un compte</a
          >
        </li>
        <?php }?>
        <li class="nav-item">
          <?php if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?>
          <a
            role="button"
            class="btn btn-danger btn-sm"
            href="#"
            id="btn-logout"
            title="Déconnexion"
          >
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span id="loggedUser">
              <span id="never"></span>
              <?php echo $_smarty_tpl->tpl_vars['user']->value['civilite'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['prenom'];?>
</span
            >
          </a>
          <?php } else { ?>
          <a
            type="button"
            class="btn btn-success btn-sm"
            href="#"
            id="btn-login"
            title="Connexion"
          >
            <i class="fa fa-user"></i> Connexion</a
          >
          <?php }?>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php }
}
